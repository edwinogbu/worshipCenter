<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notice_board_category_id')->constrained('notice_board_categories')->nullable()->cascadeOnDelete();
            $table->time('start_time')->useCurrent()->nullable();
            $table->time('end_time')->useCurrent()->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('venue')->nullable();
            $table->string('banner')->nullable();
            $table->string('speaker')->nullable();
            $table->string('theme')->nullable();
            $table->string('topic')->nullable();
            $table->string('bible_text')->nullable();
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
        Schema::dropIfExists('notice_boards');
    }
}
