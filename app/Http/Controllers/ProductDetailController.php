<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductDetailController extends Controller
{
    //
    public function index($name){
   
        // get product detail = name
        $productDetails =  DB::table('products')->where('name', '=' , $name)->get();
        // get category product detail 
        $categories =  DB::table('products')->where('name', '=' , $name)->pluck('categories');
        $stringCategories = explode(",", $categories[0]);
        foreach ($stringCategories as $key => $stringCategory) {
            $category = DB::table('products')-> where('categories', 'like', '%'.$stringCategory.'%') ->get();
        }
        return view('productDetail', ['listProducts' => $category, 'productDetails' => $productDetails], compact('name'));
    }
    public function addCart($name){
        $id = Auth::id();
        $productDetails =  DB::table('products')->where('name', '=' , $name)->get();
        $carts = DB::table('carts')->where('userId', '=' ,$id)->pluck('id');    
        foreach($productDetails as $products){
                $quantity = DB::table('cart_items')->where('productId' , '=', $products->id)->pluck('quantity');
                $isProductIdExists = DB::table('cart_items')->where('productId' , '=', $products->id)->exists();
                 if($isProductIdExists){
                    $quantity[0] += 1;
                    DB::table('cart_items')->where('productId', '=',$products->id )->update(['quantity'=>$quantity[0], 'updated_at'=> date('Y-m-d H:i:s')]);
                 }
                 else{
                    DB::table('cart_items') -> insert([  
                        'created_at' => date('Y-m-d H:i:s'),              
                        'productId' => $products->id,
                        'price' => $products->price,
                        'quantity'=> $quantity[0],
                        'cartId' => $carts[0],
                    ]);
                 }
        }
        return redirect()->route('cart');
    }
}
