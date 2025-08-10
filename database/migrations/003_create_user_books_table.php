<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_books', function (Blueprint $table) {
            $table->id(); // <--- Agrega esta línea, la columna id autoincremental
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'book_id']); // opcional para evitar duplicados
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_books');
    }
};
