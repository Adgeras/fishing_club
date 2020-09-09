<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 150);
            $table->string('live', 50);
            $table->integer('experience');
            $table->integer('registered');
            $table->bigInteger('reservoir_id')->unsigned();
            $table->timestamps();
            $table->foreign('reservoir_id')->references('id')->on('reservoirs');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('members', function (Blueprint $table) {
            $table->dropUnique(['reservoir_id']);
            $table->dropForeign(['reservoir_id']);
        });
    }
}