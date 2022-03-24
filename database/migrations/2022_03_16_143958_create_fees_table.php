<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_id')->constrained();
            $table->foreignId('__session_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->string('fee_type');
            $table->decimal('fee_amount');
            $table->decimal('fee_discount')->default(0);
            $table->date('month_of')->nullable();
            $table->date('due_date');
            $table->string('payment_type')->nullable();
            $table->string('operator')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('paid_amount')->default(0);
            $table->decimal('balance_amount')->default(0);
            $table->integer('voucher_count')->default(0);
            $table->date('paid_at')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
};
