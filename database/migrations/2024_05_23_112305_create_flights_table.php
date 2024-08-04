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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aircraft_id')->constrained();
            $table->foreignId('airline_id')->constrained();
            $table->foreignId('departure_airport_id')->constrained('airports');
            $table->foreignId('arrival_airport_id')->constrained('airports');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');

            $table->decimal('economy_price', 10, 2);
            $table->decimal('first_class_price', 10, 2);

            $table->decimal('economy_discount_price', 10, 2)->nullable();
            $table->decimal('first_class_discount_price', 10, 2)->nullable();

            $table->enum('flight_type',\App\Enums\FlightType::values())->default(\App\Enums\FlightType::One_way->value);
            $table->dateTime('return_departure_time')->nullable();
            $table->dateTime('return_arrival_time')->nullable();

            $table->integer('the_period_allowed_for_cancellation_without_paying_a_fee')->nullable();
            $table->float('percentage_of_cash_back_after_the_grace_period')->nullable();

            $table->decimal('checked_baggage_weight_limit', 10, 2)->default(25);
            $table->decimal('excess_baggage_fee', 10, 2)->default(10);



            $table->unique(['aircraft_id', 'departure_time', 'arrival_time']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};







/*
 * how can we implement cancellation?
 *
 * Flight -> cancel -> return all the money
 *                  OR
 *                  -> return all the money on specific date
 *                  OR
 *                  -> return some money
 *                  OR
 *                  -> return some money after the specific date
 *                  OR
 *                  -> No money returned
 * */































