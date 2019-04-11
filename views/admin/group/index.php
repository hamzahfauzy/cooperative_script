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
				<?php foreach($groups as $group){ ?>
			  	<li class="list-group-item d-flex justify-content-between align-items-center">
				    <?= $group->name ?>
				    <div>
				    	<a href="<?= base_url() ?>/admin/group/show/<?=$group->id?>"><i class="fas fa-user"></i></a>
				    	<a href="<?= base_url() ?>/admin/group/edit/<?=$group->id?>"><i class="fas fa-pencil-alt"></i></a>
				    	<a href="<?= base_url() ?>/admin/group/delete/<?=$group->id?>"><i class="fas fa-trash-alt"></i></a>
				    </div>
			  	</li>
			  	<?php } ?>
			</ul>
			<p></p>
			<a href="<?= base_url() ?>/admin" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> BACK</a>
		</div>
	</div>
	<a href="<?= base_url() ?>/admin/group/create" class="btn btn-primary btn-rounded floating-button"><i class="fas fa-plus"></i></a>
</div>

<?php $this->load("partial.footer") ?>