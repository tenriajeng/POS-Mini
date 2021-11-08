<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query =  Product::orderBy('created_at', 'DESC');

        if (isset($request)) {
            $query->orWhere('name', 'like', '%' . $request['search'] . '%');
        }

        $products = $query->paginate(10);

        return response()->json($products, 200);
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

        return response()->json(['data' => 'Product created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product, 200);
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

        return response()->json(['data' => 'Product updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);

        if (is_null($product)) {
            return  response()->json(['data' => 'data not found'], 404);
        }

        $product->delete();

        return  response()->json(['data' => 'Product deleted'], 200);
    }
}
