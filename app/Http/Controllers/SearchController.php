<?php

namespace App\Http\Controllers;

use App\Models\SubNav;
use App\Models\SugarOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{


//    public function search(Request $request)
//    {
//        $query = $request->input('query');
//
//        // Perform your search logic here using the $query
//
//        // Return the search results to the client as JSON
//        return response()->json($results);
//    }

//    public function search(Request $request)
//    {
//        $query = $request->input('query');
//
//        // Perform your search logic here using the $query
//
//        $results = SugarOrder::where('title', 'LIKE', '%' . $query . '%')->get();
//
//
//        // Return the search results to the client as JSON
//
//        return redirect()->route('search.result', ['result' => $results]);
//
//        return response()->json($results);
//    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = SubNav::where('name', 'LIKE', '%' . $query . '%')->get();

        $tables = [
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
        $searchQuery = '';
        foreach ($tables as $key => $tableName){
            $searchQuery .= 'SELECT title,path, slug, "'.$tableName.'" as table_name FROM sra_website.'.$tableName.' '.((array_key_last($tables) == $key) ? '' : 'UNION ');
        }

        $fileResults = DB::select('
        SELECT * FROM
            ('.$searchQuery.') as sample_search
            where title like ?;
        ',['%'.$query.'%']);

//        $results = [];
//
//        // Perform search on Model 1
//        $model1Results = SubNav::where('name', 'LIKE', '%' . $query . '%')->get();
//        $results['model1'] = $model1Results;
//
//        // Perform search on Model 2
//        $model2Results = Navigation::where('name', 'LIKE', '%' . $query . '%')->get();
//        $results['model2'] = $model2Results;

        return view('landingPage.search.results', [
            'results' => $results,
            'query' =>$query,
            'fileResults' => $fileResults,
        ]);
    }


}
