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
	$background= \App\background::first();
    return view('welcome',compact('background'));
})->name('welcome');

Route::get('/searchPage', 'searchController@create');
// Route::post('/search', 'searchController@search');
Route::get('/search', 'searchController@search');
Route::get('/searchProfile/{id}', 'searchController@showProfile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
Route::get('/logout', 'UserController@logout');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
//user

Route::get('/allUserList', 'UserController@allUserList')->middleware('admin');
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
Route::get('edit-quotation/{id}','QuotationRequestController@showEditForm')->middleware('admin');
Route::post('/edit-quotation/{id}','QuotationRequestController@edit');
Route::get('/quotationRequestApproved/{id}','QuotationRequestController@approve')->middleware('admin');
Route::get('/quotationRequestSendToAdvisor/{id}','QuotationRequestController@sendToAdvisor')->middleware('admin');

Route::get('/quotationRequestCancel/{id}','QuotationRequestController@cancel');
Route::get('/quotationRequestCancelUser/{id}','QuotationRequestController@cancelUser');
Route::get('/submitRequest','QuotationRequestNullController@create');
Route::post('/submitRequest','QuotationRequestNullController@store');

Route::get('assignUser/{id}','QuotationRequestNullController@showAssignForm')->middleware('admin');
Route::post('/assignUser/{id}','QuotationRequestNullController@assignUser');

//userPages
Route::get('/newQuotationRequest','QuotationRequestController@showNewRequest');
Route::get('/allQuotationRequest','QuotationRequestController@showAllRequest');
Route::get('/paidQuotationRequest','QuotationRequestController@showPaidRequest');

//admin
Route::get('/allRequestAdmin','QuotationRequestController@showAllRequestAdmin')->middleware('admin');
Route::get('/newRequestAdmin','QuotationRequestController@showNewRequestAdmin')->middleware('admin');
Route::get('/paidRequestAdmin','QuotationRequestController@showPaidRequestAdmin')->middleware('admin');
Route::get('/emptyRequestAdmin','QuotationRequestController@showEmptyRequestAdmin')->middleware('admin');




//payment

Route::get('/pay/{id}','TransactionController@create');
Route::post('/pay/{id}','TransactionController@chargeCreditCard');
Route::get('/payresult/{id}','TransactionController@result');

//invoice
Route::get('/createInvoice/{id}','InvoiceController@create')->middleware('admin');
Route::post('/createInvoice/{id}','InvoiceController@store');
Route::get('/showInvoice/{id}','InvoiceController@show');
Route::get('/showInvoiceList','InvoiceController@show');
//place
Route::get('/placeCreate','PlaceController@create')->middleware('admin');
Route::post('/savePlace','PlaceController@store');
Route::get('/viewPlace','PlaceController@view');
Route::get('/deletePlace/{id}','PlaceController@delete')->middleware('admin');

 Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

//credit
Route::get('/buyCredit','CreditController@create');
Route::post('/buyCredit/{id}','CreditController@chargeCreditCard');


//notification

Route::get('/showAllNotificationAdmin','NotificationAdminController@showAll')->middleware('admin');
Route::get('/showAllNotification','NotificationUserController@show');

//background

Route::get('/editBackground','BackgroundController@index')->middleware('admin');
Route::post('/editBackground','BackgroundController@edit');
Route::post('/saveBackgroundImage','BackgroundController@saveBackgroundImage');

Route::post('/saveSlideOneImage','BackgroundController@saveSlideOneImage');
Route::post('/saveSlideTwoImage','BackgroundController@saveSlideTwoImage');
Route::post('/saveSlideThreeImage','BackgroundController@saveSlideThreeImage');


Route::post('/saveDivOneImage','BackgroundController@saveDivOneImage');
Route::post('/saveDivTwoImage','BackgroundController@saveDivTwoImage');
Route::post('/saveDivThreeImage','BackgroundController@saveDivThreeImage');
Route::post('/saveDivFourImage','BackgroundController@saveDivFourImage');

//reset all
Route::post('/resetBackground','BackgroundController@reset')->middleware('admin');

//service
Route::get('/addService','UserServiceController@index')->middleware('admin');
Route::post('/addService','UserServiceController@add');
Route::get('/deleteService/{id}','UserServiceController@delete')->middleware('admin');

Route::get('/editPassword','UserController@editPasswordIndex');
Route::post('/editPassword','UserController@editPassword');

Route::get('/changePassword','HomeController@showChangePasswordForm');





