<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
  public function show()
  {
    $list = DB::table('products')->limit(5)->get();
    return view('home', ['listProducts' => $list]);
  }
}
