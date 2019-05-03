<?php $__env->startSection('content'); ?>

  <div class="container print-body" style="width: 80%; margin-top:0px">
     
    <?php $__currentLoopData = $joinn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joinn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
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
                <p class="inline-block print-font-size"> <?php echo e($joinn->first_name); ?> <?php echo e($joinn->middle_name); ?> <?php echo e($joinn->surname); ?></p>
                <br>
                <label><p class="inline-block print-font-size">Department</p></label> : 
                <p class="inline-block print-font-size"> <?php echo e($joinn->first_name); ?> <?php echo e($joinn->middle_name); ?> <?php echo e($joinn->surname); ?></p>
                <br>
                <label><p class="inline-block print-font-size">Salary Period</p></label> : 
                <p class="inline-block print-font-size"> <?php echo e($joinn->cut_off); ?></p>
              </div>

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">Employee No</p></label> :
                <p class="inline-block print-font-size"> <?php echo e($joinn->id_number); ?></p>
                <br>
                <label><p class="inline-block print-font-size">Designation</p></label> :
                <p class="inline-block print-font-size"> <?php echo e($joinn->designation); ?></p>
                <br>
                <label><p class="inline-block print-font-size">Employment Status</p></label> :
                <p class="inline-block print-font-size"> ____</p>
              </div>
              
            </div>
            <hr class="print-hr">


            <div class="row row-print">

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">SEMI MONTHLY RATE</p></label> :
                <p class="inline-block print-font-size"><?php echo e($joinn->basic); ?></p>
                <br>
                <label><p class="inline-block print-font-size">ALLOWANCE/ECOLA RATE</p></label> :
                <p class="inline-block print-font-size"><?php echo e($joinn->allowance); ?></p>
                <br>
              </div>

              <div class="col-xs-6">
                <label><p class="inline-block print-font-size">HOURS REQUIRED</p></label> :
                <p class="inline-block print-font-size"><?php echo e($joinn->allowance); ?></p>
                <br>
                <label><p class="inline-block print-font-size">HOURS WORKED</p></label> :
                <p class="inline-block print-font-size"><?php echo e($joinn->renderedhours); ?></p>
               
              </div>

             
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
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->netpay); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->allowance); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->vacation); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->sick); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->overtime); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->regular_holiday); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->otherearnings); ?></p>

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
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->sss); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->philhealth); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->hdmf); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->holdingtax); ?></p>
                 <br>
                 <p class="inline-block print-font-size-num">AAYUSIN PA</p>
                 <br>
                 <p class="inline-block print-font-size-num"><?php echo e($joinn->otherdeduction); ?></p>

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
                  <p class="inline-block print-font-size-num"><?php echo e($joinn->gross); ?></p>
                </div>
              </div>
              <div class="col xs-6 printearnduc">
                <div>
                  <p class="inline-block print-font-size">GROSS DEDUCTIONS: </p>
                </div>
                <div>
                  <p class="inline-block print-font-size-num"><?php echo e($joinn->deduction); ?></p>
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
                  <p class="inline-block print-font-size-num"><?php echo e(AUTH::user()->name); ?></p>
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
                  <p class="inline-block print-font-size-num"><?php echo e($joinn->netpay); ?></p>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
</div>
</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>