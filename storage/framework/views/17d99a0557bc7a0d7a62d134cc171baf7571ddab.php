<?php $__env->startSection('content'); ?>

<div id="content">
  <div id="content-header">
    <div>
      <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Change Account</p>
    </div>
    <?php if(Session::has('newadmin')): ?>
        <div class="alert alert-primary alert-autocloseable-editsuccess messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            <?php echo e(session('newadmin')); ?>

        </div>
    <?php endif; ?>  
    <?php if(Session::has('flash_message_error')): ?>
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo session('flash_message_error'); ?></strong>
        </div>
    <?php endif; ?>   
    <?php if(Session::has('flash_message_success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo session('flash_message_success'); ?></strong>
        </div>
    <?php endif; ?>    
    <?php if(Session::has('flash_message_try')): ?>
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong><?php echo session('flash_message_try'); ?></strong>
    </div>
    <?php endif; ?>    
    <?php if(Session::has('flash_message_failed')): ?>
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong><?php echo session('flash_message_failed'); ?></strong>
    </div>
    <?php if(Session::has('flash_message_wrong')): ?>
    <div class="alert alert-danger alert-wrong">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong><?php echo session('flash_message_success'); ?></strong>
    </div>
    <?php endif; ?>    
    <?php endif; ?>    

  </div>

  <?php echo $__env->make('others.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<br><br>
  <div class="widget-content nopadding">


  <div class="panel-white shadow setting-account-grid">

  <div class="setting-account-grid-item1">
    
    

    <div class="profpicadmin">
    <form enctype="multipart/form-data" method="POST">

        <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" style="width: 250px; height: 250px; border-radius: 50%;margin-right: 25px;" alt="avatar" class="avatar img-circle normal-pic">
        <center><h3><?php echo e(Auth::user()->name); ?></h3></center>
        <input type="file" name="avatar" class="center inlineblock">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br>
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
   
    <form class="form-horizontal" method="post" action="<?php echo e(url('/admin/update-pwd')); ?>" name="password_validate" id="password_validate" novalidate="novalidate"><?php echo e(csrf_field()); ?>

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>