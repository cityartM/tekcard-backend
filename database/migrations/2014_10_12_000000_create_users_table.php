<?php

use App\Support\Enum\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('email')->unique();//->unique();
            $table->string('username')->nullable()->index();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender',UserStatus::gender())->default('Male');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->enum('status', UserStatus::lists())->default('Active');
            $table->date('birthday')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean("enable_sms_notification")->default(0);
            $table->string("lang")->default("ar");
            $table->string("device_id",255)->nullable();
            $table->string("device_token")->nullable();
            $table->string("device_name",191)->nullable();
            $table->string("brand",191)->nullable();
            $table->string("os",191)->nullable();
            $table->string("app_version")->nullable();
            $table->integer("free_days")->default(0);
            $table->string("timezone")->nullable();
            $table->enum("socialite",config('auth.social.providers'))->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
