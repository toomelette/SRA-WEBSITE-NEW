<?php

/** Auth **/

use App\Swep\Helpers\Helper;
use Rats\Zkteco\Lib\ZKTeco;


Route::group(['as' => 'auth.'], function () {

	Route::get('/', 'Auth\LoginController@showLoginForm')->name('showLogin');
	Route::post('/', 'Auth\LoginController@login')->name('login');
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/username_lookup','Auth\AccountRecoveryController@username_lookup')->name('username_lookup');
    Route::post('/reset_password','Auth\AccountRecoveryController@reset_password')->name('reset_password');
    Route::post('/verify_email','Auth\AccountRecoveryController@verify_email')->name('verify_email');
    Route::get('/reset_password_via_email','Auth\AccountRecoveryController@reset_password_via_email')->name('reset_password_via_email');
});

/** HOME **/
Route::get('dashboard/home', 'HomeController@index')->name('dashboard.home')->middleware('check.user_status');

Route::post('/contactUsStore', 'ContactUsController@store')->name('contactUsStore');
Route::post('/sugarTraderStore', 'SugarTraderController@store')->name('sugarTraderStore');
Route::post('/bioethanolProducerStore', 'BioethanolProducerController@store')->name('bioethanolProducerStore');
Route::post('/powerCogenerationStore', 'PowerCogenerationController@store')->name('powerCogenerationStore');

Route::get('navRoute', 'NavigationController@navRoute')->name('navRoute');
Route::get('newsRoute/{id}', 'NewsController@newsRoute')->name('newsRoute');

Route::get('home/index', 'NavigationController@home')->name('home.index');

Route::get('aboutUs/overview', 'NavigationController@overview')->name('aboutUs.overview');
Route::get('aboutUs/mandate', 'NavigationController@mandate')->name('aboutUs.mandate');
Route::get('aboutUs/charter', 'NavigationController@charter')->name('aboutUs.charter');
Route::get('aboutUs/organizationalChart', 'NavigationController@organizationalChart')->name('aboutUs.organizationalChart');
Route::get('aboutUs/corporateObjectives', 'NavigationController@corporateObjectives')->name('aboutUs.corporateObjectives');
Route::get('aboutUs/history', 'NavigationController@history')->name('aboutUs.history');
Route::get('aboutUs/officials', 'NavigationController@officials')->name('aboutUs.officials');
Route::get('aboutUs/administrators', 'NavigationController@administrators')->name('aboutUs.administrators');

Route::get('historicalStatistics/index', 'NavigationController@historicalStatistics')->name('historicalStatistics.index');

Route::get('service/servicePledge', 'NavigationController@servicePledge')->name('service.servicePledge');
Route::get('service/serviceOffered', 'NavigationController@serviceOffered')->name('service.serviceOffered');
Route::get('service/serviceGuide', 'NavigationController@serviceGuide')->name('service.serviceGuide');
Route::get('service/serviceFeeCharges', 'NavigationController@serviceFeeCharges')->name('service.serviceFeeCharges');

Route::get('downloads/applicationForm', 'SubNavController@applicationForm')->name('downloads.applicationForm');
Route::get('downloads/sugarMonitoringSystem', 'SubNavController@sugarMonitoringSystem')->name('downloads.sugarMonitoringSystem');

Route::get('aboutSugarcane/sugarcaneVarities', 'SubNavController@sugarcaneVarities')->name('aboutSugarcane/sugarcaneVarities');

Route::get('governmentWebsite/index', 'FooterNavigationController@governmentWebsite')->name('governmentWebsite.index');

Route::get('departmentOfAgriculture/theSecretary', 'FooterSubNavigationController@theSecretary')->name('departmentOfAgriculture.theSecretary');
Route::get('departmentOfAgriculture/topStories', 'FooterSubNavigationController@topStories')->name('departmentOfAgriculture.topStories');
Route::get('departmentOfAgriculture/guideMap', 'FooterSubNavigationController@guideMap')->name('departmentOfAgriculture.guideMap');

Route::get('gad/annualReport', 'FooterSubNavigationController@annualReport')->name('gad.annualReport');
Route::get('gad/mandate', 'FooterSubNavigationController@mandate')->name('gad.mandate');
Route::get('gad/memorandum', 'FooterSubNavigationController@memorandum')->name('gad.memorandum');
Route::get('gad/lawsAndPolicies', 'FooterSubNavigationController@lawsAndPolicies')->name('gad.lawsAndPolicies');

Route::get('eriaAseanNtm/index', 'FooterNavigationController@eriaAseanNtm')->name('eriaAseanNtm.index');

/** Automatic Weather Station Data **/
Route::get('automaticWeatherStationData/automaticWSD', 'FooterSubNavigationController@automaticWSD')->name('automaticWeatherStationData.automaticWSD');

/** PAGASA Climate Outlook **/
Route::get('pagasaClimateOutlook/pagasaCOL', 'FooterSubNavigationController@pagasaCOL')->name('pagasaClimateOutlook.pagasaCOL');

/** Industry Update **/
Route::get('industryUpdate/sugarSupplyDemand', 'SubNavController@sugarSupplyDemand')->name('industryUpdate.sugarSupplyDemand');
Route::get('industryUpdate/millsitePrices', 'SubNavController@millsitePrices')->name('industryUpdate.millsitePrices');
Route::get('industryUpdate/bioethanolReferencePrice', 'SubNavController@bioethanolReferencePrice')->name('industryUpdate.bioethanolReferencePrice');
Route::get('industryUpdate/metroManilaPrices', 'SubNavController@metroManilaPrices')->name('industryUpdate.metroManilaPrices');
Route::get('industryUpdate/sugarStatistics', 'SubNavController@sugarStatistics')->name('industryUpdate.sugarStatistics');
Route::get('industryUpdate/millingSchedule', 'SubNavController@millingSchedule')->name('industryUpdate.millingSchedule');
Route::get('industryUpdate/vacantPosition', 'SubNavController@vacantPosition')->name('industryUpdate.vacantPosition');
Route::get('industryUpdate/roadmap', 'SubNavController@roadmap')->name('industryUpdate.roadmap');
Route::get('industryUpdate/expiredImportClearance', 'SubNavController@expiredImportClearance')->name('industryUpdate.expiredImportClearance');
Route::get('industryUpdate/cropEstimates', 'SubNavController@cropEstimates')->name('industryUpdate.cropEstimates');
Route::get('industryUpdate/weeklyComparativeProduction', 'SubNavController@weeklyCP')->name('industryUpdate.weeklyComparativeProduction');




/** Policy **/
Route::get('policy/sugarOrder', 'SubNavController@sugarOrder')->name('policy.sugarOrder');
Route::get('policy/circularLetter', 'SubNavController@circularLetter')->name('policy.circularLetter');
Route::get('policy/memorandumOrder', 'SubNavController@memorandumOrder')->name('policy.memorandumOrder');
Route::get('policy/memorandumCircular', 'SubNavController@memorandumCircular')->name('policy.memorandumCircular');
Route::get('policy/molassesOrder', 'SubNavController@molassesOrder')->name('policy.molassesOrder');
Route::get('policy/muscovadoOrder', 'SubNavController@muscovadoOrder')->name('policy.muscovadoOrder');
Route::get('policy/generalAdministrativeOrder', 'SubNavController@generalAdministrativeOrder')->name('policy.generalAdministrativeOrder');
Route::get('policy/officeCircular', 'SubNavController@officeCircular')->name('policy.officeCircular');
Route::get('policy/sugarLaw', 'SubNavController@sugarLaw')->name('policy.sugarLaw');
Route::get('policy/bio_energy', 'SubNavController@bio_energy')->name('policy.bio_energy');

/** SIDA **/
Route::get('sida/sidaUpdates', 'SubNavController@sidaUpdates')->name('sidaUpdates');
Route::get('sida/infographics', 'SubNavController@infographics')->name('infographics');
Route::get('sida/guideLines', 'SubNavController@guideLines')->name('guideLines');
Route::get('sida/laws', 'SubNavController@laws')->name('laws');
Route::get('sida/fundUtilization', 'SubNavController@fundUtilization')->name('fundUtilization');
Route::get('sida/blockFarm', 'SubNavController@blockFarm')->name('sida.blockFarm');
Route::get('sida/socializedCreditProg', 'SubNavController@socializedCreditProg')->name('sida.socializedCreditProg');
Route::get('sida/farmMechanization', 'SubNavController@farmMechanization')->name('sida.farmMechanization');
Route::get('sida/infrastructureProg', 'SubNavController@infrastructureProg')->name('sida.infrastructureProg');
Route::get('sida/RDEProg', 'SubNavController@RDEProg')->name('sida.RDEProg');
Route::get('sida/scholarshipProg', 'SubNavController@scholarshipProg')->name('sida.scholarshipProg');

/**OnlinePayment**/
Route::get('onlinePayment/landbankLinkBliz', 'SubNavController@landbankLinkBliz')->name('onlinePayment.landbankLinkBliz');

/**Stations**/
Route::get('stations/index', 'NavigationController@stations')->name('stations.index');
Route::get('stations/Bacolod/stationBacolod', 'SubNavController@stationBacolod')->name('stations.Bacolod.stationBacolod');
Route::get('stations/LaGranja/stationLaGranja', 'SubNavController@stationLaGranja')->name('stations.LaGranja.stationLaGranja');
Route::get('stations/Pampanga/stationPampanga', 'SubNavController@stationPampanga')->name('stations.Pampanga.stationPampanga');

/**Stakeholders**/
Route::get('stakeholders/sugarTradersInter', 'SubNavController@sugarTradersInter')->name('stakeholders.sugarTradersInter');
Route::get('stakeholders/sugarTradersDom', 'SubNavController@sugarTradersDom')->name('stakeholders.sugarTradersDom');
Route::get('stakeholders/sugarTradersInterFructose', 'SubNavController@sugarTradersInterFructose')->name('stakeholders.sugarTradersInterFructose');
Route::get('stakeholders/molassesTradersInterDom', 'SubNavController@molassesTradersInterDom')->name('stakeholders.molassesTradersInterDom');
Route::get('stakeholders/muscovadoTraders', 'SubNavController@muscovadoTraders')->name('stakeholders.muscovadoTraders');
Route::get('stakeholders/directoryMDDC_MDOS', 'SubNavController@directoryMDDC_MDOS')->name('stakeholders.directoryMDDC_MDOS');
Route::get('stakeholders/directorySugarMills', 'SubNavController@directorySugarMills')->name('stakeholders.directorySugarMills');
Route::get('stakeholders/directorySugarRefineries', 'SubNavController@directorySugarRefineries')->name('stakeholders.directorySugarRefineries');
Route::get('stakeholders/directoryBioethanolProd', 'SubNavController@directoryBioethanolProd')->name('stakeholders.directoryBioethanolProd');
Route::get('stakeholders/directoryMillsAssoPlantersFed', 'SubNavController@directoryMillsAssoPlantersFed')->name('stakeholders.directoryMillsAssoPlantersFed');
Route::get('stakeholders/rawSugarProdbyProducerAffiliation', 'SubNavController@rawSugarProdbyProducerAffiliation')->name('stakeholders.rawSugarProdbyProducerAffiliation');







Route::get('businessOpportunities/sugarTrader', 'SubNavController@sugarTrader')->name('sugarTrader');
Route::get('businessOpportunities/bioethanolProducer', 'SubNavController@bioethanolProducer')->name('bioethanolProducer');
Route::get('businessOpportunities/powerCogeneration', 'SubNavController@powerCogeneration')->name('powerCogeneration');

Route::get('aboutSugarcane/sugarcaneVarieties', 'SubNavController@sugarcaneVarieties')->name('sugarcaneVarieties');
Route::get('aboutSugarcane/researches', 'SubNavController@researches')->name('researches');

/** BID CORNER **/
Route::get('bidCorner/invitationBid', 'SubNavController@invitationBid')->name('invitationBid');
Route::get('bidCorner/supplementalBid', 'SubNavController@supplementalBid')->name('supplementalBid');
Route::get('bidCorner/noticeAward', 'SubNavController@noticeAward')->name('noticeAward');
Route::get('bidCorner/noticeProceed', 'SubNavController@noticeProceed')->name('noticeProceed');
Route::get('bidCorner/philgepsPosting', 'SubNavController@philgepsPosting')->name('philgepsPosting');
Route::get('bidCorner/bidAnnouncement', 'SubNavController@bidAnnouncement')->name('bidAnnouncement');

/*NAFMIP*/
Route::get('nafmip/index', 'SubNavController@nafmip')->name('nafmip');
/*JAPAN NPGA*/
Route::get('japan_npga/index', 'SubNavController@japan_npga')->name('japan_npga');

/*Logo*/
Route::get('citizensCharter/citizensCharter', 'SubNavController@citizensCharter')->name('citizensCharter');
Route::get('ph_tp_seal/index', 'SubNavController@ph_tp_seal')->name('ph_tp_seal');




Route::group(['prefix'=>'dashboard', 'as' => 'dashboard.',
    'middleware' => ['check.user_status', 'last_activity','sidenav_mw']
], function () {
    Route::get('/dtr/my_dtr', 'DTRController@myDtr')->name('dtr.my_dtr');
    Route::get('/dtr/download','DTRController@download')->name('dtr.download');
    Route::get('/dtr/fetch_by_user_and_month', 'DTRController@fetchByUserAndMonth')->name('dtr.fetch_by_user_and_month');
    Route::post('dashboard/changePass','UserController@changePassword')->name('all.changePass');
    Route::post('/change_side_nav','SidenavController@change')->name('sidenav.change');

    Route::get('/mis_requests/my_requests','MisRequestsController@myRequests')->name('mis_requests.my_requests');
    Route::post('/mis_requests/store','MisRequestsController@store')->name('mis_requests.store');
    Route::post('/mis_requests/cancel_request','MisRequestsController@cancelRequest')->name('mis_requests.cancel_request');
    Route::get('/mis_requests/{slug}/print','MisRequestsController@printRequestForm')->name('mis_requests.print_request_form');
    Route::post('/mis_requests/store_img','MisRequestsController@storeImg')->name('mis_requests.store_img');
    Route::get('/mis_requests_status/index_open','MisRequestsStatusController@indexOpen')->name('mis_requests_status.index_open');

});

/** Dashboard **/
Route::group(['prefix'=>'dashboard', 'as' => 'dashboard.',
    'middleware' => ['check.user_status', 'check.user_route', 'last_activity']
], function () {
	/** USER **/
	Route::post('/user/activate/{slug}', 'UserController@activate')->name('user.activate');
	Route::post('/user/deactivate/{slug}', 'UserController@deactivate')->name('user.deactivate');
	Route::get('/user/{slug}/reset_password', 'UserController@resetPassword')->name('user.reset_password');
	Route::patch('/user/reset_password/{slug}', 'UserController@resetPasswordPost')->name('user.reset_password_post');
	Route::get('/user/{slug}/sync_employee', 'UserController@syncEmployee')->name('user.sync_employee');
	Route::patch('/user/sync_employee/{slug}', 'UserController@syncEmployeePost')->name('user.sync_employee_post');
	Route::post('/user/unsync_employee/{slug}', 'UserController@unsyncEmployee')->name('user.unsync_employee');

	Route::resource('user', 'UserController');

	/** DISBURSEMENT VOUCHERS **/
	Route::get('/disbursement_voucher/user_index', 'DisbursementVoucherController@userIndex')->name('disbursement_voucher.user_index');
	Route::get('/disbursement_voucher/print/{slug}/{type}', 'DisbursementVoucherController@print')->name('disbursement_voucher.print');
    Route::get('/disbursement_voucher/print_preview/{slug}', 'DisbursementVoucherController@printPreview')->name('disbursement_voucher.print_preview');
	Route::patch('/disbursement_voucher/set_no/{slug}', 'DisbursementVoucherController@setNo')->name('disbursement_voucher.set_no_post');
	Route::post('/disbursement_voucher/confirm_check/{slug}', 'DisbursementVoucherController@confirmCheck')->name('disbursement_voucher.confirm_check');
	Route::get('/disbursement_voucher/{slug}/save_as', 'DisbursementVoucherController@saveAs')->name('disbursement_voucher.save_as');
	Route::resource('disbursement_voucher', 'DisbursementVoucherController');

	/** PROFILE **/
	Route::get('/profile', 'ProfileController@details')->name('profile.details');
	Route::patch('/profile/update_account_username/{slug}', 'ProfileController@updateAccountUsername')->name('profile.update_account_username');
	Route::patch('/profile/update_account_password/{slug}', 'ProfileController@updateAccountPassword')->name('profile.update_account_password');
	Route::patch('/profile/update_account_color/{slug}', 'ProfileController@updateAccountColor')->name('profile.update_account_color');
	Route::get('/profile/print_pds/{slug}/{page}', 'ProfileController@printPds')->name('profile.print_pds');

	/** MENU **/
	Route::resource('menu', 'MenuController');

    /** NAVIGATION**/
    Route::resource('navigation', 'NavigationController');

    /** SUB NAVIGATION**/
    Route::resource('subnav', 'SubNavController');

    /** NEWS**/
    Route::resource('news', 'NewsController');

    /** MENU **/
    Route::get('/submenu/fetch','SubmenuController@fetch')->name('submenu.fetch');
	Route::resource('submenu','SubmenuController');

	/** SIGNATORIES **/
	Route::resource('signatory', 'SignatoryController');


	/** DEPARTMENTS **/
	Route::resource('department', 'DepartmentController');


	/** DEPARTMENT UNITS **/
	Route::resource('department_unit', 'DepartmentUnitController');


	/** PROJECT CODES **/
	Route::resource('project_code', 'ProjectCodeController');


	/** FUND SOURCE **/
	Route::resource('fund_source', 'FundSourceController');


	/** LEAVE APPLICATION **/
	Route::get('/leave_application/user_index', 'LeaveApplicationController@userIndex')->name('leave_application.user_index');
	Route::get('/leave_application/print/{slug}/{type}', 'LeaveApplicationController@print')->name('leave_application.print');
	Route::get('/leave_application/{slug}/save_as', 'LeaveApplicationController@saveAs')->name('leave_application.save_as');
	Route::resource('leave_application', 'LeaveApplicationController');


	/** EMPLOYEE **/
    Route::get('/employee/edit_bm_uid','EmployeeController@edit_bm_uid')->name('employee.edit_bm_uid');
    Route::post('/employee/update_bm_uid','EmployeeController@update_bm_uid')->name('employee.update_bm_uid');
	Route::get('/employee/print_pds/{slug}/{page}', 'EmployeeController@printPds')->name('employee.print_pds');

	Route::get('/employee/service_record/{slug}', 'EmployeeController@serviceRecord')->name('employee.service_record');
	Route::post('/employee/service_record/store/{slug}', 'EmployeeController@serviceRecordStore')->name('employee.service_record_store');
	Route::put('/employee/service_record/update/{slug}', 'EmployeeController@serviceRecordUpdate')->name('employee.service_record_update');
	Route::delete('/employee/service_record/destroy/{slug}', 'EmployeeController@serviceRecordDestroy')->name('employee.service_record_destroy');
	Route::get('/employee/service_record/print/{slug}', 'EmployeeController@serviceRecordPrint')->name('employee.service_record_print');

	Route::get('/employee/training/{slug}', 'EmployeeController@training')->name('employee.training');
	Route::post('/employee/training/store/{slug}', 'EmployeeController@trainingStore')->name('employee.training_store');
	Route::put('/employee/training/update/{slug}', 'EmployeeController@trainingUpdate')->name('employee.training_update');
	Route::delete('/employee/training/destroy/{slug}', 'EmployeeController@trainingDestroy')->name('employee.training_destroy');
	Route::get('/employee/training/print/{slug}', 'EmployeeController@trainingPrint')->name('employee.training_print');

	Route::get('/employee/matrix/{slug}', 'EmployeeController@matrix')->name('employee.matrix');
	Route::post('/employee/matrix/update/{slug}', 'EmployeeController@matrixUpdate')->name('employee.matrix_update');
	Route::get('/employee/matrix/show/{slug}', 'EmployeeController@matrixShow')->name('employee.matrix_show');
	Route::get('/employee/matrix/print/{slug}', 'EmployeeController@matrixPrint')->name('employee.matrix_print');

	Route::get('/employee/report', 'EmployeeController@report')->name('employee.report');
	Route::get('/employee/report_generate', 'EmployeeController@reportGenerate')->name('employee.report_generate');
	Route::resource('employee', 'EmployeeController');


	/** DOCUMENTS **/
	Route::get('/document/report', 'DocumentController@report')->name('document.report');
	Route::get('/document/report_generate', 'DocumentController@report_generate')->name('document.report_generate');

	Route::get('/document/view_file/{slug}', 'DocumentController@viewFile')->name('document.view_file');
	Route::get('/document/download', 'DocumentController@download')->name('document.download');
	Route::post('/document/download_direct/{slug}', 'DocumentController@downloadDirect')->name('document.download_direct');
	Route::get('/document/dissemination/{slug}', 'DocumentController@dissemination')->name('document.dissemination');
	Route::post('/document/dissemination_post/{slug}', 'DocumentController@disseminationPost')->name('document.dissemination_post');

	Route::get('/document/rename_all', 'DocumentController@rename_all')->name('document.rename_all');

	Route::resource('document', 'DocumentController');

	Route::get('/document/dissemination/print/{slug}', 'DocumentController@print')->name('document.dissemination.print');

	/** Document Folder Codes **/
	Route::get('/document_folder/browse/{folder_code}', 'DocumentFolderController@browse')->name('document_folder.browse');
	Route::resource('document_folder', 'DocumentFolderController');

	/** Email Contacts **/
	Route::resource('email_contact', 'EmailContactController');

	/** Permission Slip **/
	Route::get('/permission_slip/report', 'PermissionSlipController@report')->name('permission_slip.report');
	Route::get('/permission_slip/report_generate', 'PermissionSlipController@reportGenerate')->name('permission_slip.report_generate');
	Route::resource('permission_slip', 'PermissionSlipController');

	/** Leave Card **/
	Route::get('/leave_card/report', 'LeaveCardController@report')->name('leave_card.report');
	Route::get('/leave_card/report_generate', 'LeaveCardController@reportGenerate')->name('leave_card.report_generate');
	Route::resource('leave_card', 'LeaveCardController');

	/** Applicant **/
	Route::post('/applicant/addToShortList/{slug}', 'ApplicantController@addToShortList')->name('applicant.add_to_shortlist');
	Route::post('/applicant/removeToShortList/{slug}', 'ApplicantController@removeToShortList')->name('applicant.remove_to_shortlist');
	Route::get('/applicant/report', 'ApplicantController@report')->name('applicant.report');
	Route::get('/applicant/report_generate', 'ApplicantController@reportGenerate')->name('applicant.report_generate');
	Route::resource('applicant', 'ApplicantController');

	/** Course **/
	Route::resource('course', 'CourseController');

	/** Plantilla **/
	Route::resource('plantilla', 'PlantillaController');

    /** Activity Logs **/
    Route::get('/activity_logs/fetch_properties', 'ActivityLogsController@fetch_properties')->name('activity_logs_fetch_properties');

    /** PAP **/
    Route::resource('pap', 'PapController');

    /** PAP  Parents**/
    Route::resource('pap_parent', 'PapParentController');

    Route::resource('ppmp', 'PPMPController');

    /** DTR **/
    Route::get('/dtr/extract', 'DTRController@extract2')->name('dtr.extract');
    Route::get('/dtr/reconstruct', 'DTRController@reconstruct')->name('dtr.reconstruct');
//    Route::get('/dtr/my_dtr', 'DTRController@myDtr')->name('dtr.my_dtr');
//    Route::post('/dtr/download','DTRController@download')->name('dtr.download');

    Route::resource('dtr', 'DTRController');

    /** DTR **/
    Route::resource('jo_employees','JOEmployeesController');

    /** DTR **/
    Route::get('holidays/fetch_google','HolidayController@fetchGoogleApi')->name('holidays.fetch_google');
    Route::resource('holidays','HolidayController');

    /** Biometric Devices **/
    Route::get('biometric_devices','BiometricDevicesController@index')->name('biometric_devices.index');
    Route::post('biometric_devices/extract','BiometricDevicesController@extract')->name('biometric_devices.extract');
    Route::post('biometric_devices/restart','BiometricDevicesController@restart')->name('biometric_devices.restart');
    Route::get('biometric_devices/attendances','BiometricDevicesController@attendances')->name('biometric_devices.attendances');
    Route::post('biometric_devices/clear_attendance','BiometricDevicesController@clear_attendance')->name('biometric_devices.clear_attendance');

    Route::get('mis_requests','MisRequestsController@index')->name('mis_requests.index');
    Route::get('mis_requests/{slug}/edit','MisRequestsController@edit')->name('mis_requests.edit');
    Route::put('mis_requests/{request_slug}/update','MisRequestsController@update')->name('mis_requests.update');
    Route::resource('mis_requests_status','MisRequestsStatusController');

    /** Application Form**/
    Route::resource('applicationForm', 'ApplicationFormController');

    /** Sugar Monitoring System **/
    Route::resource('sugarMonitoringSystem', 'SugarMonitoringSystemController');

    /** Sugarcane Varieties **/
    Route::resource('sugarcaneVarieties', 'SugarcaneVarietiesController');

    /** Budget Proposal**/
    Route::resource('budget_proposal', 'BudgetProposalController');

    /** Contact Us**/
    Route::resource('contactUs', 'ContactUsController');


    /** INDUSTRY UPDATE**/
    Route::resource('sugarSupplyDemand', 'SugarSupplyDemandController');

    Route::resource('millSitePrices', 'MillSitePricesController');

    Route::resource('bioethanolReferencePrice', 'bioethanolRPController');

    Route::resource('metroManilaPrices', 'MetroManilaPricesController');

    Route::resource('sugarStatistics', 'SugarStatisticsController');

    Route::resource('roadMap', 'roadMapController');

    Route::resource('expiredImportClearance', 'ExpiredImportClearanceController');

    Route::resource('cropEstimatesStatistics', 'CropESController');

    Route::resource('weeklyComparativeProduction', 'WeeklyComparativeProductionController');

    Route::resource('millingSchedule', 'MillingScheduleController');

    Route::resource('vacantPosition', 'VacantPositionController');



    /** POLICY**/
    Route::resource('circularLetter', 'CircularLetterController');

    Route::resource('sugarOrder', 'SugarOrderController');

    Route::resource('memorandumOrder', 'MemorandumOrderController');

    Route::resource('memorandumCircular', 'MemorandumCircularController');

    Route::resource('molassesOrder', 'MolassesOrderController');

    Route::resource('muscovadoOrder', 'MuscovadoOrderController');

    Route::resource('generalAdministrativeOrder', 'GeneralAdministrativeOrderController');

    Route::resource('officeCircular', 'OfficeCircularController');


    /** Sugar Trader**/
    Route::resource('sugarTrader', 'SugarTraderController');

    /** Bioethanol Producer**/
    Route::resource('bioethanolProducer', 'BioethanolProducerController');

    /** Power Cogeneration**/
    Route::resource('powerCogeneration', 'PowerCogenerationController');

    /** Sugar Law**/
    Route::resource('sugarLaw', 'SugarLawController');

    /** Bioenegy**/
    Route::resource('bioEnergy', 'BioEnergyController');



    /** Bid Corner**/
    Route::resource('invitationBid','InvitationBidController');

    Route::resource('supplementalBid','SupplementalBidController');

    Route::resource('noticeAward','NoticeAwardController');

    Route::resource('noticeProceed','NoticeProceedController');

    Route::resource('philgepsPosting','PhilgepsPostingController');

    Route::resource('bidAnnouncement','bidAnnouncementController');

    /** SIDA **/
    Route::resource('sidaGuideLines','SidaGuideLinesController');
    Route::resource('sidaLaws', 'SidaLawsController');
    Route::resource('fundUtilization', 'fundUtilizationController');
    Route::resource('socializedCreditProg', 'socializedCreditProgController');
    Route::resource('farmMechanization', 'FarmMechanizationController');
    Route::resource('scholarshipProg', 'ScholarshipProgController');
    Route::resource('rdeProg', 'RDEController');
    Route::resource('blockFarmEstablishedLozMin', 'BlockFarmEstablishedLozunMindanaoController');
    Route::resource('blockFarmEstablishedVisayas', 'BlockFarmEstablishedVisayasController');
    Route::resource('blockFarmMechSuppVis', 'BlockFarmMechSuppVisController');
    Route::resource('blockFarmHYVNurseriesVis', 'BlockFarmHYVNurseriesVisController');
    Route::resource('SidaInfrasFMR', 'SidaInfrasFMRController');
    Route::resource('sidaInfrasBridge', 'SidaInfrasBridgeController');

    /**BulletinBoard**/
    Route::post('bulletinBoard/{slug}/changeStatus','BulletinBoardController@changeStatus')->name('bulletinBoard.changeStatus');
    Route::resource('bulletinBoard', 'BulletinBoardController');


    /**Stations**/
    Route::resource('stationBcdAnn', 'StationBcdAnnController');
    Route::resource('stationBcdEvent', 'StationBcdEventController');
    Route::resource('stationBcdExtserv', 'StationBcdExtservController');
    Route::resource('stationLaGranjaAnn', 'StationLaGranjaAnnController');
    Route::resource('stationLaGranjaEvent', 'StationLaGranjaEventController');
    Route::resource('stationLaGranjaExtserv', 'StationLaGranjaExtservController');
    Route::resource('stationPampangaAnn', 'StationPampangaAnnController');
    Route::resource('stationPampangaEvent', 'StationPampangaEventController');
    Route::resource('stationPampangaExtserv', 'StationPampangaExtservController');

    /**Stakeholders**/
    Route::resource('stkSugarTradersInter', 'StkSugarTraderInterController');
    Route::resource('stkSugarTradersDom', 'StkSugarTraderDomController');
    Route::resource('stkSugarTradersInterFructose', 'StkSugarTradersInterFructoseController');
    Route::resource('stkMolassesTradersInterDom', 'StkMolassesTradersInterDomController');
    Route::resource('stkMuscovadoTraders', 'StkMuscovadoTradersController');
    Route::resource('stkDirectoryMDDC_MDOS', 'StkDirectoryMDDC_MDOSController');
    Route::resource('stkDirectorySugarMills', 'StkDirectorySugarMillsController');
    Route::resource('stkDirectorySugarRefineries', 'StkDirectorySugarRefineriesController');
    Route::resource('stkDirectoryBioethanolProducers', 'StkDirectoryBioethanolProducersController');
    Route::resource('stkDirectoryMillsAssociation', 'StkDirectoryMillsAssociationController');



});



Route::get('/login', function (){
    return view('auth.index');
});


/** Test Route **/

Route::get('/dashboard/test', function(){

//    $zk = new ZKTeco('10.36.1.23');
//    //ini_set('max_execution_time', 300);
//    $zk->connect();
//    $zk->testVoice();
//    $zk->setTime('2022-01-04 14:59:03');
//
//    $zk->disconnect();

	return ([
	    'slug' => Illuminate\Support\Str::random(16),
        'small' => strtoupper(Illuminate\Support\Str::random(7)),
    ]);

});



Route::resource("testpage", "TestController" );



Route::resource('simplepage', 'SimpleController' );
