<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Waiters'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Waiter', 'url'=>array('index')),
	array('label'=>'Create Waiter', 'url'=>array('create')),
	array('label'=>'View Waiter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Waiter', 'url'=>array('admin')),
);
?>

<h1>Update: <?php echo $model->nameOperator; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>