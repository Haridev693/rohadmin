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
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WaiterId'); ?>
		<?php echo $form->dropDownList($model,'WaiterId',CHtml::listData(Login::model()->findAll(),'id','nameOperator'),array('prompt'=>'Select Waiter','style'=>'width:337px')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'TablesetId'); ?>
		<?php echo $form->dropDownList($model,'TablesetId',CHtml::listData(Tableset::model()->findAll(),'id','Name'),array('prompt'=>'Select Table Set','style'=>'width:337px')); ?>
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