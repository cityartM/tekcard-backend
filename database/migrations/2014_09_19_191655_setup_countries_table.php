<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SetupCountriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // TODO: delete this countries table
           /* Schema::create('countries_2', function (Blueprint $table) {
               $table->id('id');
                $table->string('capital', 255)->nullable();
                $table->string('citizenship', 255)->nullable();
                $table->string('country_code', 3)->default('');
                $table->string('currency', 255)->nullable();
                $table->string('currency_code', 255)->nullable();
                $table->string('currency_sub_unit', 255)->nullable();
                $table->string('currency_symbol', 3)->nullable();
                $table->string('full_name', 255)->nullable();
                $table->string('iso_3166_2', 2)->default('');
                $table->string('iso_3166_3', 3)->default('');
                $table->string('name', 255)->default('');
                $table->string('region_code', 3)->default('');
                $table->string('sub_region_code', 3)->default('');
                $table->boolean('eea')->default(0);
                $table->string('calling_code', 3)->nullable();
                $table->string('flag', 6)->nullable();
            });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        //Schema::drop('countries');
    }
}
