<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); //Admins ID
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->string('property_name'); // name of the property
            $table->string('estate_name'); // name of the Estate
            $table->string('estate_logo');
            $table->integer('amount');
            $table->integer('promo_price')->nullable();
            $table->string('down_payment'); //The first minimum initial payment of the property
            $table->string('commission');
            $table->string('property_type');
            $table->string('interest_free_months'); //Duration of payment at which interest wont be costed, after this duration, interest will be added
            $table->string('location');
            // $table->string('outright_payment');
            $table->text('description');
            $table->string('flier')->nullable();
            $table->string('brochure')->nullable();
            $table->string('form')->nullable();
            $table->unsignedBigInteger('status')->default(1); //availability of the property
            $table->unsignedBigInteger('sold')->default(0); 
            $table->unsignedBigInteger('verified')->default(0); // admin verification before publishing
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
        Schema::dropIfExists('properties');
    }
}
