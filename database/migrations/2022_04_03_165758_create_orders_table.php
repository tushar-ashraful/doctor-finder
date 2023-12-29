<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->foreignId('university_id');
            $table->text('title');
            $table->longText('description')->nullable();
            $table->string('reference')->nullable();
            $table->string('supervisor');
            $table->string('supervisor_phone');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('batch')->nullable();
            $table->string('address')->nullable();
            $table->json('members')->nullable();
            $table->float('additional_fees', 10, 2)->default(0);
            $table->float('discount', 10, 2)->default(0);
            $table->float('loss', 10, 2)->default(0);
            $table->text('note')->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->timestamp('delivery')->nullable();
            $table->timestamp('progress_at')->nullable();
            $table->timestamp('review_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('correction_at')->nullable();
            $table->timestamp('upgrade_at')->nullable();
            $table->timestamp('delivery_at')->nullable();
            $table->timestamp('cancel_at')->nullable();
            $table->timestamp('return_at')->nullable();
            $table->float('return_amount', 10, 2)->default(0);
            $table->integer('status')->default(0); // 0 = new, 1 = progress, 2 = review, 3 = complete, 4 = correction/upgrade, 5 = Delivered, 6 = return, 7 = cancel 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
