<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Carts'=>array('admin'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Bills', 'url'=>array('index')),
	//array('label'=>'Create Cart', 'url'=>array('create')),
	//array('label'=>'Update Cart', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Cart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cart', 'url'=>array('admin')),
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

<h1>View Bills #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		// 'waiter',
		// 'tableId',
//		'cartId',
        array(
            'header'=>'Status',
            'name'=>'status',
            'type'=>'raw',
            'value'=>function($data)
                {
                    $ha=$data->status;
                    if($ha == 0)
                        return 'Finished';
                    else
                        return 'Ordering';
                }
        ),
        array(
            'label'=>'Booking',
            'type'=>'raw',
            'value'=>function($data)
                {
//                    $ha=$data->cartId;
                    // if($data->status==1)
                    //     $books = Booking::model()->findAll('cartId = '.$ha);
                    // if($data->status==0)
                    //     $books = History::model()->findAll('cartId = '.$ha);

                    $booking = '<table><tr><th style="text-align: center;">Name</th><th style="text-align: center;">Price</th><th style="text-align: center;">Number</th><th style="text-align: center;">Total</th>';
                    // foreach ($books as $book)
                    // {
                    //     $booking = $booking.'<tr>';
                    //     $booking = $booking.'<td style = "text-align: center;">'.$book->productName.'</td>';
                    //     $booking = $booking.'<td style = "text-align: center;">'.$book->price.'</td>';
                    //     $booking = $booking.'<td style = "text-align: center;">'.$book->number.'</td>';
                    //     $booking = $booking.'<td style = "text-align: center;">'.$book->price*$book->number.'</td>';
                    //     $booking = $booking.'</tr>';
                    // }
                    $booking = $booking .'</table>';
                    return $booking;
                }
        ),
        array(
            'label'=>'Grand Total',
            'type'=>'raw',
            'value'=>function($data)
                {
                    $ha=$data->cartId;
                    if($data->status==1)
                        $books = Booking::model()->findAll('cartId = '.$ha);
                    if($data->status==0)
                        $books = History::model()->findAll('cartId = '.$ha);

                    $totalGrand = 0;
                    foreach ($books as $book)
                    {
                        $totalGrand = $totalGrand + $book->price*$book->number;

                    }
                    return $totalGrand;
                }
        ),
        'time',
	),
));

?>
