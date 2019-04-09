<?php $this->load("partial.header") ?>
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
			<img src="<?= $this->assets->get('assets/logo-tutwuri-handayani.png')?>" height="200">
			<h3>Cooperative Script</h3>
			<h4>Student Menu</h4>
			</center>
			<br>
			<center>
				<a href="#" class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Exam</a>
				<a href="#" class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Exam Result</a>
				<a href="<?= base_url() ?>/logout" class="btn btn-danger btn-block"><i class="fa fa-sign-out-alt"></i> Log Out</a>
			</center>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
