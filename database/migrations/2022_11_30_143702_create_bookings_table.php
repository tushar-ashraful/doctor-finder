<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
             $table->foreignId('doctor_id')->nullable();
             $table->foreignId('patient_id')->nullable();
             $table->string('date_on')->nullable();
             $table->string('followUp_on')->nullable();
             $table->string('followUp_to')->nullable();
             $table->integer('amount')->nullable();
             $table->string('payment_number')->nullable();
             $table->string('payment_transiton_number')->nullable();
             $table->integer('is_accept')->default(0);
             $table->integer('payment_verify')->default(0);
             $table->text('problem')->nullable();
             $table->json('medicines')->nullable();
             $table->json('tests')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
