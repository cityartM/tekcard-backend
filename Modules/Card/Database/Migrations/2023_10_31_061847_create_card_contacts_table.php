<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Card\Support\GroupType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('card_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->unsignedBigInteger("card_id");
            $table->unsignedBigInteger("remark_id")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('remark_id')->references('id')->on('remarks')->onDelete('set null'); // Use 'set null' instead of 'null'
            $table->enum("group", GroupType::lists())->default('Peoples');
            $table->string("lat")->nullable();
            $table->string("lon")->nullable();
            $table->string("address")->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_contacts');
    }
};
