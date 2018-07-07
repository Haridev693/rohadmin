<?php
/* @var $this TablesetController */
/* @var $model Tableset */

$this->breadcrumbs=array(
    'Tables Set'=>array('admin'),
    $model->Id,
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Create Tables Set', 'url'=>array('createset')),
    array('label'=>'Delete Tables Set', 'url'=>'#', 'linkOptions'=>array('submit'=>array('deleteset','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Tables Set', 'url'=>array('tables/tableset')),
);
?>

<h1>View Tables Set #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'Id',
        'Name',
        'TableId',
        
    ),
)); ?>
