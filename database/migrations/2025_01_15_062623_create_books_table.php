<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->date('year');
            $table->text('description');
            $table->string('coverimage')->nullable(); // Column to store image path
            $table->timestamps(); // Created at and updated at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
