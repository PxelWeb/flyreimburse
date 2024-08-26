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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('phone_number');
            $table->string('booking_number');
            $table->string('flight_number');
            $table->string('reason');
            $table->boolean('delay');
            $table->string('from');
            $table->string('to');
            $table->date('date');
            $table->string('airline');
            $table->enum('status',['new_arrival','delivered','in_pay_process','refused','completed'])->default('new_arrival');
            $table->boolean('seen')->default(false);
            $table->timestamps();

            //DOCUMENTATION
            $table->text('sign');
            $table->text('boarding_pass');
            $table->text('passaport');

            //OPTIONAL DOCUMENTATION
            $table->text('schedule_change')->nullable();
            $table->text('denied_boarding')->nullable();

            //TRANSITLOSS
            $table->string('depart')->nullable();
            $table->string('arrival')->nullable();

            //EXTRA EXPENSES
            $table->text('new_billet')->nullable();
            $table->text('hotel')->nullable();
            $table->text('taxi')->nullable();
            $table->text('food')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
