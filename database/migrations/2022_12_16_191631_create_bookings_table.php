<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('id_client')->nullable();
            $table->unsignedBigInteger('id_guests')->nullable();
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->unsignedBigInteger('id_table')->nullable();
            $table->unsignedBigInteger('date_booking')->nullable();
            $table->string('num_card');
            $table->integer('num_people');
            $table->timestamps();

            $table->foreign("id_client")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("id_guests")->references('id')->on('guests')->onDelete('cascade');
            $table->foreign("id_menu")->references('id')->on('menus')->onDelete('cascade');
            $table->foreign("id_table")->references('id')->on('tables')->onDelete('cascade');
            $table->foreign("num_card")->references('num_card')->on('credit_cards')->onDelete('cascade');
            $table->foreign("date_booking")->references('id')->on('calendar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
