<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1> <?php echo ($data[0]['nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/bonie.jpg"); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php foreach ($data_status[0] as $key => $value) {
				if($key=="Status_Pembayaran" & $value=="Lunas")
				{
					echo "pembayaran telah lunas";
				}
				else 
				{
					echo "<div class='row'>";
						echo "<div class='col-md-3'>";
							echo"<label>".str_replace("_", " ", $key)."</label>";
						echo "</div>";
						echo "<div class='col-md-5 col-md-offset-1'>";
							echo "<p>".$value."</p>";
						echo "</div>";
					echo"</div>";
				}
			} ?>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<table class="table table-striped">
				<tr>
					<td>Kode Pembayaran</td>
					<td>Atas Nama</td>
					<td>Nama</td>
					<td>Staff Yang Menerima</td>
					<td>Nama Staff</td>
					<td>Tanggal Pembayaran</td>
				</tr>
				<?php if(count($data)==0)
				{
					echo "<tr>";
					for ($i=0; $i < 6; $i++) { 
						echo "<td> - </td>";
					}
					echo "</tr>";
				}
				else
				{
					foreach ($data as $list) {
					echo "<tr>";
					foreach ($list as $value) {
						echo "<td>".$value."</td>";
					}
					echo "</tr>";
				}
				}
				?>
			</table>
		</div>
	</div>
</div>