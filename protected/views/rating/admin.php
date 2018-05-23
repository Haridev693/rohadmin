<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Rating'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Bills', 'url'=>array('index')),
	//array('label'=>'Create Cart', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cart-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>	

<h1>Manage Rating</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 
?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cart-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'header'=>'Customer Name',
            'name'=>'customerId',
            'type'=>'raw',
            'value'=>function($data)
            {
                   $log = Customer::model()->findAll(array(
		                'condition'=>'id= :id',
		                'params'=>array(
		                    ':id'=>$data->customerId
		                )
		            ));
                return $log[0]['name'];

            },
            

//            'filter' => CHtml::listData(Login::model()->findAll(),'nameOperator','nameOperator')
        ),
         array(
            'header'=>'Customer Email Id',
            'name'=>'customerId',
            'type'=>'raw',
            'value'=>function($data)
            {
                   $log = Customer::model()->findAll(array(
		                'condition'=>'id= :id',
		                'params'=>array(
		                    ':id'=>$data->customerId
		                )
		            ));
                return $log[0]['emailID'];

            },
            
        ),
         array(
            'header'=>'Date Of Birth',
            'name'=>'customerId',
            'type'=>'raw',
            'value'=>function($data)
            {
                   $log = Customer::model()->findAll(array(
		                'condition'=>'id= :id',
		                'params'=>array(
		                    ':id'=>$data->customerId
		                )
		            ));
                return $log[0]['dob'];

            },
            
        ),
         array(
            'header'=>'Phone Number',
            'name'=>'customerId',
            'type'=>'raw',
            'value'=>function($data)
            {
                   $log = Customer::model()->findAll(array(
		                'condition'=>'id= :id',
		                'params'=>array(
		                    ':id'=>$data->customerId
		                )
		            ));
                return $log[0]['phone'];

            },
            
        ),

		//'waiter',
		//'tableId',
//        'rating',
        'suggestion',
		//'status',
        'date',
		array(
			'class'=>'CButtonColumn',
            'template' => '{view} {delete}',
            'buttons'=>array(
        'view' => array(
//            'label'=>'Send an e-mail to this user',
//            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("rating/view", array("id"=>$data->customerId,"date"=>$data->date))',
         ),
        //array(
//         'view' => array(
// //            'label'=>'Send an e-mail to this user',
// //            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
//             'url'=>'Yii::app()->createUrl("rating/delete", array("id"=>$data->customerId))',
//         ),),
		),
		),
          
	),
)); ?>
