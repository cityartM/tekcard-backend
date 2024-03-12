<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Support\Enum\UserStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('card_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->enum('type', \Modules\Card\Support\StatisticType::lists())->default(\Modules\Card\Support\StatisticType::SHAREDLINK);
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_statistics');
    }
};
