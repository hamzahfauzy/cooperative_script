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
					Pretest
				</div>		
				<div class="card-body">
					<?php if($examsession->group_1_id ==  $group->id) { ?>
						<h5><?= $question->title ?></h5>
						<p><?= $question->descriptions ?></p>

						<?php 
						$answer = $examsession->exam_answer_by(Session::user()->username);
						if(!empty($answer)){ 
						?>
							<hr>
							<h5>Your Answer</h5>
							<p><?= $answer->answer ?></p>


							<?php 
							$replied = $answer->replied(); 
							if(!empty($replied)){ ?>
								<hr>
								<h5><?= $replied->student()->fullname ?> Reply</h5>
								<p><?= $replied->answer ?></p>
							<?php } ?>
						<?php }else{ ?>
							<hr>
							<form action="<?= base_url() ?>/student/answer" method="post">
								<input type="hidden" name="student_as" value="1">
								<input type="hidden" name="exam_type" value="<?=$examsession->status?>">
								<label for="answer">Your Answer</label>
								<textarea name="answer" id="answer" rows="3" class="form-control" required></textarea>
								<span class="form-error answer">Answer cannot be empty</span>
								<br>
								<button class="btn btn-primary btn-block">Answer</button>
							</form>
						<?php } ?>
					<?php } ?>

					<?php if($examsession->group_2_id ==  $group->id) { ?>
						<?php 
						$answer = $examsession->exam_answers();
						if(!empty($answer)){ 
						?>
							<h5><?= $question->title ?></h5>
							<p><?= $question->descriptions ?></p>
							<hr>

							<?php
							$replied = $examsession->exam_answer_by(Session::user()->username);
							if(!empty($replied)){
							?>
								<h5><?= $replied->parent_answer()->student()->fullname ?> Answer</h5>
								<p><?= $replied->parent_answer()->answer ?></p>
								<hr>

								<h5>Your Replied</h5>
								<p><?= $replied->answer ?></p>
								<hr>
							<?php }else{ ?>
								<form action="<?= base_url() ?>/student/answer" method="post">
									<input type="hidden" name="student_as" value="2">
									<input type="hidden" name="exam_type" value="<?=$examsession->status?>">
									<div class="form-group">
										<label>Select Answer</label>
										<select name="answer_parent_id" class="form-control" onchange="showAnswer(this.value)" required>
											<option value="">Choose Answer</option>
											<?php foreach ($answer as $key => $value): ?>
											<option value="<?= $value->id ?>"><?= $value->student()->fullname ?></option>
											<?php endforeach ?>
										</select>
										<span class="form-error parent_answer_id">Answer must be choosen</span>
									</div>
									<div class="form-group">
										<?php foreach ($answer as $key => $value){ ?>
											<p id="answer<?=$value->id?>" class="answered" style="display: none;"><?=$value->answer?></p>
										<?php } ?>
									</div>
									<label for="answer">Your Reply</label>
									<textarea name="answer" id="answer" rows="3" class="form-control" required></textarea>
									<span class="form-error answer">Answer cannot be empty</span>
									<br>
									<button class="btn btn-primary btn-block">Answer</button>
								</form>
							<?php } ?>
						<?php }else{ ?>
							<h2>Wait for answer</h2>
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
<script type="text/javascript">
	function showAnswer(val)
	{
		document.querySelector(".answered").style.display = "none";
		document.getElementById("answer"+val).style.display = "block";
	}
</script>
<?php $this->load("partial.footer") ?>
