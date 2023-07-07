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
            'station_bcd_extserv',
            'station_lagranja_ann',
            'station_lagranja_event',
            'station_lagranja_eventstation_lagranja_extserv',
            'station_pampanga_ann',
            'station_pampanga_event',
            'station_pampanga_eventstation_pampanga_extserv',
            'vacant_position',
            'station_bcd_ann',
            'station_bcd_event',
            'station_lagranja_event',
            'sida_laws',
            'sida_infas_fmr',
            'sida_infrastructure_prog',
            'station_bcd_event',
            'application_form',
            'bid_announcement',
            'bio_energy',
            'bioethanol_reference_price',
            'block_farm',
            'block_farm_established_hyv_nurseries_visayas',
            'block_farm_established_lozun_mindanao',
            'block_farm_established_visayas',
            'block_farm_mechanizatoin_supp_vis',
            'circular_letter',
            'crop_estimates_statistics',
            'fund_utilization',
            'gad_activities',
            'gad_annual_report',
            'gad_memorandum',
            'gad_videos',
            'general_administrative_order',
            'infographics',
            'memorandum_circular',
            'memorandum_order',
            'metro_manila_prices',
            'milling_schedule',
            'millsite_prices',
            'molasses_order',
            'muscovado_order',
            'notice_award',
            'notice_proceed',
            'office_circular',
            'opsi_training_activities',
            'philgeps_posting',
            'roadmap',
            'sida_farm_mechanization',
            'sida_guide_lines',
            'sida_infas_bridge',
            'sida_infas_fmr',
            'sida_infrastructure_prog',
            'sida_laws',
            'sida_rde_prog',
            'sida_scholarship_prog',
            'sida_socialized_credit_prog',
            'stk__raw_sugar_production',
            'stk_directory_bioethanol_producers',
            'stk_directory_mddc_mdos',
            'stk_directory_mills_assciation_planter_fed',
            'stk_directory_sugar_mills',
            'stk_directory_sugar_refineries',
            'stk_molasses_trds__inter_dom',
            'stk_muscovado_traders',
            'stk_raw_sugar_production',
            'stk_sugar_traders_dom',
            'stk_sugar_traders_inter',
            'stk_sugar_traders_inter_fructose',
            'sugar_law',
            'sugar_order',
            'sugar_statistics',
            'sugar_supply_demand',
            'supplemental_bid',
            'weekly_comparative_production',


        ];
        return $tables;
    }
};
