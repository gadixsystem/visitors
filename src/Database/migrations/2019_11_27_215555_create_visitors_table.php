<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("unique_id");
            $table->string("header");
            $table->text("route");
            $table->text("path");
            $table->string("method");
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
        Schema::dropIfExists('system_visitors');
    }
}
