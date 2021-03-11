<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;

class ProductController extends Controller
{
    public function createProduct($id) {     
        return view("products.createProduct",compact("id")); 
    } 

    public function storeProduct(Request $request, $id) {         
        $this->validate(request(), [             
            "nombre" => "required",             
            "descripción" => "required",
            "precio" => "required|numeric|min:0"    
        ]);  

        $product = new Product();         
        $product->shop_id = $id;         
        $product->nombre = $request->input('nombre');         
        $product->descripción = $request->input('descripción'); 
        $product->precio = $request->input('precio');
        $product->save();         
        $shop = Shop::with("products")->findOrFail($id);  
        return view("shops.show",compact("shop"));
    }

    public function showProduct($id) {
        $product = Product::findOrFail($id);
        return view("products.showProduct", compact("product")); 
    }   

    public function destroyProduct($id)
    {
        if (request()->isMethod("DELETE")) {
            try {                
                $product = Product::findOrFail($id);
                $product->delete();
                return back();
            } catch (Exception $ex) {
                dd($ex);
            }
        }
    }
}
