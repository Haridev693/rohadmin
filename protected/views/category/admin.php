<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Categories</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'ImageUrl',
        array(
            'header'=>'Image',
            'name'=>'ImageUrl',
            'type'=>'raw',
            'value'=>function($data)
                {
                    if(strlen($data->ImageUrl)>0)
                    {
                        return "<img width='100' src='".Yii::app()->request->baseUrl.'/images/category/'.$data->ImageUrl."'>";
                    }
                    else
                        return 'No Image';
                }
        ),
		'Name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
