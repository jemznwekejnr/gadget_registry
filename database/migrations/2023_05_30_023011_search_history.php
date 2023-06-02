<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SearchHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_history', function (Blueprint $table) {
           $table->id();
            $table->string('type');
            $table->string('manufacturer');
            $table->string('serialno');
            $table->string('devicestatus')->nullable();
            $table->string('deviceid')->nullable();
            $table->string('owner')->nullable();
            $table->string('searchlocation');
            $table->string('searchstatus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_history');
    }
}
