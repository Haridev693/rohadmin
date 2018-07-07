<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Order Type'=>array('admin'),
	$model->Name,
);

$this->menu=array(
	//array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Order Type', 'url'=>array('create')),
	array('label'=>'Update Order Type', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Order Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order Type', 'url'=>array('admin')),
);
?>

<h1>View Order Type #<?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
                'Type',
		'Name',
//		'Status',
		//'NumberName',
//		'Name',
        array(
            'header'=>'Status',
            'name'=>'Status',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->Status;
                    if($ha==1)
                    {
                        return 'Active';
                    }
                    else
                    {
                            return 'Deactive';
                    }
                }
        ),
	),
)); ?>
