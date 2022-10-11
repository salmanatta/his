<?php

use App\Http\Controllers\Pharmacy\LogController;
use App\Http\Controllers\pre_configuration\PermissionController;
use App\Http\Controllers\pre_configuration\UserController;
use App\Http\Controllers\pre_configuration\RoleController;
use App\Http\Controllers\pre_configuration\BranchController;
use App\Http\Controllers\pre_configuration\ProductController;
use App\Http\Controllers\Stock;
use App\Models\sales\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\RegisterController;
 use App\Http\Controllers\BatchController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProducBonusController;
use App\Http\Controllers\StockController;
// use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductDiscountController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseInvoice;
use App\Http\Controllers\ProductMaxSalQuantityController;
// use App\Http\Controllers\SaleInvoiceController;

// use App\Http\Controllers\PurchaseController;
// use App\Http\Controllers\PurchaseInvoice;
// use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
//use App\Models\sales\Customer;

//use app\Models\sales\Customer;
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

Route::group(['middleware' => ['auth','HasPermission']],function (){
    Route::get("/sale/invoiceReturn",[SaleInvoiceController::class,"invoiceReturn"]);
    Route::get("test-role",[SaleInvoiceController::class,"testRole"]);
    Route::get('/home', [SaleInvoiceController::class, 'index']);
});


// ===================start restore backup to ====================================
//Route::get('test', function () {
//    $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
//    return view('pages.reports.sale.customer-wise-sale',compact('customers'));
//})->name('test');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('login');
    } else {
    	$data['purchase_invoices']  = DB::table('purchase_invoices')->sum('total');
    	$data['sale_invoices']  = DB::table('sale_invoices')->sum('sub_total');
    	$data['quantity']  = DB::table('stocks')->sum('quantity');
        return view('layouts-horizontal',$data); //this is actualy dashboard
    }

});

// ===================start restore backup to ====================================
Route::get('backup', function () {
    return view('backup_folder.backup'); //this is actualy dash
});
// Route::get('import', function () {
//     return view('backup_folder.import'); //this is actualy dash
// });
Route::get('import', 'App\Http\Controllers\BackupController@backupImport')->middleware('auth');

Route::get('list-backups', function () {
    $backups = scandir('backups');
    unset($backups[0]);
    unset($backups[1]);
    $backups = collect($backups)->sortDesc()->values()->all();

    return view('backup_folder.backup_list',compact('backups'));
})->name('list-backups')->middleware('auth');
// ===================restore backup to ====================================
Route::get('/user_register', [RegisterController::class, 'showRegistrationForm']);
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// ==============work on product ====================
Route::get('getProduct/{id}', 'App\Http\Controllers\pre_configuration\ProductController@getProduct')->name('getProduct');
Route::post('infoFind', 'App\Http\Controllers\ProductInfoController@infoFind')->name('infoFind');
Route::post('discountFind', 'App\Http\Controllers\ProductInfoController@discountFind')->name('discountFind');
Route::post('store_bonuses', 'App\Http\Controllers\ProductInfoController@store_bonuses')->name('store_bonuses');
Route::resource('bonus', 'App\Http\Controllers\ProductInfoController')->middleware('auth');

Route::post('store_max_sale_quantity', 'App\Http\Controllers\ProductInfoController@store_max_sale_quantity')->name('store_max_sale_quantity');
// ============== End work on product ====================

Route::resource('max_sale_qtyes', 'App\Http\Controllers\ProductMaxSalQuantityController')->middleware('auth');

// Route::post("discounts/{id}",[ProductDiscountController::class,"update"])->middleware('auth');
Route::resource('discounts', 'App\Http\Controllers\ProducDiscountController')->middleware('auth');
Route::get('getProductDetail', 'App\Http\Controllers\ProductInfoController@getProductDetail')->name('getProductDetail');
/*----------  cities  Resource Route  ----------*/
Route::resource('users', 'App\Http\Controllers\pre_configuration\UserController')->middleware('auth');
Route::resource('cities', 'App\Http\Controllers\pre_configuration\CityController')->middleware('auth');
Route::resource('groups', 'App\Http\Controllers\pre_configuration\GroupController')->middleware('auth');
Route::resource('products', 'App\Http\Controllers\pre_configuration\ProductController')->middleware('auth');
Route::get("/get-all-products",[ProductController::class,"getAllProducts"])->middleware('auth');
Route::get("get_purchase-product",[PurchaseController::class,"getProducts"])->middleware('auth');
Route::resource('regions', 'App\Http\Controllers\pre_configuration\RegionController')->middleware('auth');

Route::get('all_regions_report', 'App\Http\Controllers\pre_configuration\RegionController@all_regions_report')->middleware('auth');

Route::resource('regions', 'App\Http\Controllers\pre_configuration\RegionController')->middleware('auth');
Route::resource('employees', 'App\Http\Controllers\pre_configuration\EmployeeController')->middleware('auth');
Route::resource('customers', 'App\Http\Controllers\CustomerController')->middleware('auth');
Route::resource('suppliers', 'App\Http\Controllers\SupplierController')->middleware('auth');
Route::get("/get-all-suppliers",[SupplierController::class,"getAllSupliers"])->middleware('auth');
Route::resource('designations', 'App\Http\Controllers\DesignationController')->middleware('auth');
Route::resource('license_types', 'App\Http\Controllers\LicenseTypeController')->middleware('auth');
Route::resource('licenses', 'App\Http\Controllers\CustomerLicenseController')->middleware('auth');
Route::resource('branches', 'App\Http\Controllers\pre_configuration\BranchController')->middleware('auth');
Route::get("get-all-branches",[BranchController::class,"getAllBranches"])->middleware('auth');
Route::resource('companies', 'App\Http\Controllers\CompanyController')->middleware('auth');
Route::resource('customer_categories', 'App\Http\Controllers\pre_configuration\CustomerCategoryController')->middleware('auth');
Route::resource('product_categories', 'App\Http\Controllers\pre_configuration\ProductCategoryController')->middleware('auth');
Route::resource('product_types', 'App\Http\Controllers\pre_configuration\ProductTypeController')->middleware('auth');
Route::resource('storetransfers', 'App\Http\Controllers\StoreTransferController')->middleware('auth');
Route::resource('roles', 'App\Http\Controllers\pre_configuration\RoleController')->middleware('auth');
Route::resource('permissions', 'App\Http\Controllers\pre_configuration\PermissionController')->middleware('auth');
Route::resource('companies', 'App\Http\Controllers\CompanyController')->middleware('auth');
Route::resource('product_groups', 'App\Http\Controllers\ProductGroupController')->middleware('auth');
Route::resource('product_bonuses', 'App\Http\Controllers\ProducBonusController')->middleware('auth');

Route::get('getBonus',[ProducBonusController::class,'getBonus'])->name('getBonus');


Route::resource('product_discounts', 'App\Http\Controllers\ProducDiscountController')->middleware('auth');
Route::resource('expenses','App\Http\Controllers\ExpenseController'); //done
Route::resource('expense_categories','App\Http\Controllers\ExpenseCategoryController'); //done
Route::get('/logs', [LogController::class, "render"])->middleware('auth');
Route::get('/get-all-logs', [LogController::class, "getAllLogs"])->middleware('auth');
Route::get('/get-all-users', [UserController::class, "getAllUsers"])->middleware('auth');
Route::get('/attached-permissins/{role_id}', [PermissionController::class, "attachedPermissions"])->middleware('auth');
Route::get('/roles/attached/permissions', [RoleController::class, "rolesAttachedPermission"])->middleware('auth');
/*----------  End cities  Resource Route  ----------*/

// ======================use for define Rules Product Bonus and Discount======
Route::get('apply-rule', 'App\Http\Controllers\GeneralController@applyRule')->name('applyRule');
Route::post('applyStore', 'App\Http\Controllers\GeneralController@applyStore')->name('applyStore');
Route::get('general', 'App\Http\Controllers\GeneralController@defineRule')->name('defineRule');

Route::post('generalBonus', 'App\Http\Controllers\GeneralController@generalBonus')->name('generalBonus');
Route::post('create-genernal-bonus',[GeneralController::class,'storeBonus'])->name('create-genernal-bonus')->middleware('auth');

Route::post('generalDiscount', 'App\Http\Controllers\GeneralController@generalDiscount')->name('generalDiscount');

Route::get('showGeneralBonus',[GeneralController::class,"showGeneralBonus"])->middleware('auth');
Route::get('showGeneralDiscount',[GeneralController::class,"showGeneralDiscount"])->middleware('auth');
Route::post('insertProductBonus',[GeneralController::class,'insertProductBonus'])->middleware('auth');
Route::post('insertProductDiscount',[GeneralController::class,'insertProductDiscount'])->middleware('auth');
Route::get('getCalendarSetup',[GeneralController::class,'getCalendarSetup']);
Route::get('calendar-List',[GeneralController::class,'calendarList'])->name('calendar-List')->middleware('auth');
Route::get('create-Date-Plan',[GeneralController::class,'createDatePlan'])->middleware('auth');
Route::post('create-Date-Plan',[GeneralController::class,'insert_date_plan'])->middleware('auth');
Route::get('calendar.setup/{id}',[GeneralController::class,'edit_calendar'])->middleware('auth');
Route::post('calendar.setup/{id}',[GeneralController::class,'update_calendar'])->middleware('auth');
Route::get('calendar.implement.list',[GeneralController::class,'calendar_implement_list'])->name('calendar.implement.list')->middleware('auth');
Route::get('calendar.implement/{id}',[GeneralController::class,'calendar_implement'])->middleware('auth');
Route::post('calendar.implement/{id}',[GeneralController::class,'update_calendar_implement'])->middleware('auth');

Route::get('pro',[GeneralController::class,'generate_pdf']);

// ======================End use for define Rules Product Bonus and Discount======
// ===================== Product Sale Side======
Route::resource('sale_invoices', 'App\Http\Controllers\SaleInvoiceController')->middleware('auth');
Route::get("/sale/invoice",[SaleInvoiceController::class,"render"])->middleware("auth");
//Route::get("/sale/invoiceReturn",[SaleInvoiceController::class,"invoiceReturn"])->middleware("auth");
Route::get("get-all-sale-products",[SaleInvoiceController::class,"allSaleProducts"]);
Route::get("get-stock/{id}",[SaleInvoiceController::class,"getStock"]);
Route::get("common_customer",[CustomerController::class,"commonCustomer"])->middleware('auth');
Route::get('getBatches', 'App\Http\Controllers\SaleInvoiceController@getBatches')->name('getBatches');
Route::get('getBatcheWiseProduct', 'App\Http\Controllers\SaleInvoiceController@getBatcheWiseProduct')->name('getBatcheWiseProduct');
Route::get('getProductBonus',[SaleInvoiceController::class,'getProductBonus'])->middleware('auth');

Route::get('getProductDiscount',[SaleInvoiceController::class,'getProductDiscount'])->middleware('auth');

// ===================== Product Sale Side======
/*----------   Store Transfer  Resource Route  ----------*/
Route::get('storetostore', 'App\Http\Controllers\StoreController@storeToStore')->name('storeToStore')->middleware("auth");
Route::get('storetoStoreList', 'App\Http\Controllers\StoreController@storetoStoreList')->name('storetoStoreList')->middleware("auth");
Route::get('receive-product-transfer',[StoreController::class,'receiveProductTransfer'])->name('receive-product-transfer')->middleware('auth');


Route::group(['middleware' => ['auth', 'web']], function() {
    Route::get("store-transfer-view/{id}",[StoreController::class,"storeTransferView"]);
    Route::get('approve-store-transfer/{id}',[StoreController::class,'approveStoreTransfer']);
    Route::get('reject-store-transfer/{id}',[StoreController::class,'rejectStoreTransfer']);
    Route::get('receive-store-transfer/{id}',[StoreController::class,'receiveStoreTransfer']);
  });

// Route::group(['middleware' => ['role:superadmin']],function (){
//     Route::get("test-role",[SaleInvoiceController::class,"testRole"]);

// });


Route::get("get_all_prod",[StoreController::class,"getAllProducts"])->middleware("auth");;
Route::get("get_prod",[StoreController::class,"getProducts"])->middleware("auth");
Route::get('getStock', 'App\Http\Controllers\StoreController@getStock')->name('getStock');
Route::get('productFind', 'App\Http\Controllers\StoreController@productFind')->name('productFind');
Route::get('productGet', 'App\Http\Controllers\StoreController@productGet')->name('productGet');
Route::post('transferProduct', 'App\Http\Controllers\StoreController@transferProduct')->name('transferProduct');
Route::put('transferProductUpdate/{id}', 'App\Http\Controllers\StoreController@transferProductUpdate')->name('transferProduct.Update');
/*----------  End Store Transfer  Resource Route  ----------*/


// ===================== Product Purchase Side======
Route::resource('purchase_invoices', 'App\Http\Controllers\PurchaseController')->middleware('auth');
Route::get("/purchase/invoice",[PurchaseController::class,"render"])->middleware("auth");
Route::get("/purchase/return",[PurchaseController::class,"pruchaseReturn"])->middleware("auth");
Route::post("/purchase/return",[PurchaseController::class,"pruchaseReturnInsert"])->name("purchase-return")->middleware("auth");
Route::get("view-purchase-invoice/{id}",[PurchaseController::class,"viewPurchaseInvoice"])->middleware("auth");

// ===================== Product Purchase Side======

// Route::resource('purchase_invoices', 'App\Http\Controllers\PurchaseController')->middleware('auth');
// Route::GET("/purchase/invoice",[PurchaseController::class,"render"])->middleware("auth");

// ==================Purchase Reports =================
Route::get("purchaseReport",[PurchaseController::class,"purchaseReport"])->name('purchaseReport')->middleware("auth");
Route::get("unstokepurchaseReport",[PurchaseController::class,"unstokePurchaseReport"])->name('unstokepurchaseReport')->middleware("auth");

Route::get("searchPurchaseReport",[PurchaseController::class,"searchPurchaseReport"])->name('searchPurchaseReport')->middleware("auth");
Route::get("searchUnstokePurchaseReport",[PurchaseController::class,"searchUnstokePufrchaseReport"])->name('searchUnstokePurchaseReport')->middleware("auth");
Route::get('purchase_details/{id}',[PurchaseController::class,"purchaseDetail"])->name('purchase_details')->middleware("auth");
Route::get('unstokepurchase_details/{id}',[PurchaseController::class,"unstokePurchaseDetail"])->name('unstokepurchase_details')->middleware("auth");
Route::get('storetoStoreReport', 'App\Http\Controllers\StoreController@storetoStoreReport')->name('storetoStoreReport');//product transfer
//for stock report
Route::get('stock_detail', 'App\Http\Controllers\StockController@index')->name('stock_detail')->middleware("auth");
Route::get('getProductBatch',[StockController::class,"getProductBatch"])->name('getProductBatch');
Route::get('stock-report',[PurchaseController::class,"currentStockReport"])->name('item_report');
Route::get('updatePurchaseStatus/{id}',[PurchaseController::class,'updatePurchaseStatus'])->name('updatePurchaseStatus');
Route::get('date.wise.stock.view',[PurchaseController::class,'date_wise_stock_view'])->middleware('auth');
// ==================End Reports =================
// ================== Sale Reports ===============
Route::GET("purchaseSale",[SaleInvoiceController::class,"purchaseSale"])->name('purchaseSale')->middleware("auth");
Route::GET("searchSaleReport",[SaleInvoiceController::class,"searchSaleReport"])->name('searchSaleReport')->middleware("auth");
Route::get('sale_details/{id}',[SaleInvoiceController::class,"saleDetail"])->name('sale_details')->middleware("auth");
Route::get('viewSaleInvoice/{id}',[SaleInvoiceController::class,"viewSaleInvoice"])->name('viewSaleInvoice')->middleware('auth');
Route::get('customer.sale',[SaleInvoiceController::class,'customer_wise_sale_view'])->middleware('auth');
Route::get('customer.sale.view',[SaleInvoiceController::class,'customer_wise_sale_view_screen'])->middleware('auth');
Route::get('customer-wise-sale-pdf',[SaleInvoiceController::class,'customer_wise_sale_pdf'])->name('customer.wise.sale.pdf')->middleware('auth');
Route::get('sale-invoice/{id}',[SaleInvoiceController::class,'sale_invoice'])->middleware('auth');
// ============== End Sale Reports ==============


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'clear cache';
});

Route::get('backuprun',function(){
 $exitCode =Artisan::call('backup:run');
 dd($exitCode);
// return back();
});

// Route::get('/database-backup', function () {
//     \Artisan::call('backup:run');
//     return 'backup success Iside StorageFolder';
// });
// Route::get('/database-import', function () {
    // return 'database:import db-data-backup-'.date('Y-m-d').'.sql';
    // try {
    //     \Artisan::call('database:import db-data-backup-'.date('Y-m-d').'.sql');
    //     return 'import success Iside StorageFolder';
    // } catch (\Exception $e) {
    //     dd($e->getMessage());
    // }
// });









