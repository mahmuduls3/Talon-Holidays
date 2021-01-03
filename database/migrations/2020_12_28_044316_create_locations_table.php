<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('country');
            $table->string('place');
            $table->unsignedInteger('price');
            $table->unsignedInteger('days');
            $table->unsignedInteger('nights');
            $table->text('description');
            $table->string('package');
            $table->string('status');
            $table->string('editedBy');
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
        Schema::dropIfExists('locations');
    }
}
