<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
    'Tables'=>array('admin'),
    $model->Id,
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Add Stock', 'url'=>array('create')),
    array('label'=>'Delete Stock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Stock History', 'url'=>array('admin')),
);
?>

<h1>View Tables #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'Id',
        array(
            'header'=>'Product Name',
            'name'=>'ProductId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->ProductId;
                    if(strlen($ha)==0)
                    {
                        return '';
                    }
                    else
                    {
                        $match= Product::model()->findbyPk($ha);
                        if(isset($match))
                        {
                            $haId= $match->Id;
                            $isname= $match->Name;
                            return $isname;
                        }
                    }
                }
        ),
        'Qty',
        'Time',
        
    ),
)); ?>
