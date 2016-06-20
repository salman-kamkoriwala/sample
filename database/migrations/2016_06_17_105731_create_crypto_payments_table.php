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
            $table->integer('boxID',false,true)->default(0);
            $table->enum('boxType', array('paymentbox', 'captchabox'));
            $table->string('orderID',50);
            $table->string('userID',50);
            $table->string('countryID',3);
            $table->string('coinLabel',6);
            $table->double('amount',20,8)->default(0.00000000);
            $table->double('amountUSD',20,8)->default(0.00000000);
            $table->tinyInteger('unrecognised',false,true)->default(0);
            $table->string('addr',34);
            $table->char('txID',64);
            $table->dateTime('txDate')->nullable()->default(NULL);
            $table->tinyInteger('txConfirmed',false,true)->default(0);
            $table->dateTime('txCheckDate')->nullable()->default(NULL);
            $table->tinyInteger('processed',false,true)->default(0);
            $table->dateTime('processedDate')->nullable()->default(NULL);
            $table->dateTime('recordCreated')->nullable()->default(NULL);
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
