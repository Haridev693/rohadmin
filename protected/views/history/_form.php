<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'productId'); ?>
		<?php echo $form->textField($model,'productId',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'productId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tableId'); ?>
		<?php echo $form->textField($model,'tableId',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tableId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productName'); ?>
		<?php echo $form->textField($model,'productName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'productName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cartId'); ?>
		<?php echo $form->textField($model,'cartId'); ?>
		<?php echo $form->error($model,'cartId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waiter'); ?>
		<?php echo $form->textField($model,'waiter',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'waiter'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->