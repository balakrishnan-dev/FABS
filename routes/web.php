<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


// routes/web.php
use App\Http\Controllers\PortController;

Route::resource('ports', PortController::class);
Route::get('get-ports-data', [PortController::class, 'getPorts'])->name('ports.data');
Route::get('ports/{id}/edit', [PortController::class, 'edit'])->name('ports.edit');
Route::put('ports/{id}', [PortController::class, 'update'])->name('ports.update');
Route::delete('/ports/{port}', [PortController::class, 'destroy'])->name('ports.destroy');

use App\Http\Controllers\CountryController;

Route::resource('countries', CountryController::class);
Route::get('get-countries-data', [CountryController::class, 'getCountries'])->name('countries.data');
Route::get('countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
Route::put('countries/{id}', [CountryController::class, 'update'])->name('countries.update');
Route::delete('countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');


// routes/web.php
use App\Http\Controllers\GstConfigMasterController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('gst-config-masters', GstConfigMasterController::class);
Route::get('get-config-data', [GstConfigMasterController::class, 'getGsts'])->name('gst-config-masters.data');
Route::get('gst-config-masters/{id}/edit', [GstConfigMasterController::class, 'edit'])->name('gst-config-masters.edit');
Route::put('gst-config-masters/{id}', [GstConfigMasterController::class, 'update'])->name('gst-config-masters.update');
Route::delete('gst-config-masters/{id}', [GstConfigMasterController::class, 'destroy'])->name('gst-config-masters.destroy');
Route::post('gst-config-masters/update-status/{id}', [GstConfigMasterController::class, 'updateStatus'])->name('gst-config-masters.update-status');

// routes/web.php
use App\Http\Controllers\ProcessController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('process', ProcessController::class);
Route::get('process-data', [ProcessController::class, 'getProcess'])->name('process.data');
Route::get('process/{id}/edit', [ProcessController::class, 'edit'])->name('process.edit');
Route::put('process/{id}', [ProcessController::class, 'update'])->name('process.update');
Route::delete('process/{id}', [ProcessController::class, 'destroy'])->name('process.destroy');


// routes/web.php
use App\Http\Controllers\ColourController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('colours', ColourController::class);
Route::get('colours-data', [ColourController::class, 'getColours'])->name('colours.data');
Route::get('colours/{id}/edit', [ColourController::class, 'edit'])->name('colours.edit');
Route::put('colours/{id}', [ColourController::class, 'update'])->name('colours.update');
Route::delete('colours/{id}', [ColourController::class, 'destroy'])->name('colours.destroy');



// routes/web.php
use App\Http\Controllers\NarrationController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('narrations', NarrationController::class);
Route::get('narrations-data', [NarrationController::class, 'getNarrations'])->name('narrations.data');
Route::get('narrations/{id}/edit', [NarrationController::class, 'edit'])->name('narrations.edit');
Route::put('narrations/{id}', [NarrationController::class, 'update'])->name('narrations.update');
Route::delete('narrations/{id}', [NarrationController::class, 'destroy'])->name('narrations.destroy');



// routes/web.php
use App\Http\Controllers\DesignController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('designs', DesignController::class);
Route::get('designs-data', [DesignController::class, 'getDesigns'])->name('designs.data');
Route::get('designs/{id}/edit', [DesignController::class, 'edit'])->name('designs.edit');
Route::put('designs/{id}', [DesignController::class, 'update'])->name('designs.update');
Route::delete('designs/{id}', [DesignController::class, 'destroy'])->name('designs.destroy');


use App\Http\Controllers\PaymentController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('payments', PaymentController::class);
Route::get('payments-data', [PaymentController::class, 'getPayments'])->name('payments.data');
Route::get('payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');




use App\Http\Controllers\DyerOpeningController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('dyer_openings', DyerOpeningController::class);
Route::get('dyer_openings-data', [DyerOpeningController::class, 'getDyerOpenings'])->name('dyer_openings.data');
Route::get('dyer_openings/{id}/edit', [DyerOpeningController::class, 'edit'])->name('dyer_openings.edit');
Route::put('dyer_openings/{id}', [DyerOpeningController::class, 'update'])->name('dyer_openings.update');
Route::delete('dyer_openings/{id}', [DyerOpeningController::class, 'destroy'])->name('dyer_openings.destroy');


// use App\Http\Controllers\GstConfigurationController;

// Route::resource('gst_configurations', GstConfigurationController::class);
// Route::get('/gst-configurations/data', [GstConfigurationController::class, 'getGsts'])->name('gst_configurations.data');
// Route::get('gst_configurations/{id}/edit', [GstConfigurationController::class, 'edit'])->name('gst_configurations.edit');
// Route::put('gst_configurations/{id}', [GstConfigurationController::class, 'update'])->name('gst_configurations.update');
// Route::delete('/gst-configurations/{id}', [GstConfigurationController::class, 'destroy'])->name('gst_configurations.destroy');
// Route::post('/gst-configurations/update-status/{id}', [GstConfigurationController::class, 'updateStatus']);



use App\Http\Controllers\CompanyController;

Route::resource('companies', CompanyController::class);
Route::get('get-companies-data', [CompanyController::class, 'getCompanies'])->name('companies.data');
Route::get('companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');





use App\Http\Controllers\WeavingMasterController;
Route::resource('weaving-masters', WeavingMasterController::class);
Route::get('get-weaving-data', [WeavingMasterController::class, 'getData'])->name('weaving-masters.data');
Route::get('weaving-masters/{id}/edit', [WeavingMasterController::class, 'edit'])->name('weaving-masters.edit');
Route::put('weaving-masters/{id}', [WeavingMasterController::class, 'update'])->name('weaving-masters.update');
Route::delete('/weaving-masters/{company}', [WeavingMasterController::class, 'destroy'])->name('weaving-masters.destroy');


use App\Http\Controllers\LoomTypeController;

Route::resource('loom-types', LoomTypeController::class);
Route::get('get-loom-types-data', [LoomTypeController::class, 'getData'])->name('loom-types.data');
Route::get('loom-types/{id}/edit', [LoomTypeController::class, 'edit'])->name('loom-types.edit');
Route::put('loom-types/{id}', [LoomTypeController::class, 'update'])->name('loom-types.update');
Route::delete('loom-types/{loom_type}', [LoomTypeController::class, 'destroy'])->name('loom-types.destroy');



use App\Http\Controllers\BuyerController;

Route::resource('buyers', BuyerController::class);
Route::get('get-buyers-data', [BuyerController::class, 'getBuyers'])->name('buyers.data');
Route::get('buyers/{id}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
Route::put('buyers/{id}', [BuyerController::class, 'update'])->name('buyers.update');
Route::delete('buyers/{loom_type}', [BuyerController::class, 'destroy'])->name('buyers.destroy');


use App\Http\Controllers\YearMasterController;

// Resource Routes for CRUD (index, store, update, destroy)
Route::resource('year', YearMasterController::class);
Route::get('year-data', [YearMasterController::class, 'getYear'])->name('year.data');
Route::get('year/{id}/edit', [YearMasterController::class, 'edit'])->name('year.edit');
Route::put('year/{id}', [YearMasterController::class, 'update'])->name('year.update');
Route::delete('year/{id}', [YearMasterController::class, 'destroy'])->name('year.destroy');





use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\AuthController;


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.submit');
Route::post('register', [AuthController::class, 'register']);




Route::resource('roles', RoleController::class);
Route::get('get-roles-data', [RoleController::class, 'getRoles'])->name('roles.data');
Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


    


Route::resource('permissions', PermissionController::class);
Route::get('get-permissions-data', [PermissionController::class, 'getPermissions'])->name('permissions.data');
Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('permissions/{role}', [PermissionController::class, 'destroy'])->name('permissions.destroy');





Route::resource('users', UserController::class);
Route::get('get-users-data', [UserController::class, 'getUsers'])->name('users.getUsers');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');




Route::get('system-configuration', [SystemConfigurationController::class, 'index'])->name('system.config.index');
Route::post('year-config', [SystemConfigurationController::class, 'storeYear'])->name('system.config.year.store');
Route::post('option-setting', [SystemConfigurationController::class, 'storeOption'])->name('system.config.option.store');
Route::post('adjustment-entry', [SystemConfigurationController::class, 'storeAdjustment'])->name('system.config.adjustment.store');
Route::post('w-adjustment', [SystemConfigurationController::class, 'storeWAdjustment'])->name('system.config.wadjustment.store');



use App\Http\Controllers\YearCreationController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AdjustmentEntryController;


Route::resource('year_creations', YearCreationController::class);
Route::get('get-year-data', [YearCreationController::class, 'getyear_creations'])->name('year_creations.data');
Route::get('year_creations/{id}/edit', [YearCreationController::class, 'edit'])->name('year_creations.edit');
Route::put('year_creations/{id}', [YearCreationController::class, 'update'])->name('year_creations.update');
Route::delete('year_creations/{role}', [YearCreationController::class, 'destroy'])->name('year_creations.destroy');





Route::resource('options', OptionController::class);
Route::get('get-options-data', [OptionController::class, 'getoptions'])->name('options.data');
Route::get('options/{id}/edit', [OptionController::class, 'edit'])->name('options.edit');
Route::put('options/{id}', [OptionController::class, 'update'])->name('options.update');
Route::delete('options/{role}', [OptionController::class, 'destroy'])->name('options.destroy');




Route::resource('adjustments', AdjustmentEntryController::class);
Route::get('get-adjustment_entries-data', [AdjustmentEntryController::class, 'getAdjustments'])->name('adjustments.data');
Route::get('adjustments/{id}/edit', [AdjustmentEntryController::class, 'edit'])->name('adjustments.edit');
Route::put('adjustments/{id}', [AdjustmentEntryController::class, 'update'])->name('adjustments.update');
Route::delete('adjustments/{role}', [AdjustmentEntryController::class, 'destroy'])->name('adjustments.destroy');




use App\Http\Controllers\LedgerController;
use App\Http\Controllers\WAdjustmentEntryController;

Route::resource('ledgers', LedgerController::class);

Route::get('get-ledgers-data', [LedgerController::class, 'getLedgers'])->name('ledgers.data');
Route::get('ledgers/{id}/edit', [LedgerController::class, 'edit'])->name('ledgers.edit');
Route::put('ledgers/{id}', [LedgerController::class, 'update'])->name('ledgers.update');
Route::delete('ledgers/{role}', [LedgerController::class, 'destroy'])->name('ledgers.destroy');


Route::resource('w-adjustment', WAdjustmentEntryController::class);

Route::get('get-w-adjustment-data', [WAdjustmentEntryController::class, 'getwAdjustments'])->name('w-adjustment.data');
Route::post('w-adjustment/filter', [WAdjustmentEntryController::class, 'filter'])->name('w-adjustment.filter');


use App\Http\Controllers\GroupMasterController;

Route::resource('group-masters', GroupMasterController::class);
Route::get('group-masters-data', [GroupMasterController::class, 'getData'])->name('group-masters.data');
Route::put('/group-masters/status/{id}', [GroupMasterController::class, 'updateStatus'])->name('group-masters.update-status');


use App\Http\Controllers\LedgerMasterController;

Route::prefix('ledger-masters')->group(function () {
    Route::get('/', [LedgerMasterController::class, 'index'])->name('ledger-masters.index');
    Route::get('/data', [LedgerMasterController::class, 'getData'])->name('ledger-masters.data');
    Route::get('/create', [LedgerMasterController::class, 'create'])->name('ledger-masters.create');
    Route::post('/', [LedgerMasterController::class, 'store'])->name('ledger-masters.store');
    Route::get('/edit/{id}', [LedgerMasterController::class, 'edit'])->name('ledger-masters.edit');
    Route::put('/{ledger_master}', [LedgerMasterController::class, 'update'])->name('ledger-masters.update');
    Route::delete('/{ledger_master}', [LedgerMasterController::class, 'destroy'])->name('ledger-masters.destroy');
    Route::put('/status/{id}', [LedgerMasterController::class, 'updateStatus'])->name('ledger-masters.status');
});



use App\Http\Controllers\BankMasterController;

Route::resource('bank-masters', BankMasterController::class);
Route::get('bank-masters-data', [BankMasterController::class, 'getData'])->name('bank-masters.data');


use App\Http\Controllers\TdsMasterController;

Route::resource('tds-masters', TdsMasterController::class);
Route::get('get-tds-data', [TdsMasterController::class, 'getTDS'])->name('tds-masters.data');
Route::get('tds-masters/{id}/edit', [TdsMasterController::class, 'edit'])->name('tds-masters.edit');
Route::put('tds-masters/{id}', [TdsMasterController::class, 'update'])->name('tds-masters.update');
Route::delete('tds-masters/{tds}', [TdsMasterController::class, 'destroy'])->name('tds-masters.destroy');


use App\Http\Controllers\SizingMasterController;

Route::resource('sizing-masters', SizingMasterController::class);
Route::get('get-sizing-data', [SizingMasterController::class, 'getSizing'])->name('sizing-masters.data');
Route::get('sizing-masters/{id}/edit', [SizingMasterController::class, 'edit'])->name('sizing-masters.edit');
Route::put('sizing-masters/{id}', [SizingMasterController::class, 'update'])->name('sizing-masters.update');
Route::delete('sizing-masters/{sizing}', [SizingMasterController::class, 'destroy'])->name('sizing-masters.destroy');



use App\Http\Controllers\GreyYarnController;

Route::resource('grey_yarns', GreyYarnController::class);
Route::get('grey-yarns-data', [GreyYarnController::class, 'getGreyYarns'])->name('grey_yarns.data');
Route::get('grey_yarns/{id}/edit', [GreyYarnController::class, 'edit'])->name('grey_yarns.edit');
Route::put('grey_yarns/{id}', [GreyYarnController::class, 'update'])->name('grey_yarns.update');
Route::delete('grey_yarns/{grey_yarns}', [GreyYarnController::class, 'destroy'])->name('grey_yarns.destroy');



use App\Http\Controllers\YarnDisplayController;

Route::get('/yarns_displays', [YarnDisplayController::class, 'index'])->name('yarns_displays.index');
Route::get('/yarns_displays/data', [YarnDisplayController::class, 'getData'])->name('yarns_displays.data');


use App\Http\Controllers\PackingSlipController;

Route::get('packing_slips', [PackingSlipController::class, 'index'])->name('packing_slips.index');
Route::get('packing_slips/create', [PackingSlipController::class, 'create'])->name('packing_slips.create');
Route::get('packing_slips/data', [PackingSlipController::class, 'getData'])->name('packing_slips.data');
Route::post('packing_slips', [PackingSlipController::class, 'store'])->name('packing_slips.store');
Route::get('packing_slips/{packingSlip}/edit', [PackingSlipController::class, 'edit'])->name('packing_slips.edit');
Route::put('packing_slips/{packingSlip}', [PackingSlipController::class, 'update'])->name('packing_slips.update');
Route::delete('packing_slips/{packingSlip}', [PackingSlipController::class, 'destroy'])->name('packing_slips.destroy');




use App\Http\Controllers\LorryController;

Route::get('lorries_masters', [LorryController::class, 'index'])->name('lorries_masters.index');
Route::get('lorries_masters/create', [LorryController::class, 'create'])->name('lorries_masters.create');
Route::get('lorries_masters/data', [LorryController::class, 'getData'])->name('lorries_masters.data');
Route::post('lorries_masters', [LorryController::class, 'store'])->name('lorries_masters.store');
Route::get('lorries_masters/{lorry}/edit', [LorryController::class, 'edit'])->name('lorries_masters.edit');
Route::put('lorries_masters/{lorry}', [LorryController::class, 'update'])->name('lorries_masters.update');
Route::delete('lorries_masters/{lorry}', [LorryController::class, 'destroy'])->name('lorries_masters.destroy');




use App\Http\Controllers\LorryInvoiceDisplayController;

Route::get('lorries_invoice_display', [LorryInvoiceDisplayController::class, 'index'])->name('lorries_invoice_display.index');
Route::get('lorries_invoice_display/create', [LorryInvoiceDisplayController::class, 'create'])->name('lorries_invoice_display.create');
Route::get('lorries-invoice-display-data', [LorryInvoiceDisplayController::class, 'getData'])->name('lorries_invoice_display.data');
Route::post('lorries_invoice_display', [LorryInvoiceDisplayController::class, 'store'])->name('lorries_invoice_display.store');
Route::get('lorries_invoice_display/{lorry}/edit', [LorryInvoiceDisplayController::class, 'edit'])->name('lorries_invoice_display.edit');
Route::put('lorries_invoice_display/{lorry}', [LorryInvoiceDisplayController::class, 'update'])->name('lorries_invoice_display.update');
Route::delete('lorries_invoice_display/{lorry}', [LorryInvoiceDisplayController::class, 'destroy'])->name('lorries_invoice_display.destroy');





use App\Http\Controllers\DesignChartController;

Route::resource('design_chart',DesignChartController::Class);
Route::get('/get-design-data/{id}', [App\Http\Controllers\DesignChartController::class, 'show']);
Route::get('/get-design-by-clno/{cl_no}', [DesignChartController::class, 'getByClNo']);
Route::post('/store-recent-design', [DesignChartController::class, 'storeRecentDesign']);

Route::post('/get-design-details', [DesignChartController::class, 'getDesignDetails'])->name('design_chart.getDesignDetails');
