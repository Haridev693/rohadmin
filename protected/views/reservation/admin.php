<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
    'Reservation'=>array('admin'),
    'Manage',
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Create Reservation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tables-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reservation</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php  $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'tables-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'Id',
        //	'operatorId',
        array(
            'header'=>'Table Number',
            'name'=>'TableId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->TableId;
                    if(strlen($ha)==0)
                    {
                        return '';
                    }
                    else
                    {
                        $match= Tables::model()->findbyPk($ha);
                        if(isset($match))
                        {
                            $haId= $match->Id;
                            //$isname= $match->nameOperator;
                            return $haId;
                        }
                    }
                }
        ),
        'Name',
        'Number',
        'Person',
        'Date',
        'Time',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
