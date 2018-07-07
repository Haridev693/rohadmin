<?php
/* @var $this FoodcompanyController */
/* @var $model Foodcompany */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'foodcompany-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php $status=array(''=>'Select Status','1'=>'Active','0'=>'Deactive');
	$type=array(''=>'Select Order Type','offline'=>'Offline','online'=>'Online');
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->dropDownList($model,'Type',$type,array('style'=>'width:337px')); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php  echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',$status,array('style'=>'width:337px')); ?>
		<?php echo $form->error($model,'Status');  ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->