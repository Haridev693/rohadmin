<?php
/* @var $this CategoryController */
/* @var $model Category */
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
		<?php /*echo $form->label($model,'ImageUrl'); */?>
		<?php /*echo $form->textField($model,'ImageUrl',array('size'=>60,'maxlength'=>255)); */?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php /*echo $form->dropDownList($model,'Name',CHtml::listData(Category::model()->findAll(),'Name','Name'),array('prompt'=>'Select')); */?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons" style="margin-left: 110px">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->