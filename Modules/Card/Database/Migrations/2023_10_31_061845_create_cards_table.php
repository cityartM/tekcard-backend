<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Support\Enum\UserStatus;
use Modules\Card\Support\CardType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("reference")->index()->unique();
            $table->enum("type", CardType::lists())->default('Person');
            $table->string("name");
            $table->string("full_name");
            $table->string("company_name")->nullable();
            $table->integer("company_id")->nullable();
            $table->string("job_title")->nullable();
            $table->integer("background_id")->nullable();
            $table->string("color")->nullable();
            $table->string("color_icon")->nullable();
            $table->string("color_qr")->nullable();
            $table->boolean("is_single_link")->nullable();
            $table->integer("single_link_contact_id")->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean("is_main")->default(0);
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("url_web_site")->nullable();
            $table->string("iban")->nullable();
            $table->string("lat")->nullable();
            $table->string("lon")->nullable();
            $table->string("address")->nullable();
            $table->string("note")->nullable();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('shared_link')->default(0);
            $table->integer('saved_contact')->default(0);
            $table->integer('opened_link')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
