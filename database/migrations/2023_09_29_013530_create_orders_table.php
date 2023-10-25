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
      $table->integer('cartId');
      $table->integer('status')->default(0);
      $table->integer('total');
      $table->string('email');
      $table->string('phoneNumber');
      $table->longText('address');
      $table->string('fullname')->nullable();
      $table->string('payment_method');
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
