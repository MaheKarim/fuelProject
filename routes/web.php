<?php

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

Route::get('/', 'Settings\FrontEndController@index');
Auth::routes();

Route::get('/user/dashboard', 'UserController@index')->name('user.home');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.home');

// Admin Route Will Be Here
Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:superadministrator'])->group(function () {
    // Fuel Delivery
    Route::get('/fuel-delivery','AdminController@show_request')->name('fueldelivery');
    Route::get('/fuel-delivery/edit/{id}','AdminController@delivery_edit')->name('deliveryEdit');
    Route::post('/fuel-delivery/update/{id}','AdminController@delivery_update')->name('fuelDeliveryUpdate');
    Route::delete('/fuel-delivery/delete/{id}', 'AdminController@delivery_destroy')->name('deliveryDestroy');
    Route::get('/fuel-delivery/order/details/{id}','AdminController@details')->name('delivery.details');
    // Priority
    Route::get('/priority-all', 'AdminController@priority_see')->name('prioritySee');
    Route::get('/lpg-delivery/all', 'AdminController@lpg')->name('lpg');
    Route::delete('/lpg-delivery/destroy/{id}', 'AdminController@lpg_destroy')->name('lpg.destroy');
    // Fuel Type Route
    Route::get('/fuel-type', 'FuelTypeController@index')->name('fueltype');
    Route::get('/fuel-type/create', 'FuelTypeController@create')->name('fueltype.create');
    Route::post('/fuel-type-store', 'FuelTypeController@store')->name('fueltype.store');
    Route::get('/fuel-type/edit/{id}', 'FuelTypeController@edit')->name('fueltype.edit');
    Route::post('/fuel-type/update/{id}', 'FuelTypeController@update')->name('fuelTypeUpdate');
    Route::delete('/fuel-type/delete/{id}', 'FuelTypeController@destroy')->name('fueltype.destroy');
    // Refuelling For
    Route::get( '/refuelling-for', 'RefuelingForController@index')->name('refuelling');
    Route::get('/refuelling-for/create','RefuelingForController@create')->name('refuelling.create');
    Route::post('/refuelling-for/store', 'RefuelingForController@store')->name('refuelling.store');
    Route::get( '/refuelling-for/edit/{id}', 'RefuelingForController@edit')->name('refuelling.edit');
    Route::post('/refuelling-for/update/{id}', 'RefuelingForController@update')->name('refuelling.update');
    Route::delete('/refuelling-for/delete/{id}', 'RefuelingForController@destroy')->name('refuelling.destroy');
    // Cylinder Name & Type
    Route::get('/gas-cylinder-service','Settings\CylinderController@index')->name('gasCylinderService');
    Route::post('/gas-cylinder-store','Settings\CylinderController@store')->name('gasCylinder.store');
    Route::get('/gas-cylinder/edit/{id}','Settings\CylinderController@edit')->name('gasCylinder.edit');
    Route::post('/gas-cylinder/update/{id}','Settings\CylinderController@update')->name('gasCylinder.update');
    Route::delete('/gas-cylinder/delete/{id}', 'Settings\CylinderController@destroy')->name('gasCylinder.delete');
    // Car Wash
    Route::get('/carwash-for', 'CarWashController@index')->name('car-wash-admin');
    // FAQ Code
    Route::get('/faq-type', 'FAQController@index')->name('faq');
    Route::get('/faq-type/create', 'FAQController@create')->name('faq.create');
    Route::post('/faq-type-store', 'FAQController@store')->name('faq.store');
    Route::get('/faq-type/edit/{id}', 'FAQController@edit')->name('faq.edit');
    Route::post('/faq-type/update/{id}', 'FAQController@update')->name('faqUpdate');
    Route::delete('/faq-type/delete/{id}', 'FAQController@destroy')->name('faq.destroy');

});

// User Route Here
Route::name('user.')->prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    // Fuel Delivery - User
    Route::get('/fuel-delivery', 'FuelDeliveryController@index')->name('fuelDelivery');
    Route::post('/fuel-delivery-store', 'FuelDeliveryController@store')->name('fuelDelivery.store');
    // LPG Cylinder - User
    Route::get('/lpg-delivery','User\LPGDeliveryController@index')->name('lpgIndex');
    Route::post('/lpg-delivery/store','User\LPGDeliveryController@store')->name('lpgStore');
    // Car Wash
    Route::get('/car-wash','User\WashController@index')->name('carwash');
    Route::post('/car-wash/store','User\WashController@store')->name('washStore');
    
    Route::get('/car-maintenance','User\ComingSoonController@car_mecs')->name('carmecs');
});
