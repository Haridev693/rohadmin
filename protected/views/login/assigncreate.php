<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Waiters'=>array('admin'),
	'Assign Table Set',
);

$this->menu=array(
	//array('label'=>'List Waiter', 'url'=>array('index')),
	array('label'=>'Manage Waiter', 'url'=>array('admin')),
	array('label'=>'Manage Assign Table Set', 'url'=>array('adminassign')),
);
?>

<h1>Assign Table Set </h1>

<?php  $this->renderPartial('_formassign', array('model'=>$model)); ?>