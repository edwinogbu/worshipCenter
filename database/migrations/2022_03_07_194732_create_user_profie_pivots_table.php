<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfiePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profie_pivots', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('user')->cascadeOnDelete();
            $table->foreignId('user_profiles_id')->constrained('user_profiles')->cascadeOnDelete();

            $table->primary('user_id', 'user_profiles_id');
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
        Schema::dropIfExists('user_profie_pivots');
    }
}
