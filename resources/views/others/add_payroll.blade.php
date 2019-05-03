@extends('layouts.payroll_layouts')


@section('content')
<form action="/payroll" method="POST">
 @csrf

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Add Payroll</p>
</div>

<div class="addpayroll-grid small margin-top0">

<div class="row normal-margin-panel">

  <div class="col-sm-12 small">

       <div class="col-md-12">
        
        <br>

        <input type="hidden" id="pid" name="pid">
        <div class="col-md-2 left">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <label class="small">Select Employee &nbsp</label>
                </div>
               
                <div class="col-md-4 left">
                    <select class="custom-select small" id="empid" name="idnumber">
                      <option></option>
                      @foreach($employees as $emp)
                      <option value="{{$emp->id_number}}">{{$emp->first_name}} {{$emp->middle_name}} {{$emp->surname}}</option>
                      @endforeach
                    </select>
                </div>
                 <br> <br>
             </div>

            <div class="col-md-12 ">

              <div class="col-md-2">

                  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                  <label class="small">Select Cut-Off &nbsp</label>

                </div>

        
        <div class="col-md-2">

                <select class="custom-select small" name="cut_off" id="cut_off">
                  <option ></option>
                  <option value="{{ date('Y') }}-01-15">January 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-01-30">January 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-02-15">February 1-15 {{ date('Y') }}</option>

                  @if((date('Y')%4)==0))

                  <option value="{{ date('Y') }}-02-29">February 16-29 {{ date('Y') }}</option>

                  @else

                  <option value="{{ date('Y') }}-02-28">February 16-28 {{ date('Y') }}</option>

                  @endif

                  <option value="{{ date('Y') }}-03-15">March 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-03-30">March 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-04-15">April 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-04-30">April 16-30 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-05-15">May 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-05-30">May 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-06-15">June 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-06-30">June 16-30 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-07-15">July 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-07-30">July 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-08-15">August 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-08-30">August 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-09-15">September 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-09-30">September 16-30 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-10-15">October 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-10-30">October 16-31 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-11-15">November 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-11-30">November 16-30 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-12-15">December 1-15 {{ date('Y') }}</option>
                  <option value="{{ date('Y') }}-12-30">December 16-31 {{ date('Y') }}</option>
                </select>
            </div>


        <div class="col-sm-8 right">

          <a href ='{{ url('payroll') }}' class ="btn btn-danger btnd">
          <span class="glyphicon glyphicon-arrow-left small"></span> Cancel</a>

          <button class="btn btn-info btngreen" type="submit" value="Submit">
            <i class="glyphicon glyphicon-floppy-save small"></i> Save</button>

        </div>

            <div class="col-md-12 rowm"> 
                {{-- <label><p class="small"> id</p></label> --}}
                <input required type="hidden" class="form-control small" name="emp_id" id="emp_id">
            </div>
  </div>
</div>

  

</div>
  



<div class="panel-white shadow normal-margin-panel well">      


<div>
  <h4>Gross Earnings</h4>
  <hr>
</div>
 
   

<div class="row rowm small">

    <div class="col-md-3 small">

      <label><p class="small">Basic(peso)</p></label>
      <div>
        <input required type="text" class="form-control small" name="basic" id="num8">
      </div>
    </div>

    <div class="col-md-3">
      <label><p class="small">Allowance(peso)</p></label>
      <input required type="text" class="form-control small" name="allowance" id="num9">
    </div>

     <div class="col-md-3">
      <label><p class="small">Rendered hours</p></label>
      <input required type="text" class="form-control small" name="renderedhours" id="rendered">
    </div>


    <div class="col-md-3">
      <label><p class="small">Required Hours(hrs)</p></label>
      <input required type="text" class="form-control small" value="96" id="num10">
    </div>

    <div class="col-md-3">
      <label><p class="small">Overtime(hrs)</p></label>
      <input required type="text" class="form-control small" name="overtime" id="num1">
    </div>

    <div class="col-md-3">
      <label><p class="small">Non-Working Holiday(days)</p></label>
      <input required type="text" class="form-control small" name="nonholiday" id="num2" readonly value="0">
    </div>

    <div class="col-md-3">
      <label><p class="small">Regular Holiday(days)</p></label>
      <input required type="text" class="form-control small" name="regular" id="num15" readonly value="0">
    </div>

    <div class="col-md-3">
      <label><p class="small">Sick Leave(days)</p></label>
      <input required type="text" class="form-control small" name="sick" id="sick" readonly value="0">
    </div>

    <div class="col-md-3">
      <label><p class="small">Vacation Leave(days)</p></label>
      <input required type="text" class="form-control small" name="vacation" id="vacation" readonly value="0">
    </div>

    <div class="col-md-3">
      <label><p class="small">Other Earnings</p></label>
      <input required type="text" class="form-control small" name="otherearn" id="otherearn" value="0">
    </div>
    
    <div class="col-md-12 gross-grid margin-top">
        <div class="gross-grid-item margin-top">
          <label><p class="small">Gross Earnings(peso)</p></label>
          <input required type="text" class="form-control small" name="gross" placeholder="total gross" id="gross" readonly>
        </div>
   </div>

</div>
            
        


<div class="row rowm">

    

    



   

</div>

{{-- <div class="col-md-12 gross-grid margin-top">
        <div class="gross-grid-item margin-top">
          <label><p class="small">Rendered Sample</p></label>
          <input required type="text" class="form-control small" name="ren1" placeholder="Present days" id="ren1" readonly>
        </div>
   </div> --}}
      


<br>
<div class="contentheader">
  <h4>Gross Deduction</h4>
  <hr>
</div>

<div class="row rowm">

  <div class="col-md-3">
    <label><p class="small">Undertime(mins)</p></label>
    <input required type="text" class="form-control small" name="undertime" id="num5">
  </div>

  <div class="col-md-3">
    <label><p class="small">Late(mins)</p></label>
    <input required type="text" class="form-control small" name="late" id="num6">
  </div>

  <div class="col-md-3">
    <label><p class="small">Absent(days)</p></label>
    <input required type="text" class="form-control small" name="absent" id="num7" >
  </div>

  <div class="col-md-3">
    <label><p class="small">Other Deduction</p></label>
    <input required type="text" class="form-control small" name="otherdeduct" id="otherdeduct" >
  </div>
</div>


<br>
<div class="contentheader">
  <h4>Government Deduction</h4>
  <hr>
</div>



<div class="row rowm">

  <div class="col-md-3">
    <label><p class="small"> SSS(peso)</p></label>
    <input required type="text" class="form-control small" name="sss" id="num11">
  </div>

  <div class="col-md-3">
    <label><p class="small">HDMF(peso)</p></label>
    <input required type="text" class="form-control small" name="hdmf" id="num12">
  </div>

  <div class="col-md-3">
    <label><p class="small"> Philhealth(peso)</p></label>
    <input required type="text" class="form-control small" name="philhealth" id="num13">
  </div>

  <div class="col-md-3">
    <label><p class="small">Withholding Tax</p></label>
    <input required type="text" class="form-control small" name="holdingtax" id="num14">
  </div>

</div>
            
<div class="row rowm">
     
  <div class="col-md-12 gross-grid margin-top">
        <div class="gross-grid-item margin-top">
          <label><p class="small">Total Deduction</p></label>
          <input required type="text" class="form-control small" name="deduction" placeholder="total deduction" id="deduction" readonly>
          <label><p class="small">Net Pay</p></label>
          <input required type="text" class="form-control small" name="netpay"placeholder="total" id="netpay" readonly>
        </div>
   </div>   

</div>


<br>

</div>   
</div>

</form>



@endsection


@section('srcperpage')

<script type="text/javascript">
   function formatDate(date) {
      var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
    }
   $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');

    });

    $("#num1, #num2, #num5, #num6, #num7, #num8, #num9, #num10, #rendered, #num11, #num12, #num13, #num14, #num15, #otherearn, #otherdeduct").on("keydown keyup", function() {
        sum();
    });

    });
   $("#empid").change(function () {
        var empid = document.getElementById('empid').value;
        document.getElementById('emp_id').value = empid;
    });

   $("#cut_off").change(function(){
 
        document.getElementById("pid").value = '';
         var idd = document.getElementById("empid").value;
         var cut = document.getElementById("cut_off").value;
          $.get("/checkcutoff/"+ idd + "/" + cut ,function(data){
          $.each(data,function(i,value){
            document.getElementById("pid").value = value.cut_off;
          })
          var check = document.getElementById("pid").value;
          if(check != ""){
            alert('this employee already have payroll for ' + check);
            document.getElementById("cut_off").value = '';
          }
       })
        // from date
        var parts =cut.split('-');
        var mydate = new Date(parts[0], parts[1] - 1, parts[2]); 
         mydate.setDate(mydate.getDate()-14);
         // end of from date
        $.get("/getovertime/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){

            document.getElementById('num1').value = data;
        })

        $.get("/getundertime/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num5').value = data;
        })
        $.get("/getlate/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num6').value = data;
        })
        $.get("/getabsent/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num7').value = data;
        })
    });

   $("#empid").change(function(){
 
      document.getElementById("pid").value = '';
      var idd = document.getElementById("empid").value;
      var cut = document.getElementById("cut_off").value;
      $.get("/checkcutoff/"+ idd + "/" + cut ,function(data){
        $.each(data,function(i,value){
          document.getElementById("pid").value = value.cut_off;
        })
        var check = document.getElementById("pid").value;
        if(check != ""){
          alert('this employee already have payroll for ' + check);
          document.getElementById("cut_off").value = '';
        }
      })
      var parts =cut.split('-');
        var mydate = new Date(parts[0], parts[1] - 1, parts[2]); 
         mydate.setDate(mydate.getDate()-14);
         // end of from date
        $.get("/getovertime/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){

            document.getElementById('num1').value = data;
        })

        $.get("/getundertime/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num5').value = data;
        })
        $.get("/getlate/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num6').value = data;
        })
        $.get("/getabsent/"+ idd + "/"+ formatDate(mydate) + "/" + cut ,function(data){
            
            document.getElementById('num7').value = data;
        })

    });


function sum() {
    var overtime = document.getElementById('num1').value;
    var nonholiday = document.getElementById('num2').value;
    var regular = document.getElementById('num15').value;
    var vacation = document.getElementById('vacation').value;
    var sick = document.getElementById('sick').value;
    var otherearning = document.getElementById('otherearn').value;
    
    var undertime = document.getElementById('num5').value;
    var late = document.getElementById('num6').value;
    var absent = document.getElementById('num7').value;  
    var otherdeduction = document.getElementById('otherdeduct').value;

    var basic = document.getElementById('num8').value;
    var allowance = document.getElementById('num9').value;
    var renderedhours = document.getElementById('rendered').value;
    var requiredhours = document.getElementById('num10').value;

    var sss = document.getElementById('num11').value;
    var hdmf = document.getElementById('num12').value;
    var philhealth = document.getElementById('num13').value;
    var holdingtax = document.getElementById('num14').value;

    // var result = parseInt(basic / 12 / 8 * 1.25 * overtime) + parseInt(basic / 12 / 8 * 8 * nonholiday) + parseInt(basic / 12 * .3 * regular)// +parseInt(vacation) + parseInt(sick)
    // var result6 = parseInt(requiredhours / 8 - absent);
    // var result1 = parseInt(basic / 12 / 8 / 60 * undertime) + parseInt(basic / 12 / 8 / 60 * late) + parseInt(basic / 12 / 8 * 8 * absent);
    // var result2 = parseInt(result1) - parseInt(result);
    // var result3 = (parseInt(basic) + parseInt(allowance)) - parseInt(result2); // parseInt(requiredhours);
    // // var result7 = parseInt(result4 - hdmf);
    // // var result8 = parseInt(result7 - philhealth);
    // // var result9 = parseInt(result8 - holdingtax);
    // var result4 = parseInt(sss) + parseInt(hdmf) + parseInt(philhealth) + parseInt(holdingtax);
    // var result5 = parseInt(result3) - parseInt(result4);
    //   if (!isNaN(result)) {
    // document.getElementById('rendered').value = result6;
    // document.getElementById('gross').value = result3;
    // document.getElementById('deduction').value = result4;
    // document.getElementById('netpay').value = result5;
    //   }

    var perhour = parseInt(basic) / parseInt(requiredhours);
    var perday = parseInt(basic / requiredhours) * 8;
    var permin = parseInt(perhour) / 60;

    var overtimeaddtocom = parseInt(overtime) * perhour;
    var undertimeaddtocom = parseInt(undertime) * permin;
    var lateaddtocom = parseInt(late) * permin;
    var absentaddtocom = parseInt(absent) * perday;

    // for withholding tax

    if(parseInt(basic) <= 10417)
    {
      holdingtax = 0;
      document.getElementById('num14').value = 0;
    }
    else if(parseInt(basic) > 10417 && parseInt(basic) < 33333)
    {
      var computewhtax = parseInt(basic) * .25;
      holdingtax = computewhtax;
      document.getElementById('num14').value = computewhtax;
    }
    else if(parseInt(basic) >= 33333 && parseInt(basic) < 83333)
    {
      var computewhtax = parseInt(basic) * .30;
      holdingtax = computewhtax;
      document.getElementById('num14').value = computewhtax;
    }
    else if(parseInt(basic) >= 83333 && parseInt(basic) < 333333)
    {
      var computewhtax = parseInt(basic) * .32;
      holdingtax = computewhtax;
      document.getElementById('num14').value = computewhtax;
    }
    else if(parseInt(basic) >= 333333)
    {
      var computewhtax = parseInt(basic) * .35;
      holdingtax = computewhtax;
      document.getElementById('num14').value = computewhtax;
    }

    var displaygrosspay = (perhour * parseInt(renderedhours)) + parseInt(allowance) + parseInt(otherearning) + overtimeaddtocom;
    var displaygrossdeduction = undertimeaddtocom + lateaddtocom + absentaddtocom + parseInt(sss) +
    parseInt(hdmf) + parseInt(philhealth) + parseInt(holdingtax) + parseInt(otherdeduction);
    var displaynetpay = displaygrosspay - displaygrossdeduction;

    document.getElementById('gross').value = displaygrosspay;
    document.getElementById('deduction').value = displaygrossdeduction;
    document.getElementById('netpay').value = displaynetpay;

  }

        //ot585 ut78 late26 absent5000 5104-585=4519

    //phlhealth   half 0.01375  full 0.0275
    // document.getElementById('num14').value = basic * 0.01375;
    // sss half 0.055 full 0.11
    // document.getElementById('num12').value = basic * 0.055;
    // hdmf(pag-ibig) half 0.01  full 0.02 
    // document.getElementById('num13').value = basic * 0.01;


</script>

@endsection