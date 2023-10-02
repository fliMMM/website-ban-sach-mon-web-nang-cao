<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductDetailController extends Controller
{
    //
    public function index(){
        $list = DB::table('products')->limit(7)->get();
        $lists = DB::table('products')->limit(7)->get();
        return view('productDetail', ['listProducts' => $list]);
    }
}
