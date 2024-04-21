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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment(__('user.id'));
            $table->string('name')->comment(__('user.name'));
            $table->string('email')->unique()->comment(__('user.email'));
            $table->timestamp('email_verified_at')->nullable()->comment(__('user.email_verified_at'));
            $table->string('password')->comment(__('user.password'));
            $table->rememberToken()->comment(__('user.remember_token'));
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();

            $table->comment(__('user.table_description'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
