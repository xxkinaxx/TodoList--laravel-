<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('activity');
            $table->string('status')->default('in progress');
            $table->string('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
