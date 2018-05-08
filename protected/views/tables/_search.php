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
        <?php echo $form->label($model,'operatorId'); ?>
        <?php echo $form->dropDownList($model,'operatorId',CHtml::listData(Login::model()->findAll(),'id','nameOperator'),array('prompt'=>'Select Operator','style'=>'width:337px')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array(1=>'Active',2=>'InActive'),array('prompt'=>'Select Status','style'=>'width:337px')); ?>
    </div>

	<div class="row buttons" style="margin-left: 110px">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->