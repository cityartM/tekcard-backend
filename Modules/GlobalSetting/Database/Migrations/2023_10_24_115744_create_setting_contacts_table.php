<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\GlobalSetting\Support\Enum\ContactType;
use Modules\Card\Support\ContactAppsType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('display_name');
            $table->string('value');
            $table->string('color')->nullable();
            $table->enum('category', ContactType::lists())->default(ContactType::CONTACTINFO);
            $table->string("base_url")->nullable();
            $table->enum("type",ContactAppsType::listsWitoutTrans())->default('Link');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('setting_contacts');
    }
};
