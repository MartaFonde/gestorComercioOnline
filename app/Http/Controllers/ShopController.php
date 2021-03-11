<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\Shop;

class ShopController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $shops = Shop::withCount("products")->paginate(5);
        return view("index", compact("shops"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $this->validate(request(), [             
            "name" => "required|min:2|unique:shops",
            "address" => "required",
            "numberTelephone" => "required|min:9|max:11"        
            ]);  

            $shop = new Shop();         
            //$shop->id = $request->input('id') ?: null;         
            $shop->user_id = auth()->id();                
            $shop->name = $request->input('name');         
            $shop->address = $request->input('address'); 
            $shop->numberTelephone = $request->input('numberTelephone');
            $shop->save();         
            //return back(); //Me devuelve a la misma página     

        // $this->validate(request(), [
        //     "name" => "required|min:2|unique:shops",
        //     "numberTelephone" => "required|min:9|max:11"
        // ]);
        // Shop::create(request()->only("name"));
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
        return view("show", compact("shop"));
    }
}
