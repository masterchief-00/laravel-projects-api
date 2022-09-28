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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->text('discription');
                $table->string('initial_date');
                $table->string('completion_date');
                $table->text('images');
                $table->string('project_image');
                $table->text('links')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
