<?php
use Illuminate\Support\Facades\Route;

// Middleware for authentication
use App\Http\Controllers\GrhDashboardController;
// Home route
Route::get('/home', [GrhDashboardController::class, 'index'])->name('home')->middleware('auth');


// Dashboard Controller

Route::get('/dashboard/GrhDashboard', [GrhDashboardController::class, 'index'])->name('content.dashboard.GrhDashboard');

// Gestion Employe Controller
use App\Http\Controllers\GrhEmployeController;
Route::get('/app/grh/employe/add', [GrhEmployeController::class, 'create'])->name('employe.create');
Route::post('/app/grh/employe/add', [GrhEmployeController::class, 'store'])->name('employe.store');
Route::get('/app/grh/employe/list', [GrhEmployeController::class, 'index'])->name('employe.index');
Route::get('/app/grh/employe/{id}/edit', [GrhEmployeController::class, 'edit'])->name('employe.edit');
Route::put('/app/grh/employe/{id}', [GrhEmployeController::class, 'update'])->name('employe.update');
Route::delete('/app/grh/employe/{id}', [GrhEmployeController::class, 'destroy'])->name('employe.destroy');
Route::get('/employes-by-stat', [GrhEmployeController::class, 'getEmployesByStat']);

// Gestion Departement Controller
use App\Http\Controllers\GrhDepartementController;
Route::get('/app/grh/departement/add', [GrhDepartementController::class, 'create'])->name('departement.create');
Route::post('/app/grh/departement/add', [GrhDepartementController::class, 'store'])->name('departement.store');
Route::get('/app/grh/departement/list', [GrhDepartementController::class, 'index'])->name('departement.index');
Route::get('/app/grh/departement/{id}/edit', [GrhDepartementController::class, 'edit'])->name('departement.edit');
Route::put('/app/grh/departement/{id}', [GrhDepartementController::class, 'update'])->name('departement.update');
Route::delete('/app/grh/departement/{id}', [GrhDepartementController::class, 'destroy'])->name('departement.destroy');

// Poste Controller
use App\Http\Controllers\GrhPosteController;
Route::get('/app/grh/poste/add', [GrhPosteController::class, 'create'])->name('poste.create');
Route::post('/app/grh/poste/add', [GrhPosteController::class, 'store'])->name('poste.store');
Route::get('/app/grh/poste/list', [GrhPosteController::class, 'index'])->name('poste.index');
Route::get('/app/grh/poste/{id}/edit', [GrhPosteController::class, 'edit'])->name('poste.edit');
Route::put('/app/grh/poste/{id}', [GrhPosteController::class, 'update'])->name('poste.update');
Route::delete('/app/grh/poste/{id}', [GrhPosteController::class, 'destroy'])->name('poste.destroy');

// Salaire Controller
use App\Http\Controllers\HistoriquesalaireController;
Route::get('/app/grh/historiquesalaire/add', [HistoriquesalaireController::class, 'create'])->name('historiquesalaire.create');
Route::post('/app/grh/historiquesalaire/add', [HistoriquesalaireController::class, 'store'])->name('historiquesalaire.store');
Route::get('/app/grh/historiquesalaire/list', [HistoriquesalaireController::class, 'index'])->name('historiquesalaire.index');
Route::get('/app/grh/historiquesalaire/{id}/edit', [HistoriquesalaireController::class, 'edit'])->name('historiquesalaire.edit');
Route::put('/app/grh/historiquesalaire/{id}', [HistoriquesalaireController::class, 'update'])->name('historiquesalaire.update');
Route::delete('/app/grh/historiquesalaire/{id}', [HistoriquesalaireController::class, 'destroy'])->name('historiquesalaire.destroy');

// Conge Controller
use App\Http\Controllers\CongeController;
Route::get('/app/grh/conge/add', [CongeController::class, 'create'])->name('conge.create');
Route::post('/app/grh/conge/add', [CongeController::class, 'store'])->name('conge.store');
Route::get('/app/grh/conge/list', [CongeController::class, 'index'])->name('conge.index');
Route::get('/app/grh/conge/{id}/edit', [CongeController::class, 'edit'])->name('conge.edit');
Route::put('/app/grh/conge/{id}', [CongeController::class, 'update'])->name('conge.update');
Route::delete('/app/grh/conge/{id}', [CongeController::class, 'destroy'])->name('conge.destroy');
Route::put('/app/grh/conge/{id}/approve', [CongeController::class, 'approve'])->name('conge.approve');
Route::put('/app/grh/conge/{id}/reject', [CongeController::class, 'reject'])->name('conge.reject');
Route::put('/app/grh/conge/{id}/cancel', [CongeController::class, 'cancel'])->name('conge.cancel');

// Dashboard Controller
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Auth Routes
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\LoginCover;
use App\Http\Controllers\authentications\UserRegisterController;
use App\Http\Controllers\authentications\UserLoginController;
use App\Http\Controllers\authentications\RegisterCover;
use App\Http\Controllers\authentications\RegisterMultiSteps;
use App\Http\Controllers\authentications\VerifyEmailBasic;
use App\Http\Controllers\authentications\VerifyEmailCover;
use App\Http\Controllers\authentications\ResetPasswordBasic;
use App\Http\Controllers\authentications\ResetPasswordCover;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\ForgotPasswordCover;
use App\Http\Controllers\authentications\TwoStepsBasic;
use App\Http\Controllers\authentications\TwoStepsCover;

// Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
// Route::get('/auth/login-cover', [LoginCover::class, 'index'])->name('auth-login-cover');

Route::get('/auth/login-basic', [UserLoginController::class, 'showLoginForm'])->name('auth-login-basic');
Route::post('/auth/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/auth/logout', [UserLoginController::class, 'logout'])->name('logout');

Route::get('/auth/register-basic', [UserRegisterController::class, 'showRegistrationForm'])->name('auth-register-basic');
Route::post('register', [UserRegisterController::class, 'register'])->name('register');

Route::get('/auth/register-cover', [RegisterCover::class, 'index'])->name('auth-register-cover');

Route::get('/auth/register-multisteps', [RegisterMultiSteps::class, 'index'])->name('auth-register-multisteps');
Route::get('/auth/verify-email-basic', [VerifyEmailBasic::class, 'index'])->name('auth-verify-email-basic');
Route::get('/auth/verify-email-cover', [VerifyEmailCover::class, 'index'])->name('auth-verify-email-cover');
Route::get('/auth/reset-password-basic', [ResetPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
Route::get('/auth/reset-password-cover', [ResetPasswordCover::class, 'index'])->name('auth-reset-password-cover');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-forgot-password-basic');
Route::get('/auth/forgot-password-cover', [ForgotPasswordCover::class, 'index'])->name('auth-forgot-password-cover');
Route::get('/auth/two-steps-basic', [TwoStepsBasic::class, 'index'])->name('auth-two-steps-basic');
Route::get('/auth/two-steps-cover', [TwoStepsCover::class, 'index'])->name('auth-two-steps-cover');

// User Interface
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;

Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// Pages
use App\Http\Controllers\pages\UserProfile;
use App\Http\Controllers\pages\UserTeams;
use App\Http\Controllers\pages\UserProjects;
use App\Http\Controllers\pages\UserConnections;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsSecurity;
use App\Http\Controllers\pages\AccountSettingsBilling;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\Faq;
use App\Http\Controllers\pages\Pricing as PagesPricing;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\pages\MiscComingSoon;
use App\Http\Controllers\pages\MiscNotAuthorized;

Route::get('/pages/profile-user', [UserProfile::class, 'index'])->name('pages-profile-user');
Route::get('/pages/profile-teams', [UserTeams::class, 'index'])->name('pages-profile-teams');
Route::get('/pages/profile-projects', [UserProjects::class, 'index'])->name('pages-profile-projects');
Route::get('/pages/profile-connections', [UserConnections::class, 'index'])->name('pages-profile-connections');
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-security', [AccountSettingsSecurity::class, 'index'])->name('pages-account-settings-security');
Route::get('/pages/account-settings-billing', [AccountSettingsBilling::class, 'index'])->name('pages-account-settings-billing');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/faq', [Faq::class, 'index'])->name('pages-faq');
Route::get('/pages/pricing', [PagesPricing::class, 'index'])->name('pages-pricing');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');
Route::get('/pages/misc-comingsoon', [MiscComingSoon::class, 'index'])->name('pages-misc-comingsoon');
Route::get('/pages/misc-not-authorized', [MiscNotAuthorized::class, 'index'])->name('pages-misc-not-authorized');
