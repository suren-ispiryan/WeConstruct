<?php

namespace App\Http\Controllers;
// Requests
use Illuminate\Http\Request;
// Models
use App\Models\Product;
use App\Models\Order;
// Facades
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userShowDash(){
        $products = Product::paginate(6);
        return view('userDashboard')->with('products', $products);
    }

    public function search(Request $request){
        $searchedPhrase = $request->search;
        $category = $request->category;

        if($searchedPhrase != "" && $category != "Choose category"){
            $products = Product::where('description', 'like', "%{$searchedPhrase}%")
                               ->where('category', $category)
                               ->paginate(6);
            return view("userSearchDashboard")->with('products', $products);
        }else if($searchedPhrase != "" && $category == "Choose category"){
            $products = Product::where('description', 'like', "%{$searchedPhrase}%")->paginate(6);
            return view("userSearchDashboard")->with('products', $products);
        }else if($searchedPhrase == "" && $category != "Choose category"){
            $products = Product::where('category', $category)->paginate(6);
            return view("userSearchDashboard")->with('products', $products);
        }else{
            $products = Product::paginate(6);
            return view("userDashboard")->with('products', $products);
        }
    }

    public function addToCart($id){
        $product = Product::where('id', $id)->first();
        $order = Order::create([
            'user_id' => Auth::User()->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'description' => $product->description,
        ]);
        if($order) {
            return redirect('/user-dashboard');
        }
        return abort(403);
    }

    public function showCart(){
        $products = Order::where("user_id", Auth::User()->id)->paginate(6);
        return view('userCart')->with('products', $products);
    }

    public function removeFromCart($name){
        Order::where('name', $name)->delete();
        return redirect('/cart');
    }
}
