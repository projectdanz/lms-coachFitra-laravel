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
        Schema::create('webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->index();
            $table->string('transaction_status');
            $table->string('payment_type')->nullable();
            $table->string('fraud_status')->nullable();
            $table->decimal('gross_amount', 15, 2)->nullable();
            $table->string('job_id')->nullable()->index();
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->datetime('received_at');
            $table->datetime('started_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->integer('processing_time_seconds')->nullable();
            $table->integer('attempts')->default(0);
            $table->text('error_message')->nullable();
            $table->json('webhook_data');
            $table->json('validation_data')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['status', 'created_at']);
            $table->index(['order_id', 'status']);
            $table->index(['received_at', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhook_logs');
    }
};