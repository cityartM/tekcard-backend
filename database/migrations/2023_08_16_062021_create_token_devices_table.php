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
        Schema::create('token_devices', function (Blueprint $table) {
            $table->id();
            $table->string("device_id",255);
            $table->string("device_token")->nullable();
            $table->string("device_name",191);
            $table->string("brand",191)->nullable();
            $table->string("os",191)->nullable();
            $table->string("app_version")->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_devices');
    }
};
