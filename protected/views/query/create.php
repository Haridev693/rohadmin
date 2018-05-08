<?php
/* @var $this QueryController */
/* @var $model Query */

$this->breadcrumbs=array(
	'Queries'=>array('admin'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Query', 'url'=>array('index')),
	array('label'=>'Manage Query', 'url'=>array('admin')),
);
?>

<h1>Create Query</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>