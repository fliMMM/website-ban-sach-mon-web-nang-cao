<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
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
