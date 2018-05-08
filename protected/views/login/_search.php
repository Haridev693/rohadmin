<?php
/* @var $this LoginController */
/* @var $model Login */
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

	<div class="row">
		<?php echo $form->label($model,'nameOperator'); ?>
		<?php echo $form->dropDownList($model,'nameOperator',CHtml::listData(Login::model()->findAll(),'id','nameOperator'),array('prompt'=>'Select Waiter','style'=>'width:337px')); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->label($model,'passOperator'); */?>
		<?php /*echo $form->textField($model,'passOperator',array('size'=>60,'maxlength'=>255)); */?>
	</div>-->

	<div class="row buttons" style="margin-left: 110px;">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->