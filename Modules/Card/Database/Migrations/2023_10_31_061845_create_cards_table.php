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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("full_name");
            $table->string("company_name")->nullable();
            $table->integer("company_id")->nullable();
            $table->string("job_title")->nullable();
            $table->integer("background_id")->nullable();
            $table->string("color")->nullable();
            $table->boolean("is_single_link")->nullable();
            $table->integer("single_link_contact_id")->nullable();
            $table->timestamps();
        });
    }

    //contact_id ,title,value

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
