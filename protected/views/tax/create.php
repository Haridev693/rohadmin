<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Tax'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Cart', 'url'=>array('index')),
	//array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Create Tax</h1>

<?php   $this->renderPartial('_form', array('model'=>$model)); ?>