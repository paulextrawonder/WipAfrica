<?php

use App\Http\Controllers\Admin\CommissionController as AdminCommissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\RealtorController;
use App\Http\Controllers\Admin\SalesController as AdminSalesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AdminAuth\AdminAuthController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\NoReplyNotificationController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\User\DashboardConstroller;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PropertyController;
use App\Http\Controllers\User\RefererController;
use App\Notifications\NoReplyNotification;
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

Auth::routes(['verify'=>true]);

Route::get('/', function () {
    return redirect(route('login'));
});

//users
Route::group(['prefix'=>'user'], function(){
    Route::group(['middleware'=> ['auth', 'verified', 'is_blocked']], function(){
         Route::get('/dashboard', [DashboardConstroller::class, 'index'])->name('user.dashboard');
         Route::get('/profile', [ProfileController::class, 'getProfile'])->name('user.getProfile');
         Route::patch('/profile', [ProfileController::class, 'saveProfile'])->name('user.saveProfile');
         Route::patch('/profile/change-profile-pic', [ProfileController::class, 'changeProfilePic'])->name('user.changeProfilePic');
         Route::get('/profile/account-details', [ProfileController::class, 'getAccountDetails'])->name('user.getAccountDetails');
         Route::patch('/profile/account-details', [ProfileController::class, 'updateAccountDetails'])->name('user.updateAccountDetails');
         Route::get('/profile/next-of-kin', [ProfileController::class, 'getNextOfKin'])->name('user.getNextOfKin');
         Route::post('/profile/next-of-kin', [ProfileController::class, 'updateNextOfKin'])->name('user.updateNextOfKin');
         Route::get('/profile/change-password', [ProfileController::class, 'changePasswordForm'])->name('user.changePasswordForm');
         Route::patch('/profile/change-password', [ProfileController::class, 'changePassword'])->name('user.changePassword');

         Route::get('/referer', [RefererController::class, 'index'])->name('user.referer');

         Route::get('/notifications', [NoReplyNotificationController::class, 'allMessages'])->name('allMessages');
         Route::patch('/notifications/{id}', [NoReplyNotificationController::class, 'singleMessages'])->name('singleMessages');
         Route::delete('/notifications/{id}', [NoReplyNotificationController::class, 'destroyMessage'])->name('destroyMessage');
         Route::get('/notifications/unread', [NoReplyNotificationController::class, 'unreadMessages'])->name('unreadMessages');
         Route::get('/notifications/read', [NoReplyNotificationController::class, 'readMessages'])->name('readMessages');

         Route::get('/supports', [SupportController::class, 'getSupportTicket'])->name('getSupportTicket');
         Route::post('/supports/create', [SupportController::class, 'createSupportTicket'])->name('createSupportTicket');
         Route::get('/supports/{support_id}', [SupportController::class, 'showSupportTicket'])->name('showSupportTicket');
         Route::patch('/supports/close-ticket/{support_id}', [SupportController::class, 'setTicketAsClosed'])->name('setTicketAsClosed');
         Route::delete('/supports/{support_id}', [SupportController::class, 'deleteSupportTicket'])->name('deleteSupportTicket');
         Route::get('/supports/{support_id}/replies', [SupportController::class, 'getSupportTicketReplies'])->name('getSupportTicketReplies');
         Route::post('/supports/{support_id}/replies', [SupportController::class, 'ceateSupportTicketReplies'])->name('ceateSupportTicketReplies');

         Route::get('/property', [PropertyController::class, 'allProperty'])->name('allProperty');
         Route::get('/property-{property}', [PropertyController::class, 'showProperty'])->name('showProperty');
         Route::get('/property/favourite', [PropertyController::class, 'getFavouriteProperty'])->name('getFavouriteProperty');
         Route::post('/property/{property}', [PropertyController::class, 'addPropertyToFavourite'])->name('addPropertyToFavourite');
         Route::delete('/property/favourite/{fav}', [PropertyController::class, 'removePropertyFromFavourite'])->name('removePropertyFromFavourite');
         Route::get('/property/search', [PropertyController::class, 'searchPropertyByName'])->name('searchProperty');

         Route::get('/property/inspection/fetch', [InspectionController::class, 'getAllInspectionRequest'])->name('getAllInspectionRequest');
         Route::post('/property/inspection/{id}', [InspectionController::class, 'bookInspection'])->name('bookInspection');

         Route::get('/sales', [SalesController::class, 'sales'])->name('user.sales');
         Route::post('/sales', [SalesController::class, 'addSales'])->name('user.addSales');
         Route::post('/sales/add-payment', [SalesController::class, 'addPaymentToSales'])->name('user.addPaymentToSales');

         Route::get('/comissions', [CommissionController::class, 'index'])->name('user.commission');
    });
});

//admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('adminLoginForm');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('adminLogin');

    Route::group(['middleware'=> ['adminauth']], function(){
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('adminDashboard');

    Route::get('/account-password', [AdminProfileController::class, 'password'])->name('adminPassword');
    Route::post('/account-password', [AdminProfileController::class, 'changePassword'])->name('adminChangePassword');
    Route::get('/account-settings', [SettingController::class, 'account'])->name('adminSettings');
    Route::post('/account-settings', [SettingController::class, 'setAccount'])->name('adminSetAccount');

    Route::get('/realtor/active', [RealtorController::class, 'isActive'])->name('activeRealtor');
    Route::get('/realtor/active/{id}', [RealtorController::class, 'blockRealtor'])->name('blockRealtor');
    Route::get('/realtor/blocked', [RealtorController::class, 'isBlocked'])->name('blockedRealtor');
    Route::get('/realtor/blocked/{id}', [RealtorController::class, 'unblockRealtor'])->name('unblockRealtor');
    Route::get('/realtor/{id}', [RealtorController::class, 'realtorProfile'])->name('realtorProfile');

    Route::get('/notification', [NoReplyNotificationController::class, 'adminView'])->name('adminNotification');
    Route::post('/notification', [NoReplyNotificationController::class, 'createNotification'])->name('adminCreateNotification');
    Route::get('/notification/{id}', [NoReplyNotificationController::class, 'deleteNotification'])->name('admindeleteNotification');

    Route::get('/project', [AdminPropertyController::class, 'property'])->name('adminProperty');
    Route::get('/project/create', [AdminPropertyController::class, 'createForm'])->name('adminCreatePropertyForm');
    Route::post('/project/create', [AdminPropertyController::class, 'createProperty'])->name('adminCreateProperty');
    Route::get('/project/{id}', [AdminPropertyController::class, 'deleteProperty'])->name('adminDeleteProperty');
    Route::get('/project/{id}/update', [AdminPropertyController::class, 'updatePropertyForm'])->name('updatePropertyForm');
    Route::patch('/project/{id}/update', [AdminPropertyController::class, 'updateProperty'])->name('adminUpdateProperty');
    Route::get('/project-{property}', [AdminPropertyController::class, 'adminShowProperty'])->name('adminShowProperty');

    Route::get('/sales', [AdminSalesController::class, 'sales'])->name('adminSales');
    Route::get('/sales/{sale_id}/{user_id}', [AdminSalesController::class, 'viewSales'])->name('adminViewSales');
    Route::post('/sales', [AdminSalesController::class, 'confirmSale'])->name('confirmSale');
    Route::get('/comission', [AdminCommissionController::class, 'commission'])->name('adminCommission');
    Route::post('/comission', [AdminCommissionController::class, 'payCommission'])->name('payCommission');
    Route::get('/support', [SupportController::class, 'adminsupportView'])->name('adminSupport');
    Route::get('/support/{id}', [SupportController::class, 'viewTicket'])->name('adminViewTicket');
    Route::patch('/support/{id}', [SupportController::class, 'markTicketAsClosed'])->name('adminMarkTicketAsClosed');
    Route::post('/supports/{ticket}/replies', [SupportController::class, 'adminReplyTicket'])->name('adminReplyTicket');


    });
});