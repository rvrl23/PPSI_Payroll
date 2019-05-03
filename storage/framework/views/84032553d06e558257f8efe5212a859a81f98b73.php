<?php $__env->startSection('csslink'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('others.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="employee-grid montserrat" id="employee-display">

	<div class="employee-grid-item1 violet">
		
		
	</div>

	<div class="employee-grid-item2 panel-white shadow left">
	<h3 class="violet">List of Employee</h3>

	<?php if($employeeCount == 0): ?>
	
		<p>There's no employee</p>
	
	<?php else: ?>
			<table id="EmployeeTable" class="table small poppins" style="width:100%" >
		        <thead class="tableback">
		            <tr>
		                <th>Name</th>
		                <th>ID Number</th>
		                <th>Position</th>
		                <th>Department</th>
		                <th>Account</th>
		                <th>Action</th>
		            </tr>
		        </thead>

		       
		       
			    <tbody>
			      
			        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      <tr>
			        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->middle_name); ?> <?php echo e($employee->surname); ?></td>
			        <td><?php echo e($employee->id_number); ?></td>
			        <td><?php echo e($employee->position); ?></td>
			        <td><?php echo e($employee->department); ?></td>
			        <td>
			        	<button class="btn btn-primary violetbg small shadow" data-toggle="modal" data-target="#createaccount" 
			        	data-email="<?php echo e($employee->uemail); ?>" data-id="<?php echo e($employee->id_number); ?>" id="showaccount">change password</button>
		        	
			    	</td>
			        <td colspan="1"> 

			          <button type="button" class="qwer btn btn-primary btn-circle violetbg inline-block shadow" data-toggle="modal" data-target="#editModal"
			          data-fname="<?php echo e($employee->first_name); ?>" data-mname="<?php echo e($employee->middle_name); ?>" data-lname="<?php echo e($employee->surname); ?>" data-idnumber="<?php echo e($employee->id_number); ?>" data-position="<?php echo e($employee->position); ?>" data-department="<?php echo e($employee->department); ?>" data-address="<?php echo e($employee->address); ?>" data-email="<?php echo e($employee->uemail); ?>"
			          data-contact="<?php echo e($employee->contact); ?>" data-designation="<?php echo e($employee->designation); ?>" 
					  data-birthdate="<?php echo e($employee->birthdate); ?>" data-tin="<?php echo e($employee->TIN); ?>" data-sss="<?php echo e($employee->SSS); ?>" data-hdmf="<?php echo e($employee->PAGIBIG); ?>" data-philhealth="<?php echo e($employee->PhilHealth); ?>" data-id="<?php echo e($employee->empid); ?>"
			          >
			            <span class="glyphicon glyphicon-pencil"></span>
			          </button>
			          
			          <form action="employee/<?php echo e($employee->empid); ?>"method="POST" class="inline-block">
			            <?php echo csrf_field(); ?>
			            <?php echo method_field("DELETE"); ?>
			            <button  type="submit" name="submit" value="Delete"  class="btn btn-danger btn-circle inline-block shadow">
			            <span class="glyphicon glyphicon-trash"></span></button>
			          </form> 

			         </td>
			       
			                    
			      </tr>
			      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			    </tbody> 
		   
		</table>

		
	<?php endif; ?>

	</div>

		<div class="col-xs-12 small right">
			<p>
		    	When you added employee, the system will automatically create accout for employee.
				The email is his email and the password is Name + Birthdate ex. JuanDCruz1992-12-01
		    </p>
			<button class="btn btn-primary violetbg" data-toggle="modal" data-target="#addEmployeeModal" id="addemp">
		      <span class="glyphicon glyphicon-plus"></span> Add Empolyee</a>
		    </button>
		    
	    </div>

</div>


	<?php if(session('message')): ?>
		
		<?php if(session('message')=='Added Employee'): ?>
		<div class="alert alert-success alert-autocloseable-editsuccess messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">

		<?php elseif(session('message')=='Employee Deleted'): ?>
		<div class="alert alert-danger alert-autocloseable-editsuccess messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
		<?php else: ?>
		<div class="alert alert-primary alert-autocloseable-editsuccess messagediv" style=" position: fixed; top: 7.5em; right: 1em; z-index: 9999;">
		<?php endif; ?>
		      <a class="panel-close close" data-dismiss="alert">×</a> 
	          <i class="fa fa-coffee"></i>
	          <?php echo e(session('message')); ?>

		</div>
		

	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('srcperpage'); ?>

	<script>
	 $('#editModal').on('show.bs.modal', function(event){

	 	console.log('clicked show');
	    var button = $(event.relatedTarget)
	    var fname = button.data('fname')
	    var mname = button.data('mname')
	    var lname = button.data('lname')
	    var birthdate = button.data('birthdate')
	    // var age = button.data('age')
	    var idnumber = button.data('idnumber')
	    var position = button.data('position')
	    var department = button.data('department')
	    var address = button.data('address')
	    var email = button.data('email')
	    var contact = button.data('contact')
	    var designation = button.data('designation')


	    var tin = button.data('tin')
	    var hdmf = button.data('hdmf')
	    var sss = button.data('sss')
	    var philhealth = button.data('philhealth')
	    var id = button.data('id')

	    
	    document.getElementById("edit_fname").value = fname;
	    document.getElementById("edit_mname").value = mname;
	    document.getElementById("edit_lname").value = lname;
	    document.getElementById("edit_birthdate").value = birthdate;
	    // document.getElementById("edit_age").value = age;
	    document.getElementById("edit_idnumber").value = idnumber;
	    document.getElementById("edit_position").value = position;
	    document.getElementById("edit_department").value = department;
	    document.getElementById("edit_designation").value = designation;
	    document.getElementById("edit_contact").value = contact;
	    document.getElementById("edit_email").value = email;
	    document.getElementById("edit_address").value = address;

	    document.getElementById("edit_tin").value = tin;
	    document.getElementById("edit_hdmf").value = hdmf;
	    document.getElementById("edit_sss").value = sss;
	    document.getElementById("edit_philhealth").value = philhealth;



	    $("#editForm").attr("action", "/employee/" + id);
            
	});

	 $('#createaccount').on('show.bs.modal', function(event){
	    var button = $(event.relatedTarget)
	    var email = button.data('email')
	    var id = button.data('id')
	    document.getElementById("email").value = email;
	    document.getElementById("id").value = id;
	 });

	console.log('jhj');
	var x;


	$(document).ready(function() {

	  $('#EmployeeTable').DataTable(

	    {

	        "dom": '<"right form control monsterrat col-xs-3 col-xs-offset-8"f>'
	        +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'
	  
	    }
	  
	  );
	  
	});


	$("#showaccount").on("click", function(){

		console.log('ss');
		x = '111';
         var id = document.getElementById("emp_idnumber").value;
          $.get("/info/"+ 1,function(data){
          console.log(data);
          $.each(data,function(i,value){
            document.getElementById("email").value = value.email;
            document.getElementById("emp_name").value = value.name;
          })
        })

         
    });

 	$('#addEmployeeModal').on('show.bs.modal', function(event){
 		console.log('clicked show');
		document.getElementById('btn-add-employee').style.display = "none";
		document.getElementById('btn-next-employee').style.display = "inline-block";
		document.getElementById('btn-previous-employee').style.display = "none";
		document.getElementById('btn-cancel-employee').style.display = "inline-block";
		document.getElementById('employee-add-info').style.display = "none";
		document.getElementById('employee-next-info').style.display = "inline-block";

	});

	

	setTimeout(fade_out, 5000);

	function fade_out() {
	  $(".messagediv").fadeOut();
	  $("#birthdatemessage").fadeOut();
	  $("#add_birthdatemessage").fadeOut();
	  $("#edit_birthdatemessage").fadeOut();
	}

	function getAge(dateString) 
	{
	    var today = new Date();
	    var birthDate = new Date(dateString);
	    var age = today.getFullYear() - birthDate.getFullYear();
	    var m = today.getMonth() - birthDate.getMonth();
	    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
	    {
	        age--;
	    }
	    return age;
	}

	$("#edit_birthdate").on("change", function(){
		var bday = document.getElementById('edit_birthdate').value;
		var age = getAge(bday);
		
		if(age < 18){
			document.getElementById('edit_age').value = '';
			$('#birthdatemessage').fadeIn();
			document.getElementById('edit_birthdate').value = new Date();
			setTimeout(fade_out, 5000);
			
		}
		else
		{
			document.getElementById('edit_age').value = getAge(bday);
		}

	});


	$("#add_birthdate").on("change", function(){
		var bday = document.getElementById('add_birthdate').value;
		var age = getAge(bday);
		
		if(age < 18){
			document.getElementById('add_age').value = '_';
			document.getElementById('add_invalid').innerHTML = 'Invalid Age.';
			$('#add_birthdatemessage').fadeIn();
			document.getElementById('add_birthdate').valueAsDate = new Date();
			setTimeout(fade_out, 5000);
			
		}
		else
		{
			document.getElementById('add_age').value = getAge(bday);
		}

	});


	$('.btn-next-employee').on('click', function(){

		 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		var add_fname = document.getElementById('add_fname').value;
		var add_mname = document.getElementById('add_mname').value;
		var add_lname = document.getElementById('add_lname').value;
		var add_birthdate = document.getElementById('add_birthdate').value;
		var add_age = document.getElementById('add_age').value;
		var add_address = document.getElementById('add_address').value;
		var add_contact = document.getElementById('add_contact').value;
		var add_email = document.getElementById('add_email').value;
		var add_idnumber = document.getElementById('add_idnumber').value;
		var add_position = document.getElementById('add_position').value;
		var add_department = document.getElementById('add_department').value;
		var add_required = document.getElementById('add_required').value;
		var add_tin = document.getElementById('add_tin').value;
		var add_sss = document.getElementById('add_sss').value;
		var add_hdmf = document.getElementById('add_hdmf').value;
		var add_philhealth = document.getElementById('add_philhealth').value;



		if(add_fname == ''   || add_mname == ''   || add_lname == '' || add_birthdate == '' || add_age == ''      ||
	    add_address == ''    || add_contact == '' || add_email == '' || add_idnumber == ''  || add_position == '' ||
	    add_department == '' || add_required == '')
			
		{

			document.getElementById('add_invalid').innerHTML = 'Please fill-up all';
			$('#add_birthdatemessage').fadeIn();
			setTimeout(fade_out, 5000);

		}

           

        else if (reg.test(add_email) == false) 
        {
       		document.getElementById('add_invalid').innerHTML = 'Invalid email';
			$('#add_birthdatemessage').fadeIn();
			setTimeout(fade_out, 5000);
        } 

		else
		{
			document.getElementById('btn-add-employee').style.display = "inline-block";
			document.getElementById('btn-next-employee').style.display = "none";
			document.getElementById('btn-previous-employee').style.display = "inline-block";
			document.getElementById('btn-cancel-employee').style.display = "none";

			document.getElementById('employee-add-info').style.display = "inline-block";
			document.getElementById('employee-next-info').style.display = "none";

		}
		

	});

	$('#btn-previous-employee').on('click', function(){
		document.getElementById('btn-add-employee').style.display = "none";
		document.getElementById('btn-next-employee').style.display = "inline-block";
		document.getElementById('btn-previous-employee').style.display = "none";
		document.getElementById('btn-cancel-employee').style.display = "inline-block";
		document.getElementById('employee-add-info').style.display = "none";
		document.getElementById('employee-next-info').style.display = "inline-block";
	});

















	$('#btn-edit-next').on('click', function(){

		 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		var add_fname = document.getElementById('edit_fname').value;
		var add_mname = document.getElementById('edit_mname').value;
		var add_lname = document.getElementById('edit_lname').value;
		var add_birthdate = document.getElementById('edit_birthdate').value;
		var add_age = document.getElementById('edit_age').value;
		var add_address = document.getElementById('edit_address').value;
		var add_contact = document.getElementById('edit_contact').value;
		var add_email = document.getElementById('edit_email').value;
		var add_idnumber = document.getElementById('edit_idnumber').value;
		var add_position = document.getElementById('edit_position').value;
		var add_department = document.getElementById('edit_department').value;
		// var add_required = document.getElementById('edit_designation').value;


		if(add_fname == ''   || add_mname == ''   || add_lname == '' || add_birthdate == '' || add_age == ''      ||
	    add_address == ''    || add_contact == '' || add_email == '' || add_idnumber == ''  || add_position == '' ||
	    add_department == '' || add_required == '')
			
		{

			document.getElementById('edit_invalid').innerHTML = 'Please fill-up all';
			$('#edit_birthdatemessage').fadeIn();
			setTimeout(fade_out, 5000);

		}

           

        else if (reg.test(add_email) == false) 
        {
       		document.getElementById('edit_invalid').innerHTML = 'Invalid email';
			$('#edit_birthdatemessage').fadeIn();
			setTimeout(fade_out, 5000);
        } 

		else
		{
			document.getElementById('btn-edit-save').style.display = "inline-block";
			document.getElementById('btn-edit-next').style.display = "none";
			document.getElementById('btn-edit-previous').style.display = "inline-block";
			document.getElementById('btn-edit-close').style.display = "none";

			document.getElementById('save-edit-employee').style.display = "inline-block";
			document.getElementById('next-edit-employee').style.display = "none";
		}
		

	});

	$('#btn-edit-previous').on('click', function(){

		document.getElementById('btn-edit-save').style.display = "none";
		document.getElementById('btn-edit-next').style.display = "inline-block";
		document.getElementById('btn-edit-previous').style.display = "none";
		document.getElementById('btn-edit-close').style.display = "inline-block";

		document.getElementById('save-edit-employee').style.display = "none";
		document.getElementById('next-edit-employee').style.display = "inline-block";

	});

	$('.qwer').on('click', function(){
		console.log('clicked');
	})

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>