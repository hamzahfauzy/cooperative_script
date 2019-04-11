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
			<form method="post" action="<?= base_url() ?>/admin/group/member/<?= $link ?>">
				<div class="form-group">
						<input type="hidden" name="group_id" value="<?= $group->id ?>">
						<label for="fullname">Full Name</label>
						<select name="NIS" class="form-control" required>
							<?php foreach($students as $student): ?>
								<?php if(in_array($student->NIS , $members)) continue; ?>
								<option value="<?= $student->NIS ?>"><?= $student->fullname ?></option>
							<?php endforeach ?>
						</select>
						<span class="form-error NIS">Student cannot be empty</span>
				</div>
				
				<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> SAVE</button>
			</form>
			<p></p>
			<a href="<?= base_url() ?>/admin/group" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>