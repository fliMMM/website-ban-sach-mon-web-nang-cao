<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;


class CollectionController extends Controller
{
    public function show()
    {
        $products = Product::paginate(16);
        return view('collection', compact('products'));
    }
    public function sortProduct(Request $request)
    {
        $sortBy = $request->input('SortBy');
        switch ($sortBy) {
            case 'manual':
                $query = Product::inRandomOrder();
                break;
            case 'name-ascending':
                $query = Product::orderBy('name', 'asc');
                break;
            case 'name-descending':
                $query = Product::orderBy('name', 'desc');
                break;
            case 'price-ascending':
                $query = Product::orderBy('price', 'asc');
                break;
            case 'price-descending':
                $query = Product::orderBy('price', 'desc');
                break;
            default:
                break;
        }

        $products = $query->paginate(16);
        return response()->json($products);
    }


    public function filterByType(Request $request)
    {
        $selectedCategories = $request->input('categories');

        $products = Product::where(function ($query) use ($selectedCategories) {
            foreach ($selectedCategories as $category) {
                $query->where('categories', 'like', '%' . $category . '%');
            }
        })->get();

        return response()->json($products);
    }
    public function showCollection(Request $request, $title)
    {
        switch ($title) {
            case $title == "SÁCH MỚI":
                $products = Product::orderBy('ngayPhatHanh', 'desc')->paginate(16);
                break;
            case $title == "SÁCH BÁN CHẠY":
                $products = Product::orderBy('inStock', 'asc')->paginate(16);
                break;
            case $title == "HỌC ĐƯỜNG":
                $products = Product::where('categories', 'LIKE', '%SchoolLife%')->paginate(16);
                break;
            case $title == "HÀI HƯỚC":
                $products = Product::where('categories', 'LIKE', '%Comedy%')->paginate(16);
                break;
            case $title == "VIỄN TƯỞNG":
                $products = Product::where('categories', 'LIKE', '%Fantasy%')->paginate(16);
                break;
            case $title == "SÁCH CÙNG THỂ LOẠI":
                $productName = $request->input('productName');
                $products = Product::where('categories', 'LIKE', $productName)->paginate(16);
                break;
            case $title == "SẢN PHẨM ĐÃ XEM":
                $products = Product::paginate(16);
                break;
            default:
                echo "Invalid";
        }
        return view('collection', compact('products'));
    }
}
