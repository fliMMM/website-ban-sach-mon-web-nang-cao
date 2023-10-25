<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function index($name)
    {
        // get product detail = name
        $productDetails = DB::table('products')
            ->where('name', '=', $name)
            ->get();
        // get category product detail
        $categories = DB::table('products')
            ->where('name', '=', $name)
            ->pluck('categories');
        $stringCategories = explode(',', $categories[0]);
        foreach ($stringCategories as $key => $stringCategory) {
            $category = DB::table('products')
                ->where('categories', 'like', '%' . $stringCategory . '%')
                ->get();
        }
        return view('productDetail', ['listProducts' => $category, 'productDetails' => $productDetails], compact('name'));
    }
    public function addCart($name)
    {
        $id = Auth::id();

        if (!isset($id)) {
            return back()->with('status_error', 'Bạn cần phải đăng nhập để thêm vào giỏ hàng!');
        }
        $productDetails = DB::table('products')
            ->where('name', '=', $name)
            ->get();
        $carts = DB::table('carts')
            ->where('userId', '=', $id)
            ->pluck('id');
        // dd($carts);
        foreach ($productDetails as $products) {
            $quantity = DB::table('cart_items')->where('productId', '=', $products->id)->where('cartId', '=', $carts)->where('isCheckout', '=', 0)->pluck('quantity');
            // dd($cartItemId);
            $isProductIdExists = DB::table('cart_items')->where('productId', '=', $products->id)->where('cartId', '=', $carts)->where('isCheckout', '=', 0)->exists();
            if ($isProductIdExists) {
                // dd($quantity);
                $quantity[0] += 1;
                DB::table('cart_items')->where('productId', '=', $products->id)->where('cartId', '=', $carts)->where('isCheckout', '=', 0)->update(['quantity' => $quantity[0], 'updated_at' => date('Y-m-d H:i:s')]);
            } else {
                DB::table('cart_items')->insert([
                    'created_at' => date('Y-m-d H:i:s'),
                    'productId' => $products->id,
                    'price' => $products->price,
                    'quantity' => '1',
                    'cartId' => $carts[0],
                ]);
            }
        }
        return back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
}
