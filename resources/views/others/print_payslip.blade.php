@extends('layouts.payroll_layouts')

@section('content')

  <div class="container print-body" style="width: 80%; margin-top:0px">
     
    @foreach ($joinn as $joinn)
  
     <div class="row row-print">
        <div class="col-xs-6">
         <img src="../img/PPSI LOGO.png" height="100px" width="400px">
        </div>
        <div class="col-xs-6">
          <h1 class="print-h" style="margin-top: 70px">PAYSLIP</h1>
        </div>
     </div>
     <hr class="print-hr">
            <div class="row row-print">

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">Name</p></label> : 
                <p class="inline-block print-font-size"> {{$joinn->first_name}} {{$joinn->middle_name}} {{$joinn->surname}}</p>
                <br>
                <label><p class="inline-block print-font-size">Department</p></label> : 
                <p class="inline-block print-font-size"> {{$joinn->first_name}} {{$joinn->middle_name}} {{$joinn->surname}}</p>
                <br>
                <label><p class="inline-block print-font-size">Salary Period</p></label> : 
                <p class="inline-block print-font-size"> {{$joinn->cut_off}}</p>
              </div>

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">Employee No</p></label> :
                <p class="inline-block print-font-size"> {{$joinn->id_number}}</p>
                <br>
                <label><p class="inline-block print-font-size">Designation</p></label> :
                <p class="inline-block print-font-size"> {{$joinn->designation}}</p>
                <br>
                <label><p class="inline-block print-font-size">Employment Status</p></label> :
                <p class="inline-block print-font-size"> ____</p>
              </div>
              
            </div>
            <hr class="print-hr">


            <div class="row row-print">

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">SEMI MONTHLY RATE</p></label> :
                <p class="inline-block print-font-size">{{$joinn->basic}}</p>
                <br>
                <label><p class="inline-block print-font-size">ALLOWANCE/ECOLA RATE</p></label> :
                <p class="inline-block print-font-size">{{$joinn->allowance}}</p>
                <br>
              </div>

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">HOURS REQUIRED</p></label> :
                <p class="inline-block print-font-size">{{$joinn->allowance}}</p>
                <br>
                <label><p class="inline-block print-font-size">HOURS WORKED</p></label> :
                <p class="inline-block print-font-size">{{$joinn->renderedhours}}</p>
               {{--  <label><p class="inline-block">Vacation Leave</p></label>
                <p class="inline-block">{{$joinn->vacation}}</p>
                <br>
                <label><p class="inline-block">Sick Leave</p></label>
                <p class="inline-block">{{$joinn->sick}}</p> --}}
              </div>

             {{--  <div class="col-md-3">
                <label><h5>Required Hours</h5></label>
                <input type="text" class="form-control textf" value="96" name="requiredhours" id="num10" readonly>
              </div> --}}
            </div>
            <hr class="print-hr">
              <div class="row rowm">
                <div class="col-xs-3">
                  <label><p class="inline-block print-font-size">EARNINGS</p></label>
                </div>
                <div class="col-xs-3">
                  <label><p class="inline-block print-font-size">AMOUNT</p></label>
                </div>
                <div class="col-xs-3">
                  <label><p class="inline-block print-font-size">DEDUCTION</p></label>
                </div>
                <div class="col-xs-3">
                  <label><p class="inline-block print-font-size">AMOUNT</p></label>
                </div>
              </div>
            <hr class="print-hr">


            <div class="row row-print">
              <div class="col-xs-6 printearnduc">
                <div>
                  <label><p class="inline-block print-font-size">GROSS SEMI MONTHLY SALARY</p></label>
                  
                  <br>
                  <label><p class="inline-block print-font-size">ALLOWANCE/ECOLA</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">VACATION LEAVE</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">SICK LEAVE</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">OVERTIME</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">HOLIDAY</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">OTHER EARNINGS</p></label> :
                  
                </div>

                <div>
                 <p class="inline-block print-font-size-num">{{$joinn->netpay}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->allowance}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->vacation}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->sick}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->overtime}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->regular_holiday}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->otherearnings}}</p>

                </div>
              </div>


              <div class="col-xs-6 printearnduc">
                <div>
                  <label><p class="inline-block print-font-size">SSS</p></label>
                  
                  <br>
                  <label><p class="inline-block print-font-size">PHILHEALTH</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">HDMF</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">W/TAX</p></label> :
                  
                  <br>
                  <label><p class="inline-block print-font-size">LATE/UNDERTIME</p></label> :
                  
                  <br>
                
                  <label><p class="inline-block print-font-size">OTHERS</p></label> :
                  
                </div>

                <div>
                 <p class="inline-block print-font-size-num">{{$joinn->sss}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->philhealth}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->hdmf}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->holdingtax}}</p>
                 <br>
                 <p class="inline-block print-font-size-num">AAYUSIN PA</p>
                 <br>
                 <p class="inline-block print-font-size-num">{{$joinn->otherdeduction}}</p>

                </div>
              </div>
                            
            </div>

              <hr class="print-hr">

            <div class="row row-print">
              <div class="col xs-6 printearnduc">
                <div>
                  <p class="inline-block print-font-size">GROSS EARNINGS: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num">{{$joinn->gross}}</p>
                </div>
              </div>
              <div class="col xs-6 printearnduc">
                <div>
                  <p class="inline-block print-font-size">GROSS DEDUCTIONS: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num">{{$joinn->deduction}}</p>
                </div>
              </div>
            </div>

              <hr class="print-hr">

            <div class="row row-print">
              <div class="col xs-6 printearnduc">
                <div>
                  <p class="inline-block print-font-size">PREPARED BY: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num">{{AUTH::user()->name}}</p>
                </div>

                <div>
                  <p class="inline-block print-font-size">APPROVED BY: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num"></p>
                </div>
              </div>

              <div class="col xs-6 printearnduc">
                <div>
                  <p class="inline-block print-font-size">NET PAYMENT: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num">{{$joinn->netpay}}</p>
                </div>

                <div>
                  <p class="inline-block print-font-size">RELEASE PERIOD: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num"></p>
                </div>
              </div>
            </div>
            <hr class="print-hr">
            @endforeach
      
</div>
</div>
</div>
{{-- <br><br><br>
 <div class="footer">
        <label style="text-align: right;">Printed By: <strong><u>{{Auth::user()->name}}</u></strong></label><br>


          <label>{{ date('F d, Y') }}</label> <br>
    <label>{{ date_default_timezone_set('Asia/Manila') }}</label> <br>  
     <label>{{ date('h:i A') }}</label> <br> 

    
 <label>{{ date('F d, Y') }}</label> <br>
    <label>{{ date_default_timezone_get() }}</label> <br>
</div>
   <div class="footer1">
<p>Unit 302, Summit One Tower 1, 530, Shaw Boulevard, Mandaluyong, 1550 Metro Manila</p>
</div>            
</footer> --}}

@endsection