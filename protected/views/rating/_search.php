<?php
/* @var $this CartController */
/* @var $model Cart */
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
		<?php echo $form->label($model,'customerId'); ?>
    	<?php echo $form->dropDownList($model,'customerId',CHtml::listData(Customer::model()->findAll(),'id','name'),array('prompt'=>'---Select---')); ?>
	</div>

	<div class="row">
		<?php /* echo $form->label($model,'tableId'); ?>
		<?php echo $form->dropDownList($model,'tableId',CHtml::listData(Tables::model()->findAll(),'Id','operatorId'),array('prompt'=>'---Select---')); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->label($model,'time'); */?>
		<?php /*echo $form->textField($model,'time'); */?>
	</div>

	<div class="row">
		<?php /* echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array(1=>'Ordering',0=>'Finished'),array('prompt'=>'---Select---')); */ ?>

	</div>

	<div class="row buttons" style="margin-left: 110px">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->