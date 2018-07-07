<?php
/* @var $this FoodcompanyController */
/* @var $model Foodcompany */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php $status=array('1'=>'Active','0'=>'Deactive');
	$type=array('offline'=>'Offline','online'=>'Online');
?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Type'); ?>
		<?php echo $form->dropDownList($model,'Type',$type,array('prompt'=>'Select Order Type','style'=>'width:337px'));  ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php  echo $form->label($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',$status,array('prompt'=>'Select Status','style'=>'width:337px'));  ?>
	</div>

	<div class="row buttons" style="margin-left: 110px;">
		<?php echo CHtml::submitButton('Search',array('style'=>'width:337px')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->