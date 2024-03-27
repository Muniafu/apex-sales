<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Invoice;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create ('invoice_line_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deal_id')->constrained('deals');
            $table->string('description');
            $table->boolean('is_approved')->default(false);
            $table->decimal('amount');
            $table->timestamps();
        });
    }
    // Invoice model
    public function lineItems()
    {
        return $this->hasMany(Invoice::class);
    }

    // InvoiceLineItem model
    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }

    // Adding line items to an invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);

        $invoice = Invoice::find($invoiceId);
        $lineItem1= new InvoiceLineItem(['description' => 'Item 1', 'amount' => 100.00]);
        $lineItem2= new InvoiceLineItem(['description' => 'Item 2', 'amount' => 200.00]);

        $invoice->lineItems()->saveMany([$lineItem1, $lineItem2]);
    }



    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
