<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<p align='center'><strong> ADMIN</strong></p>
			<img src="<?php echo base_url("assets/images/admin.jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td align="center"><strong>Kode Staff</strong></td>
					<td align="center"><strong>Nama</strong></td>
					<td align="center"><strong>Jenis Kelamin</strong></td>
					<td align="center"><strong>Bagian</strong></td>
					<td align="center"><strong>Gaji</strong></td>
				</tr>
				<?php
					foreach ($data_list_staff as $list) {
						echo "<tr>";
					 	foreach ($list as $key => $value) {
					 		if($key=="Nama")
					 		{
					 			echo "<td align='center'><a href='profil_staff_detail/$value'>".$value."</a></td>";
					 		}
					 		else
					 		{
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 	}
					 	echo "</tr>";
					 } 
				?>
			</table>
		</div>
	</div>
</div>