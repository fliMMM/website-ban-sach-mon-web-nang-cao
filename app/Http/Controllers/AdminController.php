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
        $productCount = DB::table('products')->whereNull('products.deleted_at')->count();
        $solvedOrderQuantity =  $orderQuantity = DB::table('orders')
            ->where('status', '=', 1)
            ->count();

        $orderQuantity = DB::table('orders')
            ->where('status', '=', 0)
            ->count();

        return view('admin.dashboard', compact('userCount', 'productCount', 'orderQuantity', 'solvedOrderQuantity'));

    }

    public function getProducts()
    {
        $products = DB::table('products')->whereNull('products.deleted_at')->paginate(10);
        return view('admin.product', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $products = DB::table('products')->where('name', 'like', "%$searchTerm%")->whereNull('products.deleted_at')->paginate(10);

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

    public function deleteProduct($id)
    {
        DB::table('products')->where('products.id', $id)->update(['deleted_at' => now()]);
        return response()->json(['message' => 'Delete product successfully']);
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
            return back()->with('message', 'Đã xoá yêu cầu');
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
            return back()->with('message', 'Yêu cầu đã được duyệt ');
        }
    }

    public function showOrderList()
    {
        $orders = DB::table('orders')
            ->where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();


        $orderQuantity = $orders->count();
        return view('admin.order', compact('orders', 'orderQuantity'));
    }
    public function showSolvedOrder()
    {
        $orders = DB::table('orders')
            ->where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();


        $orderQuantity = $orders->count();
        return view('admin.solvedOrder', compact('orders', 'orderQuantity'));
    }
    public function updateOrder(Request $request, $id)
    {
        if ($request->has('approve')) {
            DB::table('orders')
                ->where('id', $id)
                ->update(['status' => 1]);
        } elseif ($request->has('cancel')) {
            DB::table('orders')->where('id', $id)->update(['status' => 3]);
        }
        return redirect()->route('admin.order');
    }

    public function showOrderDetail($id)
    {
        $orderedProduct = DB::table('cart_items')
            ->join('orders', 'orders.id', '=', 'cart_items.orderId')
            ->join('carts', 'orders.cartId', '=', 'carts.id')
            ->join('products', 'cart_items.productId', '=', 'products.id')
            ->select('products.*', 'orders.total as totalPrice', 'orders.address as address', 'cart_items.quantity', 'cart_items.price as unit_price', 'cart_items.id as cartItemId')
            ->where('orders.id', $id)
            ->get();

        return response()->json($orderedProduct);
    }
    public function userManage()
    {
        $users = DB::table('users')
        ->get();
        $userCount = DB::table('users')
        ->count();
        return view('admin.userManage', ['users' => $users, 'userCount' => $userCount]);
    }
    public function userDelete(Request $request)
    {
        // dd($request->all());
        if ($request->action == 'delete') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    $delete = DB::table('users')
                        ->where('id', $key)
                        ->update([
                            'status' => 'Đã xoá',
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ]);
                    if ($delete == true) {
                        return back()->with('message', 'Tài khoản đã bị xoá');
                    } else {
                        return back();
                    }
                }
            }
        }
        if ($request->action == 'ban') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    $ban = DB::table('users')
                        ->where('id', $key)
                        ->whereNull('deleted_at')
                        ->update([
                            'status' => 'Đã bị chặn',
                            'isBan' => 1,
                        ]);
                    if ($ban == true) {
                        return back()->with('message', 'Tài khoản đã bị chặn');
                    } else {
                        return back();
                    }
                }
            }
        }
        if ($request->action == 'unban') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    $ban = DB::table('users')
                        ->where('id', $key)
                        ->whereNull('deleted_at')
                        ->update([
                            'status' => 'đang hoạt động',
                            'isBan' => 0,
                        ]);
                    if ($ban == true) {
                        return back()->with('message', 'Tài khoản đã được huỷ chặn');
                    } else {
                        return back();
                    }
                }
            }
        }
        if ($request->action == 'user') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    $ban = DB::table('users')
                        ->where('id', $key)
                        ->whereNull('deleted_at')
                        ->update([
                            'isAdmin' => 0,
                        ]);
                    if ($ban == true) {
                        return back()->with('message', 'Tài khoản đã được thay đổi quyền');
                    } else {
                        return back();
                    }
                }
            }
        }
        if ($request->action == 'admin') {
            if (!$request->checkboxConfirm) {
                return back();
            } else {
                foreach ($request->checkboxConfirm as $key => $value) {
                    $ban = DB::table('users')
                        ->where('id', $key)
                        ->whereNull('deleted_at')
                        ->update([
                            'isAdmin' => 1,
                        ]);
                    if ($ban == true) {
                        return back()->with('message', 'Tài khoản đã được thay đổi quyền');
                    } else {
                        return back();
                    }
                }
            }
        }
    }
}
