<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('keperluan');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('satuan_id')->default('0');
            $table->string('attachment')->nullable();
            $table->tinyInteger('tipe_id');
            $table->tinyInteger('verify_id')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
