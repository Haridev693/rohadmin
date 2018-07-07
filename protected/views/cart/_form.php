<?php
/* @var $this CartController */
/* @var $model TmpCart */
/* @var $form CActiveForm */

?>
<style type="text/css">
	div.form input[type="checkbox"]{
		min-width: 5px;
	}
	#ProductList .row{
	    background-color: #f9f9f9;
	    padding: 4px;
	    border: 1px solid #aba2a2;
	    min-width:325px;
	    width: 50px;
	    margin: 5px 0px;
	}
	#ProductList .row input[type="checkbox"]{
		float:  left;
	}
	#ProductList .qtywidth{
		float: right;
	}
	#ProductList .rowheader .col-md-1{
		float: left;
		padding-left: 50px;
		font-weight: bold;
	}
	#ProductList .rowheader .floatright{
		float: right;
		right:  0px;
		padding-right: 20px;
	}

	.successSummary p{
		    border: 2px solid #b9d5a1;
		    padding: 10px 0px 10px 10px ;
		    margin: 0 0 10px 0;
		    background: #d6e9c6;
		    font-size: 1.2em;
		    color:#3c763d;
	}
	div.form .row {
    margin: 5px 0;
	}
	.row .col-md-3 {
    float: left;
    margin: 0px 5px;
	}.row .col-md-3:first-child{
		margin:0px;
	}

	input.qtywidth{
		width: 50px !important;
		min-width: 50px !important;
	}

</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php $typedata=array(''=>'Select Type','online'=>'Online','offline'=>'Offline'); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="successSummary">
	</div>

	<div class="row">
		<div class="col-md-3">
		<?php echo $form->error($model,'type',array('class'=>'error_position')); ?>	
		<?php echo $form->labelEx($model,'Select Type'); ?>
		<?php echo $form->dropDownList($model,'type',$typedata,array('onchange'=>'return muFun(this.value)')); ?>
		<?php echo $form->error($model,'type'); ?>
		<div class="errorMessage" id="type_msg"></div>
		</div>

	<div class="col-md-3" id="foodcompany">
		<?php echo $form->labelEx($model,'Food Company'); ?>
		<?php echo $form->dropDownList($model,'FoodcompanyId',CHtml::listData(Foodcompany::model()->findAll(array("condition"=>"status = 1 and type='online'")),'Id','Name'),array('prompt'=>'Select Food Company','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'FoodcompanyId'); ?>
		<div class="errorMessage" id="foodcompany_msg"></div>

	</div>
	<div class="col-md-3" id="salestype">
		<?php echo $form->labelEx($model,'Sales Type'); ?>
		<?php echo $form->dropDownList($model,'waiter',CHtml::listData(Foodcompany::model()->findAll(array("condition"=>"status = 1 and type='offline'")),'Id','Name'),array('prompt'=>'Select Sales Type','style'=>'width:337px')); ?>
		<?php echo $form->error($model,'id'); ?>
		<div class="errorMessage" id="salestype_msg"></div>

	</div>
	<div class="col-md-3" >

		<?php echo $form->labelEx($model,'Select Category'); ?>
		<?php echo $form->dropDownlist($model,'id',CHtml::listData(Category::model()->findAll(),'id','Name'),array('prompt'=>'Select Category','style'=>'width:337px',
			'ajax' => array(
            'type' => 'POST',
	        'url' => CController::createUrl('cart/dynamicProducts'),
            'update' => '#ProductList'),
        )); ?>
		<div class="errorMessage" id="category_msg"></div>
	</div>
	</div>
	<div class="row">
	<div id="productsearch">
	<?php echo $form->labelEx($model,'Search Product'); ?>
	<?php	echo CHtml::textField('Cart[productsearch]','',['class' => 'form-control','onkeyup'=>'searchproduct();']); ?>
	</div>
	<div class="clearfix"></div>
		<div id="ProductList">
		</div>
		<div class="errorMessage" id="product_msg"></div>
	</div>
	<div class="row buttons">
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	    <?php echo CHtml::Button('Add',array('onclick'=>'AddToCart();')); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$("#foodcompany").hide();
$("#salestype").hide();
function muFun(obj){
if(obj=="online"){
$("#foodcompany").show();
$("#salestype").hide();
$("#Cart_waiter").val('');
return false;
}else{
$("#foodcompany").hide();
$("#salestype").show();
$("#Cart_FoodcompanyId").val('');
return false;
}
}
function checknum(value){
	console.log(value);
	return 1;
//    return value = value.replace(/[^0-9\.]/g,'');

}
$("#Cart_id").change(function(){
	$("#Cart_productsearch").val('');
});
// 
function AddToCart(){
	$("#type_msg").html("");
	$("#foodcompany_msg").html("");
	$("#category_msg").html("");
	$("#product_msg").html("");
	$("#salestype_msg").html("");
	 var data=$("#cart-form").serialize();
	 console.log(data);

	 var type=$("#Cart_type"),
	 	 food=$("#Cart_FoodcompanyId"),
	 	 salestype=$("#Cart_waiter"),
	 	 category=$("#Cart_id"),
	 	 pchecked=false,
	 	 product = $("input[name='Cart[productId][]']");

	for(var i=0; i < product.length; i++){
		if(product[i].checked) {
			pchecked = true;
		}
	}
	console.log(food.val());
	if(type.val()==""){
		$("#type_msg").html("Please Select Type");
		type.focus();
		return false;
	}
	if(food.val()=="" && $('#foodcompany').is(":visible")==true){
		$("#foodcompany_msg").html("Please Select Food Company");
		food.focus();
		return false;
	}
	if(salestype.val()=="" && $('#salestype').is(":visible")==true){
		$("#salestype_msg").html("Please Select Sales Type");
		food.focus();
		return false;
	}
	if(category.val()==""){
		$("#category_msg").html("Please Select Category");
		category.focus();
		return false;
	}
	if (!pchecked) {
		$("#product_msg").html("Please Select Product");
		return false;
	}

//	 return false;

	$.ajax({
   	type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cart/addToCartAjax"); ?>',
   	data:data,
	success:function(data){
                //alert(data); 
               $(".successSummary").html("<p><strong>Success!</strong> Product added in cart:</p>");
               setTimeout(function(){ $(".successSummary").fadeOut(1500); }, 1000);
               searchproduct();
//               document.getElementById("cart-form").reset();
//               $("#foodcompany").hide();
  //             $("#ProductList").html('');
	},
   	error: function(data) { // if error occured
         alert("Error occured.please try again");
    },

  dataType:'html'
  });
}
function searchproduct(){
var	 	 category=$("#Cart_id");

	$.ajax({
   	type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cart/dynamicProductSearch"); ?>',
   	data:{'id':category.val(),'q':$("#Cart_productsearch").val()},
	success:function(data){
		$("#ProductList").html(data);
	},
   	error: function(data) { // if error occured
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>