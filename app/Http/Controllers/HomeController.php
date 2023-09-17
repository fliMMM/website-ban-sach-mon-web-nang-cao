<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function show(): View
  {
    return view('home', [
      'fileList' => [FileController::class, 'getFileList']
    ]);
  }
}
