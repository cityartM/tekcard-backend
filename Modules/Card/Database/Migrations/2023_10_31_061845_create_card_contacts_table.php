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
        Schema::create('card_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("card_id");
            $table->string("remark_id")->nullable();
            $table->string("group");//peoples , works ;
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
