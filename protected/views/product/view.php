<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	$model->Name,
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Code',
		'Price',
		//'NumberName',
		'Name',
        array(
            'header'=>'Category',
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
                }
        ),
	),
)); ?>
