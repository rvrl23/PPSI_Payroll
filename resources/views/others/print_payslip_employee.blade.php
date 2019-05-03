@extends('layouts.user_employee_layout')

@section('content')

<br>  
  <div class="container" style="width: 80%;">
  <div>
    
    <center><img src="../img/PPSI LOGO.png" height="30%" width="40%"></center><br><br>
     <div>
     <h4>Personal Info</h4>
      <hr>
    </div>
            <div class="row">

              <div class="col-xs-6">
                <label><p class="inline-block">Full Name</p></label> : 
                <p class="inline-block"> {{$joinn->fname}} {{$joinn->mname}} {{$joinn->lname}}</p>
                <br>
                <label><p class="inline-block">Address</p></label> :
                <p class="inline-block"> {{$joinn->address}}</p>
                <br>
                <label><p class="inline-block">email</p></label> :
                <p class="inline-block"> {{$joinn->email}}</p>
              </div>

              <div class="col-xs-6 rightalign">
                <label><p class="inline-block">id number</p></label> :
                <p class="inline-block"> {{$joinn->idnumber}}</p>
                <br>
                <label><p class="inline-block">Date</p></label> :
                <p class="inline-block"> {{$joinn->cut_off}}</p>
              </div>
              
            </div>

            <div class="row">
              <div class="col-sm-12">
                
              </div>
              <div class="col-sm-12">
                
              </div>
            </div>

            <div>
              <br>
     <h4>Gross Pay</h4>
      <hr>
    </div>

            <div class="row rowm">

              <div class="col-xs-6">
                <label><p class="inline-block">Basic</p></label> :
                <p class="inline-block">{{$joinn->basic}}</p>
                <br>
                <label><p>Allowance</p></label> :
                <p class="inline-block">{{$joinn->allowance}}</p>
                <br>
                <label><p class="inline-block">Required Hours</p></label> :
                <p class="inline-block">{{$joinn->allowance}}</p>
                <br>
                <label><p class="inline-block">Rendered Hours</p></label> :
                <p class="inline-block">{{$joinn->renderedhours}}</p>
              </div>

              <div class="col-xs-6">
                
                <br>
                <label><p class="inline-block">Overtime</p></label>
                <p class="inline-block">{{$joinn->overtime}}</p>
                <br>
                <label><p class="inline-block">Holiday</p></label>
                <p class="inline-block">{{$joinn->regular_holiday}}</p>
                <br>
              </div>

             {{--  <div class="col-md-3">
                <label><h5>Required Hours</h5></label>
                <input type="text" class="form-control textf" value="96" name="requiredhours" id="num10" readonly>
              </div> --}}
            </div>
            
            

            <div class="row rowm">
              <div class="col-md-12">
                <label><p class="inline-block">Gross Pay</p></label> :
                <p class="inline-block">{{$joinn->netpay}}</p>
              </div>
            </div>
              
            <br>
            <div class="contentheader">
              <h4>Government Deduction</h4>
              <hr>
            </div>

            <div class="row rowm">

              <div class="col-md-3">
                <label><p class="inline-block"> SSS</p></label>
                <p class="inline-block" id="sss">{{$joinn->sss}}</p>
                <br>
                <label><p class="inline-block">HDMF</p></label>
                <p class="inline-block" id="hdmf">{{$joinn->hdmf}}</p>
                <br>
                <label><p class="inline-block"> Philhealth</p></label>
                <p class="inline-block" id="ph">{{$joinn->philhealth}}</p>
                <br>
                <label><p class="inline-block">Holding Tax</p></label>
                <p class="inline-block">{{$joinn->holdingtax}}</p>
              </div>
            </div>
            
            <div class="row rowm">
              <div class="col-sm-6">
                <label><p>Gross Deduction</p></label>
                <p class="inline-block" id="deduction"></p>
              </div>
               <div class="col-sm-6">
               <label><p class="inline-block">Net Pay</h4></p>
                  <p class="inline-block"> {{$joinn->netpay}}</p>
              </div>
            </div>
      
</div>
</div>
<br><br><br>
 <div class="footer">
        <label style="text-align: right;">Printed By: <strong><u>{{Auth::user()->name}}</u></strong></label><br>


        <!--  <label>{{ date('F d, Y') }}</label> <br> -->
    <!--<label>{{ date_default_timezone_set('Asia/Manila') }}</label> <br>  -->
     <label>{{ date('h:i A') }}</label> <br> 

    
  <!--   <label>{{ date('F d, Y') }}</label> <br>
    <label>{{ date_default_timezone_get() }}</label> <br> -->
</div>
   <div class="footer1">
<p>Unit 302, Summit One Tower 1, 530, Shaw Boulevard, Mandaluyong, 1550 Metro Manila</p>
</div>            
</footer>

@endsection