<?php

// database/migrations/YYYY_MM_DD_add_soft_delete_to_janjitemu_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToJanjitemuTable extends Migration
{
    public function up()
    {
        Schema::table('janjitemu', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('janjitemu', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
