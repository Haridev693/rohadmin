<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservation'=>array('admin'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'View Reservation', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Update Reservation: <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>