@extends('layouts.user_employee_layout')

@section('content')

@include('others.modal')

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Profile</p>
</div>
<video src=""></video>
<form enctype="multipart/form-data" action="/Manage_Profile/{{$in->id}}/{{Auth::user()->idnumber}}" method="post" id="edit_info">
  @csrf
  @method('POST')

  <div class="container panel-white shadow margin-top0">

    <div class="col-xs-6">
      <button type="button" class="clearbtn editprofilebtn">Edit Profile ></button>
    </div>
    <br>
    <hr>

  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="/uploads/avatars/{{ $users->avatar }}" style="width: 150px; height: 150px; border-radius: 50%;margin-right: 25px;" alt="avatar" class="avatar img-circle normal-pic">
          <h6>Upload a different photo...</h6>
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </div>
    <br>
    <div class="employee-info">

      <br>

      <div>
              <label class="col-xs-5 small"><p class="small">ID Number</p></label>
              <div class="col-xs-6">
                <p class="small">{{$in->id_number}}</p>
              </div>
      </div>

      <br><br>
      
      <div>
              <label class="col-xs-5 small"><p class="small">Position</p></label>
              <div class="col-xs-6">
                <p class="small">{{$in->position}}</p>
              </div>
      </div>

      <br><br>

      <div>
              <label class="col-xs-5 small"><p class="small">Department</p></label>
              <div class="col-xs-6">
                <p class="small">{{$in->department}}</p>
              </div>
      </div>

    </div>
    

      </div>
      

      <div class="col-md-9 personal-info">

        @if(session('message'))

         {{--  <div class="alert alert-success alert-dismissable" id="messagediv">
            <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            {{session('message')}}
          </div> --}}

          <div class="alert alert-success alert-autocloseable-editsuccess" id="messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
            <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              {{session('message')}}
      </div>

    @endif

        <p class="large">Personal info</p>

        <br><br><br><br>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>First name:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="{{$in->first_name}}" name="fname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Middle Initial:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="{{$in->middle_name}}" name="mname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Last name:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="{{$in->surname}}" name="lname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Gender</p></label>
            <div class="col-lg-8">
              <select class="form-control" name="gender" value="{{$in->gender}}" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Birthdate:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="date" value="{{$in->birthdate}}" name="birthdate">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Address:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="{{$in->address}}" name="address">
          </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-md-3 control-label small"><p>Contact No:</p></label>
            <div class="col-md-8">
              <input required class="form-control" type="text" value="{{$in->contact}}" name="contact">
            </div>
          </div>
         <br><br>
          <div class="form-group">
            <label class="col-md-3 control-label small"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>

      
      </div>
  </div>


</div>
<hr>
</form>
  
@endsection


@section('srcperpage')

<script>
  
  var whatToChange;

  setTimeout(fade_out, 5000);
  $('select[name="gender"]').val('{{$in->gender}}')
  function fade_out() {
    $("#messagediv").fadeOut();
    $('#accounterror').fadeOut();
  }
  $('#usernamebtn').on('click', function(){
    whatToChange = 'user';

    $('#olduser').prop('required',true);
    $('#newuser').prop('required',true);

    $('#oldpass').prop('required',false);
    $('#newpass').prop('required',false);
    $('#confirmpass').prop('required',false);

    $("#changeaccountform").attr("action", "/changeuser/");

  });

  $('#passwordbtn').on('click', function(){
    whatToChange = 'pass';

    $('#oldpass').prop('required',true);
    $('#newpass').prop('required',true);
    $('#confirmpass').prop('required',true);

    $('#olduser').prop('required',false);
    $('#newuser').prop('required',false);

    $("#changeaccountform").attr("action", "/changepass/");
  });

  $('#savechanges').on('click', function(){
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;

    if(whatToChange == 'pass')
    {
      console.log(whatToChange);
      if(oldpass == '' || newpass == '' || confirmpass == '')
      {
        document.getElementById('accounterrormessage').innerHTML = 'Please Fill-up all';
        $('#accounterror').fadeIn();
        setTimeout(fade_out, 5000);
      }
      else if(confirmpass != newpass)
      {
        document.getElementById('accounterrormessage').innerHTML = 'password doesn\'t match';
        $('#accounterror').fadeIn();
        setTimeout(fade_out, 5000);
      }
      else{
         $("#changeaccountform").submit();
      }

    }


    if(whatToChange == 'user')
    {

    }

  });


  // $('#savechanges').on('click', function(){
  //   console.log('s');
  //   if(whatToChange == 'user')
  //   {
      
  //   }
  // });



  // $('.changeaccountbtn').click(function(e){
  //   $(this).removeClass('movetoleft');
  //   $(this).addClass('movetoleft');
  // });
</script>

@endsection