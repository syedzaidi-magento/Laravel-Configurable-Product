<?php

namespace App\Http\Controllers;

use App\Leg;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $legs = Leg::all();
        return view('products.create')->with('legs', $legs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'price' => 'required',
            'leg_type' => 'required'

        ]);
        $product = new Product;
        $product->name = $formFields['name'];
        $product->sku = $formFields['sku'];
        $product->price = $formFields['price'];
        $product->save();
        $product->legs()->attach($request->input('leg_type'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $item = Product::findOrFail($product->id);
        return view('products.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $legs = Leg::all();
        return view('products.edit')->with('product', $product)->with('legs', $legs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->legs()->detach();
        $product->fill($request->input());
        $product->legs()->attach($request->input('leg_type'));
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $item = Product::findOrFail($product->id);
        $item->legs()->detach();
        $item->delete();
        return back();

    }
}
