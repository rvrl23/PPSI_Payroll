<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Charts\EmployeeChart;
use App\Charts\MainChart;
use App\user_profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;
use DB;
use Image;
use App\Payroll;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index(){
      $chart = new SampleChart;
      $emp_chart = new MainChart;
      $id = Auth::user()->idnumber;

      $chart->title('asas');
      $chart->labels(['ph','uk','operation']);
      $chart->dataset('Sample', 'pie', [10,20,30]);

      $countPayroll = DB::table('payrolls')
      ->select('*')
      ->where('idnumber', $id)
      ->whereNull('deleted_at')
      ->count();

      $countdataset = 'Last '. $countPayroll .' salary';


      $pay = DB::table('payrolls')
      ->select('*')
      ->where('idnumber', $id)
      ->whereNull('deleted_at')
      ->orderBy('cut_off', 'desc')
      ->get();

      if($countPayroll == 0)
      {
        $emp_chart->labels(['w','w']);
        $emp_chart->dataset('Last 3 salary', 'line', [1,1]);
        $emp_chart->Color =  "#000";
      }
      else
      {
      
      $label = array();
      $value = array();
      foreach($pay as $p)
      {
        $label[] = $p->cut_off;
        $value[] = $p->netpay;
      }
      
      if(@$label[4] != null)
      {

        $label1 = new Carbon($label[0]);
        $label2 = new Carbon($label[1]);
        $label3 = new Carbon($label[2]);
        $label4 = new Carbon($label[3]);
        $label5 = new Carbon($label[4]);

        $monthName1 = date("F", mktime(0, 0, 0, $label1->month, 1));
        $monthName2 = date("F", mktime(0, 0, 0, $label2->month, 1));
        $monthName3 = date("F", mktime(0, 0, 0, $label3->month, 1));
        $monthName4 = date("F", mktime(0, 0, 0, $label4->month, 1));
        $monthName5 = date("F", mktime(0, 0, 0, $label5->month, 1));

        $day1 = $label1->day;
        $day2 = $label2->day;
        $day3 = $label3->day;
        $day4 = $label4->day;
        $day5 = $label5->day;

        $emp_chart->labels([$monthName5.' '.$day5,$monthName4.' '.$day4,$monthName3.' '.$day3,$monthName2.' '.$day2,$monthName1.' '.$day1]);
        $emp_chart->dataset('Last 5 salary', 'line', [@$value[4],@$value[3],@$value[2],@$value[1],@$value[0]]);
      }

      else if(@$label[4] == null && @$label[3] != null)
      {
        $label1 = new Carbon($label[0]);
        $label2 = new Carbon($label[1]);
        $label3 = new Carbon($label[2]);
        $label4 = new Carbon($label[3]);

        $monthName1 = date("F", mktime(0, 0, 0, $label1->month, 1));
        $monthName2 = date("F", mktime(0, 0, 0, $label2->month, 1));
        $monthName3 = date("F", mktime(0, 0, 0, $label3->month, 1));
        $monthName4 = date("F", mktime(0, 0, 0, $label4->month, 1));

        $day1 = $label1->day;
        $day2 = $label2->day;
        $day3 = $label3->day;
        $day4 = $label4->day;

        $emp_chart->labels([$monthName4.' '.$day4,$monthName3.' '.$day3,$monthName2.' '.$day2,$monthName1.' '.$day1]);
        $emp_chart->dataset($countdataset, 'line', [@$value[3],@$value[2],@$value[1],@$value[0]]);
      }
      else if(@$label[3] == null && @$label[2] != null)
      {
        $label1 = new Carbon($label[0]);
        $label2 = new Carbon($label[1]);
        $label3 = new Carbon($label[2]);

        $monthName1 = date("F", mktime(0, 0, 0, $label1->month, 1));
        $monthName2 = date("F", mktime(0, 0, 0, $label2->month, 1));
        $monthName3 = date("F", mktime(0, 0, 0, $label3->month, 1));

        $day1 = $label1->day;
        $day2 = $label2->day;
        $day3 = $label3->day;

        $emp_chart->labels([$monthName3.' '.$day3,$monthName2.' '.$day2,$monthName1.' '.$day1]);
        $emp_chart->dataset($countdataset,'line', [@$value[2],@$value[1],@$value[0]]);
      }
      else if(@$label[2] == null && @$label[1] != null)
      {
        $label1 = new Carbon($label[0]);
        $label2 = new Carbon($label[1]);

        $monthName1 = date("F", mktime(0, 0, 0, $label1->month, 1));
        $monthName2 = date("F", mktime(0, 0, 0, $label2->month, 1));

        $day1 = $label1->day;
        $day2 = $label2->day;

        $emp_chart->labels([$monthName2.' '.$day2,$monthName1.' '.$day1]);
        $emp_chart->dataset($countdataset, 'line', [@$value[1],@$value[0]]);
      }
      else if(@$label[1] == null && @$label[0] != null)
      {
        $label1 = new Carbon($label[0]);

        $monthName1 = date("F", mktime(0, 0, 0, $label1->month, 1));

        $day1 = $label1->day;

        $emp_chart->labels([$monthName1.' '.$day1]);
        $emp_chart->dataset($countdataset, 'line', [@$value[0]]);
      }
    

      

      }

       $payslips = DB::table('user_profiles')
        
        ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
        ->select('*','payrolls.id as payid', 'payrolls.deleted_at as pda')
        ->whereNull('payrolls.deleted_at')
        ->where('payrolls.idnumber', $id)
        ->orderBy('payrolls.cut_off','desc')
        ->paginate(5);

        $joinn = DB::table('user_profiles')
          
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->whereNull('payrolls.deleted_at')
          ->paginate(10);

        // return view('samplechart',  compact('chart'), compact('chart2'));
        return view('employee.dashboard',  compact('chart'), compact('emp_chart'))->with('payslips', $payslips)->with('countPayroll', $countPayroll)->with('id', $id)->with('joinn', $joinn);
    }

    public function manageaccount(){

     $id = Auth::user()->idnumber;
     $in = DB::table('user_profiles')
      ->select('*')
      ->whereNull('deleted_at')
      ->where('user_profiles.id_number', $id)
      ->first();

     $users = DB::table('users')
      ->select('*')
      ->where('idnumber', $id)
      ->first();

      // $id = Auth::user()->idnumber;
      // $info = user_profiles::all();


      return view('employee.Manage_Profile')->with('in', $in)->with('users', $users);
    }

    public function selectedRange($datefrom, $dateto){

      $idd = Auth::user()->idnumber;
      $payslips = DB::table('user_profiles')
          
        ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
        ->select('*','payrolls.id as payid', 'payrolls.deleted_at as pda')
        ->whereNull('payrolls.deleted_at')
        ->where('payrolls.idnumber', $idd)
        ->whereBetween('cut_off',array($datefrom,$dateto))
        ->orderBy('payrolls.cut_off','desc')
        ->paginate(5);

        return view('others.EmployeeRange')->with('payslips', $payslips);

    }


    public function AccountInfo($id)
    {

      $select = DB::table('users')
        ->select('*')
        ->where('idnumber', $id)
        ->get();
        return view('others.showaccount')->with('select', $select);

    }

    public function update(Request $request, $id, $idnumber)
    {
      $change_employee = user_profile::find($id);

      $birth = $request->input('birthdate');
      $birthdate = new DateTime($birth);
      $now = new DateTime();
      $difference = $now->diff($birthdate);
      $age = $difference->y;


      $change_employee->fname = ucfirst($request->input('fname'));  
      $change_employee->mname = ucfirst($request->input('mname'));  
      $change_employee->lname = ucfirst($request->input('lname'));  
      $change_employee->birthdate = $request->input('birthdate');  
      $change_employee->address = $request->input('address');  
      $change_employee->contact = $request->input('contact'); 
      $change_employee->age = $age; 
      $change_employee->gender = $request->input('gender'); 

      $change_employee->save();

      $change_name_account = User::where('idnumber', $idnumber)->first();
      $change_name_account->name = $request->input('fname').' '.$request->input('mname').' '.$request->input('lname');
      $change_name_account->save();


      return redirect('/manageaccount')->with('message', 'edited successfully');

    }

    public function changeuser(Request $request){
      $id = Auth::user()->id;
      $change_user = User::find($id);

      $change_user->email = $request->input('newuser');
      $change_user->save();

      return redirect('/manageaccount')->with('message', 'email changed successfully');

    }

    // public function changepass(Request $request){
    //   $id = Auth::user()->id;
    //   $change_user = User::find($id);
    //   $pass = $request->input('newpass');
    //   $change_user->password = bcrypt($pass);
    //   $change_user->save();

    //   return redirect('/manageaccount')->with('message', 'password changed successfully');
    // }

    public function changepass(Request $request){
       try {
                $valid = validator($request->only('oldpass', 'newpass', 'confirmpass'), [
                    'oldpass' => 'required|string|min:4',
                    'newpass' => 'required|string|min:4|different:oldpass',
                    'confirmpass' => 'required_with:newpass|same:newpass|string|min:6',
                        ], [
                    'confirmpass.required_with' => 'Confirm password is required.'
                ]);

                if ($valid->fails()) {
                    return redirect('/manageaccount')->with('flash_message_success','Failed to update password');
                   
                }
                if (Hash::check($request->get('oldpass'), Auth::user()->password)) {
                    $user = User::find(Auth::user()->id);
                    $user->password = (new BcryptHasher)->make($request->get('newpass'));
                    if ($user->save()) {

                        return redirect('/manageaccount')->with('message','Your password has been updated!');
                    }
                } else {
                    return redirect('/manageaccount')->with('message','Wrong password entered!');
                }
            } catch (Exception $e) {
                return redirect('/manageaccount')->with('message','Please try again');
            }
        
    }


    public function checkuser($user)
    {
      $select = DB::table('users')
      ->select('*')
      ->where('email', $user)
      ->count();

      return $select;
    }


    public function checkpass($pass)
    {
      $select = DB::table('users')
      ->select('*')
      ->where('password', bcrypt($pass))
      ->count();

      return $select;
    }

     public function update_avatar(Request $request, $id, $idnumber){

        $change_employee = user_profile::find($id);

      $birth = $request->input('birthdate');
      $birthdate = new DateTime($birth);
      $now = new DateTime();
      $difference = $now->diff($birthdate);
      $age = $difference->y;


      $change_employee->first_name = $request->input('fname');  
      $change_employee->middle_name = $request->input('mname');  
      $change_employee->surname = $request->input('lname');  
      $change_employee->birthdate = $request->input('birthdate');  
      $change_employee->address = $request->input('address');  
      $change_employee->contact = $request->input('contact'); 
      $change_employee->gender = $request->input('gender'); 

      $change_employee->save();

      $change_name_account = User::where('idnumber', $idnumber)->first();
      $change_name_account->name = $request->input('fname').' '.$request->input('mname').' '.$request->input('lname');
      $change_name_account->save();

      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }
      return redirect('/manageaccount')->with('message', 'edited successfully');
    }

    public function newadmin(Request $request){
      // return 'ss';
      $newad = new User;
      $newad->name = $request->input('name');
      $newad->email = $request->input('email');
      $newad->password = bcrypt($request->get('password'));
      $newad->admin = "1";
      $newad->save();


      return redirect('/admin/setting')->with('newadmin', 'new admin created');
    }

    // public function createaccount(Request $request){
    //   $user = new User;
    //   $user->idnumber = $request->('emp_idnumber');
    //   $user->email = $request->('email');
    //   $user->name = $request->('emp_name');
    //   $user->password = $request->('password');
    //   $user->save();

    //   return redirect('employee')->with('message', 'account created');
    // }
}
