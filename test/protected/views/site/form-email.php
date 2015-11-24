<?php
$this->pageTitle=Yii::app()->name . ' - Form email';
$this->breadcrumbs=array(
	'From Email',
);
?>

<h1>From Email</h1>

<?php if(Yii::app()->user->hasFlash('formEmail')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('formEmail'); ?>
</div>

<?php else: ?>
	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm'); ?>


	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>