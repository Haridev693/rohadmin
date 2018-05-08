<?php
/* @var $this QueryController */
/* @var $model Query */

$this->breadcrumbs=array(
	'Queries'=>array('index'),
	$model->Question=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Query', 'url'=>array('index')),
	array('label'=>'Create Query', 'url'=>array('create')),
	array('label'=>'View Query', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Query', 'url'=>array('admin')),
);
?>

<h1>Update Query <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>