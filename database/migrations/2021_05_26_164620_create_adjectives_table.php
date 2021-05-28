<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjectives', function (Blueprint $table) {
            $table->id();

            $table->string('singular_masculine_nominative')->nullable();
            $table->string('singular_masculine_genitive')->nullable();
            $table->string('singular_masculine_dative')->nullable();
            $table->string('singular_masculine_accusative')->nullable();
            $table->string('singular_masculine_accusative_animated')->nullable();
            $table->string('singular_masculine_instrumental')->nullable();
            $table->string('singular_masculine_prepositional')->nullable();

            $table->string('singular_feminine_nominative')->nullable();
            $table->string('singular_feminine_genitive')->nullable();
            $table->string('singular_feminine_dative')->nullable();
            $table->string('singular_feminine_accusative')->nullable();
            $table->string('singular_feminine_instrumental')->nullable();
            $table->string('singular_feminine_prepositional')->nullable();

            $table->string('singular_neuter_nominative')->nullable();
            $table->string('singular_neuter_genitive')->nullable();
            $table->string('singular_neuter_dative')->nullable();
            $table->string('singular_neuter_accusative')->nullable();
            $table->string('singular_neuter_instrumental')->nullable();
            $table->string('singular_neuter_prepositional')->nullable();

            $table->string('plural_nominative')->nullable();
            $table->string('plural_genitive')->nullable();
            $table->string('plural_dative')->nullable();
            $table->string('plural_accusative')->nullable();
            $table->string('plural_accusative_animated')->nullable();
            $table->string('plural_instrumental')->nullable();
            $table->string('plural_prepositional')->nullable();

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
        Schema::dropIfExists('adjectives');
    }
}
