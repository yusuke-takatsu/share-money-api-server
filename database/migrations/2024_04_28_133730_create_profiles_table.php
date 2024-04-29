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
        Schema::create('profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users');
            $table->string('name')->comment(__('profile.name'));
            $table->unsignedInteger('age')->comment(__('profile.age'));
            $table->unsignedTinyInteger('job')->comment(__('profile.job'));
            $table->unsignedTinyInteger('income')->comment(__('profile.income'));
            $table->unsignedTinyInteger('composition')->comment(__('profile.composition'));
            $table->text('body')->comment(__('profile.body'));
            $table->string('image')->nullable()->comment(__('profile.image'));
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
