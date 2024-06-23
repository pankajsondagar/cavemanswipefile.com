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
        Schema::create('payplan_leaders', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(1);
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('header_img')->nullable();
            $table->string('reg_fee')->nullable();
            $table->integer('renewal_fee')->default(0);
            $table->tinyInteger('membership_interval')->default(1)->comment('1 = lifetime, 2 = 30 days, 3=monthly, 4=quartly, 5= yearly');
            $table->tinyInteger('member_as_vendor')->default(0);
            $table->tinyInteger('allow_inactive')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('personal_commission')->default(0);
            $table->integer('intial_commission')->default(0);
            $table->longText('renewal_commission')->nullable();
            $table->longText('complete_reward')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payplan_leaders');
    }
};
