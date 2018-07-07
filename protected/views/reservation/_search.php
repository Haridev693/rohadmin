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
        <?php echo $form->label($model,'TableId'); ?>
        <?php echo $form->dropDownList($model,'TableId',CHtml::listData(Tables::model()->findAll(),'Id','Id'),array('prompt'=>'Select Table','style'=>'width:337px')); ?>
    </div>
	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Number'); ?>
		<?php echo $form->textField($model,'Number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Person'); ?>
		<?php echo $form->textField($model,'Person'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Date'); ?>
		<?php echo $form->textField($model,'Date'); ?>
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