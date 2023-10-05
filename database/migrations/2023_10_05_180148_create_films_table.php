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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nazwa filmu
            $table->text('description'); // Opis filmu
            $table->integer('seats_available'); // Liczba miejsc
            $table->decimal('ticket_price', 8, 2); // Cena biletu
            $table->date('show_date'); // Data seansu
            $table->time('show_time'); // Godzina seansu
            $table->integer('total_seats'); // Całkowita liczba miejsc
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
        Schema::dropIfExists('films');
    }
};
