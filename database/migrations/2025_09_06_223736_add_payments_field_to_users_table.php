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
        Schema::table('users', function (Blueprint $table) {
            // Payment related fields
            $table->string('payment_status')->default('pending')->index();
            $table->string('payment_token')->nullable();
            $table->timestamp('paid_at')->nullable();
            
            // WordPress integration fields
            $table->integer('wordpress_id')->nullable()->index();
            $table->timestamp('registered_at')->nullable();
            $table->string('registration_status')->default('pending');
            $table->text('registration_error')->nullable();
            $table->boolean('needs_manual_processing')->default(false)->index();
            
            // Add indexes for better query performance
            $table->index(['email', 'phone']);
            $table->index(['order_id']);
            $table->index(['course_id']);
            $table->index(['payment_status', 'paid_at']);
            $table->index(['needs_manual_processing', 'payment_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'payment_status',
                'payment_token',
                'paid_at',
                'wordpress_id',
                'registered_at',
                'registration_status',
                'registration_error',
                'needs_manual_processing',
            ]);
        });
    }
};