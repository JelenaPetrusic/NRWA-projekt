<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = DB::table('products') ->where('productName', 'LIKE', '%' . $request->search . "%")
                ->get();

            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>' .
                        '<td>' . $product->productCode . '</td>' .
                        '<td>' . $product->productName . '</td>' .
                        '<td>' . $product->productLine . '</td>' .
                        '<td>' . $product->productScale . '</td>' .
                        '<td>' . $product->productVendor . '</td>' .
                        '<td>' . $product->productDescription . '</td>' .
                        '<td>' . $product->quantityInStock . '</td>' .
                        '<td>' . $product->buyPrice . '</td>' .
                        '<td>' . $product->MSRP . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}
