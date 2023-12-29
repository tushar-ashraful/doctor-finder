<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->integer('qty')->defalut(1);
            $table->float('price', 10, 2)->defalut(0);
            $table->float('total', 10, 2)->defalut(0);
            $table->timestamp('is_urgent')->nullable(); // if item delivary time in new order item or upgrade item or currection item
            $table->timestamp('upgrade_at')->nullable();
            $table->timestamp('correction_at')->nullable();
            $table->timestamp('assign_at')->nullable();
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
