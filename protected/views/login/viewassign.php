<?php
/* @var $this LoginController */
/* @var $model Login */
$ip=Yii::app()->request->getUserHostAddress();



$this->breadcrumbs=array(
	'Waiters'=>array('admin'),
	$model->Id,
);

$this->menu=array(
	//array('label'=>'List Waiters', 'url'=>array('index')),
	array('label'=>'Assign Table Set', 'url'=>array('assigncreate')),
	//array('label'=>'Update Waiters', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Assign Table Set', 'url'=>'#', 'linkOptions'=>array('submit'=>array('deleteassign','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Assign Table Set', 'url'=>array('adminassign')),
);
?>

<h1>View Login #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
//		'WaiterId',
        array(
            'header'=>'WaiterId',
            'name'=>'WaiterId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->WaiterId;
                    if(strlen($ha)==0)
                    {
                        return '';
                    }
                    else
                    {
                        $match= Login::model()->findbyPk($ha);
                        if(isset($match))
                        {
                            $haId= $match->id;
                            $isname= $match->nameOperator;
                            return $isname;
                        }
                    }
                }
        ),
      array(
            'header'=>'TablesetId',
            'name'=>'TablesetId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->TablesetId;
                    if(strlen($ha)==0)
                    {
                        return '';
                    }
                    else
                    {
                        $match= Tableset::model()->findbyPk($ha);
                        if(isset($match))
                        {
                            $haId= $match->Id;
                            $isname= $match->Name;
                            return $isname;
                        }
                    }
                }
        ),

//		'TablesetId',
	),
)); ?>
