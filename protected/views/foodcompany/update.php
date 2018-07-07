<?php
/* @var $this FoodcompanyController */
/* @var $model Foodcompany */

$this->breadcrumbs=array(
	'Order Type'=>array('admin'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Order Type', 'url'=>array('create')),
	array('label'=>'View Order Type', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Order Type', 'url'=>array('admin')),
);
?>

<h1>Update Order Type: <?php echo $model->Name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>