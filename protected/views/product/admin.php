<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
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

<h1>Manage Products</h1>

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
		//'Id',
        'Name',
		'Code',
		'Price',
		//'NumberName',

		//'CategoryName',
        array(
            'header'=>'Category ',
            'name'=>'CategoryId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->CategoryId;
                    if(strlen($ha)==0)
                    {
                        return '';
                    }
                    else
                    {
                        $match= Category::model()->findbyPk($ha);
                        if(isset($match))
                        {
                            $isname= $match->Name;
                            return $isname;
                        }
                    }
                },
            'filter' => CHtml::listData(Category::model()->findAll(),'id','Name')
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
