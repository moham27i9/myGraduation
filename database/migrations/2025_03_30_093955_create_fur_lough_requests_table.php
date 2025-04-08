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
    {      //الإجازات
        Schema::create('fur_lough_requests', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('cause');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->morphs('covet_by'); // يربط بين المحامي أو الموظف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fur_lough_requests');
    }
};
