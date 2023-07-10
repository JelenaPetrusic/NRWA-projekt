<?php
namespace App\Http\Controllers;

use App\Models\ProductLine;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{
    public function index()
    {
        $productLines = ProductLine::all();

        return response()->json($productLines);
    }

    public function show($productLine)
    {
        $productLine = ProductLine::findOrFail($productLine);

        return response()->json($productLine);
    }

    public function store(Request $request)
    {
        $productLine = ProductLine::create($request->all());

        return response()->json($productLine, 201);
    }

    public function update(Request $request, $productLine)
    {
        $productLine = ProductLine::findOrFail($productLine);
        $productLine->update($request->all());

        return response()->json($productLine, 200);
    }

    public function destroy($productLine)
    {
        ProductLine::destroy($productLine);

        return response()->json(null, 204);
    }
}