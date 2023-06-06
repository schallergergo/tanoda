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

        Schema::create('competition_judge', function (Blueprint $table) {
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('judge_id');
        });
            
    }

/**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {
        Schema::dropIfExists('competition_judge');
    }
};
