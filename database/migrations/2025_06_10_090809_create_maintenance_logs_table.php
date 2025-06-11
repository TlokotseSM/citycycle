<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maintenance_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bicycle_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->enum('maintenance_type', ['inspection', 'repair', 'routine', 'emergency']);
            $table->text('description');
            $table->dateTime('completed_at');
            $table->dateTime('next_inspection_date');
            $table->timestamps();

            // Indexes for better performance
            $table->index(['bicycle_id', 'staff_id']);
            $table->index('completed_at');
            $table->index('next_inspection_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_logs');
    }
};
