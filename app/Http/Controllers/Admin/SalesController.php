<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\SaleUpdateRequest;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Sales::orderBy('created_at', 'DESC');

        if (isset($request['search'])) {
            $date = date('Y-m-d', strtotime($request['search']));

            $query->orWhere('created_at', 'like', '%' . $date . '%');
        }

        $sales = $query->paginate(10);
        return view('admin.sale.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStoreRequest $request)
    {
        $sales = Sales::create($request->only([
            'product_id',
            'customer_id',
            'stock',
            'price',
            'status',
        ]));

        $product = Product::find($request->product_id);

        if (is_null($product)) {

            Alert::error('Error', 'Product not found');

            return back();
        }

        $stock = $product->stock - $request->stock;

        if ($stock < 0) {
            Alert::error('Error', 'Product out of stock');

            return back();
        }

        $product->update(['stock' => $stock]);

        Alert::success('Success', 'category created', '1500');

        return redirect(route('admin.sale.index'));
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
    public function edit(Sales $sale)
    {
        return view('admin.sale.update')->with('sale', $sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleUpdateRequest $request, Sales $sale)
    {
        $product = Product::find($request->product_id);

        $stock = $request->stock;

        if ($sale->stock  != $request->stock) {
            $stock = $product->stock + $sale->stock;

            $stock = $stock - $request->stock;
        }

        if ($stock < 0) {
            Alert::error('Error', 'Product out of stock');

            return back();
        }

        $sale->update($request->only([
            'product_id',
            'customer_id',
            'stock',
            'price',
            'status',
        ]));

        $product->update(['stock' => $stock]);

        Alert::success('Success', 'category updated', '1500');

        return redirect(route('admin.sale.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sale)
    {
        $sale->delete();

        Alert::success('Success', 'category deleted', '1500');

        return redirect(route('admin.sale.index'));
    }
}
