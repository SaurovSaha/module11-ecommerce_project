<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function showForm(){
        return view ('products.form');
    }

    public function submitForm(Request $request)
    {
        // Validate and store the product data
        $createproducts = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);

        DB::table('products')->insert([
            'name' => $createproducts['name'],
            'price' => $createproducts['price'],
            'quantity' => $createproducts['quantity'],
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return redirect()->route('products.form')->with('success', 'Product added successfully');
    }

    public function showFormUpdate ($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('products.product-update', ['id' => $id, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'updated_at' => now(),
            ]);

        return redirect()->route('products.list')->with('success', 'Product updated successfully');
    }

    public function productList()
    {
        $products = DB::table('products')->get();

        return view('products.product_list', ['products' => $products]);
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.list')->with('success', 'Product deleted successfully');
    }
}
