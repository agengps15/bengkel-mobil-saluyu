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
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('status_id')->nullable()->constrained('status')->onDelete('cascade');
        $table->string('nama_pemilik');
        $table->string('no_hp');
        $table->string('no_plat');
        $table->string('nama_kendaraan');
        $table->string('model_kendaraan');
        $table->enum('jenis_permintaan', ['Pickup', 'Drop Off']);
        $table->string('alamat_pickup')->nullable();
        $table->string('layanan');
        $table->text('catatan')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
