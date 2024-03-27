<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deal_id')->constrained('deals');
            $table->foreignId('account_id')->constrained('accounts');
            $table->foreignId('contact_id')->constrained('contacts');
            $table->date('quote_date');
            $table->date('expiry_date');
            $table->decimal('total');
            $table->boolean('is_approved')->default(false);
            $table->enum('status', ['draft', 'sent', 'expired', 'accepted', 'rejected']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
