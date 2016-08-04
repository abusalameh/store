<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');
            $table->string('xid')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->decimal('cost',11,2);
            $table->decimal('price',11,2);
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->timestamps();


        });
        Schema::table('products', function (Blueprint $table) {

            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function(Blueprint $table) {

            $table->dropForeign(['category_id']);
        });
        Schema::drop('products');
    }
}
