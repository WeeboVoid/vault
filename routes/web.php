<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckMasterPasswordController;
use App\Http\Controllers\RegisterStepTwoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckPassowordStrengthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\wordlist;
use App\Http\Controllers\PasswordAnalysisController;

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





// Route::get('/custom-wordlist',function(){
//     return view('custome-wordlist');
// });


// Create route group
Route::group([], function () {
    // Create route for home
    Route::get('/', function () {
        return view('index');
    })->name('index');

    // Create route for meeting the team
    Route::get('/meetTheTeam', function () {
        return view('meetTheTeam');
    });
});

// Protected routes
Route::group(['middleware' => 'auth'], function () {

    // Route group for completed registration
    Route::group(['middleware' => 'registration_completed'], function () {

        // Additional verification middleware
        Route::middleware('verified')->group(function () {

            // Master password middleware
            Route::middleware('master_password')->group(function () {


                Route::get('/account/delete', function () {
                    return view('deleteAccount');
                });
                Route::post('/delete-account', [AccountController::class, 'deleteAccount'])->name('account.delete');


                Route::get('/master/change', function () {
                    return view('changeMaster');
                });
                Route::post('/master-change', [AccountController::class, 'changeMaster'])->name('master.change');



                Route::get('/login/change', function () {
                    return view('changeLoginPass');
                });
                Route::post('/login-change', [AccountController::class, 'changeLoginPassword'])->name('login.change');


                Route::post('/dashboard/import', [DashboardController::class, 'importExcel'])->name('dashboard.import');

                Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');
                Route::post('/save-password', [PasswordController::class, 'store']);

                Route::get('/password-history', [PasswordController::class, 'history']);

                Route::get('/password-check', [CheckPassowordStrengthController::class, 'index'],[wordlist::class,'index']);

                Route::resource('dashboard', DashboardController::class);
                // Route for sidebar
                Route::get('/sideBar', function () {
                    return view('sideBar');
                });

                // Route for password generator
                Route::get('/passwordGen', function () {
                    return view('passwordGen');
                });
                Route::get('/CustomWordlist', [wordlist::class,'index']);
                Route::post('add', [wordlist::class,'add']);

                Route::get('logout', [LoginController::class, 'logout']);


                Route::get('/password-analysis', [PasswordAnalysisController::class, 'analyzePasswords']);
            });

            // Route for entering master password
            Route::get('login-masterPassword', function () {
                return view('login-masterPassword');
            });

            // Route for checking master password
            Route::post('/checkMasterPassword', [CheckMasterPasswordController::class, 'checkMasterPassword']);
        });
    });

    Route::group(['middleware' => 'access.check'], function () {
    // Route for step 2 of registration
        Route::get('register-step2', [RegisterStepTwoController::class, 'create'])->name('register-step2.create');
        Route::post('register-step2', [RegisterStepTwoController::class, 'store'])->name('register-step2.post');
    });
});

// Authentication routes
Auth::routes(['verify' => true]);




