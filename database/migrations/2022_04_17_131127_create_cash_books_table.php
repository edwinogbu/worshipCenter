<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_books', function (Blueprint $table) {
            $table->id();
            $table->string('church_attendance')->nullable();
            $table->string('sunday_school_attendance')->nullable();
            $table->string('sunday_school_offering')->nullable();
            $table->string('church_offering')->nullable();
            $table->string('tithe')->nullable();
            $table->string('thanks_giving_offering')->nullable();
            $table->string('children_offering')->nullable();
            $table->date('record_date');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();

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
        Schema::dropIfExists('cash_books');
    }
}
