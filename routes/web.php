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
    return view('index');
});


Route::get('/login/admin', function (){
    return view('Login.admin-login');
});

Route::get('/login/vendor', function (){
    return view('Login.vendor-login');

});


Route::get('/admin','AdminController@adminHome');

Route::get('/admin/users','AdminController@viewUsers');

Route::get('/admin/addUser',function (){

    return view('Admin.add-users');
});


Route::post('/admin/addUser', 'AdminController@addUser');

Route::get('/admin/editUser/{id}/edit','AdminController@editUsers');

Route::post('admin/updateUser/{id}','AdminController@updateUsers');


Route::get('/admin/vendors','AdminController@viewVendors');

Route::get('/admin/addVendor',function (){

    return view('Admin.add-vendor');
});


Route::post('/admin/addVendor', 'AdminController@addVendor');

Route::get('/admin/editVendor/{id}/edit','AdminController@editVendors');

Route::post('admin/updateVendor/{id}','AdminController@updateVendors');


Route::get('/admin/allRequests','AdminController@viewAllRequests');

Route::get('/admin/addRequest',function (){

    return view('Admin.add-requests');
});

Route::post('/admin/addRequest', 'AdminController@addRequest');

Route::get('/admin/viewRequest/{id}','AdminController@viewARequest');


Route::get('/admin/downloadFile/{id}','AdminController@downloadFile');


Route::get('/admin/editRequest/{id}/edit','AdminController@editRequest');

Route::get('admin/editAttachment/{id}','AdminController@editAttachment');

Route::post('/admin/replaceAttachement/{id}','AdminController@updateAttachment');

Route::post('admin/updateRequest/{id}','AdminController@updateRequests');
Route::get('/admin/approvals','AdminController@viewApprovals');
Route::get('/admin/viewBid/{id}','AdminController@viewBidRequest');
Route::get('/admin/approveBid/{id}','AdminController@approveBid');
Route::get('/admin/diaspproveBid/{id}','AdminController@disapproveBid');
Route::get('/admin/allRequestsReports','AdminController@requestBids');
Route::get('/admin/allApprovalsReports','AdminController@approvalBids');
Route::get('/admin/allNotifications','AdminController@allNotifications');
Route::get('/admin/viewNotification/{id}','AdminController@viewNotification');








//VENDOR
Route::get('/vendor','AdminController@vendorHome');


Route::get('/vendor/allRequests','AdminController@VendorViewAllRequests');
Route::get('/vendor/viewRequest/{id}','AdminController@vendorViewARequest');
Route::get('/vendor/bidRequest/{id}','AdminController@vendorBidRequest');
Route::post('/vendor/bidRequest/{id}','AdminController@vendorRecordBidRequest');
Route::get('/vendor/reports','AdminController@vendorBidReports');
Route::get('/vendor/allNotifications','AdminController@vendorAllNotifications');
Route::get('/vendor/viewNotification/{id}','AdminController@vendorViewNotification');



// Authentication routes...

Route::get('auth/login', function (){
    return view('index');
});

Route::post('auth/login', 'AdminController@login');
Route::get('auth/logout', 'AdminController@logout');




