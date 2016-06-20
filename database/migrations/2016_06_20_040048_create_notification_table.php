<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table){
        	$table->increments('id');
        	$table->integer('userId')->unsigned();
        	$table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
			$table->text('message')->nullable()->default(NULL);
        	$table->enum('read', array('yes','no'))->default('no');
        	$table->timestamp('updatedOn')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
        	$table->dateTime('notifDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notification');
    }
}
