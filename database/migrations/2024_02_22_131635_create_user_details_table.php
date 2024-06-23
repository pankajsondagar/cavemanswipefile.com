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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->longText('about_me')->nullable();
            $table->longText('address')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->tinyInteger('is_notify')->default(1);
            $table->string('phone')->nullable();
            $table->string('bio_page_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('avatar')->nullable();
            $table->string('fb_url')->nullable();
            $table->longText('manual_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
