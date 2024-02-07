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
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->json('display_name')->nullable();
            $table->enum('type', PlanType::lists())->default('Company');
            $table->enum('duration', PlanDuration::lists())->default('Yearly');
            $table->double('price', 20,2)->default(0);
            $table->integer('nbr_user')->default(0);
            $table->integer('nbr_card_user')->default(0);
            $table->boolean('has_dashboard')->default(0);
            $table->boolean('has_video')->default(0);
            $table->boolean('has_pdf')->default(0);
            $table->boolean('has_multiple_image')->default(0);
            $table->boolean('has_water_mark')->default(0);
            $table->boolean('has_share_offline')->default(0);
            $table->boolean('share_with_image')->default(0);
            $table->boolean('has_scan_ia')->default(0);
            $table->boolean('has_group_contact')->default(0);
            $table->boolean('has_scan_location')->default(0);
            $table->boolean('has_note_contact')->default(0);
            $table->boolean('has_statistic')->default(0);
            $table->boolean('removable')->default(1);
            $table->unsignedInteger('user_id')->default(1);
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
        Schema::dropIfExists('plans');
    }
};
