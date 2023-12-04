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
        Schema::create('card_apps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('contact_id');
            $table->string("title");
            $table->string("value");
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('setting_contacts')->onDelete('cascade');
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_apps');
    }
};
