<?php $__currentLoopData = $select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="addEmpspace" id="ShowAccount">
    

  <div class="addEmpspace">
    <label><h4> Email</h4></label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo e($sel->username)); ?>" required>
  </div>

  <div class="addEmpspace">
    <label><h4> Password</h4></label>
    <input type="password" class="form-control" name="password" value="<?php echo e($sel->password)); ?>" required>
  </div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>