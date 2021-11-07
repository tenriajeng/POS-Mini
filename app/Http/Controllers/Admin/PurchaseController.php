<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreRequest;
use App\Http\Requests\PurchaseUpdateRequest;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;
use Alert;
use App\Models\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PurchaseTransaction::orderBy('created_at', 'DESC');

        if (isset($request['search'])) {
            $date = date('Y-m-d', strtotime($request['search']));

            $query->orWhere('created_at', 'like', '%' . $date . '%');
        }

        $purchases = $query->paginate(10);
        return view('admin.purchase.index')->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.purchase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseStoreRequest $request)
    {
        $purchase = PurchaseTransaction::create($request->only([
            'supplier_id',
            'product_id',
            'stock',
            'price',
        ]));

        $product = Product::where('id', $request->product_id)->where('supplier_id', $request->supplier_id)->first();

        if (is_null($product)) {

            Alert::error('Error', 'Product not found');

            return back();
        }

        $product->update(['stock' => $product->stock + $request->stock]);

        Alert::success('Success', 'Purchase created', '1500');

        return redirect(route('admin.purchase.index'));
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
    public function edit(PurchaseTransaction $purchase)
    {
        return view('admin.purchase.update')->with('purchase', $purchase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseUpdateRequest $request, PurchaseTransaction $purchase)
    {
        if ($purchase->supplier_id != $request->supplier_id || $purchase->product_id != $request->product_id) {

            Alert::error('Error', 'Product or Supplier not found');

            return back();
        }

        $product = Product::where('id', $request->product_id)->where('supplier_id', $request->supplier_id)->first();

        $stock = $product->stock - $purchase->stock;

        $stock = $stock + $request->stock;

        $purchase->update($request->only([
            'supplier_id',
            'product_id',
            'stock',
            'price',
        ]));

        if (is_null($product)) {

            Alert::error('Error', 'Product not found');

            return back();
        }

        $product->update(['stock' => $stock]);

        Alert::success('Success', 'Purchase updated', '1500');

        return redirect(route('admin.purchase.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseTransaction $purchase)
    {
        $product = Product::where('id', $purchase->product_id)->where('supplier_id', $purchase->supplier_id)->first();

        if (is_null($product)) {

            Alert::error('Error', 'Product not found');

            return back();
        }

        $stock = $product->stock - $purchase->stock;

        $product->update(['stock' => $stock]);

        $purchase->delete();

        Alert::success('Success', 'Purchase deleted', '1500');

        return redirect(route('admin.purchase.index'));
    }
}
