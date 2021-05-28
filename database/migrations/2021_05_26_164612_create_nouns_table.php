<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nouns', function (Blueprint $table) {
            $table->id();

            $table->string('singular_nominative')->nullable();
            $table->string('singular_genitive')->nullable();
            $table->string('singular_dative')->nullable();
            $table->string('singular_accusative')->nullable();
            $table->string('singular_instrumental')->nullable();
            $table->string('singular_prepositional')->nullable();

            $table->string('plural_nominative')->nullable();
            $table->string('plural_genitive')->nullable();
            $table->string('plural_dative')->nullable();
            $table->string('plural_accusative')->nullable();
            $table->string('plural_instrumental')->nullable();
            $table->string('plural_prepositional')->nullable();

            $table->string('genus')->nullable();
            $table->boolean('animated')->default(false);

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
        Schema::dropIfExists('nouns');
    }
}
