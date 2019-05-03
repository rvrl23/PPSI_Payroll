<?php $__env->startSection('content'); ?>

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
                <p class="inline-block"> <?php echo e($joinn->fname); ?> <?php echo e($joinn->mname); ?> <?php echo e($joinn->lname); ?></p>
                <br>
                <label><p class="inline-block">Address</p></label> :
                <p class="inline-block"> <?php echo e($joinn->address); ?></p>
                <br>
                <label><p class="inline-block">email</p></label> :
                <p class="inline-block"> <?php echo e($joinn->email); ?></p>
              </div>

              <div class="col-xs-6 rightalign">
                <label><p class="inline-block">id number</p></label> :
                <p class="inline-block"> <?php echo e($joinn->idnumber); ?></p>
                <br>
                <label><p class="inline-block">Date</p></label> :
                <p class="inline-block"> <?php echo e($joinn->cut_off); ?></p>
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
                <p class="inline-block"><?php echo e($joinn->basic); ?></p>
                <br>
                <label><p>Allowance</p></label> :
                <p class="inline-block"><?php echo e($joinn->allowance); ?></p>
                <br>
                <label><p class="inline-block">Required Hours</p></label> :
                <p class="inline-block"><?php echo e($joinn->allowance); ?></p>
                <br>
                <label><p class="inline-block">Rendered Hours</p></label> :
                <p class="inline-block"><?php echo e($joinn->renderedhours); ?></p>
              </div>

              <div class="col-xs-6">
                
                <br>
                <label><p class="inline-block">Overtime</p></label>
                <p class="inline-block"><?php echo e($joinn->overtime); ?></p>
                <br>
                <label><p class="inline-block">Holiday</p></label>
                <p class="inline-block"><?php echo e($joinn->regular_holiday); ?></p>
                <br>
              </div>

             
            </div>
            
            

            <div class="row rowm">
              <div class="col-md-12">
                <label><p class="inline-block">Gross Pay</p></label> :
                <p class="inline-block"><?php echo e($joinn->netpay); ?></p>
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
                <p class="inline-block" id="sss"><?php echo e($joinn->sss); ?></p>
                <br>
                <label><p class="inline-block">HDMF</p></label>
                <p class="inline-block" id="hdmf"><?php echo e($joinn->hdmf); ?></p>
                <br>
                <label><p class="inline-block"> Philhealth</p></label>
                <p class="inline-block" id="ph"><?php echo e($joinn->philhealth); ?></p>
                <br>
                <label><p class="inline-block">Holding Tax</p></label>
                <p class="inline-block"><?php echo e($joinn->holdingtax); ?></p>
              </div>
            </div>
            
            <div class="row rowm">
              <div class="col-sm-6">
                <label><p>Gross Deduction</p></label>
                <p class="inline-block" id="deduction"></p>
              </div>
               <div class="col-sm-6">
               <label><p class="inline-block">Net Pay</h4></p>
                  <p class="inline-block"> <?php echo e($joinn->netpay); ?></p>
              </div>
            </div>
      
</div>
</div>
<br><br><br>
 <div class="footer">
        <label style="text-align: right;">Printed By: <strong><u><?php echo e(Auth::user()->name); ?></u></strong></label><br>


        <!--  <label><?php echo e(date('F d, Y')); ?></label> <br> -->
    <!--<label><?php echo e(date_default_timezone_set('Asia/Manila')); ?></label> <br>  -->
     <label><?php echo e(date('h:i A')); ?></label> <br> 

    
  <!--   <label><?php echo e(date('F d, Y')); ?></label> <br>
    <label><?php echo e(date_default_timezone_get()); ?></label> <br> -->
</div>
   <div class="footer1">
<p>Unit 302, Summit One Tower 1, 530, Shaw Boulevard, Mandaluyong, 1550 Metro Manila</p>
</div>            
</footer>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_employee_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>