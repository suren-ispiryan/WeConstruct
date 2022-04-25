<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// Models
use App\Models\Product;

class GuestController extends Controller
{
    public function showGuest(){
        $products = Product::paginate(6);
        return view("guest")->with('products', $products);
    }

    public function showGuestSearch(){
        $products = Product::paginate(6);
        return view("guestSearch")->with('products', $products);
    }

    public function search(Request $request){
        $searchedPhrase = $request->search;
        $category = $request->category;

        if($searchedPhrase != "" && $category != "Choose category"){
            $products = Product::where('description', 'like', "%{$searchedPhrase}%")
                               ->where('category', $category)
                               ->paginate(6);
            return view("guestSearch")->with('products', $products);
        }else if($searchedPhrase != "" && $category == "Choose category"){
            $products = Product::where('description', 'like', "%{$searchedPhrase}%")->paginate(6);
            return view("guestSearch")->with('products', $products);
        }else if($searchedPhrase == "" && $category != "Choose category"){
            $products = Product::where('category', $category)->paginate(6);
            return view("guestSearch")->with('products', $products);
        }else{
            $products = Product::paginate(6);
            return view("guest")->with('products', $products);
        }
    }

    public function showGuestCart(){
        
        return view('guestCart');
    }

    public function bringGuestData(Request $request){
        $allProductIds = $request->allProductIds;
        $products = [];
        foreach($allProductIds as $productEachId){
            array_push($products, Product::where('id', $productEachId)->first());
        }
        
        session(['products' => $products]);
        // return view('guestCart')->response()->json(123);
    }
}

