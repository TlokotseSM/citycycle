<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hub_id')->constrained()->onDelete('cascade');
            $table->string('identifier')->unique();
            $table->enum('status', ['available', 'reserved', 'in_maintenance'])->default('available');
            $table->dateTime('last_inspection_date');
            $table->dateTime('next_inspection_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicycles');
    }
};
