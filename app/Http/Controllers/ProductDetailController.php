<?php

namespace App\Http\Controllers;

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
    
}
