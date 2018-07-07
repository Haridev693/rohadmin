<?php
/* @var $this LoginController */
/* @var $model Login */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'WaiterId'); ?>
		<?php echo $form->dropDownList($model,'WaiterId',CHtml::listData(Login::model()->findAll(),'id','nameOperator'),array('prompt'=>'Select Waiter','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'WaiterId'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'TablesetId'); ?>
		<?php echo $form->dropDownList($model,'TablesetId',CHtml::listData(Tableset::model()->findAll(),'Id','Name'),array('prompt'=>'Select Table Set','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'TablesetId'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->