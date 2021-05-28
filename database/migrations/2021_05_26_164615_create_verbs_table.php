<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbs', function (Blueprint $table) {
            $table->id();

            $table->string('past_me')->nullable();
            $table->string('past_you')->nullable();
            $table->string('past_he')->nullable();
            $table->string('past_she')->nullable();
            $table->string('past_it')->nullable();
            $table->string('past_they')->nullable();
            $table->string('past_we')->nullable();
            $table->string('past_you_many')->nullable();

            $table->string('present_me')->nullable();
            $table->string('present_you')->nullable();
            $table->string('present_he')->nullable();
            $table->string('present_she')->nullable();
            $table->string('present_it')->nullable();
            $table->string('present_they')->nullable();
            $table->string('present_we')->nullable();
            $table->string('present_you_many')->nullable();

            $table->string('future_me')->nullable();
            $table->string('future_you')->nullable();
            $table->string('future_he')->nullable();
            $table->string('future_she')->nullable();
            $table->string('future_it')->nullable();
            $table->string('future_they')->nullable();
            $table->string('future_we')->nullable();
            $table->string('future_you_many')->nullable();

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
        Schema::dropIfExists('verbs');
    }
}
