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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("competition_id");
            $table->string("company_name");
            $table->string("pe_code")->nullable();
            $table->string("school_name");
            $table->string("school_address");
            $table->text("scope_of_activities");
            $table->boolean("available_in_hungarian");
            $table->boolean("available_in_english");
            $table->boolean("available_in_german");
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
        Schema::dropIfExists('teams');
    }
};
