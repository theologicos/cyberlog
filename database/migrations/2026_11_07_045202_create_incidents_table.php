<?php

use App\IncidentSeverity;
use App\IncidentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->enum('severity', array_column(IncidentSeverity::cases(), 'value'));
            $table->enum('status', array_column(IncidentStatus::cases(), 'value'));
            $table->foreignId('reported_by_id')->constrained('users');
            $table->foreignId('assigned_by_id')->nullable()->constrained('users');
            $table->foreignId('assigned_to_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
