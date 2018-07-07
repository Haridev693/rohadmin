<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
	'Reservation'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Create Reservation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>