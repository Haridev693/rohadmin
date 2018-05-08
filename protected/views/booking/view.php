<?php
/* @var $this BookingController */
/* @var $model Booking */

$this->breadcrumbs=array(
	'Bookings'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Orderings', 'url'=>array('index')),
	//array('label'=>'Create Booking', 'url'=>array('create')),
	//array('label'=>'Update Booking', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Booking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Booking', 'url'=>array('admin')),
);
?>

<h1>View Orderings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'productId',
		'tableId',
		//'img',
		'productName',
		'price',
		'number',
		'note',
		'cartId',
	),
)); ?>
