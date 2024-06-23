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
        Schema::create('member_settings', function (Blueprint $table) {
            $table->id();
            $table->string('default_pic')->nullable();
            $table->string('max_pic_width')->nullable();
            $table->string('max_pic_height')->nullable();
            $table->string('max_mem_site_title')->nullable();
            $table->string('max_mem_site_desc')->nullable();
            $table->tinyInteger('payplan_reg_option')->default(1)->comment="1 = manual by member, 2 = autmatic by system";
            $table->tinyInteger('visitor_refferal')->default(1)->comment="1 = optional,2 = mendatary";
            $table->tinyInteger('enable_default_refferer')->default(1);
            $table->string('default_refferer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_settings');
    }
};
