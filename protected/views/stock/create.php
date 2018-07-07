<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
	'Stock'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Manage Stock History', 'url'=>array('admin')),
);
?>

<h1>Add Stock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>