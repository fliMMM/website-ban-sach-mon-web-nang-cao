<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
  use HasFactory;

  protected $product = "products";
  protected $fillable = [
    'name',
    'author',
    'image',
    'description',
    'categories',
    'price',
    'inStock',
    'target',
    'isDelete',
    'khuonKho',
    'soTrang',
    'weight',
    'combo',
    'ngayPhatHanh',
    'rating',
  ];
}
