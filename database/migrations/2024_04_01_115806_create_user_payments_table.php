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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sponser_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('leader_id')->nullable()->constrained('payplan_leaders')->cascadeOnDelete();
            $table->boolean('is_confirm')->default(false);
            $table->boolean('is_confirm')->default(false);
            $table->boolean('is_unapproved')->default(false);
            $table->boolean('is_declined')->default(false);            
            $table->tinyInteger('type')->default(1)->comment="1 = admin, 2 = sponser, 3 = sponser of sponser";
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
