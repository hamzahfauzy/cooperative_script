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
			<ul class="list-group">
				<?php foreach($examsessions as $examsession){ ?>
			  	<li class="list-group-item d-flex justify-content-between align-items-center">
				    <?= $examsession->name ?>
				    <div>
				    	<a href="<?= base_url() ?>/student/exam/show/<?=$examsession->id?>"><i class="fas fa-eye"></i></a>
				    </div>
			  	</li>
			  	<?php } ?>
			</ul>
			<p></p>
			<a href="<?= base_url() ?>/student" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
</div>

<?php $this->load("partial.footer") ?>