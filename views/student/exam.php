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
					<?php if($examsession->status == 1): ?>
						Pretest
					<?php else: ?>
						Exam
					<?php endif ?>
				</div>		
				<div class="card-body">
					<?php if($examsession->group_1_id == $group->id && empty($examsession->exam_answer_by(Session::user()->username))){ ?>
					<h5><?= $question->title ?></h5>
					<p><?= $question->descriptions ?></p>
					<hr>
					<form action="<?= base_url() ?>/student/answer" method="post">
						<label for="answer">Answer</label>
						<textarea name="answer" id="answer" rows="3" class="form-control" required></textarea>
						<span class="form-error answer">Answer cannot be empty</span>
						<br>
						<button class="btn btn-primary btn-block">Answer</button>
					</form>
					<?php }else{ ?>
						<?php if($examsession->group_1_id == $group->id){ ?>
							<h2>Your Answer</h2>
							<?php $answer = $examsession->exam_answer_by(Session::user()->username); ?>
							<p><?= $answer->answer ?></p>
						<?php }else{ ?>
						<h2>Waiting For Answer</h2>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<br>
			<a href="<?= base_url() ?>/student" class="btn btn-warning btn-block"><i class="fa fa-arrow-left"></i> Back</a>
			</center>
			
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
