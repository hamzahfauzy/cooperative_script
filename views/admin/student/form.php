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
			<?php if ($error) { ?>
			<div class="alert alert-danger" role="alert">
				Student was exists.
			</div>						
			<?php } ?>
			<form method="post" action="<?= base_url() ?>/admin/student/<?= $link ?>">
				<div class="form-group">
					<label for="NIS">NIS</label>
					<input type="tel" name="NIS" id="NIS" class="form-control" placeholder="NIS" required="" value="<?= old('NIS') ? old('NIS') : (isset($student) ? $student->NIS : '') ?>">
					<span class="form-error NIS">NIS cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input type="tel" name="fullname" id="fullname" class="form-control" placeholder="fullname" required="" value="<?= old('fullname') ? old('fullname') : (isset($student) ? $student->fullname : '') ?>">
					<span class="form-error fullname">Full Name cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<textarea name="address" id="address" class="form-control" placeholder="address" required=""><?= old('address') ? old('address') : (isset($student) ? $student->address : '') ?></textarea>
					<span class="form-error address">Address cannot be empty</span>
				</div>
				<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> SAVE</button>
			</form>
			<p></p>
			<a href="<?= base_url() ?>/admin/student" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>