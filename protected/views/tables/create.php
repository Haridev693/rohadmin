<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
	'Tables'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Manage Tables', 'url'=>array('admin')),
);
?>

<h1>Create Tables</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>