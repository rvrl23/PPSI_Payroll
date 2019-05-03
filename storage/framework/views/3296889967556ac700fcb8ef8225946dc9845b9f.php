


<form action="/employee" method="POST">
	<div class="modal fade medium" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

		<?php echo csrf_field(); ?>
<div id="employee-next-info">
	  <div class="addEmpspace col-lg-4">
		

		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <p class="small Montserrat inline-block">Personal Info</p>
		<hr>

	    
	    <label><p class="small Montserrat"> First Name</p></label>
	    <input type="text" class="form-control small Montserrat" name="fname" placeholder="Firstname" id="add_fname" value="<?php echo e(old("fname")); ?>" required>
		
	    
	    <label><p class="small Montserrat"> Middle Initial</p></label>
	    <input type="text" class="form-control small Montserrat" name="mname" placeholder="middleinitial" id="add_mname" value="<?php echo e(old("mname")); ?>" required>
	    
	    
	    <label><p class="small Montserrat"> Last Name</p></label>
	    <input type="text" class="form-control small Montserrat" name="lname" placeholder="lastname" id="add_lname" value="<?php echo e(old("lname")); ?>" required>

		<label><p class="small Montserrat"> Birth Date</p></label>
	    <input type="date" class="form-control small Montserrat" name="birthdate" id="add_birthdate" value="<?php echo e(old("lname")); ?>" required>

	    <label><p class="small Montserrat"> Age</p></label>
	    <input type="text" class="form-control small Montserrat" name="add_age" id="add_age" placeholder="18+" value="<?php echo e(old("lname")); ?>" disabled>

	    <label><p class="small Montserrat"> Address</p></label>
	    <input type="text" class="form-control small Montserrat" name="address" placeholder="street, municipal province" id="add_address" value="<?php echo e(old("address")); ?>"  required>
	  
	  </div>


	  <div class="addEmpspace col-lg-4">
	  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Contact Info</p>
	    <hr>
	    
	    <label><p class="small Montserrat">Gender</p></label>
	    <select class="form-control small Montserrat" id="add_gender" name="gender" value="<?php echo e(old("gender")); ?>" required>
	    	<option value="Male">Male</option>
	    	<option value="Female">Female</option>
	    </select>

	    <label><p class="small Montserrat"> Contact Number</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_contact" name="contact" placeholder="09xxxxxxxxx" value="<?php echo e(old("contact")); ?>" required>

	    <label><p class="small Montserrat"> Email</p></label>
	    <input type="email" class="form-control small Montserrat" id="add_email" name="email" placeholder="@email" value="<?php echo e(old("email")); ?>" required>

	  </div>

	<div class="addEmpspace col-lg-4">
	  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Other Info</p>
		<hr>

	    <label><p class="small Montserrat"> ID Number</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_idnumber" name="idnumber" placeholder="xxxxxxxxxxx" value="<?php echo e(old("idnumber")); ?>" required>

	    <label><p class="small Montserrat"> Position</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_position" name="position" value="<?php echo e(old("position")); ?>" required>

	    <label><p class="small Montserrat"> Department</p></label>
	    <select class="form-control small Montserrat" id="add_department" name="department" value="<?php echo e(old("department")); ?>" required>
	    	<option value="IT Department">IT</option>
	    	<option value="HR Department">HR</option>
	    	<option value="Operational Department">Operation</option>
	    </select>

	    <label><p class="small Montserrat"> Designation</p></label>
	     <input type="text" class="form-control small Montserrat" id="add_required" name="designation" value="Employee" readonly>
    </div>

</div>


    <div class="addEmpspace col-lg-12" id="employee-add-info">
	  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Card Info</p>
		<hr>

	    <label><p class="small Montserrat">TIN</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_tin" name="tin" placeholder="xxxxxxxxxxx" value="<?php echo e(old("tin")); ?>" required>

	    <label><p class="small Montserrat"> SSS</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_sss" name="sss" value="<?php echo e(old("sss")); ?>" required>

	    <label><p class="small Montserrat"> HDMF/Pag-ibig</p></label>
	    <input type="text" class="form-control small Montserrat" id="add_hdmf" name="hdmf" value="<?php echo e(old("hdmf")); ?>" required>

	    <label><p class="small Montserrat"> Philhealth</p></label>
	     <input type="text" class="form-control small Montserrat" id="add_philhealth" name="philhealth" placeholder="hours" value="<?php echo e(old("philhealth")); ?>" required>
    </div>

	  <div class="addEmpspace">
	    
	  </div>

	  <br>


		<?php if($errors->any()): ?>
		<div>
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><p class="small Montserrat" id="liid"><?php echo e($error); ?></p></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>

			<div class="alert alert-danger alert-dismissable" id="add_birthdatemessage" style="display: none;">
			  <a class="panel-close close" data-dismiss="alert">×</a> 
			  <i class="fa fa-coffee"></i>
			  <p id="add_invalid"></p>
			</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancel-employee">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-previous-employee">Previous</button>
	        <button type="submit" class="btn btn-primary" id="btn-add-employee">Add</button>
	        <button type="button" class="btn btn-primary btn-next-employee" id="btn-next-employee">Next</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>




 <form class="form" action="" method="post" id="editForm">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>

	<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title">Edit Info</h3>
	      </div>





	      <div class="modal-body">

	      	 <div class="alert alert-danger alert-dismissable" id="birthdatemessage" style="display: none;">
	          <a class="panel-close close" data-dismiss="alert">×</a> 
	          <i class="fa fa-coffee"></i>
	          Invalid Age.
	        </div>

	        <div id="next-edit-employee">

	        <div class="col-lg-4">
	       
	          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <p class="small Montserrat inline-block">Personal Info</p>
				<hr>

		   
			    <label><p class="small Montserrat"> First Name</p></label>
			    <input id="edit_fname" type="text" class="form-control small Montserrat" name="edit_fname" placeholder="Firstname" value="<?php echo e(old("edit_fname")); ?>" required>
				
			    
			    <label><p class="small Montserrat"> Middle Initial</p></label>
			    <input id="edit_mname" type="text" class="form-control small Montserrat" name="edit_mname" placeholder="A" value="<?php echo e(old("edit_lname")); ?>" required>
			    
			    
			    <label><p class="small Montserrat"> Last Name</p></label>
			    <input id="edit_lname" type="text" class="form-control small Montserrat" name="edit_lname" placeholder="lastname" value="<?php echo e(old("edit_lname")); ?>" required>

				<label><p class="small Montserrat"> Birth Date</p></label>
			    <input id="edit_birthdate" type="date" class="form-control small Montserrat" name="edit_birthdate"  value="<?php echo e(old("edit_birthdate")); ?>" required id="edit_birthdate">

			    <label><p class="small Montserrat"> Age</p></label>
			    <input id="edit_age" type="text" class="form-control small Montserrat" name="edit_age" placeholder="18+" value="<?php echo e(old("edit_age")); ?>" required disabled>

			    <label><p class="small Montserrat"> Address</p></label>
			    <input id="edit_address" type="text" class="form-control small Montserrat" name="edit_address" placeholder="street, municipal province" value="<?php echo e(old("edit_address")); ?>"  required>
			  
			</div>


			  
			  <div class="col-lg-4">
			  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Contact Info</p>
			    <hr>
			    
			    <label><p class="small Montserrat"> Contact Number</p></label>
			    <input id="edit_contact" type="text" class="form-control small Montserrat" name="edit_contact" placeholder="09xxxxxxxxx" value="<?php echo e(old("edit_contact")); ?>" required>

			    <label><p class="small Montserrat"> Email</p></label>
			    <input id="edit_email" type="email" class="form-control small Montserrat" name="edit_email" placeholder="@email" value="<?php echo e(old("edit_email")); ?>" required>

			  </div>

			
			<div class="col-lg-4 col-lg-12">
			  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Other Info</p>
				<hr>

			    <label><p class="small Montserrat"> ID Number</p></label>
			    <input id="edit_idnumber" type="text" class="form-control small Montserrat" name="edit_idnumber" placeholder="xxxxxxxxxxx" value="<?php echo e(old("edit_idnumber")); ?>" required>

			    <label><p class="small Montserrat"> Position</p></label>
			    <input id="edit_position" type="text" class="form-control small Montserrat" name="edit_position" value="<?php echo e(old("edit_position")); ?>" required>

			    <label><p class="small Montserrat"> Department</p></label>
			    <input id="edit_department" type="text" class="form-control small Montserrat" name="edit_department" value="<?php echo e(old("edit_department")); ?>" required>

			    <label><p class="small Montserrat"> Designation</p></label>
			     <input id="edit_designation" type="text" class="form-control small Montserrat" name="edit_designation" placeholder="hours" value="<?php echo e(old("edit_designation")); ?>" required>
		    </div>
	         

		</div>


		<div id="save-edit-employee">
			
			<div class="col-xs-12">
			  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <p class="small Montserrat inline-block">Other Info</p>
				<hr>

			    <label><p class="small Montserrat"> Tin</p></label>
			    <input id="edit_tin" type="text" class="form-control small Montserrat" name="edit_tin" placeholder="xxxxxxxxxxx" value="<?php echo e(old("edit_tin")); ?>" required>

			    <label><p class="small Montserrat"> SSS</p></label>
			    <input id="edit_sss" type="text" class="form-control small Montserrat" name="edit_sss" value="<?php echo e(old("edit_position")); ?>" required>

			    <label><p class="small Montserrat"> HDMF/Pag-ibig</p></label>
			    <input id="edit_hdmf" type="text" class="form-control small Montserrat" name="edit_hdmf" value="<?php echo e(old("edit_HDMF")); ?>" required>

			    <label><p class="small Montserrat"> Philhealth</p></label>
			     <input id="edit_philhealth" type="text" class="form-control small Montserrat" name="edit_philhealth" placeholder="hours" value="<?php echo e(old("edit_Philhealth")); ?>" required>
		    </div>

		</div>

				<div class="alert alert-danger alert-dismissable" id="edit_birthdatemessage" style="display: none;">
				  <a class="panel-close close" data-dismiss="alert">×</a> 
				  <i class="fa fa-coffee"></i>
				  <p id="edit_invalid"></p>
				</div>

	      </div>


	      <div class="modal-footer">

	      	<button type="button" id="btn-edit-previous" class="btn btn-primary">Previous</button>
	        <button type="submit" id="btn-edit-save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save changes</button>
	        
	        <button type="button" id="btn-edit-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="btn-edit-next" class="btn btn-primary">Next</button>
	        

	      </div>
	    </div>
	  </div>
	</div>

</form>







	<div class="modal fade" tabindex="-1" role="dialog" id="empeditaccountmodal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title">Change Password</h3>
	      </div>


	      <div class="modal-body">
	       
			

 <form class="form" action="" method="post" id="changeaccountform">
  <?php echo csrf_field(); ?>
  <?php echo method_field('POST'); ?>

            <div class="secondea" id="secondea">

            	 <label><p class="small Montserrat">Enter Old Password</p></label>
	            <input type="text" class="form-control small Montserrat" name="oldpass" value="" id="oldpass" required>

	            <label><p class="small Montserrat"> New Password</p></label>
	            <input type="text" class="form-control small Montserrat" name="newpass" value="" id="newpass" required>

	            <label><p class="small Montserrat"> Confirm Password</p></label>
	            <input type="text" class="form-control small Montserrat" name="confirmpass"
	            value="" id="confirmpass" required>
            	
            </div>


            <div class="thirdea" id="thirdea">

            	 
            	
            </div>
				<br>
             <div class="alert alert-danger alert-dismissable" id="accounterror" style="display: none;">
	          <a class="panel-close close" data-dismiss="alert">×</a> 
	          <i class="fa fa-coffee"></i>
	          <p id="accounterrormessage"></p>
	        </div>



	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id="savechanges"><i class="glyphicon glyphicon-floppy-save"></i> Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>







 <form class="form" action="" method="post" id="viewAcc">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>

	<div class="modal fade" tabindex="-1" role="dialog" id="viewAccount">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title">Action</h3>
	      </div>





	      <div class="modal-body">
	       
			    
			    <label><p class="small Montserrat"> First Name</p></label>
			    <input type="text" class="form-control small Montserrat" name="edit_fname" placeholder="Firstname" value="<?php echo e(old("edit_fname")); ?>" required>
				
			    
			    <label><p class="small Montserrat"> Middle Initial</p></label>
			    <input type="text" class="form-control small Montserrat" name="edit_mname" placeholder="middleinitial" value="<?php echo e(old("edit_mname")); ?>" required>
			 
	      </div>

	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>





<form action="/adminchangepass/" method="POST">
<div class="modal fade" id="createaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
	<?php echo csrf_field(); ?>

  <div class="addEmpspace" id="ShowAccount">
    

  <div class="addEmpspace">
    <label><p class="small Montserrat"> Email</p></label>
    <input type="email" class="form-control small Montserrat" name="email" id="email" value="<?php echo e(old("username")); ?>" required readonly>
  </div>

  <div class="addEmpspace">
    <label><p class="small Montserrat"> Password</p></label>
    <input type="password" class="form-control small Montserrat" name="password" value="<?php echo e(old("password")); ?>" required placeholder="enter new password">
  </div>

  <input type="hidden" name="id" id="id">

  <br>


	<?php if($errors->any()): ?>
	<div>
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><p class="small Montserrat" id="liid"><?php echo e($error); ?></p></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<?php endif; ?>

  </div>

</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>







 <form class="form" action="" method="post" id="viewAct">

	<div class="modal fade" tabindex="-1" role="dialog" id="viewLog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title">Action</h3>
	      </div>

	      <div class="modal-body">
	       
			    <label><p class="small Montserrat"> Name</p></label>
			    <input type="text" class="form-control small Montserrat" name="name" placeholder="name" value="<?php echo e(old("name")); ?>" required>


			    <label><p class="small Montserrat"> Action</p></label>
			    <input type="text" class="form-control small Montserrat" name="action" value="<?php echo e(old("action")); ?>" required>
				
			    
			    <label><p class="small Montserrat" id="actiondo"> </p></label>
			    <input type="text" class="form-control small Montserrat" name="actiondo" value="<?php echo e(old("actiondo")); ?>" required>


			    <label><p class="small Montserrat"> Date</p></label>
			    <input type="text" class="form-control small Montserrat" name="action" value="<?php echo e(old("action")); ?>" required>
			 
	      </div>

	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>





 <form class="form" action="/admin/newadmin" method="post">
<?php echo csrf_field(); ?>
	<div class="modal fade" tabindex="-1" role="dialog" id="newadmin">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title">Action</h3>
	      </div>

	      <div class="modal-body">
	       
			    <label><p class="small Montserrat"> Name</p></label>
			    <input type="text" class="form-control small Montserrat" name="name" placeholder="name" value="<?php echo e(old("name")); ?>" required>


			    <label><p class="small Montserrat"> Email</p></label>
			    <input type="email" class="form-control small Montserrat" name="email" value="<?php echo e(old("email")); ?>" required>
				
			    
			    <label><p class="small Montserrat" id="actiondo"> Password</p></label>
			    <input type="password" class="form-control small Montserrat" name="password" value="<?php echo e(old("password")); ?>" required>


			    <label><p class="small Montserrat"> Confirm Password</p></label>
			    <input type="password" class="form-control small Montserrat" name="passwordd" value="<?php echo e(old("passwordd")); ?>" required>
			 
	      </div>

	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>