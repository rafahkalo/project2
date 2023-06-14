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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default(false);
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('type_travels')->onDelete('cascade');
            $table->foreignId('star_id')->constrained('stars')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('location');
            $table->string('image');

            $table->string('contract');
            $table->string('phoneOne');
            $table->string('phoneTwo');

            $table->longText('discreption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
    
};