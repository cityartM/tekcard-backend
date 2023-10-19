<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Support\Enum\BlogCategories;
use App\Support\Enum\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->enum('status',array_keys(Status::lists()))->default(Status::UNPUBLISHED);
            $table->enum('type', array_keys(BlogCategories::lists()))->default(BlogCategories::OTHER);
            $table->json('content');
            $table->string('tumail')->nullable();
            $table->json('gallery')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
