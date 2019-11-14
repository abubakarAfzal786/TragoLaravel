<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanHandheldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_handhelds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('active')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedBigInteger('ati_ld')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('plan_type_id')->nullable();
            $table->unsignedBigInteger('temperature_constraint_id')->nullable();
            $table->tinyInteger('adr')->nullable();
            $table->integer('equipments_number')->nullable();
            $table->unsignedBigInteger('customer_place_id')->nullable();
            $table->string('customer_place_description')->nullable();
            $table->string('customer_description')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('description')->nullable();
            $table->date('plan_date')->nullable();
            $table->time('plan_time_form')->nullable();
            $table->time('plan_time_to')->nullable();
            $table->unsignedBigInteger('place_id_form')->nullable();
            $table->unsignedBigInteger('place_id_to')->nullable();
            $table->text('places_json')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('plan_handhelds');
    }
}
