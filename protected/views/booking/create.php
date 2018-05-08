<?php
/* @var $this BookingController */
/* @var $model Booking */

$this->breadcrumbs=array(
	'Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Orderings', 'url'=>array('index')),
	//array('label'=>'Manage Booking', 'url'=>array('admin')),
);
?>

<h1>Create Booking</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>