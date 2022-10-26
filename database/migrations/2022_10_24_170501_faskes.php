<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Faskes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('faskes',function(Blueprint $table) {
            $table->id();
            $table->tinyInteger('faskes_type')->default(0)->comment('1 -> Puskesmas, 2 -> Rumah Sakit, 3 -> Klinik');
            $table->string('faskes_name',150)->nullable();
            $table->text('faskes_address')->nullable();
            $table->string('faskes_phone',30)->unique()->nullable();
            $table->integer('province_id')->default(0);
            $table->integer('city_id')->default(0);
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
        Schema::dropIfExists('faskes');
    }
}
