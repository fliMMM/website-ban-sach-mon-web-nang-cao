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
    public function filter(Request $request)
    {
        $sortBy = $request->input('SortBy');


        switch ($sortBy) {

            case 'manual':
                $query = Product::inRandomOrder();
                break;
            case 'title-ascending':
                $query = Product::orderBy('name', 'asc');
                break;
            case 'title-descending':
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
}
