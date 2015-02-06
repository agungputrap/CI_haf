<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/".$data[0]['Username'].".jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php
				if ($data_status[0]["Status_Pembayaran"]=="Belum Lunas") 
				{
				 	foreach ($data_status[0] as $key => $value) {
				 		//menampilkan status
				 		echo "<div class='row'>";
						echo "<div class='col-md-6'>";
							echo"<label>".str_replace("_", " ", $key)."</label>";
						echo "</div>";
						echo "<div class='col-md-5 col-md-offset-1'>";
							echo "<p>".$value."</p>";
						echo "</div>";
						echo"</div>";
				 	}
				 	//menampilkan tabel pembayaran
					echo "<div class='col-md-6'>";
					echo "<table class='table table-striped'>";
					echo "<tr>";
						echo "<td><strong>Kode Pembayaran</strong></td>";
						echo "<td><strong>Atas Nama</strong></td>";
						echo "<td><strong>Nama</strong></td>";
						echo "<td><strong>Staff Yang Menerima</strong></td>";
						echo "<td><strong>Nama Staff</strong></td>";
						echo "<td><strong>Tanggal Pembayaran</strong></td>";
					echo "</tr>";
					foreach ($data_pembayaran as $list) {
						echo "<tr class='warning'>";
						foreach ($list as $value_tabel) {
							echo "<td>".$value_tabel."</td>";
						}
						echo "</tr>";
					}			
					echo "</table>";
					echo "</div>";
				 } 
				 elseif ($data_status[0]["Status_Pembayaran"]=="Lunas" & count($data_pembayaran)!=0) 
				 {
				 	//menampilkan status pembayaran 
					echo "<h1>Pembayaran telah lunas</h1>";
					echo "</div>";

					//menampilkan tabel pembayaran
					echo "<div class='col-md-6 col-md-offset-1'>";
					echo "<table class='table table-striped'>";
					echo "<tr>";
						echo "<td><strong>Kode Pembayaran</strong></td>";
						echo "<td><strong>Atas Nama</strong></td>";
						echo "<td><strong>Nama</strong></td>";
						echo "<td><strong>Staff Yang Menerima</strong></td>";
						echo "<td><strong>Nama Staff</strong></td>";
						echo "<td><strong>Tanggal Pembayaran</strong></td>";
					echo "</tr>";
					foreach ($data_pembayaran as $list) {
						echo "<tr class='info'>";
						foreach ($list as $value_tabel) {
							echo "<td align='center'>".$value_tabel."</td>";
						}
						echo "</tr>";
					}			
					echo "</table>";
					echo "</div>";
				 }
				 else {
				 	//menampilkan status pembayaran 
					echo "<h1>Pembayaran telah Lunas</h1>";
					echo "</div>";

					//menampilkan tabel pembayaran
					echo "<div class='col-md-6 col-md-offset-1'>";
					echo "<table class='table table-striped'>";
					echo "<tr>";
						echo "<td><strong>Kode Pembayaran</strong></td>";
						echo "<td><strong>Atas Nama</strong></td>";
						echo "<td><strong>Nama</strong></td>";
						echo "<td><strong>Staff Yang Menerima</strong></td>";
						echo "<td><strong>Nama Staff</strong></td>";
						echo "<td><strong>Tanggal Pembayaran</strong></td>";
					echo "</tr>";
					for ($i=0; $i < 6; $i++) { 
						echo "<td align='center'> - </td>";
					}
					echo "</tr>";
					echo "</table>";
					echo "</div>";
				 }
				  
			?>
		</div>
	</div>
</div>