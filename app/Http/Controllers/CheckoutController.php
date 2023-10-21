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



        $address = DB::table('address')
            ->where('userId', '=', $userId)
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
                'phoneNumber' => ['required', 'not_regex:^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$'],
                'payment_method' => ['required', 'doesnt_start_with:label'],
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
            ->select('products.*', 'cart_items.*')
            ->get();


        foreach ($cart_items as $item) {
            $total_amount = $total_amount + $item->price * $item->quantity;
        }


        $formData['email'] = auth()->user()->email;
        $formData['fullname'] = auth()->user()->name;
        $formData['userId'] = auth()->user()->id;
        $formData['cartId'] = $cartId;
        $formData['total'] =  $total_amount + 10000;

        $success =  DB::table('orders')->insert($formData);

        if ($success) {
            DB::table('cart_items')->where("cartId", '=', $cartId)->update(['isCheckout' => true]);
        }

        return redirect('/');
    }
}
