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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->longText('site_keywords')->nullable();
            $table->longText('site_desc')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->tinyInteger('reg_status')->default(0);
            $table->tinyInteger('logo_style')->default(1);
            $table->tinyInteger('member_website')->default(0);
            $table->tinyInteger('cooking_consent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
