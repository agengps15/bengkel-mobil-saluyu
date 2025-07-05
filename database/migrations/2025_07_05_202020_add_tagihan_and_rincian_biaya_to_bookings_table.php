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
    Schema::table('bookings', function (Blueprint $table) {
        $table->decimal('tagihan', 15, 2)->nullable(); // Jumlah tagihan
        $table->text('rincian_biaya')->nullable(); // Rincian biaya
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['tagihan', 'rincian_biaya']);
    });
}

};
