<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadSheet = $reader->load(__DIR__ . '\data.xlsx');
    $sheet = $spreadSheet->getSheet($spreadSheet->getFirstSheetIndex());
    $data = $sheet->toArray();

    foreach ($data as $item) {
      Product::factory()->create([
        'name' => $item[0],
        'author' => $item[1],
        'image' => $item[2],
        'description' => $item[3],
        'categories' => $item[4],
        'price' => intval($item[5]),
        'inStock' => intval($item[6]),
        'target' => $item[7],
        'isDelete' => false,
        'khuonKho' => $item[9],
        'soTrang' => $item[10],
        'weight' => $item[11],
        'combo' => $item[12],
        'ngayPhatHanh' => $item[13],
        'rating' => 0
      ]);
    }
  }
}
