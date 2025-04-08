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
        Schema::create('job_lists', function (Blueprint $table) {
            $table->id();
            $table->text('company_name');
            $table->text('company_logo');
            $table->string('location');
            $table->string('department');
            $table->text('job_title');
            $table->text('description');
            $table->date('published_at');
            $table->date('expired_at');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_lists');
    }
};
