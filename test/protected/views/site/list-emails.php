<?php
$this->pageTitle=Yii::app()->name . ' - list Emails';
$this->breadcrumbs=array(
	'listEmails',
);
?>

<h1>list Emails</h1>

<?php if(Yii::app()->user->hasFlash('listEmails')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('listEmails'); ?>
	</div>

<?php else: ?>

<div class="row list-emails">
	<?php foreach($model as $item): ?>
			<div clas="col-lg-12">
				<div attr="id" class="id col-lg-3"><?= $item->id ?></div>
				<div attr="email" class="email col-lg-3"><?= $item->email ?></div>

				<div attr="email" class="create_time col-lg-3"><?= $item->create_time ?></div>
				<div attr="email" class="update_time col-lg-3"><?= $item->update_time ?></div>
			</div>
	<?php endforeach; ?>
</div><!-- form -->

<?php endif; ?>