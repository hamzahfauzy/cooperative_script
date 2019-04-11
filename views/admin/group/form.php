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
				Group was exists.
			</div>						
			<?php } ?>
			<form method="post" action="<?= base_url() ?>/admin/group/<?= $link ?>">
				<div class="form-group">
					<?php if(isset($group)): ?>
						<input type="hidden" name="id" value="<?= $group->id ?>">
					<?php endif ?>
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="name" required="" value="<?= old('name') ? old('name') : (isset($group) ? $group->name : '') ?>">
					<span class="form-error name">Name cannot be empty</span>
				</div>
				<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> SAVE</button>
			</form>
			<p></p>
			<a href="<?= base_url() ?>/admin/group" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>