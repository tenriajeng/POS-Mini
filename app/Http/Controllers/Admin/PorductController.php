<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;
use App\Models\ProductCategory;

class PorductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->only([
            'supplier_id',
            'name',
            'image',
            'price',
            'stock',
            'description',
            'status',
        ]));

        if (isset($request['category'])) {
            foreach ($request['category'] as $key => $category) {
                ProductCategory::create(['product_id' => $product->id, 'category_id' => $category]);
            }
        }

        Alert::success('Success', 'Product created', '1500');

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.update')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->only([
            'supplier_id',
            'name',
            'image',
            'price',
            'stock',
            'description',
            'status',
        ]));

        if (isset($request['category'])) {
            ProductCategory::where('product_id', $product->id)->delete();
            foreach ($request['category'] as $key => $category) {
                ProductCategory::create(['product_id' => $product->id, 'category_id' => $category]);
            }
        }

        Alert::success('Success', 'Product updated', '1500');

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Alert::success('Success', 'Product deleted', '1500');

        return redirect(route('admin.product.index'));
    }
}
