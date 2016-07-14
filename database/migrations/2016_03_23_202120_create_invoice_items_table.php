<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->string('name');
            $table->decimal('price',11,2);
            $table->timestamps();
        });
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('invoice_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign(['product_id','invoice_id']);
        });
        Schema::drop('invoice_items');
    }
}
