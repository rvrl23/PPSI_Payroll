<?php $__env->startSection('content'); ?>

<?php echo $__env->make('others.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Profile</p>
</div>
<video src=""></video>
<form enctype="multipart/form-data" action="/Manage_Profile/<?php echo e($in->id); ?>/<?php echo e(Auth::user()->idnumber); ?>" method="post" id="edit_info">
  <?php echo csrf_field(); ?>
  <?php echo method_field('POST'); ?>

  <div class="container panel-white shadow margin-top0">

    <div class="col-xs-6">
      <button type="button" class="clearbtn editprofilebtn">Edit Profile ></button>
    </div>
     <div class="col-xs-6 right">
      <button type="button" class="clearbtn changeaccountbtn" data-toggle="modal" data-target="#empeditaccountmodal">Change Password ></button>
    </div>
    <br>
    <hr>

  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="/uploads/avatars/<?php echo e($users->avatar); ?>" style="width: 150px; height: 150px; border-radius: 50%;margin-right: 25px;" alt="avatar" class="avatar img-circle normal-pic">
          <h6>Upload a different photo...</h6>
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        </div>
    <br>
    <div class="employee-info">

      <br>

      <div>
              <label class="col-xs-5 small"><p class="small">ID Number</p></label>
              <div class="col-xs-6">
                <p class="small"><?php echo e($in->id_number); ?></p>
              </div>
      </div>

      <br><br>
      
      <div>
              <label class="col-xs-5 small"><p class="small">Position</p></label>
              <div class="col-xs-6">
                <p class="small"><?php echo e($in->position); ?></p>
              </div>
      </div>

      <br><br>

      <div>
              <label class="col-xs-5 small"><p class="small">Department</p></label>
              <div class="col-xs-6">
                <p class="small"><?php echo e($in->department); ?></p>
              </div>
      </div>

    </div>
    

      </div>
      

      <div class="col-md-9 personal-info">

        <?php if(session('message')): ?>

         

          <div class="alert alert-success alert-autocloseable-editsuccess" id="messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
            <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              <?php echo e(session('message')); ?>

      </div>

    <?php endif; ?>

        <p class="large">Personal info</p>

        <br><br><br><br>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>First name:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="<?php echo e($in->first_name); ?>" name="fname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Middle Initial:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="<?php echo e($in->middle_name); ?>" name="mname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Last name:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="<?php echo e($in->surname); ?>" name="lname">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Gender</p></label>
            <div class="col-lg-8">
              <select class="form-control" name="gender" value="<?php echo e($in->gender); ?>" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Birthdate:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="date" value="<?php echo e($in->birthdate); ?>" name="birthdate">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-lg-3 control-label small"><p>Address:</p></label>
            <div class="col-lg-8">
              <input required class="form-control" type="text" value="<?php echo e($in->address); ?>" name="address">
          </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-md-3 control-label small"><p>Contact No:</p></label>
            <div class="col-md-8">
              <input required class="form-control" type="text" value="<?php echo e($in->contact); ?>" name="contact">
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
  
<?php $__env->stopSection(); ?>


<?php $__env->startSection('srcperpage'); ?>

<script>
  
  var whatToChange;

  setTimeout(fade_out, 5000);
  $('select[name="gender"]').val('<?php echo e($in->gender); ?>')
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_employee_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>