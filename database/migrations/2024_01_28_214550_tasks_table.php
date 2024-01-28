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
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table): void {
                $table->id();
                $table->string('task', 45);
                $table->text('description');
                $table->integer('status');
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
