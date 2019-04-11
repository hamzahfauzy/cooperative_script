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
			<h2 align="center">Exam Session Detail</h2>
			<h3>Pretest</h3>
			<hr>
			<div>
				<h5><?= $examsession->pretest_question()->title ?></h5>
				<p><?= $examsession->pretest_question()->descriptions ?></p>

				<h5>Pretest Answer</h5>
				<ul class="list-group">
				<?php 
				$answers = $examsession->exam_answers();
				foreach($answers as $answer){ 
					if($answer->exam_type == 2)
						continue;
				?>
			  	<li class="list-group-item">
				    <b><?= $answer->student()->fullname ?></b>
				    <p><?= $answer->answer ?></p>
			  	</li>
			  	<?php } ?>
			</ul>
			<?php if(empty($answers)){ echo "<p>No Answer</p>"; }else{ if($examsession->status == 1){ ?>
				<a href="<?= base_url() ?>/admin/examsession/<?= $examsession->id ?>/finish" class="btn btn-primary btn-block">Pretest Finish</a>
			<?php } } ?>
			</div>
			<hr>
			<br>
			<h3>Exam</h3>
			<hr>
			<div>
				<h5><?= $examsession->exam_question()->title ?></h5>
				<p><?= $examsession->exam_question()->descriptions ?></p>

				<h5>Exam Answer</h5>
				<ul class="list-group">
				<?php 
				$no = 0;
				foreach($answers as $answer){ 
					if($answer->exam_type == 1)
						continue;
					$no++;
				?>
			  	<li class="list-group-item">
				    <b><?= $answer->student()->fullname ?></b>
				    <p><?= $answer->answer ?></p>
			  	</li>
			  	<?php } ?>

			  	</ul>
			  	<?php if($no == 0){ echo "<p>No Answer</p>"; }else{ ?>
					<a href="<?= base_url() ?>/admin/examsession/<?= $examsession->id ?>/finish" class="btn btn-primary btn-block">Exam Finish</a>
				<?php } ?>
			</div>
			
			<p></p>
			<a href="<?= base_url() ?>/admin" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
	<a href="<?= base_url() ?>/admin/examsession/create" class="btn btn-primary btn-rounded floating-button"><i class="fas fa-plus"></i></a>
</div>

<?php $this->load("partial.footer") ?>