<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_lists', function (Blueprint $table) {
            $table->id('TaskId');
            $table->string('TaskName');
            $table->string('TaskAbout');
            $table->boolean('TaskStatus')->default(true);
            $table->boolean('TaskDelete')->default(false);
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
        Schema::dropIfExists('demo_lists');
    }
}
