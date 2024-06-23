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
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('type')->default(2)->comment('1 = Admin, 2 = Member');
            $table->tinyInteger('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('is_online')->default(0);
            $table->tinyInteger('has_plan')->default(0);
            $table->rememberToken();
            $table->timestamps();
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
