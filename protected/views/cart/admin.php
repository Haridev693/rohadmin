<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Carts'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Bills', 'url'=>array('index')),
	//array('label'=>'Create Cart', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cart-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bills</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));  ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cart-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'header'=>'Waiter',
            'name'=>'waiter',
            'type'=>'raw',
            'value'=>function($data)
            {
                return $data->waiter;
            },
            'filter' => CHtml::listData(Login::model()->findAll(),'nameOperator','nameOperator')
        ),
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
		//'waiter',
		//'tableId',
		'cartId',
		//'status',
        array(
            'header'=>'Grand Total',
            'type'=>'raw',
            'value'=>function($data)
                {
                    $ha=$data->cartId;

                    if($data->status==1)
                        $books = Booking::model()->findAll('cartId = '.$ha);
                    if($data->status==0)
                        $books = History::model()->findAll('cartId = '.$ha);


                    $totalGrand = 0;
                    foreach ($books as $book)
                    {
                        $totalGrand = $totalGrand + $book->price*$book->number;

                    }
                    return $totalGrand;
                }
        ),
        'time',
        array(
            'header'=>'Status',
            'name'=>'status',
            'type'=>'raw',
            'value'=>function($data)
            {
                $ha=$data->status;
                if($ha == 0)
                    return 'Finished';
                else
                    return 'Ordering';
            },
            'filter' => array(0=>'Finished',1=>'Ordering')
        ),
       /* array(
        'header'=>'Time',
       // 'name'=>'time',
        'type'=>'raw',
        'value'=>function($data)
            {
                $ha=$data->cartId;

                        return date('Y-m-d H:i:s',$ha);
            }
    ),*/
		array(
			'class'=>'CButtonColumn',
            'template' => '{view} {delete}'
		),
          
	),
)); ?>
