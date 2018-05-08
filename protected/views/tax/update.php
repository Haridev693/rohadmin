<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Tax'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Cart', 'url'=>array('index')),
	// array('label'=>'Create Cart', 'url'=>array('create')),
	// array('label'=>'View Cart', 'url'=>array('view', 'id'=>$model->id)),
	// array('label'=>'Manage Cart', 'url'=>array('admin')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#cart-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Tax Setting</h1>
<!--<h1>Update Tax Settings <!--?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>