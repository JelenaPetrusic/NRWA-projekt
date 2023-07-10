<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function show($productCode)
    {
        $product = Product::findOrFail($productCode);

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request, $productCode)
    {
        $product = Product::findOrFail($productCode);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function destroy($productCode)
    {
        Product::destroy($productCode);

        return response()->json(null, 204);
    }
}
