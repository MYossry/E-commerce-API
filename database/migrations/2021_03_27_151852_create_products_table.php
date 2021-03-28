<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('about')->nullable();
            $table->decimal('price');
            $table->integer('quantity');
            $table->decimal('rate')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('discount_id')->nullable()->constrained()->delete('cascade');
            $table->foreignId('user_id')->constrained()->delete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
