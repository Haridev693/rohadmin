<?php
/* @var $this ReservationController */
/* @var $model Reservation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'ProductId'); ?>
		<?php echo $form->dropDownList($model,'ProductId',CHtml::listData(Product::model()->findAll(array("condition"=>"Stockstatus = 1")),'Id','Name'),array('prompt'=>'Select Product','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'ProductId'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Qty'); ?>
		<?php echo $form->textField($model,'Qty',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Qty'); ?>
	</div> 	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.timepicker.css?v=0.3.3" type="text/css"  media="all"/>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.position.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.timepicker.js?v=0.3.3"></script>

 <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$('#Reservation_Time').timepicker();
	 $( "#Reservation_Date" ).datepicker({dateFormat: 'yy-mm-dd' });
</script>