<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	$model->Name,
);

$this->menu=array(
	//array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
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
	),
)); ?>
