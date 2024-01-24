<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\MarketComplexController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\priceController;
use App\Http\Controllers\TeanantController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreatePaymentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[UserWebController::class,'webIndexPage'])->name('webIndex');

Route::get('/ShopReport',[UserWebController::class,'ShopReport'])->name('ShopReport');
Route::post('/tenantsPaymentReportPage',[UserWebController::class,'tenantsPaymentReportPage'])->name('tenantsPaymentReportPage');


Route::get('/admin',[AuthController::class,'adminIndex'])->name('adminLogin');
Route::get('/logInCheck',[AuthController::class,'logInCheck'])->name('logInCheck');
Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin.auth'])->group(function () {
    
Route::get('/dashboard',[AdminController::class,'dashboardIndexPage'])->name('dashboard');

Route::get('/landPriceSet',[AdminController::class,'landPriceSetPage'])->name('landPriceSet');
Route::get('/createSetPrice',[AdminController::class,'createSetPricePage'])->name('createSetPrice');
Route::post('/storeSetPrice',[AdminController::class,'storeSetPrice'])->name('storeSetPrice');
Route::get('/truncatePriceSet/{id}',[AdminController::class,'truncatePriceSet'])->name('truncatePriceSet');

Route::get('/commonBill',[AdminController::class,'commonBillIndex'])->name('commonBill');
Route::get('/createCommonBillIndex',[AdminController::class,'createCommonBillIndex'])->name('createCommonBillIndex');
Route::post('/storeCommonBill',[AdminController::class,'storeCommonBill'])->name('storeCommonBill');
Route::get('/viewTMonthlyRpt/{id}',[AdminController::class,'viewTMonthlyRpt'])->name('viewTMonthlyRpt');


Route::get('/UserIndex',[AdminController::class,'UserIndex'])->name('UserIndex');
Route::get('/createUser',[AdminController::class,'createUser'])->name('createUser');
Route::post('/storeUser',[AdminController::class,'storeUser'])->name('storeUser');
Route::get('/viewUser/{id}',[AdminController::class,'viewUser'])->name('viewUser');
Route::get('/editUser/{id}',[AdminController::class,'editUser'])->name('editUser');
Route::post('/UpdateUser',[AdminController::class,'UpdateUser'])->name('UpdateUser');
Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');



Route::get('/OficeIndex',[OfficeController::class,'OficeIndex'])->name('OficeIndex');
Route::get('/createOficeIndex',[OfficeController::class,'createOficeIndex'])->name('createOficeIndex');
Route::post('/storeOffice',[OfficeController::class,'storeOffice'])->name('storeOffice');
Route::get('/editOffice/{id}',[OfficeController::class,'editOffice'])->name('editOffice');
Route::post('/updateOffice',[OfficeController::class,'updateOffice'])->name('updateOffice');
Route::get('/deleteOffice/{id}',[OfficeController::class,'deleteOffice'])->name('deleteOffice');

Route::get('/marketComplexIndex',[MarketComplexController::class,'marketComplexIndex'])->name('marketComplexIndex');
Route::get('/createMcomplexIndex',[MarketComplexController::class,'createMcomplexIndex'])->name('createMcomplexIndex');
Route::post('/storeComplex',[MarketComplexController::class,'storeComplex'])->name('storeComplex');


Route::get('/shopIndex',[shopController::class,'shopIndex'])->name('shopIndex');
Route::get('/createShopIndex',[shopController::class,'createShopIndex'])->name('createShopIndex');
Route::post('/storeShop',[shopController::class,'storeShop'])->name('storeShop');


Route::get('/priceIndex',[priceController::class,'priceIndex'])->name('priceIndex');

Route::get('/createPriceIndex',[priceController::class,'createPriceIndex'])->name('createPriceIndex');
Route::get('/getMarkets',[priceController::class,'getMarkets'])->name('getMarkets');

Route::get('getShops',[priceController::class,'getShops'])->name('getShops');
Route::post('/storePrice',[priceController::class,'storePrice'])->name('storePrice');


// Route::get('getMarkets/{officeId}', 'ShopController@getMarkets')->name('getMarkets');
// Route::get('getShops/{marketCompId}', 'ShopController@getShops')->name('getShops');

 Route::get('/tenantsIndex',[TeanantController::class,'tenantsIndex'])->name('tenantsIndex');
 Route::get('/createTenantsIndex',[TeanantController::class,'createTenantsIndex'])->name('createTenantsIndex');
 Route::post('/storeTenants',[TeanantController::class,'storeTenants'])->name('storeTenants');
 Route::get('/viewTenants/{id}',[TeanantController::class,'viewTenants'])->name('viewTenants');
 Route::get('/editTenants/{id}',[TeanantController::class,'editTenants'])->name('editTenants');
 Route::post('/updateTenants',[TeanantController::class,'updateTenants'])->name('updateTenants');



 Route::get('/tenantsAssignIndex',[TeanantController::class,'tenantsAssignIndex'])->name('tenantsAssignIndex');
 Route::get('/createAssignTenantsIndex',[TeanantController::class,'createAssignTenantsIndex'])->name('createAssignTenantsIndex');
 Route::post('/storeAssignTenants',[TeanantController::class,'storeAssignTenants'])->name('storeAssignTenants');
 Route::get('/viewAssignTenants/{id}',[TeanantController::class,'viewAssignTenants'])->name('viewAssignTenants');
 Route::get('/editAssignTenants/{id}',[TeanantController::class,'editAssignTenants'])->name('editAssignTenants');
 Route::get('/getShopPrice',[TeanantController::class,'getShopPrice'])->name('getShopPrice');
 Route::get('/getMarketComplexes',[TeanantController::class,'getMarketComplexes'])->name('getMarketComplexes');
 Route::get('/getShopNumbers',[TeanantController::class,'getShopNumbers'])->name('getShopNumbers');








 Route::get('/setPayment',[CreatePaymentController::class,'setPaymentPage'])->name('setPayment');
 Route::get('/createSetPayment',[CreatePaymentController::class,'createSetPayment'])->name('createSetPayment');
 Route::post('/storeSetPayment',[CreatePaymentController::class,'storeSetPayment'])->name('storeSetPayment');
//  Route::get('/deletePayMonth/{id}',[CreatePaymentController::class,'deletePayMonth'])->name('deletePayMonth');

Route::get('/TenantsPayment',[CreatePaymentController::class,'TenantsPayment'])->name('TenantsPayment');

});
