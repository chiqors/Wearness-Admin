<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->comment('http://url/');
            $table->string('url1')->comment('http://url/');
            $table->string('url2')->comment('http://url/');
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
        Schema::dropIfExists('dev_tables');
    }
}
