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
						<h5><?= $examsession->pretest_question()->title ?></h5>
						<p><?= $examsession->pretest_question()->descriptions ?></p>

						<?php 
						$answer = $examsession->exam_answer_default(Session::user()->username,1);
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
						<?php } ?>
					<?php } ?>

					<?php if($examsession->group_2_id ==  $group->id) { ?>
						<?php 
						$answer = $examsession->answers();
						if(!empty($answer)){ 
						?>
							<h5><?= $examsession->pretest_question()->title ?></h5>
							<p><?= $examsession->pretest_question()->descriptions ?></p>
							<hr>

							<?php
							$replied = $examsession->exam_answer_default(Session::user()->username, 1);
							if(!empty($replied)){
							?>
								<h5><?= $replied->parent_answer()->student()->fullname ?> Answer</h5>
								<p><?= $replied->parent_answer()->answer ?></p>
								<hr>

								<h5>Your Replied</h5>
								<p><?= $replied->answer ?></p>
								<hr>
							<?php } ?>
						<?php }else{ ?>
							<h2>Wait for answer</h2>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-header">
					Exam
				</div>		
				<div class="card-body">
					<?php if($examsession->group_1_id ==  $group->id) { ?>
						<h5><?= $examsession->exam_question()->title ?></h5>
						<p><?= $examsession->exam_question()->descriptions ?></p>

						<?php 
						$answer = $examsession->exam_answer_default(Session::user()->username,2);
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
						<?php } ?>
					<?php } ?>

					<?php if($examsession->group_2_id ==  $group->id) { ?>
						<?php 
						$answer = $examsession->answers();
						if(!empty($answer)){ 
						?>
							<h5><?= $examsession->exam_question()->title ?></h5>
							<p><?= $examsession->exam_question()->descriptions ?></p>
							<hr>

							<?php
							$replied = $examsession->exam_answer_default(Session::user()->username,2);
							if(!empty($replied)){
							?>
								<h5><?= $replied->parent_answer()->student()->fullname ?> Answer</h5>
								<p><?= $replied->parent_answer()->answer ?></p>
								<hr>

								<h5>Your Replied</h5>
								<p><?= $replied->answer ?></p>
								<hr>
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
