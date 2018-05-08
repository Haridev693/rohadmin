<?php
/* @var $this QueryController */
/* @var $data Query */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Question')); ?>:</b>
	<?php echo CHtml::encode($data->Question); ?>
	<br />


</div>