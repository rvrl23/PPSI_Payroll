@extends('layouts.payroll_layouts')

@section('content')

<div id="content">
  <div id="content-header">
    <div>
      <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Change Account</p>
    </div>
    @if(Session::has('newadmin'))
        <div class="alert alert-primary alert-autocloseable-editsuccess messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            {{session('newadmin')}}
        </div>
    @endif  
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif    
    @if(Session::has('flash_message_try'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_try') !!}</strong>
    </div>
    @endif    
    @if(Session::has('flash_message_failed'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_failed') !!}</strong>
    </div>
    @if(Session::has('flash_message_wrong'))
    <div class="alert alert-danger alert-wrong">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif    
    @endif    

  </div>

  @include('others.modal')
<br><br>
  <div class="widget-content nopadding">


  <div class="panel-white shadow setting-account-grid">

  <div class="setting-account-grid-item1">
    
    {{-- <h4>Email</h4>
     <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}
      <div class="control-group">
        <label class="control-label small">Current Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="current_pwd" id="current_pwd" />
          <span id="chkPwd"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label small">New Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="new_pwd" id="new_pwd" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label small">Confirm Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" />
        </div>
      </div>
      <div class="form-actions">
        <br>
        <input type="submit" value="Update Email" class="btn btn-primary">
      </div>
    </form> --}}

    <div class="profpicadmin">
    <form enctype="multipart/form-data" method="POST">

        <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width: 250px; height: 250px; border-radius: 50%;margin-right: 25px;" alt="avatar" class="avatar img-circle normal-pic">
        <center><h3>{{Auth::user()->name}}</h3></center>
        <input type="file" name="avatar" class="center inlineblock">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
        <input type="submit" class="inlineblock btn btn-primary royalbluebg" value="Change ">
         <br>
    </form>

  </div>

  </div>

 
  <div class="setting-account-grid-item1">
    
    <div class="row">
     <h3 class="col-xs-8 password-margin">Password</h3>
      <button class="btnnewadmin center btnclear btn btn-primary col-xs-3" data-toggle="modal" data-target="#newadmin">New Admin</button>
    </div>
   
    <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}
      <div class="control-group">
        <label class="control-label small">Current Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="current_pwd" id="current_pwd" minlength="6" />
          <span id="chkPwd"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label small">New Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="new_pwd" id="new_pwd" minlength="6" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label small">Confirm Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" minlength="6" />
        </div>
      </div>
      <div class="form-actions">
        <br>
        <input type="submit" value="Update Password" class="btn btn-primary">
      </div>
    </form>
  </div>

  

  </div>


  </div>
</div>


@endsection