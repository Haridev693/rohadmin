<?php
/* @var $this TablesController */
/* @var $model Tables */

$this->breadcrumbs=array(
    'Stock'=>array('admin'),
    'Manage',
);

$this->menu=array(
    //array('label'=>'List Tables', 'url'=>array('index')),
    array('label'=>'Add Stock', 'url'=>array('create')),
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

<h1>Manage Stock History</h1>

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
                },
                'filter' => CHtml::listData(Product::model()->findAll(),'Id','Name')

        ),
        'Qty',
        'Time',
        array(
            'class'=>'CButtonColumn',
            'template' => '{view} {delete}',
            'buttons'=>array(
            'delete' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("stock/delete", array("id"=>$data->Id,"productId"=>$data->ProductId,"qty"=>$data->Qty))',
         ),


            // 'class'=>'CButtonColumn',
            // 'template' => '{view} {delete}'
        ),
            ),
    ),
)); ?>
