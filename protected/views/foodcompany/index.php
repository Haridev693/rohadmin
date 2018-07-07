<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Type',
);

$this->menu=array(
	array('label'=>'Order Type', 'url'=>array('create')),
	array('label'=>'Order Type', 'url'=>array('admin')),
);
?>

<h1>Food Company</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
