<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
