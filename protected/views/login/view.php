<?php
/* @var $this LoginController */
/* @var $model Login */
$ip=Yii::app()->request->getUserHostAddress();



$this->breadcrumbs=array(
	'Waiters'=>array('admin'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Waiters', 'url'=>array('index')),
	array('label'=>'Create Waiters', 'url'=>array('create')),
	array('label'=>'Update Waiters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Waiters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Waiters', 'url'=>array('admin')),
);
?>

<h2> IP ADDRESS #<?php echo $ip;?></h2>
<h1>View Login #<?php echo $model->nameOperator; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nameOperator',
		'passOperator',
	),
)); ?>
