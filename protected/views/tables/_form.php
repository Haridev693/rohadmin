<?php
/* @var $this TablesController */
/* @var $model Tables */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'Id'); */?>
		<?php /*echo $form->textField($model,'Id'); */?>
		<?php /*echo $form->error($model,'Id'); */?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'operatorId'); ?>
		<?php echo $form->dropDownList($model,'operatorId',CHtml::listData(Login::model()->findAll(),'id','nameOperator'),array('prompt'=>'Select Operator','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'operatorId'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->