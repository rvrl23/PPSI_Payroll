<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MainChart;
use App\Payroll;
use App\user_profile;	
use App\activity;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index(){

         $payrollcount = DB::table('payrolls')
             ->select(DB::raw('count(id) as id'))
             ->whereNull('deleted_at')
             ->first();

         $log = activity::select('*')->orderBy('id', 'DESC')->paginate(10);


          //  for department chart
         $chart2 = new MainChart;

         $payrollDepartment = DB::table('user_profiles')
          ->select('department')
          ->groupBy('department')
          ->get();


          $countDepartment = DB::table('user_profiles')
          ->select('department')
          ->groupBy('department')
          ->get();
          $cc = 0;

          foreach ($countDepartment as $cdept) {
            $cc = $cc + 1;
          }

          $asa = array();

          foreach ($payrollDepartment as $p) {
            $asa[] = $p->department; 
          }

          
          $v1 = DB::table('user_profiles')
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('department', @$asa[0])
          ->count();

          $v2 = DB::table('user_profiles')
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('department', @$asa[1])
          ->count();

          $v3 = DB::table('user_profiles')
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('department', @$asa[2])
          ->count();

          $v4 = DB::table('user_profiles')
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('department', @$asa[3])
          ->count();

          $v5 = DB::table('user_profiles')
          ->join('payrolls', 'user_profiles.id_number', '=', 'payrolls.idnumber')
          ->select('*','payrolls.id as payid')
          ->where('department', @$asa[4])
          ->count();



          if($cc <= 0)
          {
            $chart2->labels('qw');
            $chart2->dataset('Sample', 'pie', [1]);
          }
          else if($cc == 1)
          {
            $chart2->labels($asa);
            $chart2->dataset('Sample', 'pie', [@$v1]);
          }
          else if($cc == 2)
          {
            $chart2->labels($asa);
            $chart2->dataset('Sample', 'pie', [@$v1,@$v2]);
          }
          else if($cc == 3)
          {
            $chart2->labels($asa);
            $chart2->dataset('Sample', 'pie', [@$v1,@$v2,@$v3]);
          }
          else if($cc == 4)
          {
            $chart2->labels($asa);
            $chart2->dataset('Sample', 'pie', [@$v1,@$v2,@$v3,@$v4]);
          }
          else
          {
            $chart2->labels([@$asa[0],@$asa[1],@$asa[2],@$asa[3],@$asa[4]]);
            $chart2->dataset('Sample', 'pie', [@$v1,@$v2,@$v3,@$v4,@$v5]);
          }

          

          // for cut off chart

          $chart = new MainChart;

          $payrollmonth = Payroll::select('*')
          ->groupBy('cut_off')
          ->orderBy('cut_off', 'desc')
          ->get();

          $countpayrollmonth = $payrollmonth->count();
          $pm = array();
          $pc = array();

          foreach($payrollmonth as $pa)
          {
            $pm[] = $pa->cut_off;
          }
          
          $pcount1 = Payroll::select('*')
          ->where('cut_off', @$pm[0])
          ->count();

          $pcount2 = Payroll::select('*')
          ->where('cut_off', @$pm[1])
          ->count();

          $pcount3 = Payroll::select('*')
          ->where('cut_off', @$pm[2])
          ->count();

          $pcount4 = Payroll::select('*')
          ->where('cut_off', @$pm[3])
          ->count();

          $pcount5 = Payroll::select('*')
          ->where('cut_off', @$pm[4])
          ->count();
        

          if($countpayrollmonth <= 0)
          {
            $chart->labels(['ss','ss']);
            $chart->dataset('Payroll every cut-off', 'bar', [10,2]);
          }
          else if($countpayrollmonth == 1)
          {
            $chart->labels($pm);
            $chart->dataset('Payroll every cut-off', 'bar', [@$pcount1]);
          }
          else if($countpayrollmonth == 2)
          {
            $chart->labels($pm);
            $chart->dataset('Payroll every cut-off', 'bar', [@$pcount1,@$pcount2]);
          }
          else if($countpayrollmonth == 3)
          {
            $chart->labels($pm);
            $chart->dataset('Payroll every cut-off', 'bar', [@$pcount1,@$pcount2,@$pcount3]);
          }
          else if($countpayrollmonth == 4)
          {
            $chart->labels($pm);
            $chart->dataset('Payroll every cut-off', 'bar', [@$pcount1,@$pcount2,@$pcount3,@$pcount4]);
          }
          else
          {
            $chart->labels([@$pm[4],@$pm[3],@$pm[2],@$pm[1],@$pm[0]]);
            $chart->dataset('Payroll every cut-off', 'bar', [@$pcount5,@$pcount4,@$pcount3,@$pcount2,@$pcount1]);
          }

          

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

          $pendingCount = $pending->count();

            // $chart->labels(['f']);
            // $chart->dataset('Payroll every cut-off', 'bar', [3]);
            $chart3 = new MainChart;

            $chart3->labels(['f']);
            $chart3->dataset('Payroll every cut-off', 'pie', [3]);

    	return view('admin.dashboard', compact('chart'), compact('chart2'))->with('log', $log)->with('payrollcount', $payrollcount)->with('pending', $pending)->with('countpayrollmonth', $countpayrollmonth)->with('pendingCount', $pendingCount);
    }

    public function singleview($id)
    {
    	$single = DB::table('user_profiles')
    	->select('*')
    	->where('id_number', $id)
    	->first();

    }

    public function viewall($id)
    {
    	$single = DB::table('activities')
    	->select('*')
    	->where('idnumber', $id)
    	->get();

    }
   
}
