<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJanjiTemuTable extends Migration
{
    public function up()
{
    Schema::table('janji_temu', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('janji_temu', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

}