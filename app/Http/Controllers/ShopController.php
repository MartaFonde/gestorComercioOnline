<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::withCount("products")->paginate(5);
        return view("shops.index", compact("shops"));
    }

    public function create()
    {
        return view("shops.create");
    }

    public function store(Request $request)
    {
        $this->validate(request(), [             
            "nombre" => "required|min:2|unique:shops",
            "dirección" => "required",
            "teléfono" => "required|min:9|integer"        
        ]);  

            $shop = new Shop();         
            //$shop->id = $request->input('id') ?: null;         
            $shop->user_id = auth()->id();                
            $shop->nombre = $request->input('nombre');         
            $shop->dirección = $request->input('dirección'); 
            $shop->teléfono = $request->input('teléfono');
            $shop->save();         
            //return back(); //Me devuelve a la misma página     
            return redirect(route("index"));
    }

    public function destroy($id)
    {
        if (request()->isMethod("DELETE")) {
            try {
                $shop = Shop::findOrFail($id);
                $shop->products()->delete();
                $shop->delete();
                return redirect(route("index"));
            } catch (Exception $ex) {
                dd($ex);
            }
        }
    }

    public function show($id)
    {
        $shop = Shop::with("products")->findOrFail($id);
        return view("shops.show", compact("shop"));
    }
}
