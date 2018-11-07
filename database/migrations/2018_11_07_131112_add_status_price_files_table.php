<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusPriceFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_files', function (Blueprint $table) {
            $table->tinyInteger('status')->comment('1:hiện ; 0:ẩn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_files', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
