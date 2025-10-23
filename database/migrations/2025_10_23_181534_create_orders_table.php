<?php

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->integer('quantity');
            $table->enum('status', OrderStatus::values());
            $table->decimal('total', 10, 2);
            $table->string('shipping_address');
            $table->string('billing_address');
            $table->string('shipping_method')->nullable();
            $table->enum('payment_status', PaymentStatus::values());
            $table->string('tracking_number')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
