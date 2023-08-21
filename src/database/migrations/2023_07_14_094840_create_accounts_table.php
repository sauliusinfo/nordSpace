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
    Schema::create('accounts', function (Blueprint $table) {
      $table->id();
      $table->string('account_no', 20);
      $table->decimal('amount', 10, 2)->default(0);
      $table->unsignedBigInteger('client_id');
      $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    //   $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('accounts');
  }
};
