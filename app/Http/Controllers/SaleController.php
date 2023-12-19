<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Sale;
use App\Models\Product;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create(){


        $products = DB::table('products')->get();
        $sale_products = DB::table('products')
                        ->join('sales', 'products.id', '=', 'sales.product_id')
                        ->select('products.*', 'sales.sale_qty')
                        ->get();


        // return $sale_products;


        // $total_quantity = Sale::where('product_id', $product_id)->sum('quantity');
         
        Return view('sales.create_sales', ['sale_products' => $sale_products, 'products' => $products]);
    }

    public function SaleList()
    {
        $sales = Sale::all();
        return view('sales.sales_list', compact('sales'));
    }

    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $productName = $request->input('Product_name');
        $saleQty = $request->input('sale_qty');
        $salePrice = $request->input('sale_qty') * $request->input('sale_price');



        $product = Product::findOrFail($productId);
        // return $product;

        Sale::create([
            'product_id' => $productId,
            'Product_name' => $productName,
            'sale_qty' => $saleQty,
            'sale_price' => $salePrice,
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        $product->update([
            'quantity' => $product->quantity - $saleQty,
        ]);


        return redirect()->route('sales.create')->with('success', 'Sale created successfully');
    } 


}
