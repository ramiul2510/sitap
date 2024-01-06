<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_targets', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('proccess');
            $table->string('employee');
            $table->string('machine');
            $table->string('start');
            $table->string('stop');
            $table->string('target')->default(300);
            $table->string('pieces_out_mc');
            $table->string('pieces_out_inspect');
            $table->string('scrap');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('data_targets');
    }
};
