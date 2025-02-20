<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 40)->unique();
            
            // Change 'used' to a boolean type (default 0 for unused, 1 for used)
            $table->boolean('used')->default(0);
            
            // Change 'times_used' to an integer type to track how many times a pin has been used
            $table->integer('times_used')->default(0);
            
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
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
        Schema::dropIfExists('pins');
    }
}
