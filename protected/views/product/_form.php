<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Price'); ?>
		<?php echo $form->textField($model,'Price',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumberName'); ?>
		<?php echo $form->textField($model,'NumberName',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NumberName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Category'); ?>
		<?php echo $form->dropDownList($model,'CategoryId',CHtml::listData(Category::model()->findAll(),'id','Name'),array('prompt'=>'Select Category','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'CategoryId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->