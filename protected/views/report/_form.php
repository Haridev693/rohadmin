<?php
/* @var $this ReportController */
/* @var $model Cart */
/* @var $form CActiveForm */
/* @var $cat ReportController */
?>
<style type="text/css">
	.row .col-md-4{
		float: left;
		margin:0px 10px;

	}
	.row .col-md-4.mtop2{
		margin-top: 2px;
	}
</style>
<div class="form">

<?php

 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'method' => 'get',
	'action' => $this->createUrl('report/create') //,'/report/create']),
));
$typedata=array(''=>'Select Type','day'=>'Day','week'=>'Week','month'=>'Month','year'=>'Year');
$typemonth=array();
$typemonth['']='Select Type';
for($i=0;$i<count($getallmonth);$i++){
$typemonth[$getallmonth[$i]['date']]=$getallmonth[$i]['date'];
}
$typeyear=array();
$typeyear['']='Select Type';
for($i=0;$i<count($getallyear);$i++){
$typeyear[$getallyear[$i]['date']]=$getallyear[$i]['date'];
}

 ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-4">
		<?php echo $form->error($model,'time',array('class'=>'error_position')); ?>	
		<?php echo $form->labelEx($model,'Select Type'); ?>
		<?php echo $form->dropDownList($model,'time',$typedata,array('onchange'=>'return muFun(this.value)')); ?>
		<?php echo $form->error($model,'time'); ?>

		<?php echo $form->error($model,'status',array('class'=>'error_position')); ?>		
		</div>
		<div class="col-md-4 mtop2">
		<div id="dateid">
        <?php echo $form->labelEx($model,'Date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model' => $model,
		'attribute' => 'status',
		'options' => array(
		'dateFormat' => 'yy-mm-dd',
//		'startView'=>'year',
		// 'showButtonPanel'=>true,
		// 'changeMonth'=>true,
  //       'changeYear'=>true, // format of "2012-12-25"
		),

		));

		?>
		</div>
		<div id="month">
		<?php echo $form->labelEx($model,'Month'); ?>
		<?php echo $form->dropDownList($model,'month',$typemonth); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
		<div id="year">
		<?php echo $form->labelEx($model,'Year'); ?>
		<?php echo $form->dropDownList($model,'year',$typeyear); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>

<!--         <?php echo $form->labelEx($model,'Date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model' => $model,
		'attribute' => 'status',
		'options' => array(
		'dateFormat' => 'yy-mm-dd',
		'startView'=>'year',
		// 'showButtonPanel'=>true,
		// 'changeMonth'=>true,
  //       'changeYear'=>true, // format of "2012-12-25"
		),

		));

		?>
 -->		 <?php echo $form->error($model,'status'); ?>
		</div>
		<div class="col-md-4 buttons mtop2">
		<?php echo $form->labelEx($model,'&nbsp;'); ?>
		<?php echo CHtml::submitButton('Find'); ?>
		</div>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php
//print_r($model);
// $abc=[
//    'options'=>'{
//       "title": { "text": "Fruit Consumption" },
//       "xAxis": {
//          "categories": ['.rtrim($cat,",").']
//       },
//       "yAxis": {
//          "title": { "text": "Fruit eaten" }
//       },
//       "series": [
//          { "name": "Jane", "data": ['.rtrim($chartdata,",").'] }
//       ]
//    }'
// ];
// print_r($abc);
// $this->Widget('ext.highcharts.HighchartsWidget', [
//    'options'=>'{
//       "title": { "text": "Daily Chart" },
//       "xAxis": {
//          "categories": ['.rtrim($cat,",").']
//       },
//       "yAxis": {
//          "title": { "text": "Number" }
//       },
//       "series": [
//          { "name": "'.$_GET['Cart']['status'].'", "data": ['.rtrim($chartdata,",").'] }
//       ]
//    }'
// ]); 
// print_r($chartdata);

?>
<script type="text/javascript">
$(document).ready(function(){
		$("#month").hide();
		$("#year").hide();
        
		function muFun(obj){
        if(obj=="month"){
        $("#dateid").hide();
		$("#year").hide();
		$("#month").show();
        // document.getElementById('TLID_DIV').style.display="block"; 
        return false;
        }else if(obj=="year"){
        $("#dateid").hide();
		$("#month").hide();
		$("#year").show();

        }else{
		$("#dateid").show();
		$("#month").hide();
		$("#year").hide();
//        document.getElementById('TLID_DIV').style.display="none"; 
        return false;
        }
        }
});
</script>