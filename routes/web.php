<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\imports\GeneralImportController;
use App\Http\Controllers\incidences\DailyIncidenceController;
use App\Http\Controllers\incidences\DrugIncidenceController;
use App\Http\Controllers\incidences\FirearmIncidenceController;
use App\Http\Controllers\incidences\RegionalIncidencesController;
use App\Http\Controllers\incidences\SgbvIncidenceController;
use App\Http\Controllers\incidences\TrafficIncidenceController;
use App\Http\Controllers\incidences\WildlifeIncidenceController;
use App\Http\Controllers\reports\DorDcirReportController;
use App\Http\Controllers\reports\SpecialReportController;
use App\Http\Controllers\roles\RolesController;
use App\Http\Controllers\settings\CountyController;
use App\Http\Controllers\settings\CrimeCategoryController;
use App\Http\Controllers\settings\CrimeSourceController;
use App\Http\Controllers\settings\DivisionController;
use App\Http\Controllers\settings\IncidentFileController;
use App\Http\Controllers\settings\PoliceBaseController;
use App\Http\Controllers\settings\RegionController;
use App\Http\Controllers\settings\StationController;
use App\Http\Controllers\users\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::group(['middleware' => 'auth'], function(){
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('region', RegionController::class);
Route::resource('county', CountyController::class);
Route::resource('division', DivisionController::class);
Route::resource('station', StationController::class);
Route::post('loadCounty', [StationController::class, 'loadCounty'])->name('loadCounty');
Route::post('loadDivision', [StationController::class, 'loadDivision'])->name('loadDivision');
Route::resource('policebase', PoliceBaseController::class);
Route::resource('crimecategory', CrimeCategoryController::class);
Route::resource('incidentfile', IncidentFileController::class);
Route::resource('crimesource', CrimeSourceController::class);
Route::resource('dailyincidences', DailyIncidenceController::class);
Route::resource('traffic', TrafficIncidenceController::class);
Route::resource('drug', DrugIncidenceController::class);
Route::resource('sgbv', SgbvIncidenceController::class);
Route::get('print-sgbv-report-all/{daterange}', [SgbvIncidenceController::class, 'print_sgbv_report_all'])->name('print-sgbv-report-all');
Route::get('print-sgbv-report-by-county/{county_id}/{daterange}', [SgbvIncidenceController::class, 'print_sgbv_report_by_county'])->name('print-sgbv-report-by-county');





Route::resource('wildlife', WildlifeIncidenceController::class);
Route::resource('firearm', FirearmIncidenceController::class);
Route::resource('generalimport', GeneralImportController::class);
Route::resource('regionalincidence', RegionalIncidencesController::class);
Route::post('getcrimecategory', [IncidentFileController::class, 'get_crime_category'])->name('getcrimecategory');
Route::post('getStationRelated', [DailyIncidenceController::class, 'get_station_related'])->name('getStationRelated');
Route::post('loadRegionCounty', [RegionalIncidencesController::class, 'load_region_county'])->name('loadRegionCounty');
Route::post('getDivisions', [RegionalIncidencesController::class, 'get_divisions'])->name('getDivisions');
Route::get('dor-report', [DorDcirReportController::class, 'dor_report'])->name('dor-report');
Route::get('dcir-report', [DorDcirReportController::class, 'dcir_report'])->name('dcir-report');
Route::post('getDorReport', [DorDcirReportController::class, 'get_dor_Report'])->name('getDorReport');
Route::get('print-dcir-report/{report_numbers}/{is_dcir}', [DorDcirReportController::class, 'print_dcir_report'])->name('print-dcir-report');
Route::post('loadincidentnumber', [DailyIncidenceController::class, 'load_incident_number'])->name('loadincidentnumber');
Route::post('loadRegionDivision', [RegionalIncidencesController::class, 'load_region_division'])->name('loadRegionDivision');
Route::get('special-report', [SpecialReportController::class, 'special_report'])->name('special-report');
Route::get('print-special-report', [SpecialReportController::class, 'print_special_report'])->name('print-special-report');

Route::resource('users', UsersController::class);
Route::get('resetpassword/{id}', [UsersController::class, 'reset_password'])->name('resetpassword');
Route::get('user-account', [UsersController::class, 'user_account'])->name('user-account');
Route::post('user-password-reset', [UsersController::class, 'user_password_reset'])->name('user-password-reset');
Route::resource('roles', RolesController::class);












});
