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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();
            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('image');
            $table->char('gender', 3);
            $table->integer('age');
            $table->string('tel', 11);
            $table->char('postcode', 8);
            $table->string('address', 191);
            $table->string('building', 191)->nullable();
            $table->text('appeal');
            $table->text('reason');
            $table->text('experience')->nullable();
            $table->string('question')->nullable();
            $table->text('answer')->nullable();
            $table->tinyInteger('result')->unsigned()->nullable()->comment('0:未通過,1:通過');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
