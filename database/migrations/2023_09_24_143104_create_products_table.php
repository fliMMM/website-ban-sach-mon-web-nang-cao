<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {

    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('name');
      $table->string('author');
      $table->longText('image');
      $table->longText('description');
      $table->string('categories');
      $table->integer('price');
      $table->integer('inStock');
      $table->string('target');
      $table->boolean('isDelete');
      $table->string('khuonKho');
      $table->string('soTrang');
      $table->string('weight');
      $table->string('combo');
      $table->string('ngayPhatHanh');
      $table->integer('rating');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};