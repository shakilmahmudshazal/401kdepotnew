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
    return view('welcome');
});
Route::get('/logout', 'UserController@logout');
Route::get('/searchPage', 'searchController@create');
// Route::post('/search', 'searchController@search');
Route::get('/search', 'searchController@search');
Route::get('/searchProfile/{id}', 'searchController@showProfile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/showProfile', 'UserController@showProfile');
Route::get('/editProfile', 'UserController@editProfile');
Route::post('/updateProfile', 'UserController@updateProfile');
Route::get('/editProfilePic', 'UserProfilePicController@create');
Route::post('/saveProfilePic', 'UserProfilePicController@save');
Route::get('/user/verify/{token}', 'VerifyUserController@verifyEmail');

//education route
Route::get('/addEducation','UserEducationController@addEducation');
Route::post('/save-education','UserEducationController@saveEducation');
Route::get('edit-education/{id}','UserEducationController@editEducation');
Route::post('/update-education/{Id}','UserEducationController@updateEducation');
Route::get('/deleteUserEducation/{id}','UserEducationController@deleteUserEducation');

//Financial Examination route 
Route::get('/addFinancialExam','UserFinancialExamController@addFinancialExam');
Route::post('/save-FinancialExam','UserFinancialExamController@saveFinancialExam');
Route::get('edit-FinancialExam/{id}','UserFinancialExamController@editFinancialExam');
Route::post('/update-FinancialExam/{Id}','UserFinancialExamController@updateFinancialExam');
Route::get('/delete-FinancialExam/{id}','UserFinancialExamController@deleteFinancialExam');

//User Professional Designation 
Route::get('/addProfessionalDesignation','UserProfessionalDesignationController@addProfessionalDesignation');
Route::post('/save-ProfessionalDesignation','UserProfessionalDesignationController@saveProfessionalDesignation');
Route::get('edit-ProfessionalDesignation/{id}','UserProfessionalDesignationController@editProfessionalDesignation');
Route::post('/update-ProfessionalDesignation/{Id}','UserProfessionalDesignationController@updateDesignation');
Route::get('/deleteProfessionalDesignation/{id}','UserProfessionalDesignationController@deleteProfessionalDesignation');

//Working History 
Route::get('/addUserWork','UserWorkController@addUserWork');
Route::post('/save-UserWork','UserWorkController@saveUserWork');
Route::get('edit-UserWork/{id}','UserWorkController@editUserWork');
Route::post('/update-Work/{Id}','UserWorkController@updateWork');
Route::get('/delete-UserWork/{id}','UserWorkController@deleteWork');


//quotaRequest
Route::post('/sendQuotaionRequest/{id}','QuotationRequestController@store');
Route::get('quotationRequest','QuotationRequestController@show');
Route::get('edit-quotation/{id}','QuotationRequestController@showEditForm');
Route::post('/edit-quotation/{id}','QuotationRequestController@edit');
Route::get('/quotationRequestApproved/{id}','QuotationRequestController@approve');
Route::get('/quotationRequestCancel/{id}','QuotationRequestController@cancel');
Route::get('/quotationRequestCancelUser/{id}','QuotationRequestController@cancelUser');



//payment

Route::get('/pay/{id}','TransactionController@create');
Route::post('/pay/{id}','TransactionController@chargeCreditCard');
Route::get('/payresult/{id}','TransactionController@result');

//invoice
Route::get('/createInvoice/{id}','InvoiceController@create');
Route::post('/createInvoice/{id}','InvoiceController@store');
Route::get('/showInvoice/{id}','InvoiceController@show');
Route::get('/showInvoiceList','InvoiceController@show');






