<?php
/* @var $this CartController */
/* @var $model Cart */
$this->breadcrumbs=array(
	'Rating'=>array('admin'),
	$model[0]->customerId,
);

$this->menu=array(
	//array('label'=>'List Bills', 'url'=>array('index')),
	//array('label'=>'Create Cart', 'url'=>array('create')),
	//array('label'=>'Update Cart', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Cart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rating', 'url'=>array('admin')),
);
?>

<h1>View Rating #<?php echo $model[0]->Id; ?></h1>

<table class="table table-bordered table-responsive">

<tr><th style="text-align: center;">Question</th><th style="text-align: center;">Rating</th></tr>
<?php
                    foreach ($model as $rating)
                    {
                    ?><tr><?php
                     $Question = Query::model()->findAll('Id = '.$rating->questionId);
                     echo '<td style = "text-align: center;">'.$Question[0]['Question'].'</td>';
                     echo '<td style = "text-align: center;">'.$rating->rating.'</td>';
                    ?></tr><?php
                    }
                    ?>
</table>
