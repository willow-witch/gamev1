<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_rating', function (Blueprint $table) {
            $table->bigInteger("game_id")->unsigned()->nullable(false);
            $table->bigInteger("group_id")->unsigned()->nullable(false);
            $table->bigInteger("student_id")->unsigned()->nullable(false);
            $table->bigInteger("stage_id")->unsigned()->nullable(false);
            $table->double("rating", 10, 2);
            $table->timestamp("date")->useCurrentOnUpdate();

            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stage_id')->references('id')->on('stages')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('restrict');

            $table->primary(array('game_id', 'group_id', 'student_id', 'stage_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_rating');
    }
};
