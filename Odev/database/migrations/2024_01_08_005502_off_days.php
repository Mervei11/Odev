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
        Schema::create('off_days', function (Blueprint $table) {
            $table->id();
            $table->string('izin_personel_sicil_no');
            $table->string('izin_personel_ad_soyad');
            $table->string('izin_tarihi');
            $table->string('izin_türü');
            $table->string('izin_aciklama');
            $table->timestamps();
        });

    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('off_days');
    }
};
