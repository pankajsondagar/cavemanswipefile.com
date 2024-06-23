<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BannerSizeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DigitalContentController;
use App\Http\Controllers\DigitalDownloadController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberAffiliateController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentOptionController;
use App\Http\Controllers\PayPlanSettingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TermConditionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$adminURL = App\Models\Content::where('slug','admin-url')->first();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return abort('404');
});
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/leads', function() {
    return view('frontend.leads');
})->name('leads');

Route::get('/contact', function() {
    return view('frontend.contact');
})->name('contact');

Route::get('/spam-policy', function() {
    return view('frontend.spam-policy');
})->name('spam-policy');

Route::get('/terms-conditions', function() {
    return view('frontend.terms-conditions');
})->name('terms-conditions');

Route::get('/privacy-policy', function() {
    return view('frontend.privacy-policy');
})->name('privacy-policy');

Route::get('/cookie-policy', function() {
    return view('frontend.cookie-policy');
})->name('cookie-policy');

Route::get('/earnings-disclaimer', function() {
    return view('frontend.earnings-disclaimer');
})->name('earnings-disclaimer');

Route::get('/affiliates', function() {
    return view('frontend.affiliates');
})->name('affiliates');

Route::get('/mentors', function() {
    return view('frontend.mentors');
})->name('mentors');

Route::get('/list', function() {
    return view('frontend.list');
})->name('list');

Route::get('/register', function() {
    return view('frontend.register');
})->name('register');
Route::get('/home/{hashedUsername?}', [Controller::class, 'welcome'])->name('welcome');

Route::get('/page/{slug}', [Controller::class, 'page'])->name('page');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/forgot-password', [LoginController::class, 'forgetPasswordLink'])->name('forgot_password');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('reset_password');
Route::post('/reset-password-update', [LoginController::class, 'resetPasswordUpdate'])->name('reset_password.update');
Route::get('/confirm-account/{token}', [LoginController::class, 'confirmAccount'])->name('confirm_account');


// Admins Routes

Route::get('/'.$adminURL->content, [LoginController::class, 'viewLogin'])->name('admin.login');

Route::group(['prefix' => '/admin'], function () {
    Route::get('/forget-password', [LoginController::class, 'forgetPassword']);
    Route::group(['middleware' => 'auth'], function() {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        // Member
        Route::get('/members/list', [MemberController::class, 'index'])->name('admin.member.list');
        Route::get('/members/create', [MemberController::class, 'create'])->name('admin.member.create');
        Route::get('/members/delete/{id}', [MemberController::class, 'delete'])->name('admin.member.delete');
        Route::get('/members/view/{id}', [MemberController::class, 'view'])->name('admin.member.view');
        Route::get('/members/edit/{id}', [MemberController::class, 'edit'])->name('admin.member.edit');
        Route::post('/members/save', [MemberController::class, 'save'])->name('admin.member.save');
        Route::post('/members/update', [MemberController::class, 'update'])->name('admin.member.update');
        Route::get('/members/genealogy', [MemberController::class, 'memberGenealogy'])->name('admin.member.genealogy');
        Route::post('/members/approve/payment', [MemberController::class, 'approvePayment'])->name('admin.member.approve.payment');
        Route::post('/members/unapprove/payment', [MemberController::class, 'unapprovePayment'])->name('admin.member.unapprove.payment');
        Route::post('/members/decline/payment', [MemberController::class, 'declinePayment'])->name('admin.member.decline.payment');
        // Banner Promotion
        Route::get('/banners/list', [BannerController::class, 'index'])->name('admin.banner.list');
        Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banner.create');
        Route::get('/banners/delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
        Route::get('/banners/view/{id}', [BannerController::class, 'view'])->name('admin.banner.view');
        Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::post('/banners/save', [BannerController::class, 'save'])->name('admin.banner.save');
        Route::post('/banners/update', [BannerController::class, 'update'])->name('admin.banner.update');
        // Banner Size
        Route::get('/banner-sizes/list', [BannerSizeController::class, 'index'])->name('admin.banner.size.list');
        Route::get('/banner-sizes/create', [BannerSizeController::class, 'create'])->name('admin.banner.size.create');
        Route::get('/banner-sizes/delete/{id}', [BannerSizeController::class, 'delete'])->name('admin.banner.size.delete');
        Route::get('/banner-sizes/edit/{id}', [BannerSizeController::class, 'edit'])->name('admin.banner.size.edit');
        Route::post('/banner-sizes/save', [BannerSizeController::class, 'save'])->name('admin.banner.size.save');
        Route::post('/banner-sizes/update', [BannerSizeController::class, 'update'])->name('admin.banner.size.update');
        // Notification
        Route::get('/notifications/list', [NotificationController::class, 'index'])->name('admin.notification.list');
        Route::get('/notifications/edit/{id}', [NotificationController::class, 'edit'])->name('admin.notification.edit');
        Route::post('/notifications/update', [NotificationController::class, 'update'])->name('admin.notification.update');
        // Setting
        Route::get('/website-settings', [SettingController::class, 'website'])->name('admin.website.settings');
        Route::post('/website-settings/update', [SettingController::class, 'websiteUpdate'])->name('admin.website.settings.update');
        Route::get('/member-settings', [SettingController::class, 'member'])->name('admin.member.settings');
        Route::post('/member-settings/update', [SettingController::class, 'memberUpdate'])->name('admin.member.settings.update');
        Route::get('/account-settings', [SettingController::class, 'account'])->name('admin.account.settings');
        Route::post('/account-settings/update', [SettingController::class, 'accountUpdate'])->name('admin.account.settings.update');
        // Payplan Setting
        Route::get('/payplan-structure', [PayPlanSettingController::class, 'structure'])->name('admin.payplan.structure');
        Route::post('/payplan-structure/update', [PayPlanSettingController::class, 'structureUpdate'])->name('admin.payplan.structure.update');
        Route::get('/payplan-leaders/{type}', [PayPlanSettingController::class, 'leader'])->name('admin.payplan.leaders');
        Route::post('/payplan-leaders/update', [PayPlanSettingController::class, 'leaderUpdate'])->name('admin.payplan.leaders.update');
         // Terms Condition
         Route::get('/terms-conditions', [TermConditionController::class, 'edit'])->name('admin.termsconditions.edit');
         Route::post('/terms-conditions/update', [TermConditionController::class, 'update'])->name('admin.termsconditions.update');
         // Payment Options
         Route::get('/payment-options', [PaymentOptionController::class, 'edit'])->name('admin.paymentoptions.edit');
         Route::post('/payment-options/update', [PaymentOptionController::class, 'update'])->name('admin.paymentoptions.update');
        // Page
        Route::get('/pages/list', [PageController::class, 'index'])->name('admin.page.list');
        Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
        Route::post('/pages/update', [PageController::class, 'update'])->name('admin.page.update');
        Route::get('/pages/create', [PageController::class, 'create'])->name('admin.page.create');
        Route::post('/pages/store', [PageController::class, 'store'])->name('admin.page.store');
        Route::get('/pages/delete/{id}', [PageController::class, 'delete'])->name('admin.page.delete');
        // Feedback
        Route::get('/feedback/list', [FeedbackController::class, 'list'])->name('admin.feedback.list');
        Route::get('/feedback/reply/{id}', [FeedbackController::class, 'replyForm'])->name('admin.feedback.reply');
        Route::post('/feedback/reply', [FeedbackController::class, 'saveReply'])->name('admin.feedback.save');
        Route::get('/content', [ContentController::class, 'list'])->name('admin.content.list');
        Route::post('/content/update', [ContentController::class, 'update'])->name('admin.content.update');
        // Waiting Payments
        Route::get('/waiting-payments/list', [MemberController::class, 'waitingPayments'])->name('admin.waiting.payments.list');
        // Digital Download
        Route::get('/digital-downloads/list', [DigitalDownloadController::class, 'index'])->name('admin.digital.download.list');
        Route::get('/digital-downloads/create', [DigitalDownloadController::class, 'create'])->name('admin.digital.download.create');
        Route::get('/digital-downloads/delete/{id}', [DigitalDownloadController::class, 'delete'])->name('admin.digital.download.delete');
        Route::get('/digital-downloads/edit/{id}', [DigitalDownloadController::class, 'edit'])->name('admin.digital.download.edit');
        Route::post('/digital-downloads/save', [DigitalDownloadController::class, 'save'])->name('admin.digital.download.save');
        Route::post('/digital-downloads/update', [DigitalDownloadController::class, 'update'])->name('admin.digital.download.update');
        // Digital Content
        Route::get('/digital-content/list', [DigitalContentController::class, 'index'])->name('admin.digital.content.list');
        Route::get('/digital-content/create', [DigitalContentController::class, 'create'])->name('admin.digital.content.create');
        Route::get('/digital-content/delete/{id}', [DigitalContentController::class, 'delete'])->name('admin.digital.content.delete');
        Route::get('/digital-content/edit/{id}', [DigitalContentController::class, 'edit'])->name('admin.digital.content.edit');
        Route::post('/digital-content/save', [DigitalContentController::class, 'save'])->name('admin.digital.content.save');
        Route::post('/digital-content/update', [DigitalContentController::class, 'update'])->name('admin.digital.content.update');
    });
});
Route::group(['prefix' => '/member'], function () {
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('member.login');
    Route::get('/forgot-password', [LoginController::class, 'forgetPassword']);
    // Route::get('/register/{hashedUsername}', [LoginController::class, 'viewRegister']);
    // Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::get('/dashboard/{id?}', [DashboardController::class, 'dashboard'])->name('member.dashboard');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/dashboard/{id?}', [DashboardController::class, 'dashboard'])->name('member.dashboard');
        Route::get('/genealogy/{id?}', [DashboardController::class, 'genealogy'])->name('member.genealogy');

        // Payment
        Route::get('/make-payment/{planId}/{id?}', [PaymentController::class, 'view'])->name('member.make.payment');
        // Profile
        Route::get('/profile/{id?}', [MemberProfileController::class, 'profile'])->name('member.profile');
        Route::post('/profile/update', [MemberProfileController::class, 'profileUpdate'])->name('member.profile.update');
        Route::get('/account/{id?}', [MemberProfileController::class, 'account'])->name('member.account');
        Route::post('/account/update', [MemberProfileController::class, 'accountUpdate'])->name('member.account.update');
        Route::get('/website', [MemberProfileController::class, 'website'])->name('member.website');
        Route::post('/website/update', [MemberProfileController::class, 'websiteUpdate'])->name('member.website.update');
        Route::get('/password/{id?}', [MemberProfileController::class, 'password'])->name('member.password');
        Route::post('/password/update', [MemberProfileController::class, 'passwordUpdate'])->name('member.password.update');
        // Feedback
        Route::get('/feedback/{id?}', [DashboardController::class, 'feedback'])->name('member.feedback');
        Route::post('/save/feedback', [DashboardController::class, 'saveFeedback'])->name('member.save.feedback'); //->middleware('throttle:2,10');
        // Confirm Payment
        Route::post('/confirm/payment',[PaymentController::class, 'confirmPayment'])->name('confirm.payment');
        Route::post('/approve/payment', [PaymentController::class, 'approvePayment'])->name('member.approve.payment');
        Route::post('/decline/payment', [PaymentController::class, 'declinePayment'])->name('member.decline.payment');
        Route::post('/unapprove/payment', [PaymentController::class, 'unapprovePayment'])->name('member.unapprove.payment');
        Route::get('/mark-as-read', [PaymentController::class,'markAsRead'])->name('mark-as-read');

        // Affiliate
        Route::get('/affiliate/{id?}', [MemberAffiliateController::class, 'affiliate'])->name('member.affiliate');
        // Videos
        Route::get('/videos/{id?}', [MemberAffiliateController::class, 'video'])->name('member.videos');
        // Digital Download
        Route::get('/digital-downloads/{id?}', [DigitalDownloadController::class, 'memberList'])->name('member.digital.download');
        // Dgigital Content
        Route::get('/digital-contents/{id?}', [DigitalContentController::class, 'memberList'])->name('member.digital.content');
        Route::post('/update-count', [DigitalContentController::class, 'updateDownloadCount'])->name('member.update.count');
        // Banner
        Route::get('/banners/{id?}', [BannerController::class, 'memberList'])->name('member.banners');
    });
});