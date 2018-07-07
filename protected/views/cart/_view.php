<?php
/* @var $this CartController */
/* @var $data Cart */
?>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waiter')); ?>:</b>
	<?php echo CHtml::encode($data->waiter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tableId')); ?>:</b>
	<?php echo CHtml::encode($data->tableId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartId')); ?>:</b>
	<?php echo CHtml::encode($data->cartId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php
    if($data->status == 0)
    echo 'Ordering';
    if($data->status == 1)
        echo 'Finished';
    else echo '';
    //echo CHtml::encode($data->status);

    ?>
	<br />


</div>