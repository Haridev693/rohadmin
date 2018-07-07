<?php
/* @var $this FoodcompanyController */
/* @var $model Foodcompany */

$this->breadcrumbs=array(
	'Food Company'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Manage Order Type', 'url'=>array('admin')),
);
?>

<h1>Create Order Type</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>