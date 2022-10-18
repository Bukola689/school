<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constained()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();  
            $table->string('gender')->nullable();
            $table->foreignId('occupation_id')->constrained();
            $table->date('d_o_b')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('age')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('country_id')->constrained()->nullable();
            $table->foreignId('state_id')->constrained()->nullable();
            $table->foreignId('local_government_id')->constrained()->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('my_parents');
    }
}
