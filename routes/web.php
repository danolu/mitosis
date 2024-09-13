<?php

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
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Livewire\Site\Error;

use App\Livewire\Admin\Auth\AdminLogin;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Deposits;
use App\Livewire\Admin\Email;
use App\Livewire\Admin\AdminFaqs;
use App\Livewire\Admin\Investments;
use App\Livewire\Admin\ActiveInvestments;
use App\Livewire\Admin\CompletedInvestments;
use App\Livewire\Admin\ManageUser;
use App\Livewire\Admin\ManageUserDeposits;
use App\Livewire\Admin\ManageUserPayouts;
use App\Livewire\Admin\ManageUserInvestments;
use App\Livewire\Admin\ManageUserReferrals;
use App\Livewire\Admin\Newsletters;
use App\Livewire\Admin\Payouts;
use App\Livewire\Admin\Plans;
use App\Livewire\Admin\UpdatePlan;
use App\Livewire\Admin\CreatePlan;
use App\Livewire\Admin\Posts;
use App\Livewire\Admin\Referrals;
use App\Livewire\Admin\Reviews;
use App\Livewire\Admin\Settings;
use App\Livewire\Admin\SuspendedUsers;
use App\Livewire\Admin\DeletedUsers;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Website;
use App\Livewire\Admin\AdminProfile;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ReferralRegister;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Verification;

use App\Livewire\UserActivity;
use App\Livewire\UserDashboard;
use App\Livewire\UserDeposit;
use App\Livewire\UserCryptoPay;
use App\Livewire\UserConfirmCryptoPay;
use App\Livewire\UserBankTransfer;
use App\Livewire\UserInvest;
use App\Livewire\UserInvestmentPlans;
use App\Livewire\UserInvestments;
use App\Livewire\UserProfile;
use App\Livewire\UserEditProfile;
use App\Livewire\UserPassword;
use App\Livewire\UserReferrals;
use App\Livewire\UserWithdraw;
use App\Livewire\UserWithdrawal;
use App\Livewire\UserWithdrawalDetails;


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('dashboard')->with('success', 'Email verified');
})->middleware(['auth:user', 'signed'])->name('verification.verify');

Route::middleware(['guest:user'])->group(function () {
    Route::get('/', Login::class)->name('home');
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('referral/{username}', ReferralRegister::class)->name('referral.register');
    Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::get('/email/verify', Verification::class)->name('verification.notice')->middleware('auth:user');

Route::middleware(['auth:user', 'verified'])->group(function () {
    Route::get('dashboard', UserDashboard::class)->name('dashboard');
    Route::get('profile', UserProfile::class)->name('profile');
    Route::get('edit-profile', UserEditProfile::class)->name('profile.edit');
    Route::get('change-password', UserPassword::class)->name('password');
    Route::get('activity', UserActivity::class)->name('activity');

    Route::get('plans', UserInvestmentPlans::class)->name('plans');
    Route::get('invest/{plan}', UserInvest::class)->name('invest');
    Route::get('investments', UserInvestments::class)->name('investments');

    Route::get('referral', UserReferrals::class)->name('referral');
    Route::get('deposit', UserDeposit::class)->name('deposit'); 
    Route::get('deposit-btc', UserCryptoPay::class)->name('deposit-btc'); 
    Route::get('validate-btc-deposit/{coin}/{amount}', UserConfirmCryptoPay::class)->name('validate-btc'); 
    Route::get('deposit-bt', UserBankTransfer::class)->name('deposit-bt'); 

    Route::get('withdraw', UserWithdraw::class)->name('withdraw');
    Route::get('withdrawal', UserWithdrawal::class)->name('withdrawal');
    Route::get('withdrawal-details', UserWithdrawalDetails::class)->name('withdrawal-details');
});

Route::get('admin', AdminLogin::class)->name('admin.login')->middleware('guest:admin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/referral', Referrals::class)->name('referrals');

    Route::get('users', Users::class)->name('users'); 
    Route::get('manage/user/{user}', ManageUser::class)->name('user.manage');
    Route::get('manage/user/{user}/deposits', ManageUserDeposits::class)->name('user.manage.deposits');
    Route::get('manage/user/{user}/payouts', ManageUserPayouts::class)->name('user.manage.payouts');
    Route::get('manage/user/{user}/investments', ManageUserInvestments::class)->name('user.manage.investments');
    Route::get('manage/user/{user}/referrals', ManageUserReferrals::class)->name('user.manage.referrals');
    Route::get('suspended-users', SuspendedUsers::class)->name('suspended.users'); 
    Route::get('deleted-users', DeletedUsers::class)->name('destroyed.users'); 
  
    Route::get('reviews', Reviews::class); 
    Route::get('deposits', Deposits::class, 'log')->name('admin.deposits');
    Route::get('payouts', Payouts::class)->name('payouts.log');
    Route::get('investments', Investments::class)->name('admin.investments');
    Route::get('investments/active', ActiveInvestments::class)->name('investments.active');
    Route::get('investments/completed', CompletedInvestments::class)->name('investments.completed');
    Route::get('plans', Plans::class)->name('admin.plans');  
    Route::get('create-plan', CreatePlan::class)->name('create.plan'); 
    Route::get('update-plan/{plan}', UpdatePlan::class)->name('update.plan');   

    Route::get('email/{user}', Email::class)->name('email');
    Route::get('newsletter', Newsletters::class)->name('newsletter');
 
    Route::get('settings', Settings::class)->name('settings');
    Route::get('profile', AdminProfile::class)->name('admin.account');
});