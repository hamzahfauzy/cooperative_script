<?php $this->load("partial.header") ?>
<style type="text/css">
.btn-block {
	margin-bottom: 10px !important;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 m-auto">
			<br>
			<center>
			<img src="<?= $this->assets->get('assets/logo-tutwuri-handayani.png')?>" width="100px">
			<h3>Cooperative Script</h3>
			<h4>Home Admin Menu</h4>
			</center>
			<br>
			<center>
				<a href="<?= base_url() ?>/admin/student" class="btn btn-primary btn-block"><i class="fa fa-users"></i> Students</a>
				<a href="#" class="btn btn-primary btn-block"><i class="fa fa-users-cog"></i> Groups</a>
				<a href="#" class="btn btn-primary btn-block"><i class="fa fa-comments"></i> Questions</a>
				<a href="#" class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Exam Sessions</a>
				<a href="<?= base_url() ?>/logout" class="btn btn-danger btn-block"><i class="fa fa-sign-out-alt"></i> Log Out</a>

				<br>
				copyright &copy; 2019
			</center>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
