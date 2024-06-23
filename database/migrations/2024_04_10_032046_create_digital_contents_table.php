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
        Schema::create('digital_contents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('page_id')->nullable();
            $table->string('menu_name')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('content')->nullable();
            $table->json('payplan')->nullable();
            $table->tinyInteger('availabilty')->default(0)->comment="0 = public, 1= registered";
            $table->tinyInteger('status')->default(0)->comment="0 = Disable, 1= Enable, 2= Private";
            $table->boolean('member_active')->default(false);
            $table->boolean('member_inactive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_contents');
    }
};
