<?php
/* @var $this TaxController */
/* @var $model Tax */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tax'); ?>
		<?php echo $form->textField($model,'tax',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tax'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'gst no '); ?>
		<?php echo $form->textField($model,'gst_no',array('size'=>10,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'gst_no'); ?>

	</div>


	<div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->textField($model,'status'); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>
   

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->