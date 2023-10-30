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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->enum('status',UserStatus::lists())->default('Unconfirmed');
            $table->json("full_name");
            $table->string("job_title")->nullable();
            $table->string("phone")->nullable();
            $table->string("mobile")->nullable();
            $table->json("bio")->nullable();
            $table->integer("country_id")->unsigned();
            $table->string("address")->nullable();
            $table->string("avatar")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
