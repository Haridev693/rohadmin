<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
    'Reservation'=>array('admin'),
    $model->Id,
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Create Reservation', 'url'=>array('create')),
    array('label'=>'Update Reservation', 'url'=>array('update', 'id'=>$model->Id)),
    array('label'=>'Delete Reservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>View Reservation #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'Id',
        'TableId',
        'Name',
        'Number',
        'Person',
        'Date',
        'Time',
        
    ),
)); ?>
