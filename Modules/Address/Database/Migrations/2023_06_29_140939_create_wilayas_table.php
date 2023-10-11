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
        Schema::create('wilayas', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->double('lat');
            $table->double('lon');
           // $table->unsignedBigInteger('country_id')->nullable();
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->timestamps();
        });
    }
/*Schema::table('wilayas', function (Blueprint $table) {
        $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->onDelete('set null');
    });*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayas');
    }
};
