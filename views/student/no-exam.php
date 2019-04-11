<?php
use vendor\zframework\Session;

 $this->load("partial.header") ?>
<style type="text/css">
.btn-block {
	margin-bottom: 10px !important;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 m-auto">
			<br><br>
			<center>
			<div class="card">
				<div class="card-header">
					Status
				</div>		
				<div class="card-body">
					<h2>No exam is active</h2>
				</div>
			</div>
			<br>
			<a href="<?= base_url() ?>/student" class="btn btn-warning btn-block"><i class="fa fa-arrow-left"></i> Back</a>
			</center>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	function showAnswer(val)
	{
		document.querySelector(".answered").style.display = "none";
		document.getElementById("answer"+val).style.display = "block";
	}
</script>
<?php $this->load("partial.footer") ?>
