<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Price'); ?>
		<?php echo $form->textField($model,'Price',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php /*echo $form->dropDownList($model,'Name',CHtml::listData(Product::model()->findAll(),'Name','Name'),array('prompt'=>'---Select---')); */?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Category'); ?>
		<?php echo $form->dropDownList($model,'CategoryId',CHtml::listData(Category::model()->findAll(),'id','Name'),array('prompt'=>'Select Category','style'=>'width:337px')); ?>
	</div>

	<div class="row buttons" style="margin-left: 110px;">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->