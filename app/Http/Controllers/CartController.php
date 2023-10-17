<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $products = DB::table('products')
            ->join('cart_items', 'products.Id', '=', 'cart_items.productId')
            ->join('carts', 'cart_items.cartId', '=', 'carts.id')
            ->select('products.*', 'cart_items.quantity', 'cart_items.price as unit_price')
            ->where('carts.userId', $id)
            ->get();


        $products->each(function ($product) {
            $product->totalPrice = number_format($product->price * $product->quantity, 0, ',', '.') . ' ₫';
            $product->itemPrice = number_format($product->price, 0, ',', '.') . ' ₫';
        });
        $totalPrice = $products->sum(function ($product) {
            return $product->price * $product->quantity;
        });
        $totalCartPrice = number_format($totalPrice, 0, ',', '.') . ' ₫';

        return view('cart', compact('products', 'totalCartPrice', 'id'));
    }

    public function deleteCartItem($id)
    {
        DB::table('cart_items')->where('productId', $id)->delete();
        return response()->json(['message' => 'Cart item deleted successfully']);
    }
    public function updateCart(Request $request)
    {
        $productIds = $request->input('product_ids');
        $quantities = $request->input('quantity');

        for ($i = 0; $i < count($productIds); $i++) {
            $productId = $productIds[$i];
            $quantity = $quantities[$i];
            if ($quantity == 0) {
                DB::table('cart_items')->where('productId', $productId)->delete();
            } else {
                DB::table('cart_items')->where('productId', $productId)->update(['quantity' => $quantity]);
            }
        }
        return redirect()->route('cart');
    }
}
