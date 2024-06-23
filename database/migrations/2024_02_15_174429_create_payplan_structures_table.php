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
        Schema::create('payplan_structures', function (Blueprint $table) {
            $table->id();
            $table->string('level_width')->nullable();
            $table->string('level_depth')->nullable();
            $table->string('symbol')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('reminder')->default(0)->comment("1 = 3 days, 2 = 5 days, 3 = 1 week");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payplan_structures');
    }
};
