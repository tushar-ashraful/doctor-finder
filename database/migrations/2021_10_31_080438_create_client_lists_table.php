<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_status_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone',20);
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('reference')->nullable();
            $table->longText('project_name')->nullable();
            $table->longText('note')->nullable();
            $table->string('short_note')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('client_lists');
    }
}
