<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
    'Tables'=>array('admin'),
    'Manage',
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Create Tables', 'url'=>array('create')),
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

<h1>Manage Tables</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
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
            'header'=>'Waiter',
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
        //'status',
        array(
            'header'=>'Status',
            'name'=>'status',
            'type'=>'raw',
            'value'=>function ($data)
                {
                    $ha=$data->status;
                    if(($ha)==2)
                    {
                        return 'InActive';
                    }
                    elseif($ha==1)
                    {
                        return 'Active';
                    }
                },
            'filter' => array(1=>'Active',2 => 'Inactive')
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
