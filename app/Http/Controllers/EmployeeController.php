<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Charts\EmployeeChart;
use App\Charts\SampleChart;
use App\Charts\MainChart;
use App\activity;
use App\user_profile;
use App\User;
use App\Payroll;
use App\employee;
use App\Attendance;
use App\intern_schedule;
use Storage;
use DB;
use DateTime;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *g11PKcc1HyjSrQzglPsDecAsNNslN03KuCQbJiaqXTFMi3MhQRiWa7E72H1F
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       
        $employees = DB::table('user_profiles')
          
          ->join('employees', 'user_profiles.id_number', '=', 'employees.id_number')
          ->select('*')
          ->get();

        $employeeWithAccount = DB::table('user_profiles')
          
          ->join('users', 'user_profiles.id_number', '=', 'users.idnumber')
          ->join('employees', 'users.idnumber', '=', 'employees.id_number')
          ->select('*', 'users.email as uemail', 'user_profiles.id as empid')
          ->whereNull('user_profiles.deleted_at')
          ->get();


        $employeeCount = $employees->count();
        return view('admin.employee')->with("employees",$employeeWithAccount)->with('employeeCount', $employeeCount);
    }

    public function activity($message, $id, $page){
          $activity = new activity;
        
            $activity->username = Auth::user()->name;
            $activity->action = $message;
            $activity->action_id = $id;
            $activity->save();

             return redirect("".$page."")->with("message", $message);
    } 
    public function store(Request $request){
         
      $employee = new user_profile;

      // $birth = $request->input('birthdate');
      // $birthdate = new DateTime($birth);
      // $now = new DateTime();
      // $difference = $now->diff($birthdate);
      // $age = $difference->y;

      $employee->first_name = ucfirst($request->input('fname'));
      $employee->middle_name = ucfirst($request->input('mname'));
      $employee->surname = ucfirst($request->input('lname'));
      $employee->birthdate = $request->input('birthdate');
      $employee->id_number = $request->input('idnumber');
      $employee->position = ucfirst($request->input('position'));
      $employee->department = $request->input('department');
      $employee->designation = $request->input('designation');
      $employee->address = $request->input('address');
      $employee->email = $request->input('email');
      $employee->contact = $request->input('contact');
      $employee->gender = $request->input('gender');

      $employee->save();


      $xtra_info = new employee;

      $xtra_info->id_number = $request->input('idnumber');
      $xtra_info->sss = $request->input('sss');
      $xtra_info->pagibig = $request->input('hdmf');
      $xtra_info->tin = $request->input('tin');
      $xtra_info->philhealth = $request->input('philhealth');

      $xtra_info->save();


      $user = new User;

      $user->name = ucfirst($request->input('fname')).' '.ucfirst($request->input('mname')).' '.ucfirst($request->input('lname'));
      $user->email = $request->input('email');
      $user->password = bcrypt(ucfirst($request->input('fname')).ucfirst($request->input('mname')).ucfirst($request->input('lname')).$request->input('birthdate'));
      $user->idnumber = $request->input('idnumber');
      $user->save();


      $Schedule1 = new intern_schedule();
        $Schedule1->designation = $request->designation;
        $Schedule1->day = "Mon";
        $Schedule1->id_number = $request->idnumber;
        $Schedule1->time_in = "8:00";
        $Schedule1->time_out = "17:00";
        $Schedule1->time_break = "12:00";
        $Schedule1->save();

        $Schedule2 = new intern_schedule();
        $Schedule2->designation = $request->designation;
        $Schedule2->day = "Tue";
        $Schedule2->id_number = $request->idnumber;
        $Schedule2->time_in = "8:00";
        $Schedule2->time_out = "17:00";
        $Schedule2->time_break = "12:00";
        $Schedule2->save();

        $Schedule3 = new intern_schedule();
        $Schedule3->designation = $request->designation;
        $Schedule3->day = "Wed";
        $Schedule3->id_number = $request->idnumber;
        $Schedule3->time_in = "8:00";
        $Schedule3->time_out = "17:00";
        $Schedule3->time_break = "12:00";
        $Schedule3->save();

        $Schedule4 = new intern_schedule();
        $Schedule4->designation = $request->designation;
        $Schedule4->day = "Thu";
        $Schedule4->id_number = $request->idnumber;
        $Schedule4->time_in = "8:00";
        $Schedule4->time_out = "17:00";
        $Schedule4->time_break = "12:00";
        $Schedule4->save();

        $Schedule5 = new intern_schedule();
        $Schedule5->designation = $request->designation;
        $Schedule5->day = "Fri";
        $Schedule5->id_number = $request->idnumber;
        $Schedule5->time_in = "8:00";
        $Schedule5->time_out = "17:00";
        $Schedule5->time_break = "12:00";
        $Schedule5->save();

      return $this->activity('Added Employee', $request->input('idnumber'),'employee');

    }
    public function create(){
        return view('admin.addemp');
        
    }
    // public function show($id){
    //    $joinn = DB::table('user_profiles')
          
    //       ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
    //       ->select('*')
    //       ->where('payrolls.id', $id)
    //       ->get();
          

    //     return view('admin.view')->with("joinn",$joinn);
        
    // }
    public function edit($id){
        $employees = user_profile::find($id);

        return view('admin.edit')->with("employees",$employees);
    }
    public function update(Request $request,$id){

        $toEditId = user_profile::select('*')->where('id', $id)->first();
        $aaq = $toEditId->id_number;
        $change_name_account = User::where('idnumber', $aaq)->first();
        $change_name_account->name = ucfirst($request->input('edit_fname')).' '.ucfirst($request->input('edit_mname')).' '.ucfirst($request->input('edit_lname'));
        $change_name_account->idnumber = $request->input('edit_idnumber');
        $change_name_account->save();

        $checkpayroll = Payroll::select('*')->where('idnumber', $aaq)->count();

        if($checkpayroll > 0)
        {
          $change_idnumber_payroll = Payroll::where('idnumber', $aaq)->first();
          $change_idnumber_payroll->idnumber = $request->input('edit_idnumber');
          $change_idnumber_payroll->save();
        }

        $bcidnubmer = user_profile::select('*')->where('id', $id)->first();
        $oop = $bcidnubmer->id_number;

        $xtra_info = employee::where('id_number',$oop)->first();
        $xtra_info->id_number = $request->input('edit_idnumber');
        $xtra_info->sss = $request->input('edit_sss');
        $xtra_info->pagibig = $request->input('edit_hdmf');
        $xtra_info->tin = $request->input('edit_tin');
        $xtra_info->philhealth = $request->input('edit_philhealth');

        $xtra_info->save();

        $employee = user_profile::find($id);

        $employee->first_name = ucfirst($request->input('edit_fname'));
        $employee->middle_name = ucfirst($request->input('edit_mname'));
        $employee->surname = ucfirst($request->input('edit_lname'));
        $employee->birthdate = $request->input('edit_birthdate');

        $employee->id_number = $request->input('edit_idnumber');
        $employee->position = ucfirst($request->input('edit_position'));
        $employee->department = $request->input('edit_department');
        $employee->designation = $request->input('edit_designation');
        $employee->address = $request->input('edit_address');
        $employee->email = $request->input('edit_email');
        $employee->contact = $request->input('edit_contact');

        $employee->save();

        return $this->activity('Edited Employee', $id,'employee');
    }
    public function destroy($id){
           user_profile::destroy($id);

          return $this->activity('Employee Deleted', $id,'employee');
    }
    
    // auto fill ing email saka name para sa insert ng account
    // public function createAccountInfo($id)
    // {
    //     $select = DB::table('user_profiles')
    //       ->select('*')
    //       ->where('idnumber', $id)
    //       ->get();
    //       return $select;

    // }

    // pang view ng payslip ng employee na naka login
    public function viewEmployeePayslips($id)
    {
      $select = DB::table('payrolls')
      ->select('*')
      ->where('emp_id', $id)
      ->get();

      return view('userlevel.viewpayslip')->with('select', $select);

    }

    public function permanent_delete_employee($id){
        $employee = user_profile::onlyTrashed()->find($id)
        ->forceDelete();
        return $this->activity('Permanent Deleted Employee', $id,'archive');
    }


    public function restore_employee($id){
        $employee = user_profile::onlyTrashed()->find($id)
        ->restore();

        return $this->activity('Restored Employee', $id,'archive');
    }

    public function trymonth(){
      // $max =  DB::table('payrolls')->where('cut_off', DB::raw("(select max(`cut_off`) from payrolls)"))->first();
      $max = Payroll::whereRaw('cut_off = (select max(`cut_off`) from payrolls where idnumber = '.'123123'.')')->first();

      // $tryquery = DB::table('att')->select(DB::raw('SELECT A.*, attendances.date FROM (SELECT id_number, first_name, surname FROM user_profiless UNION SELECT id_number, first_name, surname FROM user_profiless_emp) AS A LEFT OUTER JOIN attendances on attendances.id_number = A.id_number AND attendances.date != "2019-02-07"'))

       $second = DB::table('payrolls')
      ->select('*')
      ->where('cut_off', '<', $max->cut_off)
      ->orderBy('cut_off', 'DESC')
      ->first();

      $countPayroll = DB::table('payrolls')
      ->select('*')
      ->where('idnumber', 12)
      ->count();

      // DB::whereRaw("SELECT MAX(cut_off) 
      // FROM  payrolls
      // WHERE cut_off < (SELECT MAX(cut_off) from payrolls)");

      $last1 = new Carbon($max->cut_off);

      $last2 = new Carbon('2019-05-01');
      $last2->subMonths(2);
      

      $monthNum = 5;
      $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));


       $basic1 = DB::table("payrolls")
        ->select('*')
        ->where('cut_off', $last1->toDateString())
        ->where('idnumber', Auth::user()->idnumber)
        ->first();

      return $countPayroll;
    }

    public function attendance(){

      // for calendar ------------------------------------------------
      $events = Attendance::where('id_number',Auth::user()->idnumber)->get();
      $event_list = [];
      foreach($events as $key => $event){
        $event_list[] = Calendar::event(
          'start: '.$event->time_in.
          'end: '.$event->time_out ,
          true,
          new \DateTime($event->date),
          new \DateTime($event->date.'+1 day'),
          'color:'.'#16a085'
        );
      }
      $calendar_details = Calendar::addEvents($event_list);
      // end of calendar ------------------------------------------------


      // for chart ------------------------------------------------

      $idn = Auth::user()->idnumber;

      $late = Attendance::select('*')
      ->where('late', '!=', '00:00:00')
      ->where('id_number', $idn)
      ->count(); 

      $overtime = DB::select(DB::raw('select TIMEDIFF(total_today, "08:00:00") as overtime FROM attendances where TIMEDIFF(total_today, "08:00:00") > "00:00:00" and id_number = '.$idn.''));

      $xover = 0;
      foreach($overtime as $over)
      {
        $xover = $xover + 1;
      }
      // SELECT TIMEDIFF(total_today, "08:00:00") FROM `attendances` where TIMEDIFF(total_today, "08:00:00") > '00:00:00'

      $undertime = Attendance::select('*')
      ->where('undertime', '!=', '00:00:00')
      ->where('id_number', $idn)
      ->count();

      $ontime = DB::select(DB::raw('select time_in FROM attendances where time_in <= "08:00:00" and id_number = '.$idn.''));
      $xon = 0;
      foreach($ontime as $over)
      {
        $xon = $xover + 1;
      }


      $att_chart = new EmployeeChart;
      $att_chart->labels(['Undertime','Overtime','Late','Ontime']);
      $att_chart->dataset('', 'bar', [$undertime,$xover,$late,$xon]);
      // end of chart ------------------------------------------------


      // under the chart ----------------------------------------------

      // for late -----------------------------------------------
      $selectLate = Attendance::select('late')->where('id_number', $idn)->get();

      $tl = 0;
      foreach($selectLate as $a)
      {
        $onetime = $a->late;
        $secs = strtotime($onetime)-strtotime("00:00:00");
        $tl = $tl + $secs;
      }

      $result_total_late = date("H:i:s",strtotime('00:00:00')+$tl);
      // end of late ----------------------------------------------


      // undertime ------------------------------------------------
        $selectundertime = Attendance::select('undertime')->where('id_number', $idn)->whereNotNull('undertime')->get();

        $ut = 0;
        foreach($selectundertime as $a)
        {
          $onetime = $a->undertime;
          $secs = strtotime($onetime)-strtotime("00:00:00");
          $ut = $ut + $secs;
        }
        
        $result_total_undertime = date("H:i:s",strtotime('00:00:00')+$ut);
      // end of undertime -------------------------------------------


      // overtime ------------------------------------------------------

        $ot = 0;
        foreach($overtime as $a)
        {
          $onetime = $a->overtime;
          $secs = strtotime($onetime)-strtotime("00:00:00");
          $ot = $ot + $secs;
        }

        $result_total_overtime = date("H:i:s",strtotime('00:00:00')+$ot);

      // end of overtime -----------------------------------------------



      // end of under the chart ----------------------------------------------

      //  for displaying attendances table

        $attable = Attendance::select('*')->where('id_number', Auth::user()->idnumber)->get();

      return view('employee.attendance', compact('att_chart'), compact('calendar_details'))->with('result_total_late', $result_total_late)->with('result_total_undertime', $result_total_undertime)->with('result_total_overtime', $result_total_overtime)->with('attable',$attable);
    }


    // for employee page ----------------------------------------
    public function changeuser(Request $request){

      $validatedData = $request->validate([
        'username' => 'required|unique:email'
      ]);

      $id = Auth::user()->id;
      $change_user = User::find($id);

      $change_user->email = $request->input('newuser');
      $change_user->save();

      return redirect('/manageaccount')->with('message', 'email changed successfully');

    }

    public function changepass(Request $request){
      $id = Auth::user()->id;
      $change_user = User::find($id);
      $pass = $request->input('newpass');
      $change_user->password = bcrypt($pass);
      $change_user->save();

      return redirect('/manageaccount')->with('message', 'password changed successfully');
    }
    // ---------------------------------------------------------------

    public function adminchangepass(Request $request){

      $id = $request->input('id');
      $pass = $request->input('password');

      $change_user = User::where('idnumber', $id)->first();
      $change_user->password = bcrypt($pass);
      $change_user->save();

      return redirect('/employee')->with('message', 'password changed successfully');
    }

    public function checkuser($user)
    {
      $select = DB::table('users')
      ->select('*')
      ->where('email', $user)
      ->count();

      return $select;
    }



}