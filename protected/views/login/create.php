<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Waiters'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Waiter', 'url'=>array('index')),
	array('label'=>'Manage Waiter', 'url'=>array('admin')),
);
?>

<h1>Create Login</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>