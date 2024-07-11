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

Route::get('/', function () {
    return view('pages/user/home');
});
Route::get('/standard-product', [ProductController::class, 'view']);
Route::get('/assembly-part/{group}/{model}', [AssemblyPartController::class, 'view']);
Route::get('/technical-data/{group}/{model}', [TechnicalDataController::class, 'view']);
Route::get('/cost-estimation', [CostEstimationController::class, 'view']);
Route::get('/quotation/{group}/{model}', [QuotationController::class, 'view']);

Route::group(['middleware' => \Spatie\CookieConsent\CookieConsentMiddleware::class], function () {
    Route::get('/client-form/{group}/{model}', [ClientController::class, 'view']);
    Route::post('/client-add/{model}', [ClientController::class, 'add']);
    Route::get('/client-edit-form/{model}/{postKey}', [ClientController::class, 'edit']);
    Route::put('/client-update/{model}/{postKey}', [ClientController::class, 'update']);
    Route::get('/quotation-request-confirm/{model}/{postKey}', [QuotationController::class, 'viewRequest'])->name('view.request');
});

Route::get('/authentication/login', function () {
    return view('pages/authentication/login');
})->name('login');
Route::post('/authentication/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'firebase'], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/product', [ProductActionController::class, 'view']);
        Route::post('/add-product', [ProductActionController::class, 'add']);
        Route::put('/update-product/{key}', [ProductActionController::class, 'update']);
        Route::delete('/delete-product/{key}', [ProductActionController::class, 'delete']);

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

        Route::get('/quotation', [QuotationActionController::class, 'view']);
        Route::get('/quotation-pdf/{key}', [QuotationActionController::class, 'pdfView']);
        Route::post('/add-quotation', [QuotationActionController::class, 'add']);
        Route::get('/request-quotation/{model}/{postKey}', [QuotationActionController::class, 'request']);
        Route::put('/update-quotation/{key}', [QuotationActionController::class, 'update']);
        Route::delete('/delete-quotation/{key}', [QuotationActionController::class, 'delete']);
        Route::post('/send-quotation/{key}', [QuotationActionController::class, 'sendPDF']);

        Route::get('/enquiry', [EnquiryActionController::class, 'view'])->name('enquiry.view');
        Route::get('/made-to-order', function () {
            return view('pages/admin/enquiry/add');
        });
        Route::post('/enquiry-post', [EnquiryActionController::class, 'add']);
        Route::get('/enquiry-edit/{key}', [EnquiryActionController::class, 'edit']);
        Route::put('/enquiry-update/{key}', [EnquiryActionController::class, 'update']);
        Route::delete('/delete-enquiry/{key}', [EnquiryActionController::class, 'delete']);
        Route::post('/enquiry-send/{key}', [EnquiryActionController::class, 'sendPDF']);
        Route::get('/drawing-view/{key}',[EnquiryActionController::class, 'viewDrawing']);

        Route::get('/cost-estimation', [CostEstimateActionController::class, 'view']);
        Route::post('/add-cost-estimation', [CostEstimateActionController::class, 'add']);
        Route::put('/update-cost-estimation/{key}', [CostEstimateActionController::class, 'update']);
        Route::delete('/delete-cost-estimation/{key}', [CostEstimateActionController::class, 'delete']);

        Route::get('/logout', [AuthController::class, 'logout']);
    });
});

Route::get('/pdf-access/{type}/{key}', function ($type, $key) {
    return view('pages/authentication/pdf-access', compact('key', 'type'));
});
Route::post('/pdf-access/{type}/{key}', [PdfAccessController::class, 'validatePasswordAndGenerateLink']);

Route::get('/pdf/enquiry/{key}/{token}', [PdfAccessController::class, 'viewEnquiryPDF'])->name('enquiry.pdf')->middleware('pdf.access');
Route::get('/pdf/quotation/{key}/{token}', [PdfAccessController::class, 'viewQuotationPDF'])->name('quotation.pdf')->middleware('pdf.access');
Route::get('/pdf/spec/{key}/{token}', [PdfAccessController::class, 'viewSpecPDF'])->name('spec.pdf')->middleware('pdf.access');

Route::get('/clear-cache', function () {
    Cache::flush();
});


// Route::get('email', function(){
//     return view('layouts/mail');
// });