<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('occupation')->nullable();
            $table->date('dob')->nullable();
            $table->date('date_joined')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('membership_status', ['unbaptise','baptise','full member'])->nullable();
            $table->string('state_origin')->nullable();
            $table->string('lga')->nullable();
            $table->string('skill')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widow', 'widower'])->nullable();
            $table->string('picture')->nullable();
            $table->string('membership_id')->nullable();
            $table->enum('position',['pastor', 'asst_pastor','dept_leader', 'member'])->default('member')->nullable();

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
        Schema::dropIfExists('profiles');
    }
}
