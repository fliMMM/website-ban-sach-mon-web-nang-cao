<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    $categories = array(
      'Comedy',
      'Drama',
      'Mystery',
      'Romance',
      'SchoolLife',
      'TrinhThám',
      'Shounen',
      'Fantasy',
      'Action',
      'Adventure',
      'MartialArts',
      'Shounen–Supernatural',
      'shounen',
      'sci',
      'fi',
      'Manga',
      'SliceofLife',
      'Historical',
      'Seinen'
    );

    foreach ($categories as $item) {
      Categories::factory()->create([
        'name' => $item,
      ]);
    }
  }
}
