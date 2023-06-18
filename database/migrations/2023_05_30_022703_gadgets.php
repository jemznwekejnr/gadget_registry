<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gadgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gadgets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('manufacturer');
            $table->string('model')->nullable();
            $table->string('imei1')->nullable();
            $table->string('imei2')->nullable();
            $table->string('serialno')->nullable();
            $table->string('year')->nullable();
            $table->string('picture')->nullable();
            $table->string('ownersproof')->nullable();
            $table->date('purchasedate')->nullable();
            $table->string('owner');
            $table->string('status');
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gadgets');
    }
}
