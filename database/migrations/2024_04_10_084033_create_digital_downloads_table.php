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
        Schema::create('digital_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_size')->nullable();
            $table->json('payplan')->nullable();
            $table->tinyInteger('availabilty')->default(0)->comment="0 = disabled, 1= enabled";
            $table->tinyInteger('status')->defaul(0)->comment="0 = public";
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_downloads');
    }
};
