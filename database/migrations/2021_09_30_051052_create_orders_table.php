<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('status_id')->default(1);
            $table->string('judul_lagu');
            $table->string('slug')->unique();
            $table->timestamp('ordered_at')->nullable();
            $table->integer('trumpet')->nullable();
            $table->integer('mello')->nullable();
            $table->integer('baritone')->nullable();
            $table->integer('tuba')->nullable();
            $table->integer('marimba')->nullable();
            $table->integer('vibraphone')->nullable();
            $table->integer('xylophone')->nullable();
            $table->integer('glockenspiel')->nullable();
            $table->integer('snare')->nullable();
            $table->integer('multitenor')->nullable();
            $table->integer('bassdrum')->nullable();
            $table->string('deadline');
            $table->string('pesan_a')->nullable();
            $table->string('harga')->nullable();
            $table->string('video')->nullable();
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
