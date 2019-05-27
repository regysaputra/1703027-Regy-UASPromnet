<?php 
	$selected_name='';
	$selected_email='';
	$selected_address='';
	$selected_phone='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD - Quiz Promnet</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Add New Employee</span></a>
					</div>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>
							No.
						</th>
						<th>
							ID
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($karyawan as $key) {
							?>
							<td>
								<?php echo $i; ?>
							</td>
							<td>
								<?php echo $key->id ?>
							</td>
							<td><?php echo $key->name; ?></td>
							<td><?php echo $key->email; ?></td>
							<td><?php echo $key->address; ?></td>
							<td><?php echo $key->phone; ?></td>
							<td>
								<a href="#editEmployeeModal<?php echo $key->id;?>" class="" style="color:green;" data-toggle="modal">Edit </a>
								<a href="#deleteEmployeeModal<?php echo $key->id;?>" class="delete" data-toggle="modal">Delete</a>
							</td>
						</tr>
						<?php
						$i++;

					}
					?>
				</tbody>
			</table>

		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo site_url('C_karyawan/add'); ?>" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input id="tombol" type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<?php
	foreach($karyawan as $key){

	?>
	<div id="editEmployeeModal<?php echo $key->id;?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo site_url('C_karyawan/edit/'.$key->id); ?>" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Update Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?= $key->name ?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?= $key->email ?>"> 
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address" ><?= $key->address ?></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" value="<?= $key->phone?>">
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input id="tombol" type="submit" class="btn btn-success" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>


	<!-- Delete Modal HTML -->
	<?php
	foreach($karyawan as $key){

		?>
		<div id="deleteEmployeeModal<?php echo $key->id;?>" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo site_url('C_karyawan/delete/'.$key->id); ?>" method="POST">
						<div class="modal-header">
							<h4 class="modal-title">Delete Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>

	<?php } ?>


</body>
</html>
