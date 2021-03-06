<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDestTagToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = cp_table_prefix();

        Schema::table($prefix . 'transactions', function (Blueprint $table) {
            $table
                ->string('dest_tag')
                ->after('address')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = cp_table_prefix();

        Schema::table($prefix . 'transactions', function (Blueprint $table) {
            $table->dropColumn('dest_tag');
        });
    }
}
