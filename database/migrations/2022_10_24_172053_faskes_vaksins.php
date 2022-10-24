<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FaskesVaksins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('faskes_vaksins', function (Blueprint $table) {
            $table->id();
            $table->integer('faskes_id')->default(0);
            $table->integer('vaksin_id',)->default(0);
            $table->integer('kouta')->default(0);
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('faskes_vaksins');
    }
}
