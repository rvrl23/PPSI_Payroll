<?php $__env->startSection('content'); ?>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-credit-card"></span> Payroll</p>
</div>

<div class="payroll-grid">

      <div class="panel with-nav-tabs panel-default payroll-grid-item">
          <div class="panel-heading"> <p>This Month's Cut-off</p>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1default" data-toggle="tab">Missed</a></li>
            <li><a href="#tab2default" data-toggle="tab">Pending</a></li>
            <li><a href="#tab3default" data-toggle="tab">Created</a></li>
            <li><a href="#tab4default" data-toggle="tab">No payroll</a></li>
        </ul>

          </div>
          <div class="panel-body">
              <div class="tab-content">


                  <div class="tab-pane fade in active" id="tab1default">

                    <?php if(@$missedCount == 0): ?>
                    
                      <center><p>There's no missed payroll</p></center>
                    
                    <?php else: ?>
                    <table id="example" class="table small segoeui-light">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Department</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $missed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <tr>
                              
                              <td><?php echo e($pay->first_name); ?> <?php echo e($pay->middle_name); ?> <?php echo e($pay->surname); ?></td>
                              <td><?php echo e($pay->department); ?></td>
                              <td><a href="makePayroll/<?php echo e($pay->id_number); ?>">create payroll</a></td>

                          </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php endif; ?>
                  </div>



                  <div class="tab-pane fade" id="tab2default">
                  
                    
                    <?php if(@$pendingCount == 0): ?>
                    
                      <center><p>There's no pending payroll</p></center>
                    
                    <?php else: ?>
                    <table id="example" class="table small segoeui-light">

                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Department</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <tr>
                              
                              <td><?php echo e($pay->first_name); ?> <?php echo e($pay->middle_name); ?> <?php echo e($pay->surname); ?></td>
                              <td><?php echo e($pay->department); ?></td>
                              <td><a href="makePayroll/<?php echo e($pay->id_number); ?>">create payroll</a></td>

                          </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php endif; ?>
                  </div>



                  <div class="tab-pane fade" id="tab3default">

                    <?php if(@$createdCount == 0): ?>
                    
                      <center><p>There's no created payroll</p></center>
                    
                    <?php else: ?>
                    <table class="table small segoeui-light">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Department</th>
                              <th>Cut-off</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $created; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <tr>
                              
                              <td><?php echo e($pay->first_name); ?> <?php echo e($pay->middle_name); ?> <?php echo e($pay->surname); ?></td>
                              <td><?php echo e($pay->department); ?></td>
                              <td><?php echo e($pay->cut_off); ?></td>

                          </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php endif; ?>
                  </div>



                  <div class="tab-pane fade" id="tab4default">
                    <?php if(@$nopayrollCount): ?>
                    <center><p>All employees have payroll </p></center>
                    <?php else: ?>
                    <table id="example" class="table small segoeui-light">
                      <thead>
                          <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $nopayroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <tr>
                              
                            <td><?php echo e($pay->first_name); ?> <?php echo e($pay->middle_name); ?> <?php echo e($pay->surname); ?></td>
                            <td><?php echo e($pay->department); ?></td>
                            <td><a href="makePayroll/<?php echo e($pay->id_number); ?>">make payroll</a></td>

                          </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php endif; ?>
                  </div>
              </div>
          </div>
	
	</div>



    <div class="panel with-nav-tabs panel-default payroll-grid-item">
        <div class="panel-heading">
          <ul class="nav nav-tabs">
              <li class="active"><a href="#thismonthpayroll" data-toggle="tab">View Payroll</a></li>
              <li> <a href="/addpayroll" class="fix-align right"><span class="glyphicon glyphicon-plus"></span> Add Payroll </a></li>
          </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="thismonthpayroll">
                  
                <table id="thismonth-table" class="table small poppins" style="width: 100%;">
                  <thead>
                      <tr>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th colspan="1">Action</th>
                      </tr>
                  </thead>
                      

                  <tbody>
                      <?php $__currentLoopData = $joinn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $join): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          
                          <td><?php echo e($join->first_name); ?> <?php echo e($join->middle_name); ?> <?php echo e($join->surname); ?></td>
                          <td><?php echo e($join->id_number); ?></td>
                          <td><?php echo e($join->position); ?></td>
                          <td><?php echo e($join->department); ?></td>
                          <td> 

                              <button class="btn btn-primary white violetbg shadow">
                                <a href="/viewpayroll/<?php echo e($join->payid); ?>" class="white "><span class="glyphicon glyphicon-eye-open white" aria-hidden="true"></span>&nbsp; view payrolls</a> 
                              </button>

                          </td>
                      </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                 </table>

                </div>


        </div>
    </div>
	</div>


</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('srcperpage'); ?>

<script>

  $(document).ready(function() {
      $('#all-table').DataTable( {
          columnDefs: [
              {
                  targets: [ 0, 1, 2 ],
                  className: 'mdl-data-table__cell--non-numeric'
              }
          ]
      } );
  } );

  $(document).ready(function() {

    $('#thismonth-table').DataTable(

      {

          "dom": '<"right form control segoeui-light col-xs-3 col-xs-offset-9"f>'
          +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'
    
      }
    
    );
    
  });



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>