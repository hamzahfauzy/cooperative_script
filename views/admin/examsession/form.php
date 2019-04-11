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
			<form method="post" action="<?= base_url() ?>/admin/examsession/<?= $link ?>">
			<?php if(isset($examsession)): ?>
				<input type="hidden" name="id" value="<?= $examsession->id ?>">
			<?php endif ?>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="name" required="" value="<?= old('name') ? old('name') : (isset($examsession) ? $examsession->name : '') ?>">
					<span class="form-error name">Name cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="pretest_question_id">Pretest Question</label>
					<select name="pretest_question_id" class="form-control" id="pretest_question_id" required>
						<?php foreach($questions as $question): ?>
							<option value="<?= $question->id ?>"><?= $question->title ?></option>
						<?php endforeach ?>
					</select>
					<span class="form-error pretest_question_id">Pretest Question cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="exam_question_id">Exam Question</label>
					<select name="exam_question_id" class="form-control" id="exam_question_id" required>
						<?php foreach($questions as $question): ?>
							<option value="<?= $question->id ?>"><?= $question->title ?></option>
						<?php endforeach ?>
					</select>
					<span class="form-error exam_question_id">Exam Question cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="group_1_id">Group 1</label>
					<select name="group_1_id" class="form-control" id="group_1_id" required>
						<?php foreach($groups as $group): ?>
						<?php if(in_array($group->id, $group_1) || in_array($group->id, $group_2) ) continue; ?>
							<option value="<?= $group->id ?>"><?= $group->name ?></option>
						<?php endforeach ?>
					</select>
					<span class="form-error group_1_id">Group 1 cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="group_2_id">Group 2</label>
					<select name="group_2_id" class="form-control" id="group_2_id" required>
						<?php foreach($groups as $group): ?>
							<?php if(in_array($group->id, $group_1) || in_array($group->id, $group_2) ) continue; ?>
							<option value="<?= $group->id ?>"><?= $group->name ?></option>
						<?php endforeach ?>
					</select>
					<span class="form-error group_2_id">Group 2 cannot be empty</span>
				</div>

				<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> SAVE</button>
			</form>
			<p></p>
			<a href="<?= base_url() ?>/admin/examsession" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>