<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product, ProductSize $size, ProductSizeOption $option)
    {
        if($request->ajax()){
            $option = $size->size_option()->get();
            return datatables()->of($option)
            ->addIndexColumn()
            ->addColumn('action', function($query) use ($product){
                return $this->getActionColumn($query, $product);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.product.size.option.index', compact('product', 'size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, ProductSize $size, ProductSizeOption $option)
    {
        return view('admin.product.size.option.create-edit', compact('product', 'size', 'option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, ProductSize $size, ProductSizeOption $option)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $size->size_option()->create($request->all());

        return redirect()
        ->route('admin.product.size.option.index', ['product' => $product->id, 'size' => $size->id])
        ->with('success', 'Success Create Product Option');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSizeOption  $option
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSizeOption $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSizeOption  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, ProductSize $size, ProductSizeOption $option)
    {
        return view('admin.product.size.option.create-edit', compact('product', 'size', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSizeOption  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductSize $size, ProductSizeOption $option)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $option->update($request->all());

        return redirect()
        ->route('admin.product.size.option.index', ['product' => $product->id, 'size' => $size->id])
        ->with('success', 'SUccessfully Update Product Option');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSizeOption  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductSize $size, ProductSizeOption $option)
    {
        try {
            $option->delete();
            return redirect()
            ->route('admin.product.size.option.index', ['product' => $product->id, 'size' => $size->id] )
            ->with('success', 'Successfully Delete Product Option');
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.product.size.option.index', ['product' => $product->id, 'size' => $size->id] )
            ->with('error', 'Failed Delete Product Option');
        }
    }

    public function getActionColumn($data, $product)
    {
        $editBtn = route('admin.product.size.option.edit',['product' => $product->id, 'size' => $data->product_size_id, 'option' => $data->id]);
        $deleteBtn = route('admin.product.size.option.destroy', ['product' => $product->id, 'size' => $data->product_size_id, 'option' => $data->id]);
        $ident = Str::random();

        return
        '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        . '<button type="button" onclick="delete_data(\'form'.$ident .'\')" class="mx-1 my-1 btn btn-sm btn-outline-danger">Delete</button>'
        .'<form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }
}
