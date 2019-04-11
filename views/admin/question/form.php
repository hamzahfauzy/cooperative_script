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
			<form method="post" action="<?= base_url() ?>/admin/question/<?= $link ?>">
				<?php if(isset($question)): ?>
					<input type="hidden" name="id" value="<?= $question->id ?>">
				<?php endif ?>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" placeholder="title" required="" value="<?= old('title') ? old('title') : (isset($question) ? $question->title : '') ?>">
					<span class="form-error title">Title cannot be empty</span>
				</div>

				<div class="form-group">
					<label for="descriptions">Descriptions</label>
					<textarea name="descriptions" id="descriptions" class="form-control" placeholder="descriptions" required=""><?= old('descriptions') ? old('descriptions') : (isset($question) ? $question->descriptions : '') ?></textarea>
					<span class="form-error descriptions">Descriptions cannot be empty</span>
				</div>
				<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> SAVE</button>
			</form>
			<p></p>
			<a href="<?= base_url() ?>/admin/question" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>