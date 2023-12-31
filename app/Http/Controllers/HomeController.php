<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function layoutShow()
    {
        $id = Auth::id();
        $countCartItem = DB::table('cart_items')->where('cartId', '=',  $id)->where('isCheckout', '=', 0)->count();
        return response()->json([
            'countCartItem' => $countCartItem,
        ]);
    }
    public function show()
    {
        $list = DB::table('products')
            ->whereNull('deleted_at')
            ->limit(7)
            ->get();
        $newBooks = DB::table('products')
            ->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->limit(7)
            ->get();
        $sellingbooks = DB::table('products')
            ->whereNull('deleted_at')
            ->orderBy('inStock', 'asc')
            ->limit(7)
            ->get();
        $comedyBooks = DB::table('products')
            ->whereNull('deleted_at')
            ->where('categories', 'LIKE', '%Comedy%')
            ->orderBy('inStock', 'desc')
            ->limit(7)
            ->get();
        $schoolLifebooks = DB::table('products')
            ->whereNull('deleted_at')
            ->where('categories', 'LIKE', '%SchoolLife%')
            ->orderBy('inStock', 'desc')
            ->limit(7)
            ->get();
        $fantasybooks = DB::table('products')
            ->whereNull('deleted_at')
            ->where('categories', 'LIKE', '%Fantasy%')
            ->limit(7)
            ->get();

        return view('home', [
            'listProducts' => $list,
            'newbooks' => $newBooks,
            'sellingbooks' => $sellingbooks,
            'comedyBooks' => $comedyBooks,
            'schoolLifebooks' => $schoolLifebooks,
            'fantasybooks' => $fantasybooks
        ]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = DB::table('products')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->limit(3)
                ->get();
            $countProducts = DB::table('products')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->count();
            if ($countProducts > 0 and $request->search != '') {
                $output =
                    '
          <div class="flex justify-between bg-neutral-200 h-6">
          <p class="ml-3 mt-1 text-sm">Sản phẩm</p>
          <a href="" class="no-underline text-black mr-1 mt-1"><p class="mr-5 text-sm">Xem thêm (' .
                    $countProducts .
                    ')</p></a>
          </div>';
                foreach ($products as $row) {
                    $price = number_format($row->price, 0, '', ',');
                    $output .=
                        '
                        <div class="flex justify-start bg-white ">
                        <a href="/productDetail/' .
                        $row->name .
                        '" class="h-14  mr-1"> <img src="' .
                        $row->image .
                        '" alt="" style = "width: 48px; height: 56px; margin: 8px"></a>
                         <div class="bg-white " style = "width:230px">
                            <a href="/productDetail/' .
                        $row->name .
                        '" class=" no-underline text-black"><p class="mb-0 mt-2 text-sm font-semibold line-clamp-2">' .
                        $row->name .
                        '</p></a>
                             <p style = "color: #d51c24; font-weight: bold">' .
                        $price .
                        '</p>
                             </div>
                            </div>
                  ';
                }
                $output .= '
                
               ';
            } elseif ($countProducts == 0) {
                $output =
                    '
                <div class="flex justify-start items-center bg-white ">
                <p class="bg-white text-sm mt-2 ml-6">Không có kết quả nào cho: </p>
                <p class = "font-bold mt-2 ml-1">' .
                    $request->search .
                    '</p>
                </div>';
            }
            return Response($output);
        }
    }
}
