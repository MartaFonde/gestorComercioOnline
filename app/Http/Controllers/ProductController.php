<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;

class ProductController extends Controller
{
    public function createProduct($id) {     
            return view("createProduct",compact("id")); 
    } 

    public function storeProduct(Request $request, $id) {         
        $this->validate(request(), [             
            "name" => "required",             
            "description" => "required"         
            ]);  

            $product = new Product();         
            $product->id = $request->input('id') ?: null;         
            $product->user_id = auth()->id();         
            $product->shop_id = $id;         
            $product->name = $request->input('name');         
            $product->description = $request->input('description'); 
            $product->price = $request->input('price');
            $product->save();         
            return back(); //Me devuelve a la misma página     
    }

    public function showProduct($id) {
        $shop = Shop::with("products")->findOrFail($id);         
        return view("showProduct", compact("shop")); 
    }   
}
