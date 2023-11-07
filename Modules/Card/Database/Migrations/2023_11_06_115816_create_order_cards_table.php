<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Card\Support\OrderStatus;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->integer('quantity');
            $table->string('color');
            $table->unsignedBigInteger("company_id")->nullable();
           // $table->enum("status", OrderStatus::lists())->default('Pending'); didnt work it save as (app.orderStatus . pending or delivring )in database 
            $table->enum('status',array_keys(OrderStatus::lists()))->default('Pending');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

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
        Schema::dropIfExists('order_cards');
    }
};
