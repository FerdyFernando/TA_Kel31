<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToDokter extends Migration
{
    public function up()
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
