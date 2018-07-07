<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Logins'=>array('index'),
	'Manage Assign Table Set',
);

$this->menu=array(
	//array('label'=>'List Waiter', 'url'=>array('index')),
	array('label'=>'Create Waiter', 'url'=>array('create')),
	array('label'=>'Assign Table Set', 'url'=>array('assigncreate')),
	array('label'=>'Manage Waiter', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#login-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Assign Table Set</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchassign',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'login-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
        array(
            'header'=>'Waiter',
            'name'=>'WaiterId',
            'type'=>'raw',
            'value'=>function($data)
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
                
            },
            'filter' => CHtml::listData(Login::model()->findAll(),'id','nameOperator')
        ),
      array(
            'header'=>'Table Set Name',
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
                },
            'filter' => CHtml::listData(Tableset::model()->findAll(),'Id','Name')
        ),
		//'passOperator',
        array(
            'class'=>'CButtonColumn',
            'template' => '{view}  {delete}',
            'buttons'=>array(
        'view' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("login/viewassign", array("id"=>$data->Id))',
         ),

        'delete' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("login/deleteassign", array("id"=>$data->Id))',
         ),
        ),
        ),
	),
)); ?>
