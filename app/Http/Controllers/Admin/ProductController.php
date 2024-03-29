<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::with('category')->select();
            return datatables()
                ->of($product)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->getActionColumn($data);
                })
                ->addColumn('note', function ($data) {
                    return Product::$message_product[$data->status];
                })
                ->make(true);
        }

        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get()->pluck('name', 'id');
        return view('admin.product.create-edit', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'star' => 'required',
            'image' => 'required|array|min:1',
            'image.*' => 'nullable|mimes:jpg,png|max:1024',
            'description' => 'required',
            'quantity' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($request->except(['image']));

        $product->setDisabled();

        foreach ($request->file('image') as $each) {
            $product->product_image()->create(['image' => '/storage/' . $each->storePublicly('product')]);
        }

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Success Add Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::get()->pluck('name', 'id');
        return view('admin.product.create-edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'star' => 'required',
            'image' => 'nullable|array',
            'image.*' => 'mimes:jpg,png|max:1024',
            'description' => 'required',
            'quantity' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->except(['image']));

        $product->quantity == 0 ? $product->setSuspend() : $product->setAvailable();

        if ($request->image !== null) {
            $product->product_image()->delete();

            foreach ($request->image as $each) {
                $product->product_image()->create(['image' => '/storage/' . $each->storePublicly('product')]);
            }
        }

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()
                ->route('admin.product.index')
                ->with('success', 'Success Delete Product');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.product.index')
                ->with('error', 'Failed Deleted Product');
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('admin.product.edit', $data->id);
        $sizeBtn = route('admin.product.size.index', ['product' => $data->id]);
        $deleteBtn = route('admin.product.destroy', $data->id);
        $ident = Str::random();

        return '<a href="' .
            $editBtn .
            '" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>' .
            '<a href="' .
            $sizeBtn .
            '" class="btn mx-1 my-1 btn-sm btn-outline-secondary">Size</a>' .
            '<button type="button" onclick="delete_data(\'form' .
            $ident .
            '\')" class="mx-1 my-1 btn btn-sm btn-outline-danger">Delete</button>' .
            '<form id="form' .
            $ident .
            '" action="' .
            $deleteBtn .
            '" method="post">
        <input type="hidden" name="_token" value="' .
            csrf_token() .
            '" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }

    public function runeUp(Request $request)
    {
        if ($request->ajax()) {
            $order = OrderDetail::with(['product', 'order'])
                ->when(!is_null($request->start_period) && !is_null($request->end_period), function ($query) use ($request) {
                    $query->whereHas('order', function ($subquery) use ($request) {
                        $subquery->where('created_at', '>=', date('Y-m-d', strtotime($request->start_period)) . ' 00:00:00')->where('created_at', '<=', date('Y-m-d', strtotime($request->end_period)) . ' 23:59:59');
                    });
                })
                ->when(!is_null($request->period), function ($queries) use ($request) {
                    $queries
                        ->when($request->period == 'TODAY', function ($subquery) {
                            $subquery->whereHas('order', function ($subsub) {
                                $subsub->whereDate('created_at', '=', date('Y-m-d'));
                            });
                        })
                        ->when($request->period == '1WEEK', function ($subquery) {
                            $subquery->whereHas('order', function ($subsub) {
                                $subsub->where('created_at', '>=', date('Y-m-d', strtotime('-1 week')) . ' 00:00:00');
                            });
                        })
                        ->when($request->period == '1MONTH', function ($subquery) {
                            $subquery->whereHas('order', function ($subsub) {
                                $subsub->where('created_at', '>=', date('Y-m-d', strtotime('-1 month')) . ' 00:00:00');
                            });
                        });
                })
                ->get()
                ->groupBy('product_id')
                ->map(function ($query) {
                    return [
                        'quantity' => $query->sum('quantity'),
                        'product' => $query->first()->product,
                    ];
                })
                ->sortByDesc('quantity');

            return datatables()
                ->of($order)
                ->addIndexColumn()
                ->addColumn('product_name', function ($row) {
                    return $row['product']->name;
                })
                ->addColumn('quantity', function ($row) {
                    return $row['quantity'];
                })
                ->addColumn('action', function ($row) {
                    return $this->getProductButton($row);
                })
                ->rawColumns(['product_name', 'quantity', 'action'])
                ->make(true);
        }

        return view('admin.product.runeup');
    }

    public function getProductButton($data)
    {
        $productBtn = route('admin.product.edit', $data['product']->id);

        return '<a href="' . $productBtn . '" class="btn mx-1 my-1 btn-sm btn-outline-success">View Product</a>';
    }
}
