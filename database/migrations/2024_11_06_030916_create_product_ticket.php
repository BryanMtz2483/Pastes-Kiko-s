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
        Schema::create('product_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignID('product_id')->constrained('products','id')->onDelete('cascade');
            $table->foreignID('ticket_id')->constrained('tickets','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ticket');
    }
};
