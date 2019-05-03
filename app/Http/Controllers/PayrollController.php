<?php

namespace App\Http\Controllers;
use App\activity;
use App\Attendance; 
use App\Payroll;
use App\user_profile;	
use App\Charts\SampleChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use illuminate\database\eloquent\Model;
use DB;
use Validator;


class PayrollController extends Controller
{

    // public function activity($message, $id, $page){
    //   $activity = new activity;

    //     $activity->username = Auth::user()->name;
    //     $activity->action = $message;
    //     $activity->action_id = $id;
    //     $activity->save();

    //      return redirect("".$page."");
    // } 

    public function index()
    { 
      $employees = user_profile::all();
    	$payrolls = Payroll::select('*')->paginate(5);

        $joinn = DB::table('user_profiles')
          
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.idnumber as payid')
          ->whereNull('payrolls.deleted_at')
          ->groupBy('user_profiles.id_number')
          ->get();

          $thismonth = DB::table('user_profiles')
          
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->whereNull('payrolls.deleted_at')
          ->whereMonth('payrolls.cut_off',date('m'))
          ->whereYear('payrolls.cut_off',date('Y'))
          ->get();


        $walangpayroll = DB::table('user_profiles')

    	  
         ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('cut_off','')
          ->get();

          // $max = Payroll::whereRaw('cut_off = (select max(`cut_off`)  md from payrolls)')->first();

          // for no payroll

          $idnumsquery = Payroll::select('idnumber')->get();

          $idnum = array();
          foreach($idnumsquery as $idn)
          {
            $idnum[] = $idn->idnumber;
          }

          $nopayroll = user_profile::select('*')
          ->whereNotIn('id_number', $idnum)
          ->get();

          // end of no payroll


          // for created payroll


          if(date('d') <= 15)
          {
            $checkcreated = DB::table('payrolls')
              ->whereMonth('cut_off', date('m'))
              ->whereDay('cut_off', '<=', '15')
              ->get();
          }
          else if(date('d') > 15 && date('d') <= 31)
          {
            $checkcreated = DB::table('payrolls')
              ->whereMonth('cut_off', date('m'))
              ->whereDay('cut_off', '>=', '30')
              ->get();
          }

           $checkedcreated = array();
           foreach($checkcreated as $cc)
            {
              $checkedcreated[] = $cc->cut_off;
            }

          $created = DB::table('user_profiles')
          
            ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
            ->select('*')
            ->whereNull('payrolls.deleted_at')
            ->whereIn('payrolls.cut_off', $checkedcreated)
            ->get();


          // end of created payroll


          // for pending payroll
          $monthtoday = Carbon::now();

          $checkedidcreated = array();
           foreach($created as $cc)
            {
              $checkedidcreated[] = $cc->idnumber;
            }

          if(date('d') <= 15)
          {
            $checkpending = DB::table('payrolls')
              ->where('cut_off', '<', date('y-m').'-15')
              // ->whereMonth('cut_off', $monthtoday->subMonth(1))
              ->get();
          }
          else if(date('d') > 15 && date('d') <= 31)
          {
            $checkpending = DB::table('payrolls')
              ->whereMonth('cut_off', date('m'))
              ->whereDay('cut_off', '<=', '15')
              ->get();
          }

           $checkedpending = array();
           foreach($checkpending as $cc)
            {
              $checkedpending[] = $cc->cut_off;
            }


          $pending = DB::table('user_profiles')
          
            ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
            ->select('*')
            ->whereNull('payrolls.deleted_at')
            ->whereIn('payrolls.cut_off', $checkedpending)
            ->whereNotIn('payrolls.idnumber', $checkedidcreated)
            ->groupBy('user_profiles.id_number')

            ->get();

          // end of pending payroll



          // for missed payroll

            $checkedidpending = array();
           foreach($pending as $cc)
            {
              $checkedidpending[] = $cc->idnumber;
            }

            $missed = DB::table('user_profiles')
          
            ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
            ->select('*')
            ->whereNotIn('payrolls.idnumber', $checkedidcreated)
            ->whereNotIn('payrolls.idnumber', $checkedidpending)
            ->where('cut_off', '<', date('y-m-d'))
            ->groupBy('user_profiles.id_number')
            
            ->get();

          // end of missed payroll

            // counts

            $missedCount = $missed->count();
            $pendingCount = $pending->count();
            $createdCount = $created->count();
            $nopayrollCount = $nopayroll->count();


           // return $missed;
        return view('admin.payroll')->with("payrolls",$payrolls)->with("employees",$employees)->with("joinn",$joinn)->with("walangpayroll",$walangpayroll)->with('thismonth', $thismonth)->with('nopayroll', $nopayroll)->with('created', $created)
        ->with('pending', $pending)->with('missed',$missed)->with('missedCount', $missedCount)->with('pendingCount',$pendingCount)
        ->with('createdCount', $createdCount)->with('nopayrollCount');
    }
    //  store
    public function create(){
        $employees = user_profile::all();
        return view('admin.rolladd')->with("employees",$employees);
        
    }
    public function edit($id){
        $employees = user_profile::find($id);
        return view('admin.payroll')->with("employees",$employees);
    }
    public function store(Request $request){

      $payroll = new Payroll;
      $payroll->renderedhours = $request->input('renderedhours');
      $payroll->allowance = $request->input('allowance');
      $payroll->basic = $request->input('basic');
      $payroll->overtime = $request->input('overtime');
      $payroll->nworking_holiday = $request->input('nonholiday');
      $payroll->regular_holiday = $request->input('regular');
      $payroll->late = $request->input('late');
      $payroll->undertime = $request->input('undertime');
      $payroll->absent = $request->input('absent');
      $payroll->sss = $request->input('sss');
      $payroll->hdmf = $request->input('hdmf');
      $payroll->philhealth = $request->input('philhealth');
      $payroll->holdingtax = $request->input('holdingtax');
      $payroll->deduction = $request->input('deduction'); 
      $payroll->netpay = $request->input('netpay');
      $payroll->gross = $request->input('gross');
      $payroll->cut_off = $request->input('cut_off');
      $payroll->idnumber = $request->input('idnumber');
      $payroll->otherearnings = $request->input('otherearn');
      $payroll->otherdeduction = $request->input('otherdeduct');
      $payroll->save();

      return redirect("/payroll")->with("message","File Successfully Added!");

    }

    public function destroy($id){
         Payroll::destroy($id);
        return redirect("payroll")->with('success', 'Employee has been deleted Successfully');
    }

    // public function update(Request $request, $id){
    //     $payroll = Payroll::find($id);

    //   $payroll->renderedhours = $request->input('renderedhours');
    //   $payroll->allowance = $request->input('allowance');
    //   $payroll->basic = $request->input('basic');
    //   $payroll->overtime = $request->input('overtime');
    //   $payroll->nworking_holiday = $request->input('nonholiday');
    //   $payroll->regular_holiday = $request->input('regular');
    //   $payroll->late = $request->input('late');
    //   $payroll->undertime = $request->input('undertime');
    //   $payroll->absent = $request->input('renderedhours');
    //   $payroll->sss = $request->input('sss');
    //   $payroll->hdmf = $request->input('hdmf');
    //   $payroll->philhealth = $request->input('philhealth');
    //   $payroll->holdingtax = $request->input('holdingtax');
    //   $payroll->netpay = $request->input('netpay');
    //   $payroll->cut_off = $request->input('cut_off');
    //   $payroll->idnumber = $request->input('idnumber');


    //     $payroll->save();

    //      return redirect("/payroll");
    // }

    public function updatepayroll(Request $request, $id){
         $payroll = Payroll::find($id);

      $payroll->renderedhours = $request->input('renderedhours');
      $payroll->allowance = $request->input('allowance');
      $payroll->basic = $request->input('basic');
      $payroll->overtime = $request->input('overtime');
      $payroll->nworking_holiday = $request->input('nonholiday');
      $payroll->regular_holiday = $request->input('regular');
      $payroll->late = $request->input('late');
      $payroll->undertime = $request->input('undertime');
      $payroll->absent = $request->input('absent');
      $payroll->sss = $request->input('sss');
      $payroll->hdmf = $request->input('hdmf');
      $payroll->philhealth = $request->input('philhealth');
      $payroll->holdingtax = $request->input('holdingtax');
      $payroll->deduction = $request->input('deduction');
      $payroll->netpay = $request->input('netpay');
      $payroll->gross = $request->input('gross');
      $payroll->cut_off = $request->input('cut_off');
      $payroll->idnumber = $request->input('idnumber');
      $payroll->otherearnings = $request->input('otherearn');
      $payroll->otherdeduction = $request->input('otherdeduct');


        $payroll->save();

         return redirect("/payroll");
    }

    public function checkcutoff($id, $cut){

        $select = DB::table('payrolls')
          ->select('*')
          ->where('idnumber', $id)
          ->where('cut_off', $cut)
          ->get();

          return $select;

    }
    public function archive(){
        $employees = user_profile::select('*')->onlyTrashed()
        ->get();

        $payrolls = DB::table('user_profiles')
        ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->whereNotNull('payrolls.deleted_at')
          ->get();

    	return view('admin.archive')->with("employees",$employees)->with('payrolls',$payrolls);
    }

    public function permanent_delete_payroll($id){
        $payroll = Payroll::onlyTrashed()->find($id)
        ->forceDelete();
        return redirect('archive')->with('message', 'Payroll Successfully Deleteted!!!');

    }


    public function restore_payroll($id){
        $payroll = Payroll::onlyTrashed()->find($id)
        ->restore();
        return redirect('archive')->with('message', 'Payroll Successfully Restored');
  ;
    }

    

    public function test(){
        
    }

    public function addpayroll(){
        $employees = user_profile::all();
        return view('others.add_payroll')->with('employees', $employees);
    }

    public function viewpayroll($id){
      $payroll = Payroll::select('*')->where('idnumber', $id)->paginate(5);
      $name = user_profile::select('*')->where('id_number', $id)->first();
      $img = DB::table('users')
      ->join('user_profiles', 'users.idnumber', '=', 'user_profiles.id_number')
      ->select('*')
      ->where('users.idnumber', $id)
      ->first();
      return view('others.view_payroll')->with('payroll',$payroll)->with('name', $name)->with('img', $img);
    }

    public function vieweditpayroll($id, $idnum)
    {

      $joinn = DB::table('user_profiles')
          
      ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
      ->select('*','payrolls.idnumber as payid','payrolls.id as pid')
      ->whereNull('payrolls.deleted_at')
      ->where('payrolls.idnumber', $idnum)
      ->where('cut_off', $id)
      ->first();

      return view('others.edit_payroll')->with('joinn', $joinn);
    }

    public function searchpayroll($date,$id){

      $select = Payroll::select('*')
      ->where('cut_off', 'like', '%'.$date.'%')
      ->where('idnumber', $id)
      ->paginate(5);

      return view('others.payrollsearchresult')->with('select', $select);
    }

    public function searchpayrollreset($id){

        $select = Payroll::select('*')
        ->where('idnumber', $id)
        ->paginate(5);

      return view('others.payrollsearchresult')->with('select', $select);
    }

    public function makePayroll($id)
    {
      $select = DB::table('user_profiles')
      ->select('*')
      ->where('id_number', $id)
      ->first();

      return view('others.make_payroll')->with("select", $select);
    }

    public function getovertime($idn, $dateFrom, $dateTo)
    {
     //  Pass Total Overtime
      $overtime = DB::select(DB::raw('select TIMEDIFF(total_today, "08:00:00") as overtime FROM attendances where id_number = '.$idn.' and (date between "'.$dateFrom.'" and "'.$dateTo.'") and TIMEDIFF(total_today, "08:00:00") > "00:00:00"
        '));

      $ot = 0;
        foreach($overtime as $a)
        {
          $onetime = $a->overtime;
          $secs = strtotime($onetime)-strtotime("00:00:00");
          $ot = $ot + $secs;
        }

        $result_total_overtime = date("H",strtotime('00:00:00')+$ot);
      // end of total overtime

        return $result_total_overtime;
      }

     public function getundertime($idn, $dateFrom, $dateTo)
     {
       // Pass Total Undertime ------------------------------------------------
        // $idn = 1233211; $dateFrom = '2019-01-01'; $dateTo = '2019-01-30';
        $selectundertime = Attendance::select('undertime')->where('id_number', $idn)->whereNotNull('undertime')->whereBetween('date', array($dateFrom, $dateTo))->get();

        $ut = 0;
        foreach($selectundertime as $a)
        {
          $onetime = $a->undertime;
          $secs = strtotime($onetime)-strtotime("00:00:00");
          $ut = $ut + $secs;
        }
        
        $utt = $ut / 60;
        return $utt;
      // end of undertime -------------------------------------------

      }

       public function getlate($idn, $dateFrom, $dateTo)
       {
      // Pass Total late -----------------------------------------------
        $selectLate = Attendance::select('late')->where('id_number', $idn)->whereBetween('date', array($dateFrom, $dateTo))->get();

        $tl = 0;
        foreach($selectLate as $a)
        {
          $onetime = $a->late;
          $secs = strtotime($onetime)-strtotime("00:00:00");
          $tl = $tl + $secs;
        }

        $tll = $tl / 60;
        return $tll;

      // end of late ----------------------------------------------

      }


       public function getabsent($idn, $dateFrom, $dateTo)
       {
      // Pass Total late -----------------------------------------------
        $selectAbsent = Attendance::select('absent')->where('id_number', $idn)->whereBetween('date', array($dateFrom, $dateTo))->where('status', 'Absent')->count();

        return $selectAbsent;
    }

}
