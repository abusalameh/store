<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_method');
            $table->timestamp('due_to');
            $table->decimal('amount',11,2);
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {

            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('invoice_id')->references('id')->on('invoices');

            // $table->unique(['customer_id','invoice_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('payments', function (Blueprint $table) {

            $table->dropForeign(['customer_id', 'invoice_id']);
        });
        Schema::drop('payments');
    }
}
