<?php
/* @var $this BookingController */
/* @var $model Booking */

$this->breadcrumbs=array(
	'Bookings'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Orderings', 'url'=>array('index')),
	//array('label'=>'Create Booking', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#booking-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Orderings</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'booking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'productId',
		//'tableId',
		//'img',
		//'productName',
		array(
			'header'=>'Table',
			'name'=>'tableId',
			'type'=>'raw',
			'value'=>function($data)
			{
				return $data->tableId;
			},
			'filter' => CHtml::listData(Tables::model()->findAll(),'Id','Id')
		),
		array(
			'header'=>'Product',
			'name'=>'productName',
			'type'=>'raw',
			'value'=>function($data)
			{
				return $data->productName;
			},
			'filter' => CHtml::listData(Product::model()->findAll(),'Name','Name')
		),
		'price',
		'number',
		'note',
		'cartId',
        array(
            'header'=>'Time',
            // 'name'=>'time',
            'type'=>'raw',
            'value'=>function($data)
                {
                    $ha=$data->dateCreated;
                    return date('Y-m-d H:i:s',$ha);
                }
        ),

		array(
			'class'=>'CButtonColumn',
			'template' => '{view}{delete}'
		),
	),
)); ?>
