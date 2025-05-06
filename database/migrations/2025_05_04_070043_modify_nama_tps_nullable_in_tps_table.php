<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tps', function (Blueprint $table) {
        $table->string('nama_tps')->nullable()->change();
    });
}

public function down()
{
    Schema::table('tps', function (Blueprint $table) {
        $table->string('nama_tps')->nullable(false)->change();
    });
}

};
