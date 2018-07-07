<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Carts'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Cart', 'url'=>array('cart')),
	//array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Create Cart</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>