<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $order = Order::with('table', 'cash_flow.payment_method')->when(!is_null($request->status), function($query) use ($request){
                $query->whereStatus($request->status);
            })
            ->when($request->payment_id, function($query) use ($request){
                $query->whereHas('cash_flow.payment_method', function($subQuery) use ($request){
                    $subQuery->whereId($request->payment_id);
                });
            })
            ->when(!is_null($request->period), function($query) use ($request){
                $query->when($request->period == 'TODAY', function($queries){
                    $queries->whereDate('created_at', '=', date("Y-m-d"));
                })
                ->when($request->period == '1WEEK', function($queries){
                    $queries->where('created_at', '>=', date("Y-m-d", strtotime('-1 week')) . " 00:00:00");
                })
                ->when($request->period == '1MONTH', function($queries){
                    $queries->where('created_at', '>=', date("Y-m-d", strtotime('-1 month')) . " 00:00:00");
                });
            })->when(!is_null($request->start_period) && !is_null($request->end_period), function($query) use ($request){
                $query->where('created_at', '>=', date("Y-m-d", strtotime($request->start_period)). " 00:00:00")
                ->where('created_at', '<=', date("Y-m-d", strtotime($request->end_period)). " 23:59:59");
            });

            if($request->sum_of_all){
                $res = $order->sum('pay_amount');
                return response()->json(['total' => $res]);
            }

            $order->select();
            return datatables()->of($order)
            ->addIndexColumn()
            ->addColumn('table', function($query){
                return $query->table->name;
            })
            ->addColumn('action',function($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $payment = Payment::get()->pluck('name', 'id');

        return view('admin.order.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $payment = Payment::get()->pluck('name', 'id');
        $table = Table::get()->pluck('name', 'id');
        $button = Order::${'ORDER_NEXT_' . $order->status};
        return view('admin.order.create-edit', compact('order', 'payment', 'button', 'table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order->order_detail()->delete();
            $order->cash_flow()->delete();
            $order->delete();
            return redirect()->route('admin.order.index')->with('success', 'Successfully Deleted Order');
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.index')->with('error', 'Failed to Deleted Order');
        }
    }

    public function change_status(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order->update($request->all());

        return redirect()->route('admin.order.edit', $order->id)->with('success', 'Success Change Status Order');
    }

    public function change_payment(Order $order, Request $request)
    {
        $request->validate([
            'customer_pay' => 'required|min:1',
            'payment_id' => 'required'
        ]);

        $order->createCashFlow(['value' => $request->customer_pay, 'payment_id' => $request->payment_id]);

        return response()->json(['message' => 'Success Update Payment'], 200);
    }

    public function change_table(Order $order, Request $request)
    {
        $request->validate([
            'table_id' => 'required'
        ]);

        $order->update($request->all());

        return response()->json(['message' => 'Success Update Table'], 200);
    }

    public function getActionColumn($data)
    {
        $viewBtn = route('admin.order.edit', $data->id);

        return
        '<a href="'.$viewBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">View</a>';
    }
}
