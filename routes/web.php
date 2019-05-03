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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard','DashboardController');
Route::resource('employee','EmployeeController');
Route::resource('payroll','PayrollController');
Route::resource('payslip','PayslipController');
Route::post('Manage_Profile/{id}/{idnumber}','UserController@update_avatar');

Route::resource('emp_dashboard','UserController');

Route::get('/archive','PayrollController@archive');
Route::get('/addpayroll','PayrollController@addpayroll');
Route::get('/print/{id}', 'PayslipController@showPrint')->name('print');
Route::get('/test','PayrollController@test');

Route::get('/manageaccount','UserController@manageaccount');

Route::get('/restoreEmployee/{id}', 'EmployeeController@restore_employee');
Route::get('/deleteEmployee/{id}', 'EmployeeController@permanent_delete_employee');


Route::get('/restorePayroll/{id}', 'PayrollController@restore_payroll');
Route::get('/deletePayroll/{id}', 'PayrollController@permanent_delete_payroll');

Route::get('/paysliprange/{datefrom}/{dateto}', 'UserController@selectedRange');

Route::get('/createaccount', 'UserController@createaccount');
Route::get('/info/{id}', 'UserController@AccountInfo');


Route::get('/checkcutoff/{id}/{cut}', 'PayrollController@checkcutoff');

Route::get('/attendance', 'EmployeeController@attendance');

Route::post('/changeuser','UserController@changeuser');
Route::post('/changepass','UserController@changepass');


Route::get('/checkuser/{user}', 'UserController@checkuser');
Route::get('/checkpass/{pass}', 'UserController@checkpass');

Route::group(['middleware' => ['web', 'auth']], function(){

	Route::get('/home', function(){
		if(Auth::user()->Admin == 1){
			return redirect('dashboard');
		}
		else{
			$users['users'] = \App\User::all();
			return redirect('emp_dashboard')->with($users);
		}
	});

});

Route::get('/trymonth', 'EmployeeController@trymonth')

;
Route::get('/testing', 'HomeController@testing');

Route::get('viewpayroll/{id}', 'PayrollController@viewpayroll');
Route::get('vieweditpayroll/{id}/{idnum}', 'PayrollController@vieweditpayroll');

Route::get('searchpayroll/{date}/{id}', 'PayrollController@searchpayroll');
Route::get('searchpayrollreset/{id}', 'PayrollController@searchpayrollreset');


Route::get('/addasnew', 'PayrollController@store');
Route::get('/updatepay/{id}', 'PayrollController@updatepayroll');

Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');	
	Route::get('/admin/setting','AdminController@setting');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
});


Route::get('/addpayroll/{id}', 'PayrollController@addpayroll');
Route::get('/showPrinteshowmployee/{id}', 'PayslipController@showPrintemployee');

Route::post('/adminchangepass', 'EmployeeController@adminchangepass');

Route::post('/admin/setting','AdminController@adminavatar');

Route::post('/admin/newadmin', 'UserController@newadmin');


Route::get('/getovertime/{idn}/{dateFrom}/{dateTo}', 'PayrollController@getovertime');
Route::get('/getundertime/{idn}/{dateFrom}/{dateTo}', 'PayrollController@getundertime');
Route::get('/getlate/{idn}/{dateFrom}/{dateTo}', 'PayrollController@getlate');
Route::get('/getabsent/{idn}/{dateFrom}/{dateTo}', 'PayrollController@getabsent');



// pang try ng mga function 
Route::get('/Payrolltry', 'PayrollController@getundertime');

