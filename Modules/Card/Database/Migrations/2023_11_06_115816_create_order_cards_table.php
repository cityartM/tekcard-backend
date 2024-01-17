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
            $table->json('card_ids')->nullable();
            $table->integer('quantity');
            $table->string('color');
            $table->enum('status',array_keys(OrderStatus::lists()))->default('Pending');
            $table->unsignedBigInteger("company_id")->nullable();
            $table->unsignedInteger("user_id")->nullable();
            $table->unsignedInteger("shipping_id")->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_id')->references('id')->on('shipping')->onDelete('cascade');

            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger("country_id");
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
