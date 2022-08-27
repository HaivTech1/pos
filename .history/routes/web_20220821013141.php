<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
])->group(function () {
    
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::resource('task',TaskController::class);
    Route::resource('setting',ApplicationController::class);
    Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
        {
        Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
        Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
        Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
        Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
        Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
        Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
        Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

        Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
        Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
        Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
        Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

        Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'messaging', 'as' => 'messaging.'], function () {
        Route::get('/email', [MessagingController::class, 'indexEmail'])->name('email');
        Route::post('/messaging/email/send', [MessagingController::class, 'sendEmail'])->name('sendMail');
        Route::get('/messaging/sms', [MessagingController::class, 'indexSMS'])->name('sms');
        Route::post('/messaging/sms/send', [MessagingController::class, 'sendSMS'])->name('sendSMS');
    });

    Route::group(['prefix' => 'option', 'as' => 'option.'], function () {
        Route::get('/options/get', [OptionsController::class, 'getOption'])->name('get');
        Route::get('/options/branch/get', [OptionsController::class, 'getBranchOption'])->name('branch.get');
        Route::post('/options/branch/put', [OptionsController::class, 'putBranchOption'])->name('branch.post');
    });

    Route::group(['prefix' => 'supplier', 'as' => 'supplier.'], function () {
        Route::get('/options/get', [OptionsController::class, 'getOption'])->name('get');
        Route::get('/options/branch/get', [OptionsController::class, 'getBranchOption'])->name('branch.get');
        Route::post('/options/branch/put', [OptionsController::class, 'putBranchOption'])->name('branch.post');
    });

    Route::get('/get/banks', [OptionsController::class, 'banks'])->name('banks');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/', [OrderController::class, 'store'])->name('store');
        Route::get('show/{user}', [OrderController::class, 'show'])->name('show');
        Route::get('edit/{user}', [OrderController::class, 'edit'])->name('edit');
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::put('/{user}', [OrderController::class, 'update'])->name('update');
        Route::get('pdfview', [OrderController::class, 'pdfview'])->name('pdfview');
    });
    
    Route::get('print/test', [PrintController::class, 'test'])->name('print');

     // PAYMENT
    Route::resource('/payments', PaymentController::class);
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
    Route::get('/payment/status', [PaymentController::class, 'status']);
});