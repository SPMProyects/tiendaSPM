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
            $table->string('description')->nullable();
            $table->unsignedbigInteger('category_id')->nullable();
            $table->unsignedbigInteger('currency_id')->nullable();
            $table->float('price',8,2);
            $table->float('sales_price',8,2);
            $table->boolean('featured')->default('0');
            $table->boolean('active')->default('1');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('currency_id')->references('id')->on('currencies');
            //Falta la relación con imágenes (Estudair many to many)
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
