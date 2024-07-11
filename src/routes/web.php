<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\StandardProduct\ProductController;
use App\Http\Controllers\StandardProduct\AssemblyPartController;
use App\Http\Controllers\StandardProduct\CostEstimationController;
use App\Http\Controllers\StandardProduct\TechnicalDataController;
use App\Http\Controllers\StandardProduct\QuotationController;
use App\Http\Controllers\StandardProduct\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductActionController;
use App\Http\Controllers\Admin\AssemblyPartActionController;
use App\Http\Controllers\Admin\TechnicalDataActionController;
use App\Http\Controllers\Admin\CostEstimateActionController;
use App\Http\Controllers\Admin\QuotationActionController;
use App\Http\Controllers\Admin\ClientActionController;
use App\Http\Controllers\Admin\EnquiryActionController;
use App\Http\Controllers\PdfAccessController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $showModal = Session::get('auth_failed', false);
    $authenticated = Session::has('uid');
    $role = Session::get('role');
    return view('pages/user/home', (compact('showModal', 'authenticated', 'role')));
})->name('home');


Route::get('/authentication/login', function () {
    return view('pages/authentication/login');
})->name('login');
Route::post('/authentication/login', [AuthController::class, 'login']);

Route::get('/made-to-order', function () {
    $key = 'made-to-order-page';
    $minutes = 120;
    if (Cache::has($key)) {
        return Cache::get($key);
    }
    $view = view('pages/user/enquiry-form')->render();
    Cache::put($key, $view, $minutes);
    return $view;
});

Route::post('/made-to-order/post', [EnquiryActionController::class, 'add']);


Route::group(['middleware' => 'DefaultRole'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/standard-product', [ProductController::class, 'view']);
    Route::get('/assembly-part/{group}/{model}', [AssemblyPartController::class, 'view']);
    Route::get('/technical-data/{group}/{model}', [TechnicalDataController::class, 'view']);
    Route::post('/send-product-spec/{group}/{model}', [TechnicalDataController::class, 'sendPDF']);
    Route::get('/cost-estimation', [CostEstimationController::class, 'view']);
    Route::get('/quotation/{group}/{model}', [QuotationController::class, 'viewPreQuotation']);
    Route::group(['middleware' => \Spatie\CookieConsent\CookieConsentMiddleware::class], function () {
        Route::get('/quotation-form/{group}/{model}', [QuotationController::class, 'viewQuotationForm'])->name('form.quotation');
        Route::post('/request-quotation/{group}/{model}', [QuotationController::class, 'addQuotation']);
        Route::get('/quotation-view/{group}/{model}/{clientId}/{quotationId}', [QuotationController::class, 'viewQuotation'])->name('view.quotation');
        Route::put('/quotation-update/{group}/{model}/{clientId}/{quotationId}', [QuotationController::class, 'updateQuotation']);
        Route::get('/quotation-send/{group}/{model}/{clientId}/{quotationId}', [QuotationController::class, 'sendQuotation']);
    });
    Route::get('/enquiry-form', function () {
        $key = 'enquiry-form-page';
        $minutes = 120;
        if (Cache::has($key)) {
            return Cache::get($key);
        }
        $view = view('pages/user/enquiry-form')->render();
        Cache::put($key, $view, $minutes);
        return $view;
    });
    Route::prefix('/admin')->group(function () {
        Route::get('/quotation', [QuotationActionController::class, 'view']);
        Route::get('/quotation-pdf/{key}', [QuotationActionController::class, 'pdfView']);
        Route::post('/add-quotation', [QuotationActionController::class, 'add']);
        Route::put('/update-quotation/{key}', [QuotationActionController::class, 'update']);
        Route::delete('/delete-quotation/{key}', [QuotationActionController::class, 'delete']);
        Route::post('/send-quotation/{key}', [QuotationActionController::class, 'sendPDF']);

        Route::get('/enquiry', [EnquiryActionController::class, 'view'])->name('enquiry.view');
        Route::post('/enquiry-post', [EnquiryActionController::class, 'add']);
        Route::get('/enquiry-edit/{key}', [EnquiryActionController::class, 'edit']);
        Route::put('/enquiry-update/{key}', [EnquiryActionController::class, 'update']);
        Route::delete('/delete-enquiry/{key}', [EnquiryActionController::class, 'delete']);
        Route::post('/enquiry-send/{key}', [EnquiryActionController::class, 'sendPDF']);
        Route::get('/drawing-view/{key}', [EnquiryActionController::class, 'viewDrawing']);
        Route::get('/logout', [AuthController::class, 'logout']);
    });
});
Route::group(['middleware' => 'Admin'], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/product', [ProductActionController::class, 'view']);
        Route::post('/add-product', [ProductActionController::class, 'add']);
        Route::put('/update-product/{key}', [ProductActionController::class, 'update']);
        Route::delete('/delete-product/{key}', [ProductActionController::class, 'delete']);
        Route::get('/product-spec/{key}', [ProductActionController::class, 'viewSpecPDF']);

        Route::get('/assembly-part', [AssemblyPartActionController::class, 'view']);
        Route::post('/add-part', [AssemblyPartActionController::class, 'add']);
        Route::put('/update-part/{key}', [AssemblyPartActionController::class, 'update']);

        Route::get('/client', [ClientActionController::class, 'view']);
        Route::post('/add-client', [ClientActionController::class, 'add']);
        Route::put('/update-client/{key}', [ClientActionController::class, 'update']);
        Route::delete('/delete-client/{key}', [ClientActionController::class, 'delete']);

        Route::get('/technical-data', [TechnicalDataActionController::class, 'view']);
        Route::post('/add-technical', [TechnicalDataActionController::class, 'add']);
        Route::put('/update-technical/{key}', [TechnicalDataActionController::class, 'update']);
        Route::delete('/delete-technical/{key}', [TechnicalDataActionController::class, 'delete']);


        Route::get('/cost-estimation', [CostEstimateActionController::class, 'view']);
        Route::post('/add-cost-estimation', [CostEstimateActionController::class, 'add']);
        Route::put('/update-cost-estimation/{key}', [CostEstimateActionController::class, 'update']);
        Route::delete('/delete-cost-estimation/{key}', [CostEstimateActionController::class, 'delete']);
    });
});

Route::get('/pdf-access/{type}/{key}', function ($type, $key) {
    return view('pages/authentication/pdf-access', compact('key', 'type'));
});
Route::post('/pdf-access/{type}/{key}', [PdfAccessController::class, 'validatePasswordAndGenerateLink']);

Route::get('/pdf/enquiry/{key}/{token}', [PdfAccessController::class, 'viewEnquiryPDF'])->name('enquiry.pdf')->middleware('pdf.access');
Route::get('/pdf/quotation/{key}/{token}', [PdfAccessController::class, 'viewQuotationPDF'])->name('quotation.pdf')->middleware('pdf.access');

Route::get('/clear-cache', function () {
    Cache::flush();
});
