<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer');
            $table->unsignedBigInteger('seller');
            $table->unsignedBigInteger('product_id');
            $table->decimal('offer_ratio', 8, 2)->nullable();
            $table->boolean('is_sold')->default(0);
            $table->timestamps();
    
            $table->foreign('buyer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seller')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
