<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('xid')->unique();
            $table->string('description')->nullable();
            $table->boolean('status')->default(0);
            $table->decimal('total',11,2);
            $table->integer('discount')->nullable();
            $table->decimal('_total',11,2);
            $table->timestamps();
            $table->timestamp("invoice_date");
        });
        Schema::table('invoices',function(Blueprint $table) {

            $table->integer('customer_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices',function(Blueprint $table) {

            $table->dropForeign(['customer_id']);
        });
        Schema::drop('invoices');
    }
}
