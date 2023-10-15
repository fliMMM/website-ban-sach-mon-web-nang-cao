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
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->integer('userId');
      $table->string('status');
      $table->integer('total');
      $table->string('email');
      $table->string('phoneNumber');
      $table->longText('address');
      $table->string('fullname');
      $table->string('deleted_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};
