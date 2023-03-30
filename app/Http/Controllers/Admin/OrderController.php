<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
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
            $order = Order::with('table')->when(!is_null($request->status), function($query) use ($request){
                $query->whereStatus($request->status);
            })->select();
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

        return view('admin.order.index');
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
        $order->pay_amount = number_format($order->pay_amount, 0, ",", ".");
        $button = Order::${'ORDER_NEXT_' . $order->status};
        return view('admin.order.create-edit', compact('order', 'payment', 'button'));
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
        //
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
            'payment_id' => 'required'
        ]);

        $order->update($request->all());

        return response()->json(['message' => 'Success Update Payment'], 200);
    }

    public function getActionColumn($data)
    {
        $viewBtn = route('admin.order.edit', $data->id);

        return
        '<a href="'.$viewBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">View</a>';
    }
}
