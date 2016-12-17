<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_id');
            $table->string('urun_id');
            $table->date_time_set('tarih');
            $table->string('mesaj');
            $table->string('sehir');
            $table->money_format('fiyat');
            $table->int('stok');
            $table->int('taban_stok');

        });

    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
