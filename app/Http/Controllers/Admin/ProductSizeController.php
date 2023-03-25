<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        if($request->ajax())
        {
            $size = $product->size()->get();
            return datatables()->of($size)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.product.size.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.product.size.create-edit', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $product->size()->create($request->all());

        return redirect()->route('admin.product.size.index', ['product' => $product->id])->with('success', 'Success Create Product Size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductSize  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, ProductSize $size)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductSize  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, ProductSize $size)
    {
        return view('admin.product.size.create-edit', compact('product', 'size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductSize  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductSize $size)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $size->update($request->all());

        return redirect()->route('admin.product.size.index', ['product' => $product->id])->with('success', 'Successfully Update Proudct Size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\ProductSize  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductSize $size)
    {
        try {
            $size->delete();

            return redirect()->route('admin.product.size.index', ['product' => $product->id,])->with('success', 'Success Delete Product Size');
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.size.index', ['product' => $product->id])->with('error', 'Failed Delete Product Size');
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('admin.product.size.edit',['product' => $data->product_id, 'size' => $data->id]);
        $deleteBtn = route('admin.product.size.destroy', ['product' => $data->product_id, 'size' => $data->id]);
        $optionBtn = route('admin.product.size.option.index', ['product' => $data->product_id, 'size' => $data->id]);
        $ident = Str::random();

        return
        '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        . '<a href="'.$optionBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-secondary">Option</a>'
        . '<button type="button" onclick="delete_data(\'form'.$ident .'\')" class="mx-1 my-1 btn btn-sm btn-outline-danger">Delete</button>'
        .'<form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }
}
