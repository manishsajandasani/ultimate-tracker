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
        Schema::create('task_entries', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("user_id");
            $table->smallInteger("task_category_id");
            $table->smallInteger("task_sub_category_id");
            $table->smallInteger("task_assigned_by_id");
            $table->smallInteger("task_status_id");
            $table->smallInteger("task_priority_id");
            $table->string("task_title", 255);
            $table->string("task_link", 255);
            $table->string("task_images", 255);
            $table->string("task_remark", 255);
            $table->date("task_deadline_date", 255);
            $table->date("task_completion_date", 255);
            $table->tinyInteger('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_entries');
    }
};
