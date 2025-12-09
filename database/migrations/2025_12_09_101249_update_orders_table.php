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
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn('status');


            $table->enum('status', [
                'Created',
                'Processing',
                'Paid',
                'Rejected',
                'Failed',
                'Canceled',
                'Refunded',
            ])->default('Created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
