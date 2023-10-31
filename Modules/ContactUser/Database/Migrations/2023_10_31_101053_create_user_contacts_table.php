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
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
          //  $table->unsignedInteger('card_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('remark_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          //  $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('remark_id')->references('id')->on('remarks')->onDelete('cascade');
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
        Schema::dropIfExists('user_contacts');
    }
};
