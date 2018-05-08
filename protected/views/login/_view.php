<?php
/* @var $this LoginController */
/* @var $data Login */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nameOperator')); ?>:</b>
	<?php echo CHtml::encode($data->nameOperator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passOperator')); ?>:</b>
	<?php echo CHtml::encode($data->passOperator); ?>
	<br />


</div>