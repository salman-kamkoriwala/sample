<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_payments', function (Blueprint $table) {
            $table->increments('paymentID');
            $table->integer('boxID',false,true);
            $table->enum('boxType', array('paymentbox', 'captchabox'));
            $table->string('orderID',50);
            $table->string('userID',50);
            $table->string('countryID',3);
            $table->string('coinLabel',6);
            $table->double('amount',20,8);
            $table->double('amountUSD',20,8);
            $table->tinyInteger('unrecognised',false,true);
            $table->string('addr',34);
            $table->char('txID',64);
            $table->dateTime('txDate');
            $table->tinyInteger('txConfirmed',false,true);
            $table->dateTime('txCheckDate');
            $table->tinyInteger('processed',false,true);
            $table->dateTime('processedDate');
            $table->dateTime('recordCreated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crypto_payments');
    }
}
