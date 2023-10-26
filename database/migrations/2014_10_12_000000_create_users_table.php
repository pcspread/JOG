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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('company')->unsigned()->comment('0:未掲載, 1:掲載')->default(0);
            $table->rememberToken();
            $table->string('image')->nullable();
            $table->char('gender', 3)->nullable();
            $table->integer('age')->nullable();
            $table->string('tel', 11)->nullable();
            $table->char('postcode', 8)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('building', 191)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
