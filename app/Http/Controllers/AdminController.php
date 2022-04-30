<?php

namespace App\Http\Controllers;
// Requests
use Illuminate\Http\Request;
// Models
use App\Models\Product;
use App\Models\SoldProduct;
// Facades
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminShowDash(){
        $products = Product::paginate(6);
        return view('adminDashboard')->with('products', $products);
    }

    public function adminShowCreate(){
        return view('adminCreate');
    }

    public function createProduct(Request $request){
        if($request->img){
            $file= $request->img;
            $filename= Carbon::now()->timestamp.".".$file->getClientOriginalExtension();
            $file-> move(public_path('assets/productImages'), $filename);

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price'  => $request->price,
                'brand'  => $request->brand,
                'color'  => json_encode($request->colors),
                'size' => json_encode($request->sizes),
                'category' => $request->category,
                'image' => $filename,
            ]);
        }else{
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price'  => $request->price,
                'brand'  => $request->brand,
                'color'  => json_encode($request->colors),
                'size' => json_encode($request->sizes),
                'category' => $request->category,
                'image' => 'default-product-image.png',
            ]);
        }
        if($product) {
            return redirect('/admin-dashboard');
        }
    }

    public function showUpdate($id){
        $product = Product::where('id', $id)->first();
        return view('adminUpdate')->with('product', $product);
    }

    public function updateProduct(Request $request, $id){
        $prod = Product::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price'  => $request->price,
            'brand'  => $request->brand,
            'color'  => json_encode($request->colors),
            'size' => json_encode($request->sizes),
            'category' => $request->category,
        ]);
        if($prod){
            return redirect('/admin-dashboard');
        }
    }

    public function deleteProduct($id){
        $prod = Product::where('id', $id)->first();
        Product::where('id', $id)->delete();
        $file_path = public_path().'/assets/productImages/'.$prod->image;
        unlink($file_path);
        return redirect('/admin-dashboard');
    }

    public function showSoldProducts(){
        $soldProductsList = SoldProduct::paginate(20);

        return view('adminSoldProducts')->with('soldProductsList', $soldProductsList);
    }
}
