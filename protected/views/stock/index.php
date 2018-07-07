<?php
/* @var $this TablesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tables',
);

$this->menu=array(
	array('label'=>'Create Tables', 'url'=>array('create')),
	array('label'=>'Manage Tables', 'url'=>array('admin')),
);
?>

<h1>Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
