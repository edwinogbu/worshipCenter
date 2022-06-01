<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('sermon_theme')->nullable();
            $table->string('speaker_name')->nullable();
            $table->string('speaker_picture')->nullable();
            $table->string('speaker_socials')->nullable();
            $table->string('sermon_title')->nullable();
            $table->string('sermon_text')->nullable();
            $table->string('sermon_note')->nullable();
            $table->string('number_of_soul_convert')->nullable();
            $table->string('sermon_date')->nullable();
            $table->string('sermon_audio')->nullable();
            $table->string('sermon_video')->nullable();
            $table->boolean('sermon_status')->nullable();
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
        Schema::dropIfExists('sermons');
    }
}
