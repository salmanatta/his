<?php
use App\Http\Controllers\ProductMaxSalQuantityController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Pharmacy\LogController;
use App\Http\Controllers\pre_configuration\PermissionController;
use App\Http\Controllers\pre_configuration\UserController;
use App\Http\Controllers\pre_configuration\RoleController;
use App\Http\Controllers\pre_configuration\BranchController;
use App\Http\Controllers\pre_configuration\ProductController;
use App\Http\Controllers\pre_configuration\RegionController;
use App\Http\Controllers\Stock;
use App\Models\sales\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProducBonusController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductDiscountController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseInvoice;
use App\Http\Controllers\StockAdjustmentsController;
use App\Http\Controllers\pre_configuration\EmployeeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SalesTargetController;
use App\Http\Controllers\SaleBookingController;

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
    	$data['company'] = \App\Models\Company::all();
        return view('layouts-horizontal',$data); //this is actualy dashboard
    }

});

Route::get('get-data/{id}' , [RegionController::class , 'getData']);
Route::post('save-region' , [RegionController::class , 'saveRegion']);
Route::get('get-master-region/{id}/{emp}',[EmployeeController::class,'getMasterRegion']);

// ===================start restore backup to ====================================
Route::get('backup', function () {
    return view('backup_folder.backup'); //this is actualy dash
});
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
    Route::get('getProduct/{id}', 'App\Http\Controllers\pre_configuration\ProductController@getProduct')->name('getProduct')->middleware('auth');
    Route::get('getSupplierGroup/{id}',[ProductController::class,'get_supplier_group']);
    Route::get('getGroupProduct/{id}',[ProductController::class,'get_group_product']);
    Route::post('infoFind', 'App\Http\Controllers\ProductInfoController@infoFind')->name('infoFind');
    Route::post('discountFind', 'App\Http\Controllers\ProductInfoController@discountFind')->name('discountFind');
    Route::post('store_bonuses', 'App\Http\Controllers\ProductInfoController@store_bonuses')->name('store_bonuses');
    Route::resource('bonus', 'App\Http\Controllers\ProductInfoController')->middleware('auth');
    Route::post('store_max_sale_quantity', 'App\Http\Controllers\ProductInfoController@store_max_sale_quantity')->name('store_max_sale_quantity');
    // ============== End work on product ====================
    Route::resource('max_sale_qtyes', 'App\Http\Controllers\ProductMaxSalQuantityController')->middleware('auth');
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
    Route::get('get-employee-report-to/{id}',[EmployeeController::class,'get_employee_reported_to']);
    Route::post('employee-supplier',[EmployeeController::class,"employee_supplier_store"])->middleware('auth');
    Route::post('employee-supplier-delete',[EmployeeController::class,'employee_supplier_delete'])->middleware('auth');
    Route::post('employee-region',[EmployeeController::class,'employee_region_store'])->middleware('auth');
    Route::resource('customers', 'App\Http\Controllers\CustomerController')->middleware('auth');
    Route::resource('suppliers', 'App\Http\Controllers\SupplierController')->middleware('auth');
    Route::get("/get-all-suppliers",[SupplierController::class,"getAllSupliers"])->middleware('auth');
    Route::resource('designations', 'App\Http\Controllers\DesignationController')->middleware('auth');
    Route::resource('license_types', 'App\Http\Controllers\LicenseTypeController')->middleware('auth');
    Route::resource('licenses', 'App\Http\Controllers\CustomerLicenseController')->middleware('auth');
    Route::resource('branches', 'App\Http\Controllers\pre_configuration\BranchController')->middleware('auth');
    Route::get("get-all-branches",[BranchController::class,"getAllBranches"])->middleware('auth');
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
    Route::get('apply-rule', 'App\Http\Controllers\GeneralController@applyRule')->name('applyRule')->middleware('auth');
    Route::post('applyStore', 'App\Http\Controllers\GeneralController@applyStore')->name('applyStore');
    Route::get('general', 'App\Http\Controllers\GeneralController@defineRule')->name('defineRule')->middleware('auth');
    Route::post('generalBonus', 'App\Http\Controllers\GeneralController@generalBonus')->name('generalBonus');
    Route::post('general-bonus-update/{id}',[GeneralController::class,'general_bonus_update'])->name('general-bonus-update');
    Route::post('create-genernal-bonus',[GeneralController::class,'storeBonus'])->name('create-genernal-bonus')->middleware('auth');
    Route::post('generalDiscount', 'App\Http\Controllers\GeneralController@generalDiscount')->name('generalDiscount');
    Route::post('general-discount-update',[GeneralController::class,'general_discount_update'])->middleware('auth');
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
    Route::get("get-all-sale-products",[SaleInvoiceController::class,"allSaleProducts"]);
    Route::get("get-stock/{id}",[SaleInvoiceController::class,"getStock"]);
    Route::get("common_customer",[CustomerController::class,"commonCustomer"])->middleware('auth');
    Route::get('getBatches', [SaleInvoiceController::class,"getBatches"])->name('getBatches');
    Route::get('getBatcheWiseProduct', 'App\Http\Controllers\SaleInvoiceController@getBatcheWiseProduct')->name('getBatcheWiseProduct');
    Route::get('getProductBonus',[SaleInvoiceController::class,'getProductBonus'])->middleware('auth');
    Route::get('getProductDiscount',[SaleInvoiceController::class,'getProductDiscount'])->middleware('auth');
    Route::get('get-sales-deliveryman/{id}',[SaleInvoiceController::class,'get_sales_deliveryman']);
    Route::get('sale-drawing-summary',[SaleInvoiceController::class,'sale_drawing_summary'])->middleware('auth');
    // ===================== Product Sale Side======
    /*----------   Store Transfer  Resource Route  ----------*/
    Route::get('storetostore',[StoreController::class,'storeToStore'])->name('storeToStore')->middleware("auth");
    Route::get('storetoStoreList', 'App\Http\Controllers\StoreController@storetoStoreList')->name('storetoStoreList')->middleware("auth");
    Route::get('receive-product-transfer',[StoreController::class,'receiveProductTransfer'])->name('receive-product-transfer')->middleware('auth');
    Route::group(['middleware' => ['auth', 'web']], function() {
    Route::get("store-transfer-view/{id}",[StoreController::class,"storeTransferView"]);
    Route::get('approve-store-transfer/{id}',[StoreController::class,'approveStoreTransfer']);
    Route::get('reject-store-transfer/{id}',[StoreController::class,'rejectStoreTransfer']);
    Route::get('receive-store-transfer/{id}',[StoreController::class,'receiveStoreTransfer']);
});
Route::get("get_all_prod",[StoreController::class,"getAllProducts"])->middleware("auth");;
Route::get("get_prod",[StoreController::class,"getProducts"])->middleware("auth");
Route::get('getStock', 'App\Http\Controllers\StoreController@getStock')->name('getStock');
Route::get('productFind', 'App\Http\Controllers\StoreController@productFind')->name('productFind');
Route::get('productGet', 'App\Http\Controllers\StoreController@productGet')->name('productGet');
Route::post('transferProduct', 'App\Http\Controllers\StoreController@transferProduct')->name('transferProduct');
Route::put('transferProductUpdate/{id}', 'App\Http\Controllers\StoreController@transferProductUpdate')->name('transferProduct.Update');
/*----------  End Store Transfer  Resource Route  ----------*/
// ===================== Product Purchase Side ======
Route::resource('purchase_invoices', 'App\Http\Controllers\PurchaseController')->middleware('auth');
Route::get("/purchase/invoice",[PurchaseController::class,"render"])->middleware("auth");
Route::get("/purchase/return",[PurchaseController::class,"pruchaseReturn"])->middleware("auth");
Route::post("/purchase/return",[PurchaseController::class,"pruchaseReturnInsert"])->name("purchase-return")->middleware("auth");
Route::get("view-purchase-invoice/{id}",[PurchaseController::class,"viewPurchaseInvoice"])->middleware("auth");

// ===================== Product Purchase Side======
// ==================Purchase Reports =================
Route::get("purchaseReport",[PurchaseController::class,"purchaseReport"])->name('purchaseReport')->middleware("auth");
Route::get("unstokepurchaseReport",[PurchaseController::class,"unstokePurchaseReport"])->name('unstokepurchaseReport')->middleware("auth");
Route::get("searchPurchaseReport",[PurchaseController::class,"searchPurchaseReport"])->name('searchPurchaseReport')->middleware("auth");
Route::get("searchUnstokePurchaseReport",[PurchaseController::class,"searchUnstokePufrchaseReport"])->name('searchUnstokePurchaseReport')->middleware("auth");
Route::get('purchase_details/{id}',[PurchaseController::class,"purchaseDetail"])->name('purchase_details')->middleware("auth");
Route::get('unstokepurchase_details/{id}',[PurchaseController::class,"unstokePurchaseDetail"])->name('unstokepurchase_details')->middleware("auth");
Route::get('storetoStoreReport', 'App\Http\Controllers\StoreController@storetoStoreReport')->name('storetoStoreReport');//product transfer
//for stock report
Route::get('stock_detail', [StockController::class,"index"])->name('stock_detail')->middleware("auth");
Route::get('getProductBatch',[StockController::class,"getProductBatch"])->name('getProductBatch');
Route::get('updatePurchaseStatus/{id}',[PurchaseController::class,'updatePurchaseStatus'])->name('updatePurchaseStatus');
Route::get('date-wise-stock-view',[ProductController::class,"date_wise_stock_view"])->middleware('auth');
Route::get('date-wise-stock-data',[ProductController::class,'date_wise_stock_data'])->middleware('auth');
Route::get('supplier-wise-purchase',[PurchaseController::class,'suppler_wise_purchase'])->middleware('auth');
Route::get('purchase-adjustment/{id}',[PurchaseController::class,'purchase_adjustment'])->middleware('auth');
// ==================End Reports =================
// ================== Sale Reports ===============
Route::GET("purchaseSale",[SaleInvoiceController::class,"purchaseSale"])->name('purchaseSale')->middleware("auth");
Route::GET("searchSaleReport",[SaleInvoiceController::class,"searchSaleReport"])->name('searchSaleReport')->middleware("auth");
Route::get('sale_details/{id}',[SaleInvoiceController::class,"saleDetail"])->name('sale_details')->middleware("auth");
Route::get('viewSaleInvoice/{id}',[SaleInvoiceController::class,"viewSaleInvoice"])->name('viewSaleInvoice')->middleware('auth');
Route::get('customer.sale',[SaleInvoiceController::class,'customer_wise_sale_view'])->middleware('auth');
Route::get('customer.sale.view',[SaleInvoiceController::class,'customer_wise_sale_view_screen'])->middleware('auth');
// ============ PDF Reports Controller =========
Route::get('customer-wise-sale-pdf',[PDFController::class,'customer_wise_sale_pdf'])->middleware('auth');
Route::get('sale-invoice/{id}',[PDFController::class,'sale_invoice'])->middleware('auth');
Route::get('date-wise-stock-pdf',[PDFController::class,"date_wise_stock_register"])->middleware('auth');
Route::get('purchase-invoice/{id}',[PDFController::class,'purchase_invoice'])->middleware('auth');
Route::get('supplier-wise-purchase-pdf',[PDFController::class,'supplier_wise_purchase_pdf'])->middleware('auth');
Route::get('adjustment-invoice/{id}',[PDFController::class,'adjustment_invoice'])->middleware('auth');
// ============== End Sale Reports ==============
// ============== Stock Adjustment ==============
Route::get('stock-adjustment',[StockAdjustmentsController::class,'stock_adjustment'])->middleware('auth');
Route::post('stock-adjustment',[StockAdjustmentsController::class,'store_stock_adjustment'])->middleware('auth');
Route::get('adjustment-approval',[StockAdjustmentsController::class,'adjustment_approval'])->middleware('auth');
Route::get('stock-adjustment/{id}',[StockAdjustmentsController::class,'view_stock_adjustment'])->middleware('auth');
Route::post('stock-adjustment/{id}',[StockAdjustmentsController::class,'update_stock_adjustment'])->middleware('auth');
// ============== End Stock Adjustment ==========
// ============== Batch Adjustment ============
Route::get('batch-adjustment',[StockAdjustmentsController::class,'batch_adjustment'])->middleware('auth');
Route::post('batch-update/{id}',[StockAdjustmentsController::class,'batch_update'])->middleware('auth');
// ============== End Batch Adjustment ============
// ============= Sales Target ==============
Route::get('sales-target',[SalesTargetController::class,'sales_target'])->middleware('auth');
Route::post('sales-target',[SalesTargetController::class,'sales_target_store'])->middleware('auth');
Route::get('sales-target-grid',[SalesTargetController::class,'sales_target_grid'])->middleware('auth');
// ============= End Sales Target ===========
// ============= Supplier Discount =========
Route::get('supplier-discount-grid',[GeneralController::class,'supplier_discount_grid'])->middleware('auth');
Route::get('supplier-discount',[GeneralController::class,'supplier_discount'])->middleware('auth');
Route::post('supplier-discount-create',[GeneralController::class,'supplier_discount_create'])->middleware('auth');
Route::get('supplier-discount-edit/{id}',[GeneralController::class,'supplier_discount_edit'])->middleware('auth');
Route::patch('supplier-discount-update/{id}',[GeneralController::class,'supplier_discount_update'])->middleware('auth');
// ============= End Supplier Discount =========
// ============== Sale Bookings ==================
Route::resource('sale-booking','App\Http\Controllers\SaleBookingController')->middleware('auth');
Route::get('create-invoice/{id}',[SaleBookingController::class,'createInvoice']);
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'clear cache';
});

Route::get('backuprun',function(){
 $exitCode =Artisan::call('backup:run');
 dd($exitCode);
});










