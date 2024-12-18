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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',128);
            $table->string('customer_enterprise')->nullable();
            $table->string('email',128);
            $table->string('phone',15);
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('restrict')->onDelete('restrict');
            $table->string('transaction_id')->unique();
            $table->string('authorization_number')->nullable();
            $table->string('orderNumber')->nullable();
            $table->string('orderNumber')->nullable();
            $table->decimal('amount', 15, 2); // Order amount
            $table->ipAddress('ip');
            $table->enum('status',['Pending','Paid','Canceled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
