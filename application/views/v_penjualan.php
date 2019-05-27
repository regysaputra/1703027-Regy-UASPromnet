<?php 
	$selected_name='';
	$selected_email='';
	$selected_address='';
	$selected_phone='';
?>


<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Penjualan</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addModal" class="btn btn-success" data-toggle="modal"> <span>Tambah Penjualan</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>No.</th>
                        <th>ID Penjualan</th>
                        <th>Tipe Motor</th>
                        <th>Harga Motor</th>
                        <th>Tenor</th>
						<th>Uang Muka</th>
						<th>Cicilan Pokok</th>
                        <th>Cicilan Bunga</th>
                        <th>Cicilan Total</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($penjualan as $key) {
							?>
							<td><?php echo $i; ?></td>
							<td><?php echo $key->id_penjualan ?></td>
							<td><?php echo $key->tipe_motor; ?></td>
                            <td><?php echo $key->harga_motor; ?></td>
                            <td><?php echo $key->tenor; ?></td>
							<td><?php echo $key->uang_muka; ?></td>
							<td><?php echo $key->cicilan_pokok; ?></td>
                            <td><?php echo $key->cicilan_bunga; ?></td>
                            <td><?php echo $key->cicilan_total; ?></td>
							<td>
								<a href="#editModal<?php echo $key->id_penjualan;?>" class="" style="color:green;" data-toggle="modal">Edit </a>
								<a href="#deleteModal<?php echo $key->id_penjualan;?>" class="delete" data-toggle="modal">Delete</a>
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
    
    <!-- ADD Modal -->
	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo site_url('CRUD_Controller/add'); ?>" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Add Penjualan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Motor</label>
							<select class="form-control" name="motor" id="">
                                <?php 
                                    foreach ($motor as $key) {
                                        echo "<option value='$key->id_motor'>$key->tipe_motor</option>";
                                    }
                                ?>
                            </select>
						</div>
						<div class="form-group">
                            <label>Cicilan</label>
							<select class="form-control" name="cicil" id="">
                                <?php 
                                    foreach ($cicil as $key) {
                                        echo "<option value='$key->id_cicilan'>$key->tenor juta</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cicilan</label>
							<select class="form-control" name="uangmuka" id="">
                                <?php 
                                    foreach ($uangmuka as $key) {
                                        echo "<option value='$key->id_uang_muka'>".$key->uang_muka/1000000 ." juta</option>";
                                    }
                                ?>
                            </select>
						</div>
						
						<!-- <div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" required>
						</div> -->
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input id="tombol" type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

