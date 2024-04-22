<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notepads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('notepads', function (Blueprint $table) {
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notepads');
        Schema::table('notepads', function (Blueprint $table) {
            $table->dropForeign(['name']);
        });
        Schema::table('notepads', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
