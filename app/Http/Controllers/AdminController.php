<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $categoryCount = Categories::count();
        // $orderCount = Order::count();
        return view('admin.dashboard', compact('userCount', 'productCount', 'categoryCount',));
    }

    public function manageProducts()
    {
        $products =  Product::paginate(10);
        return view('admin.product', compact('products'));
    }
    public function editProduct($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }
}
