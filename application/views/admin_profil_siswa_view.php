<div class="container">
	<div class="row">
		<!--
		<div class="col-md-4 well">
			<p align='center'><strong> ADMIN</strong></p>
			<img src="<?php echo base_url("assets/images/admin.jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
	-->
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td align="center"><strong>No. SSC</strong></td>
					<td align="center"><strong>Nama</strong></td>
					<td align="center"><strong>Jenis Kelamin</strong></td>
					<td align="center"><strong>Program</strong></td>
					<td align="center"><strong>Kode Kelas</strong></td>
					<td align="center"><strong>Status Pembayaran</strong></td>
				</tr>
				<?php
					foreach ($data_list_siswa as $list) {
						echo "<tr>";
					 	foreach ($list as $key => $value) {
					 		if($key=="Nama")
					 		{
					 			echo "<td align='center'><a href='profil_siswa_detail/$value'>".$value."</a></td>";
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