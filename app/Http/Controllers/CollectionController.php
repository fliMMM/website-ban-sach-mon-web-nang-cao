<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class CollectionController extends Controller
{
    public function show()
    {
        $collections = Product::paginate(16);
        return view('collection', compact('collections'));
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

        $collections = $query->paginate(16);
        return response()->json($collections);
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
    public function showNewBooks($title)
    {
        if ($title == "SÁCH MỚI") {
            $collections = Product::orderBy('ngayPhatHanh', 'desc')->paginate(16);
        } elseif ($title == "SÁCH BÁN CHẠY") {
            $collections = Product::orderBy('inStock', 'asc')->paginate(16);
        }
        return view('collection', compact('collections'));
    }
}
