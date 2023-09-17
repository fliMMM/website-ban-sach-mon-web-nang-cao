<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
  public  $sortBy = 'asc';
  public $orderBy = 'fileName';
  //
  public function getFileList(Request $request)
  {
    $list = DB::table('files')->where('userId', '=', auth()->user()->id)->get();
    return view('home', [
      'fileList' => $list,
      'orderBy' => $this->orderBy,
      'sortBy' => $this->sortBy
    ]);
  }

  public function delete(string $id)
  {
    DB::table('files')->where('id', '=', $id)->delete();

    return redirect('/');
  }

  public function update(Request $request, string $id)
  {
    $input = $request->file('fileInputUpdate');
    if ($request->hasFile('fileInputUpdate')) {
      $request->file('fileInputUpdate')->store('files');

      $fileInfo = [
        'fileName' => $input->getClientOriginalName(),
        'size' => $input->getSize(),
        'userId' => auth()->user()->id
      ];


      DB::table('files')->where('id', '=', $id)->update($fileInfo);
    }

    return redirect('/');
  }

  public function upload(Request $request)
  {
    // dd($request->file('fileInput'));
    $input = $request->file('fileInput');

    // dd($input);
    // dd($input->getClientOriginalName());

    if ($request->hasFile('fileInput')) {
      $request->file('fileInput')->store('files');

      $fileInfo = [
        'fileName' => $input->getClientOriginalName(),
        'size' => $input->getSize(),
        'userId' => auth()->user()->id
      ];

      File::create($fileInfo);
    }


    return redirect('/');
  }
}
