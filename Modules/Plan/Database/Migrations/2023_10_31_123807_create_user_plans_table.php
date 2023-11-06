<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Modules\Plan\Support\Enum\PlanType;
use \Modules\Plan\Support\Enum\PlanDuration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->json('display_name')->nullable();
            $table->enum('type', PlanType::lists())->default('Company');
            $table->enum('duration', PlanDuration::lists())->default('Yearly');
            $table->date('purchase_date');
            $table->date('expired_date');
            $table->double('price', 20,2)->default(0);
            $table->integer('nbr_user')->default(0);
            $table->integer('nbr_card_user')->default(0);
            $table->boolean('has_dashboard')->default(0);
            $table->string('orderId', 255)->nullable();
            $table->longText('purchaseToken')->nullable();
            $table->dateTime('purchaseDate')->nullable();
            $table->string('productId',191)->nullable();
            $table->integer('currency_id')->nullable();
            $table->string('provider',50)->nullable();
            $table->json('features')->nullable();
            $table->integer('current_nbr_user')->default(0);
            $table->integer('current_nbr_card_user')->default(0);
            $table->unsignedInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('plan_id')->default(1);
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
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
        Schema::dropIfExists('plans');
    }
};
