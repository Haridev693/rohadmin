<?php
/* @var $this LoginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logins',
);

$this->menu=array(
	array('label'=>'Create Waiter', 'url'=>array('create')),
	array('label'=>'Manage Waiter', 'url'=>array('admin')),
);
?>

<h1>Waiter</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
