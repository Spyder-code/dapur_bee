<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('to_date')->nullable();
            // $table->string('from')->nullable();
            // $table->string('to')->nullable();
            $table->string('message')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('invoice')->nullable();
            $table->string('receiver')->nullable();
            $table->string('phone')->nullable();
            $table->integer('distance')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('expedition_name')->nullable();
            $table->string('expedition_type')->nullable();
            $table->double('expedition_price')->default(0);
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->double('amount')->default(0);
            $table->double('total')->default(0);
            $table->double('received')->default(0);
            $table->double('payout')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->foreignId('payment_status_id')->default(4)->constrained('payment_statuses');
            $table->string('token')->nullable();
            $table->enum('status',['verify','process','delivery','complete'])->default('verify');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
