<?php
/* @var $this CartController */
/* @var $model Cart */
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
		<?php echo $form->labelEx($model,'waiter'); ?>
		<?php echo $form->textField($model,'waiter',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'waiter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tableId'); ?>
		<?php echo $form->textField($model,'tableId',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tableId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cartId'); ?>
		<?php echo $form->textField($model,'cartId'); ?>
		<?php echo $form->error($model,'cartId'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->textField($model,'status'); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'time'); ?>
        <?php echo $form->textField($model,'time'); ?>
        <?php echo $form->error($model,'time'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->