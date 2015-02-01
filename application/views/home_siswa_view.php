<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1> <?php echo ($user) ?> </h1>
			<img src="<?php echo base_url("assets/images/bonie.jpg"); ?>" class="img-responsive" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php foreach ($data as $key => $value) {
				if ($key=="Id"|$key=="Id_User"|$key=="Username"|$key=="Password"|$key=="Status_Akun"|$key=="Status_Login")
				{

				}
				else{
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
			
			
			<!--

			<div class="row">
				<div class="col-md-1">
					<label>Nama</label>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<p>Agung Putra Pasaribu</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
					<label>Umur</label>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<p>17 thn</p>
				</div>
			</div>		
			<div class="row">
				<div class="col-md-1">
					<label>Alamat</label>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<p>Gang Swakarsa 13 Bulak Rantai, Lubang Buaya</p>
				</div>
			</div>	
			-->	
		</div>
	</div>
</div>