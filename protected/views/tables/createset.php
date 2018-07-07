<?php
/* @var $this TablesetController */
/* @var $model Tableset */

$this->breadcrumbs=array(
	'Tables Set'=>array('tableset'),
	'Create Tables Set',
);

$this->menu=array(
	//array('label'=>'List Tables', 'url'=>array('index')),
	array('label'=>'Manage Tables Set', 'url'=>array('tableset')),
);
?>

<h1>Create Tables Set</h1>

<?php $this->renderPartial('_formset', array('model'=>$model)); ?>