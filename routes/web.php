<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\website\WebController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\website\AppointmentController as WebsiteAppointmentController;
use App\Http\Controllers\Worker\AppointmentController;
use App\Http\Controllers\Worker\MessageController;
use App\Http\Controllers\Worker\WorkerController as WorkerWorkerController;
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

Route::get('/', [WebController::class, 'index']);
Route::get('/privacy-policy', [WebController::class, 'privacyPolicy']);
Route::get('/terms-and-conditions', [WebController::class, 'termsAndConditions']);
Route::get('/about-us', [WebController::class, 'aboutUs']);


Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');

// Stripe routes
Route::post('/process-stripe', [PaymentController::class, 'processStripe'])->name('payment.stripe.process');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');

// PayPal routes
Route::post('/process-paypal', [PaymentController::class, 'processPayPal'])->name('payment.paypal.process');
Route::get('/payment/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('payment.paypal.success');
Route::get('/payment/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('payment.paypal.cancel');

// Apple Pay and Google Pay routes
Route::post('/process-apple-pay', [PaymentController::class, 'processApplePay'])->name('payment.apple-pay.process');
Route::post('/process-google-pay', [PaymentController::class, 'processGooglePay'])->name('payment.google-pay.process');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/registration-requests', [WorkerController::class, 'registrations'])->name('workers.registrations');
    Route::get('/workers', [WorkerController::class, 'index'])->name('workers.index');
    Route::get('/workers/create', [WorkerController::class, 'create'])->name('workers.create');
    Route::post('/workers', [WorkerController::class, 'store'])->name('workers.store');

    Route::put('/workers/status', [WorkerController::class, 'status'])->name('workers.status');


    Route::get('/workers/{worker}/edit', [WorkerController::class, 'edit'])->name('workers.edit');
    Route::put('/workers/{worker}', [WorkerController::class, 'update'])->name('workers.update');
    Route::delete('/workers/{worker}', [WorkerController::class, 'destroy'])->name('workers.destroy');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});
Route::middleware(['auth', 'role:worker'])->prefix('workers')->name('worker.')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointments/{appointment}/show', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::get('/appointments/{appointment}/{status}', [AppointmentController::class, 'status'])->name('appointment.status');

    Route::get('/profile', [WorkerWorkerController::class, 'profile'])->name('profile.index');
    Route::put('/profile', [WorkerWorkerController::class, 'updateProfile'])->name('profile.update');
    Route::get('/get-conversations', [MessageController::class, 'getConversations'])->name('conversations');
    Route::get('/get-chats', [MessageController::class, 'getChats'])->name('get.chats');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
    Route::get('/unread-messages', [MessageController::class, 'unreadMessages']);
    Route::get('/mark-all-read', [MessageController::class, 'markAllReadMessages']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/workers', [WebController::class, 'workers']);
    Route::get('/get-workers', [WebController::class, 'getWorkers']);
    Route::get('/workers-profile/{worker}', [WebController::class, 'workersProfile'])->name('workersProfile');
    Route::post('/appointment', [WebsiteAppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/confirmed-appointment', [WebsiteAppointmentController::class, 'confirmed'])->name('appointment.confirmed');
    Route::post('/complete-appointment', [WebsiteAppointmentController::class, 'complete'])->name('appointment.complete');
    Route::post('/not-showed-appointment', [WebsiteAppointmentController::class, 'notShowed'])->name('appointment.not-showed');
    Route::get('/appointments/{appointment}/show', [WebsiteAppointmentController::class, 'show'])->name('appointment.show');
    Route::get('/appointments', [WebsiteAppointmentController::class, 'index'])->name('appointment.index');
    Route::view('about', 'about')->name('about');
    Route::get('/chat', [WebController::class, 'chat'])->name('chat');
    Route::get('/get-conversations', [WebController::class, 'getConversations'])->name('conversations');
    Route::get('/get-chats', [WebController::class, 'getChats'])->name('get.chats');
    Route::post('/send-message', [WebController::class, 'sendMessage'])->name('send.message');
    Route::post('/send-message/all', [WebController::class, 'sendMessageAll'])->name('send-message-all');

    // Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/registration', [WebController::class, 'registration'])->name('registration');
});

require __DIR__ . '/auth.php';
