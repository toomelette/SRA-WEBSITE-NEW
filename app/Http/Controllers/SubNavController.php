<?php


namespace App\Http\Controllers;
use App\Http\Requests\Submenu\SubNavFormRequest;
use App\Http\Requests\Submenu\SubNavFormRequestEdit;
use App\Models\Menu;
use App\Models\Navigation;
use App\Models\Submenu;
use App\Models\SubNav;
use App\Models\SugarSupplyDemand;
use App\Swep\Helpers\__dataType;
use App\Swep\Helpers\__static;
use App\Swep\ViewHelpers\__html;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\EloquentDataTable;

class SubNavController extends Controller
{
    public function index(Request $request){
        $navigation = Navigation::where('slug',$request->slug)->first();
        return view('dashboard.subnav.index')->with([
            'navigation' => $navigation
        ]);


    }

    public function store(SubNavFormRequest $request){

        $subnav = new SubNav();
        $subnav->slug = Str::random(15);
        $subnav->nav_main_slug = $request->nav_main_slug;
        $subnav->name = $request->name;
        $subnav->is_active = $request->is_active;
        $subnav->save();

        return $subnav->only('slug');
    }

    public function edit($slug){
        $subnav = SubNav::where('slug',$slug)->first();

        return view('dashboard.subnav.edit')->with([
            'subnav' => $subnav
        ]);
    }

    public function update($slug, SubNavFormRequestEdit $request){
        $subnav = SubNav::where('slug',$slug)->first();
        $subnav->name = $request->name;
        $subnav->is_active = $request->is_active;
        $subnav->update();
        return $subnav->only('slug');
    }

    public function fetch(Request $request){

        if(request()->has('draw')){
            $subnavs = Submenu::where('nav_main_slug',$request->navigation_id)->get();


            $dt = DataTables::of($subnavs)
                ->addColumn('action',function ($data){
                    $slug = "'".$data->slug."'";
                    $destroy_route = "'".route("dashboard.subnav.destroy","slug")."'";
                    return '<div class="btn-group">
                                <button type="button" onclick="edit_subnav_modal('.$slug.')" data="'.$data->slug.'" class="btn btn-default btn-xs edit_subnav_btn" data-toggle="modal" data-target="#edit_subnav_modal" title="" data-placement="top" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-xs btn-danger delete_subnav_btn" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>';
                })
                ->editColumn('is_active', function ($data){
                    return __html::boolToCheck($data->is_active);
                })
                ->escapeColumns([])
                ->setRowId('slug')
                ->toJson();

            return $dt;
        }
    }

    public function destroy($slug){
        $subnav = SubNav::where('slug',$slug)->first();
        if($subnav->delete()){
            return 1;
        }
    }

    public function applicationForm(){
        return view('landingPage.downloads.applicationForm');
    }

    public function sugarMonitoringSystem(){
        return view('landingPage.downloads.sugarMonitoringSystem');
    }

    public function sugarcaneVarities(){
        return view('landingPage.aboutSugarcane.sugarcaneVarities');
    }

    public function sugarOrder(){
        return view('landingPage.policy.sugarOrder');
    }

    public function circularLetter(){
        return view('landingPage.policy.circularLetter');
    }

    public function memorandumOrder(){
        return view('landingPage.policy.memorandumOrder');
    }

    public function memorandumCircular(){
        return view('landingPage.policy.memorandumCircular');
    }

    public function molassesOrder(){
        return view('landingPage.policy.molassesOrder');
    }

    public function muscovadoOrder(){
        return view('landingPage.policy.muscovadoOrder');
    }

    public function generalAdministrativeOrder(){
        return view('landingPage.policy.generalAdministrativeOrder');
    }
//Industry Updates//
//    public function sugarSupplyDemand(){
//        $latest_sugarSupplyDemand = SugarSupplyDemand::where('slug')->where('status', '0')->orderby('created_at','DESC')->get();
//        return view('landingPage.industryUpdate.sugarSupplyDemand');
//}
    public function sugarSupplyDemand(){
        return view('landingPage.industryUpdate.sugarSupplyDemand');
    }


    public function millsitePrices(){
        return view('landingPage.industryUpdate.millsitePrices');
    }

    public function bioethanolReferencePrice(){
        return view('landingPage.industryUpdate.bioethanolReferencePrice');
    }

    public function metroManilaPrices(){
        return view('landingPage.industryUpdate.metroManilaPrices');
    }
    public function sugarStatistics(){
        return view('landingPage.industryUpdate.sugarStatistics');
    }

    public function millingSchedule(){
        return view('landingPage.industryUpdate.millingSchedule');
    }

    public function vacantPosition(){
        return view('landingPage.industryUpdate.vacantPosition');
    }

    public function roadmap(){
        return view('landingPage.industryUpdate.roadmap');
    }


    public function expiredImportClearance(){
        return view('landingPage.industryUpdate.expiredImportClearance');
    }

    public function cropEstimates(){
        return view('landingPage.industryUpdate.cropEstimates');
    }
    public function weeklyCP(){
        return view('landingPage.industryUpdate.weeklyComparativeProduction');
    }




///Policy
    public function officeCircular(){
        return view('landingPage.policy.officeCircular');
    }

    public function sugarLaw(){
        return view('landingPage.policy.sugarLaw');
    }

    public function bio_energy(){
        return view('landingPage.policy.bio_energy');
    }

    public function sugarTrader(){
        return view('landingPage.businessOpportunities.sugarTrader');
    }

    public function bioethanolProducer(){
        return view('landingPage.businessOpportunities.bioethanolProducer');
    }

    public function powerCogeneration(){
        return view('landingPage.businessOpportunities.powerCogeneration');
    }

    public function researches(){
        return view('landingPage.aboutSugarcane.researches');
    }

    public function sugarcaneVarieties(){
        return view('landingPage.aboutSugarcane.sugarcaneVarieties');
    }


    ////SIDA//////////
    public function sidaUpdates(){
        return view('landingPage.sida.sidaUpdates');
    }
    public function infographics(){
        return view('landingPage.sida.infographics');
    }
    public function guideLines(){
        return view('landingPage.sida.guideLines');
    }
    public function laws(){
        return view('landingPage.sida.laws');
    }
    public function fundUtilization(){
        return view('landingPage.sida.fundUtilization');
    }
    public function blockFarm(){
        return view('landingPage.sida.blockFarm');
    }
    public function socializedCreditProg(){
        return view('landingPage.sida.socializedCreditProg');
    }
    public function farmMechanization(){
        return view('landingPage.sida.farmMechanization');
    }
    public function infrastructureProg(){
        return view('landingPage.sida.infrastructureProg');
    }
    public function RDEProg(){
        return view('landingPage.sida.RDEProg');
    }
    public function scholarshipProg(){
        return view('landingPage.sida.scholarshipProg');
    }

    //////////Online Payment////////
    ///
    public function landbankLinkBliz(){
        return view('landingPage.onlinePayment.landbankLinkBiz');
    }









    //////BID CORNER/////////
    public function invitationBid(){
        return view('landingPage.bidCorner.invitationBid');
    }
    public function supplementalBid(){
        return view('landingPage.bidCorner.supplementalBid');
    }
    public function noticeAward(){
        return view('landingPage.bidCorner.noticeAward');
    }public function noticeProceed(){
        return view('landingPage.bidCorner.noticeProceed');
    }public function philgepsPosting(){
        return view('landingPage.bidCorner.philgepsPosting');
    }public function bidAnnouncement(){
        return view('landingPage.bidCorner.bidAnnouncement');
    }

    /////////////NAFMIP///////////

    public function nafmip(){
        return view('landingPage.nafmip.index');
    }

    /////JAPAN NPGA//////
    public function japan_npga(){
        return view('landingPage.japan_npga.index');
    }


////Logo
    public function citizensCharter(){
        return view('landingPage.citizensCharter.citizensCharter');
    }

    public function ph_tp_seal(){
        return view('landingPage.ph_tp_seal.index');
    }
}