
<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Daftar <b>Motor</b></h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID Motor</th>
						<th>Tipe Motor</th>
						<th>Harga Motor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($motor as $key) {
							?>
							<td><?php echo $i; ?></td>
							<td><?php echo $key->id_motor ?></td>
							<td><?php echo $key->tipe_motor; ?></td>
							<td><?php echo $key->harga_motor; ?></td>							
						</tr>
						<?php
						$i++;

					}
					?>
				</tbody>
			</table>

		</div>
	</div>