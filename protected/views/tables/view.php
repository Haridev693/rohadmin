<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
    'Tables'=>array('admin'),
    $model->Id,
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Create Tables', 'url'=>array('create')),
    array('label'=>'Update Tables', 'url'=>array('update', 'id'=>$model->Id)),
    array('label'=>'Delete Tables', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Tables', 'url'=>array('admin')),
);
?>

<h1>View Tables #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'Id',
        //'OperatorId',
        // 'status',
        array(
            'header'=>'OperatorId',
            'name'=>'operatorId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->operatorId;
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
            'header'=>'Status',
            'name'=>'status',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->status;
                    if(($ha)==2)
                    {
                        return 'No Active';
                    }
                    elseif($ha==1)
                    {
                        return 'Active';
                    }
                 
                }
        ),
    ),
)); ?>
