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
		<?php echo $form->labelEx($model,'Restaurant Name'); ?>
		<?php echo $form->textField($model,'rest_name',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'rest_name'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Address 1'); ?>
		<?php echo $form->textField($model,'address_1',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'address_1'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Address 2'); ?>
		<?php echo $form->textField($model,'address_2',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'address_2'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Sales Invoice'); ?>
		<?php echo $form->textField($model,'sales_invoice',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'sales_invoice'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Footer 1'); ?>
		<?php echo $form->textField($model,'footer_1',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'footer_1'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Footer 2'); ?>
		<?php echo $form->textField($model,'footer_2',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'footer_2'); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Footer 3'); ?>
		<?php echo $form->textField($model,'footer_3',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'footer_3'); ?>

	</div>
	
			<div class="row">
		<?php echo $form->labelEx($model,'Generate Bill from app'); ?>
		<?php echo $form->textField($model,'app_bill',array('maxlength'=>1)); ?>
		<?php echo $form->error($model,'printer_ip'); ?>

	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'Wifi Printer IP Address'); ?>
		<?php echo $form->textField($model,'printer_ip',array('maxlength'=>30)); ?>
		<?php echo $form->error($model,'printer_ip'); ?>

	</div>
	
<!-- 	<div class="row">
    </div>
 -->   

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->