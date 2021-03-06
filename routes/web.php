<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;

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

Route::get('/', function () {
    return view('client.index');
})->name('index');

// Rooutes for the user routes
Route::get('/user/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('/user/profile', [UserController::class, 'profile'])->name('userprofile');
Route::get('/user/viewjob/{jobId}', [UserController::class, 'viewJob'])->name('viewjob');
Route::post('/user/updateprofile', [UserController::class, 'updateProfile'])->name('updateprofile');
Route::get('/user/payment/requests/', [UserController::class, 'paymentRequests'])->name('paymentrequests');
Route::get('/user/availablejobs', [UserController::class, 'jobs'])->name('availablejobs');
Route::post('/user/createjoborder/', [UserController::class, 'createJobOrder'])->name('createjoborder');
Route::get('/user/completedjobs', [UserController::class, 'completedJobs'])->name('completedjobs');
Route::post('/user/requestpayment/', [UserController::class, 'requestPayment'])->name('requestpayment');
Route::get('/user/referrals/', [UserController::class, 'referrals'])->name('referrals');
Route::get('/user/tickets/', [UserController::class, 'tickets'])->name('user.tickets');
Route::post('/user/tickets/create', [UserController::class, 'createTicket'])->name('user.createticket');
Route::get('/user/ticket/{id}/', [UserController::class, 'ticket'])->name('user.ticket');


//Payment routes
Route::get('/makepayment', [PaymentController::class, 'index'])->name('makepayment');
Route::post('/createtransaction', [PaymentController::class, 'createTransaction'])->name('createtransaction');
Route::post('/verifytransaction', [PaymentController::class, 'verifyTransaction'])->name('verifytransaction');
Route::post('/verifyupgrade', [PaymentController::class, 'verifyUpgrade'])->name('verifyupgrade');

// Administrator routes
Route::get('/admin/postjob/', [AdminController::class, 'postJob'])->name('postjob');
Route::post('/admin/postjob/', [AdminController::class, 'createJob'])->name('postjob');
Route::get('/admin/users/', [AdminController::class, 'viewUsers'])->name('viewusers');
Route::get('/admin/user/{id}', [AdminController::class, 'viewUser'])->name('viewuser');
Route::get('/admin/settings/', [AdminController::class, 'settings'])->name('settings');
Route::get('/admin/viewpaymentrequests/', [AdminController::class, 'viewPaymentRequests'])->name('viewpaymentrequests');
Route::get('/admin/viewrequest/{id}/', [AdminController::class, 'viewPaymentRequest'])->name('viewpaymentrequest');
Route::get('/admin/viewjoboreder/{id}/', [AdminController::class, 'viewJobOrder'])->name('viewjoborder');
Route::get('/admin/tickets/', [AdminController::class, 'tickets'])->name('admin.tickets');

Route::post('/postajob/lalala', function(Request $request){
    // return 'bananla';
    return Job::addJob($request);
});