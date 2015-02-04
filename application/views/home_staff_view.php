<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/bonie.jpg"); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php foreach ($data[0] as $key => $value) {
				if ($key=="Id"|$key=="Id_User"|$key=="Username"|$key=="Password"|$key=="Status_Akun"|$key=="Status_Login"|$key=="Status_Pembayaran"|$key=="Sisa_Pembayaran")
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
		</div>
	</div>
</div>