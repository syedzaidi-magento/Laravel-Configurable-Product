<?php

use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Product;

Route::get('/products/{id}', function (Request $request) {
    return new ProductResource(Product::findOrFail($request->id));
});

Route::get('/products', function () {
    return ProductResource::collection(Product::all());
});
