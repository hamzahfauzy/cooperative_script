<?php $this->load("partial.header") ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto">
			<br><br>
			<center>
			<img src="<?= $this->assets->get('assets/logo-tutwuri-handayani.png')?>" height="200">
			</center>
			<br>
			<h2 align="center">Login</h2>
			<div class="form-container">
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Username or Password is invalid.
				</div>						
				<?php } ?>
				<form method="post" action="/login">
					<div class="form-group">
						<label for="username"><i class="fa fa-user"></i> Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="">
						<span class="form-error username">username cannot be empty</span>
					</div>
					<div class="form-group">
						<label for="password"><i class="fa fa-lock"></i> Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
						<span class="form-error password">password cannot be empty</span>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
