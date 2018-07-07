<?php
/* @var $this TablesController */
/* @var $model Tables */
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
        <?php echo $form->label($model,'ProductId'); ?>
        <?php echo $form->dropDownList($model,'ProductId',CHtml::listData(Product::model()->findAll(),'Id','Name'),array('prompt'=>'Select Product','style'=>'width:337px')); ?>
    </div>
	<div class="row">
		<?php echo $form->label($model,'Qty'); ?>
		<?php echo $form->textField($model,'Qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Time'); ?>
		<?php echo $form->textField($model,'Time'); ?>
	</div>



	<div class="row buttons" style="margin-left: 110px">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->