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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("team_id");
            $table->string("motto")->nullable();
            $table->string("company_description")->nullable();
            $table->string("logo")->nullable();
            $table->string("flyer")->nullable();
            $table->string("webpage")->nullable();
            $table->string("catalog")->nullable();
            $table->string("business_card")->nullable();
            $table->string("presentation")->nullable();
            $table->string("stand_image")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('portfolios');
    }
};
