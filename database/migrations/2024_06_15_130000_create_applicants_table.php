<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Applicant;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('salary');
            $table->string('address');
            $table->date('birthday');
            $table->foreignIdFor(\App\Models\User::class)
                ->constrained();
            $table->enum('category', Applicant::$category);
            $table->enum('experience', Applicant::$experience);
            $table->enum('status', Applicant::$status);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
