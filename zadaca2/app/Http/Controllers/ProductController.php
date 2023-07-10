<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index',compact('products'))
            ->with(request()->input('page'));
    }

   
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            //'productDescription',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    
    }

    
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            //'productDescription',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /*
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    */
    public function search(Request $request)
    {
    $query = $request->get('query');
    $results = Product::where('productName', 'LIKE', '%' . $query . '%')->get();

    return response()->json($results);
    }

}
