<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Order $order)
    {
        if($request->ajax())
        {
            $orderDetail = $order->order_detail()->with('product', 'order:id,status')->get();
            return datatables()->of($orderDetail)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order, OrderDetail $detail)
    {
        if($request->ajax())
        {
            return response()->json([
                'message' => 'Success retrieve data',
                'data' => $detail->load('product')
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, OrderDetail $detail)
    {
        if($request->ajax())
        {
            $request->validate([
                'quantity' => 'required'
            ]);

            $productPrice = $detail->load('product')->product->price;

            $valueBefore = $productPrice  * $detail->quantity;
            $valueAfter = $productPrice * $request->quantity;

            $order->decrement('pay_amount', $valueBefore);
            $order->increment('pay_amount', $valueAfter);

            $order->decrement('quantity', $detail->quantity);
            $order->increment('quantity', $request->quantity);

            $detail->update($request->all());

            return response()->json([
                'message' => 'Success Update Data',
                'data' => ['order' => $order]
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, OrderDetail $detail)
    {
        try{
            $price = $detail->load('product')->product->price;
            $quantity = $detail->quantity;

            if ($order->quantity > $quantity){
                $order->decrement('quantity', $quantity);
                $order->decrement('pay_amount', $price * $quantity);

                $detail->delete();
                return response()->json(['message' => 'Success Delete Order Detail', 'data' => ['order' => $order]], 200);
            } else {
                throw new Exception("Order Detail Can't be Empty", 1);
            }

        } catch(\Throwable $e) {
            return response()->json(['message' => 'Failed Delete Order Detail'], 400);
        }
    }

    public function getActionColumn($data)
    {
        if(!in_array($data->order->status, ['CANCEL', 'COMPLETE'])){
            $deleteBtn = route('admin.order.detail.destroy', ['order' => $data->order_id, 'detail' => $data->id]);
            $ident = Str::random(10);

            return
            '<button type="button" onclick="editModal('.$data->order_id.','.$data->id.')" class="btn mx-1 my-1 btn-sm btn-outline-success edit-row">Edit</button>'
            . '<button type="button" onclick="deleteDetail('.$data->order_id.','.$data->id.')" class="mx-1 my-1 btn btn-sm btn-outline-danger delete-row">Delete</button>';
        }
    }
}
