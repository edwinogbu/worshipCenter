<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropheticDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prophetic_declarations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('declaration_category_id')->constrained('declaration_categories')->cascadeOnDelete();
            $table->text('prophetic_declaration_title')->nullable();
            $table->longText('prophetic_declaration_note')->nullable();
            $table->date('prophetic_declaration_date')->nullable();
            $table->boolean('publish_prophecy_Status')->nullable();
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
        Schema::dropIfExists('prophetic_declarations');
    }
}
