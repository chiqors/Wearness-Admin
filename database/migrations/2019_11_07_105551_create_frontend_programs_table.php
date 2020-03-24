<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title1');
            $table->string('sub1');
            $table->string('title2');
            $table->string('sub2');
            $table->string('title3');
            $table->string('sub3');
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
        Schema::dropIfExists('frontend_programs');
    }
}
