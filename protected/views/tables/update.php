<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
	'Tables'=>array('admin'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Create Tables', 'url'=>array('create')),
	array('label'=>'View Tables', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Tables', 'url'=>array('admin')),
);
?>

<h1>Update Tables: <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>