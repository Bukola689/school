<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_type_id')->constrained();
            $table->foreignId('term_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('session_id')->constrained();
            $table->foreignId('cat1_id')->constrained()->onDelete('cascade');
            $table->foreignId('cat2_id')->constrained()->onDelete('cascade');
            $table->foreignId('cat3_id')->constrained()->onDelete('cascade');
            $table->foreignId('examination_id')->constrained();
            $table->integer('position');
            $table->integer('percentage');
            $table->longText('comments');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('report_cards');
    }
}
