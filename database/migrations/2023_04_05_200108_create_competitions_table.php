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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("organiser_id");
            $table->integer("duration_in_days");
            $table->integer("registration_fee");
            $table->datetime("registration_start");
            $table->datetime("registration_end");
            $table->string("cover_image_url")->nullable();
            $table->datetime("evaluation_start");
            $table->datetime("evaluation_end");
            $table->text("comment");
            $table->string("stand_template_url")->nullable();
            $table->text("stand_description_hu");
            $table->text("stand_description_en");
            $table->boolean("status")->default(true);
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
        Schema::dropIfExists('competitions');
    }
};
