<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function show()
    {
        $total_amount = 0;
        $formatAddress = '';
        $userId = auth()->user()->id;
        $cartId = DB::table('carts')->where('userId', '=', $userId)
            ->select('id')
            ->get()
            ->first()
            ->id;

        $cart_items  = DB::table('cart_items')
            ->join('products', 'cart_items.productId', '=', 'products.id')
            ->where('cartId', '=', $cartId)
            ->where('isCheckout', '=', false)
            ->select('products.*', 'cart_items.*')
            ->get();

        if (count($cart_items) == 0) {
            return redirect('/cart');
        }



        $address = DB::table('address')
            ->where('userId', '=', $userId)
            ->where('isDefault', '=', 1)
            ->get()->first();
        if ($address) {
            $formatAddress = $address->locationSpecific . ', '  . $address->district . ', ' . $address->city;
        }




        foreach ($cart_items as $item) {
            $total_amount = $total_amount + $item->price * $item->quantity;
        }

        return view('checkout', compact('total_amount', 'cart_items', 'formatAddress', 'address'));
    }

    public function handleCheckout(Request $request)
    {

        $formData = $request->validate(
            [
                'email' => [],
                'userId' => [],
                'total' => [],
                'cartId' => [],
                'fullname' => [],
                'address' => ['required'],
                'phoneNumber' => ['required', 'regex:/^(([+]84|0)[1-9]\d{8})$/'],
                'payment_method' => ['required', 'doesnt_start_with:label'],
                'created_at' => []
            ]
        );



        $total_amount = 0;
        $userId = auth()->user()->id;
        $cartId = DB::table('carts')->where('userId', '=', $userId)
            ->select('id')
            ->get()
            ->first()
            ->id;

        $cart_items  = DB::table('cart_items')
            ->join('products', 'cart_items.productId', '=', 'products.id')
            ->where('cartId', '=', $cartId)
            ->where('isCheckout', '=', false)
            ->select('products.price', 'cart_items.*')
            ->get();


        foreach ($cart_items as $item) {
            $total_amount = $total_amount + $item->price * $item->quantity;
        }


        $formData['email'] = auth()->user()->email;
        $formData['fullname'] = auth()->user()->name;
        $formData['userId'] = auth()->user()->id;
        $formData['cartId'] = $cartId;
        $formData['total'] =  $total_amount + 10000;
        $formData['created_at'] =  now();

        $successId =  DB::table('orders')->insertGetId($formData);
        if ($successId) {

            foreach ($cart_items as $item) {
                DB::table('cart_items')->where('id', '=', $item->id)->update(['orderId' => $successId]);
            }
            DB::table('cart_items')->where("cartId", '=', $cartId)->update(['isCheckout' => true]);
        }

        return redirect('/account/order/?tab=0')->with('success', 'Đặt hàng thành công');
    }
}
