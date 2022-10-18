<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id')->constrained();
            $table->foreignId('session_id')->constrained();
            $table->foreignId('class_type_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->date('mark_date');
            $table->foreignId('cat1_id')->constrained()->onDelete('cascade');
            $table->foreignId('cat2_id')->constrained()->onDelete('cascade');
            $table->foreignId('cat3_id')->constrained()->onDelete('cascade');
            $table->foreignId('examination_id')->constrained();
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
        Schema::dropIfExists('mark_sheets');
    }
}
