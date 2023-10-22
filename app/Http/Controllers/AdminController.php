<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.dashboard', compact('userCount', 'productCount', 'categoryCount'));
    }

    public function getProducts()
    {
        $products = Product::paginate(10);
        return view('admin.product', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $products = Product::where('name', 'like', "%$searchTerm%")->paginate(10);

        return response()->json($products);
    }

    public function showEditProd($id)
    {
        $product = Product::find($id);

        return view('admin.editProd', compact('product'));
    }

    public function showAddProd()
    {
        return view('admin.addProd');
    }

    public function addProduct(Request $request)
    {
        $image = $request->file('image');
        $imageUrl = null;

        $formData = $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'description' => ['required'],
            'categories' => ['required'],
            'price' => ['required'],
            'inStock' => ['required'],
            'target' => ['required'],
            'khuonKho' => ['required'],
            'soTrang' => ['required'],
            'weight' => ['required'],
            'combo' => ['required'],
            'ngayPhatHanh' => ['required'],
            'image' => [],
            'rating' => [],
        ]);

        if (isset($image)) {
            $imageUrl = $image->store('images', 'public');
            $formData['image'] = asset('storage/' . $imageUrl);
        }

        $formData['rating'] = 0;

        $prod = DB::table('products')->insert($formData);

        if ($prod) {
            return redirect('/admin/products');
        }

        return redirect('/admin/addProd/')->with('message', 'khong thanh cong');
    }

    public function editProduct($id, Request $request)
    {
        $image = $request->file('image');
        $imageUrl = null;

        $oldUrl = DB::table('products')
            ->where('id', '=', $id)
            ->select('image')
            ->get();

        $formData = $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'description' => ['required'],
            'categories' => ['required'],
            'price' => ['required'],
            'inStock' => ['required'],
            'target' => ['required'],
            'khuonKho' => ['required'],
            'soTrang' => ['required'],
            'weight' => ['required'],
            'combo' => ['required'],
            'ngayPhatHanh' => ['required'],
            'updated_at' => now(),
            'image' => [],
        ]);

        if (isset($image)) {
            $imageUrl = $image->store('images', 'public');
            $formData['image'] = asset('storage/' . $imageUrl);
        } else {
            $formData['image'] = $oldUrl[0]->image;
        }

        $prod = DB::table('products')
            ->where('id', $id)
            ->update($formData);

        if ($prod) {
            return redirect('/admin/products');
        }

        return redirect('/admin/editProd/' . $id)->with('message', 'khong thanh cong');
    }
    public function bookReg()
    {
        $bookRegistrations = DB::table('registration_book')
            ->orwhere('isConfirm', '=', 1)
            ->get();
        // dd($bookRegistrations);
        $users = DB::table('users')->get();
        // dd($users);
        return view('admin.bookreg', ['bookRegs' => $bookRegistrations, 'users' => $users]);
    }
    public function manageBookReg()
    {
        $bookRegistrations = DB::table('registration_book')
            ->orwhere('isConfirm', '=', 0)
            ->whereNull('deleted_at')
            ->get();
        // dd($bookRegistrations);
        $bookRegCount = DB::table('registration_book')
            ->orwhere('isConfirm', '=', 0)
            ->whereNull('deleted_at')
            ->count('id');
        $users = DB::table('users')->get();
        // dd($users);
        return view('admin.bookregcf', ['bookRegs' => $bookRegistrations, 'users' => $users, 'bookRegCount' => $bookRegCount]);
    }
    public function bookRegConfirm(Request $request)
    {
        if ($request->action == 'delete') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    DB::table('registration_book')
                        ->where('id', $key)
                        ->update([
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ]);
                }
            }
        }
        if ($request->action == 'confirm') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    DB::table('registration_book')
                        ->where('id', $key)
                        ->update([
                            'status' => 'đã duyệt',
                            'isConfirm' => 1,
                        ]);
                }
            }
        }
        return back()->with('message', 'Yêu cầu đã được duyệt ');
    }

    public function showOrderList()
    {
        $orders =  DB::table('orders')
            ->where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.order', compact('orders'));
    }
}
