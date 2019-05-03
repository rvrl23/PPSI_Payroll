<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\database\eloquent\Model;
use Illuminate\Support\Facades\View;
use App\user_profile;
use App\Payroll;
use App\recently_printed;
use Auth;
use DB;

class PayslipController extends Controller
{
    public function index(){
    	$employees = user_profile::all();
    	$payrolls = Payroll::all();

        $joinn = DB::table('user_profiles')
          
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->whereNull('payrolls.deleted_at')
          ->get();


        $walangpayroll = DB::table('user_profiles')

    	  ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('cut_off','')
          ->get();
         
         // return $joinn

        $printed =  recently_printed::select('*')->paginate(5);

         $deleted = DB::table('user_profiles')
          
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid', 'payrolls.deleted_at as pda')
          ->whereNotNull('payrolls.deleted_at')
          ->get();


          $joinCount = $joinn->count();

        return view('admin.payslip')->with("payrolls",$payrolls)->with("employees",$employees)->with("joinn",$joinn)->with("walangpayroll",$walangpayroll)->with("printed", $printed)->with('deleted', $deleted)->with('joinCount', $joinCount);
    }

    public function showPrint($id){
      // $payrollid = Payroll::find($id);

      $joinn = DB::table('user_profiles')
        ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
        // ->where('payrolls.id',$id)
        // ->where('user_profiles.id', $id)
        
        ->get();

      foreach($joinn as $join ){
      $employee = new recently_printed;
        $name = $join->first_name.' '.$join->middle_name.' '.$join->surname;
        $employee->name = $name;
        $employee->cut_off = $join->cut_off;
        $employee->printed_by = Auth::user()->name;
        $employee->save();  
      }
      return view('others.print_payslip')->with("joinn",$joinn);
      // return $joinn;
    }

    public function showPrintUser($id){
      // $payrollid = Payroll::find($id);

      $joinn = DB::table('user_profiles')
        
        ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
        ->select('*')
        ->where('payrolls.id', $id)
        ->first();

      return view('others.print_payslip_employee')->with("joinn",$joinn);
    }

        public function showPrintemployee($id){

          $joinn=DB::table('user_profiles')

          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*')
          ->where('payrolls.id', $id)
          ->first();

      return view('others.payslip_employee')->with("joinn",$joinn);
          
        }

}
