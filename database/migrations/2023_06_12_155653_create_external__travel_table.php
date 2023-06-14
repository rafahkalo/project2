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
        Schema::create('external__travel', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('destnation');
            $table->integer('cost');
            $table->string('status');
            $table->string('time_paid');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->foreignId('office_id')->constrained('offices')->onDelete('cascade');            


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external__travel');
    }

    
};