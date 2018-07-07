<?php
/* @var $this TablesetController */
/* @var $model Tableset */

$this->breadcrumbs=array(
    'Tables Set'=>array('admin'),
    'Manage',
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),

    array('label'=>'Manage Tables', 'url'=>array('admin')),
//    array('label'=>'Create Tables', 'url'=>array('create')),
    array('label'=>'Create Tables Set', 'url'=>array('createset')),
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

<h1>Manage Tables Set</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_searchset',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'tables-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'Id',
        'Name',
        array(
            'header'=>'Table Number',
            'name'=>'TableId',
            'type'=>'raw',
            'value'=>function ($data)
                {
                   return $data->TableId;
                }
        ),
        array(
            'class'=>'CButtonColumn',
            'template' => '{view}  {delete}',
            'buttons'=>array(
        'view' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("tables/viewset", array("id"=>$data->Id))',
         ),

        'delete' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("tables/deleteset", array("id"=>$data->Id))',
         ),
        ),
        ),
    ),
)); ?>
