<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('user_id')->unsigned();      
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');               
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('religion');
            $table->string('job');
            $table->string('gender');
            $table->text('address');
            $table->string('institution');
            $table->string('photo')->nullable();
            $table->string('birth_date');
            $table->string('status');
            $table->string('added');
            $table->string('premium')->default('false');
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
        Schema::dropIfExists('customers');
    }
}
