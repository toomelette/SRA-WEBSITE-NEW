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
        $tables = $this->tables();

        foreach ($tables as $table){
            if(!Schema::hasColumn($table,'description')){
                Schema::table($table, function (Blueprint $tbl) {
                    $tbl->string('description',512)->after('title')->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = $this->tables();
        foreach ($tables as $table){
            Schema::table($table, function (Blueprint $tbl) {
                $tbl->dropColumn('description');
            });
        }
    }

    private function tables(){
        $tables = [
            'vacant_position',
            'station_bcd_extserv',
            'station_lagranja_ann',
            'station_lagranja_event',
            'station_lagranja_extserv',
            'station_pampanga_ann',
            'station_pampanga_event',
            'station_pampanga_extserv',

        ];
        return $tables;
    }
};
