<?php
/* @var $this BookingController */
/* @var $model Booking */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->label($model,'productId'); */?>
		<?php /*echo $form->textField($model,'productId',array('size'=>60,'maxlength'=>255)); */?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'tableId'); ?>
		<?php echo $form->dropDownList($model,'tableId',CHtml::listData(Tables::model()->findAll(),'Id','operatorId'),array('prompt'=>'---Select---')); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->label($model,'img'); */?>
		<?php /*echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); */?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'productName'); ?>
		<?php echo $form->dropDownList($model,'productName',CHtml::listData(Product::model()->findAll(),'Id','Name'),array('prompt'=>'---Select---')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->label($model,'cartId'); */?>
		<?php /*echo $form->textField($model,'cartId'); */?>
	</div>-->

	<div class="row buttons" style="margin-left: 110px">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->