	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text">Site build by Agung & David & Hafiyyan</p>
		</div>
	</div>
</body>

<!--load jQuery library-->
<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.2.min.js"); ?>"></script>
<!-- bootstrap-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/clock.js"); ?>"></script>
<script>
	if ($('#program').val()===('NULL')){
		$("b").remove();
	};
	else{
		$("p").append(" <b>Appended text</b>.");
	}
</script>
</html>
</html>