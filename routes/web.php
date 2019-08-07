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

Route::get('/', function () {

    if (!Auth::check())
        return redirect()->route('login');
    else
        return redirect()->route('dashboard.index');
});

Route::get('/admin', function () {
    if (!Auth::check())
        return redirect()->route('login');
    else
        return redirect()->route('dashboard.index');
});


Auth::routes();

// User Control Panel Routes

Route::group([ 'middleware' => ['theme']], function () {
    Route::post('setting/theme/set', 'SettingController@setThemes')->name('setting.theme.set');
    Route::get('setting/theme/list', 'SettingController@listThemes')->name('setting.theme.list');
    Route::resource('setting', 'SettingController');
});


// Administrator & SuperAdministrator Control Panel Routes
Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth', 'theme', 'role:administrator|superadministrator|user'],
        'namespace' => 'Admin'
    ], function () {

    Route::resource('dashboard', 'HomeController');

    Route::resource('expanse', 'ExpanseController');
    Route::resource('consultant', 'ConsultantController');
    Route::resource('assistant', 'AssistantController');
    Route::resource('patient', 'PatientController');
    Route::resource('appointment', 'AppointmentController');
    Route::resource('medicine', 'MedicineController');
    Route::resource('prescriptions', 'PrescriptionController');
    Route::resource('invoice', 'InvoiceController');


    Route::resource('users', 'UsersController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController');
});