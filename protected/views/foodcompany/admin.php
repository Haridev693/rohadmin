<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Order Type'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Order Type', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Order Type</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'Id',
        'Type',
        'Name',
        array(
            'header'=>'Status',
            'name'=>'Status',
            'type'=>'raw',
            'value'=>function($data)
            {
                $ha=$data->Status;
                if($ha == 0)
                    return 'Deactive';
                else
                    return 'Active';
            },
            'filter' => array(0=>'Deactive',1=>'Active')
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
