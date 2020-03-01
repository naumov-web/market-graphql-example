<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProductCategoriesTable
 */
class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });

        Schema::table('product_categories', function(Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('product_categories');
    }
}
