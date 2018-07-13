
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/26038c43/detailview/styles.css" />
<?php
/* @var $this CartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carts',
	'Order Cart',
	'Checkout',
);

$this->menu=array(
	array('label'=>'Add Product', 'url'=>array('create')),
	array('label'=>'Cart', 'url'=>array('cart')),
//	array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>
<style type="text/css">
	input.qtywidth{
		width: 50px !important;
		min-width: 50px !important;
	}
</style>

<h1>Checkout</h1>

<div class="form">
<table class="detail-view">
	<tr class="even">
	<th colspan="3" style="text-align: left">Order Type</th>
	<th colspan="3" style="text-align: left"><?php echo $model[0]['type']; ?></th>
	</tr>
	<?php if($model[0]['FoodcompanyId']!=""){ ?>

	<tr class="odd">
	<th colspan="3" style="text-align: left">Food Company</th>
	<th colspan="3" style="text-align: left"><?php  $foodcompany = Foodcompany::model()->find('Id = '.$model[0]['FoodcompanyId']); echo $foodcompany['Name']; ?></th>
	</tr>
		<?php } ?>
	<tr>
		<th style="text-align: left">SrNo</th>
		<th style="text-align: left">Product Name</th>
		<th >Price</th>
		<th>Qty</th>
		<th>Total</th>
	</tr>

<?php 
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 


$srno=1;
$subtotal=0;

$disablebtn=false;
foreach($model as $cart){

 	if($srno % 2 == 0){ $class='event'; }else{ $class="odd"; } 
?>
	<tr class="<?php echo $class; ?>">
		<td class="text-left"><?php echo $srno++;?></td>
		<td><?php echo $cart['productName']; ?></td>
		<td class="text-right"><?php echo $cart['price']; ?></td>
		<td class="text-right"> 
		<?php echo $cart['number'];
			// check qty 
			$product=Product::model()->find(array("condition"=>"Id =".$cart['productId']));
			$maxval=$product->Totalqty;
			if($maxval==-1){
				$maxval='';
			}
			$textboxdiable=true;
			$textboxalert='<div class="txt-qtyalert"><b> Quantity Not Avaible<b></div>';
			if($maxval >= $cart['number'] || $maxval==''){
				$textboxalert="";
				$textboxdiable=false;
			}
			// disable text box;
			if($textboxalert!='' && $disablebtn==false){
		
				$disablebtn=true;
			}
			echo $textboxalert; 
		?></td>
		<td class="text-right"><?php echo $totalprice=$cart['price']* $cart['number']; ?></td>
	</tr>
<?php
$subtotal=$subtotal+$totalprice;

}
?>

	<tr>
		<th colspan="3"></th>
		<th>Sub Total</th>
		<th><?php echo $subtotal; ?> </th>
	</tr>
<?php
$stotalTax=0;
$taxs = Tax::model()->findByPk('1');
$totaltax=round($taxs['tax']/2,2);
$finaltotal=$subtotal;
if($taxs['status']==1){
$stotalTax=($subtotal*$totaltax)/100;

?>
	<tr>
		<th colspan="3"></th>
		<th>Tax</th>
		<td><table>
			<tr>
				<th>IGST (<?php echo $totaltax; ?>)</th>
				<th class="text-right"><?php echo $stotalTax; ?></th>
			</tr>
			<tr>
				<th>CGST (<?php echo $totaltax; ?>)</th>
				<th><?php echo $stotalTax; ?></th>
			</tr>
			</table>
			

		</td>
	</tr>
<?php $finaltotal=$subtotal + round((($subtotal*$taxs['tax'])/100),2); } ?>
	<tr>
		<th colspan="3"></th>
		<th>Grand Total</th>
		<th><?php
			 echo $finaltotal; ?></th>
		<?php echo CHtml::hiddenField('finaltotal' , $finaltotal, array('id' => 'finaltotal')); ?>
	</tr>
	<tr>
		<th colspan="4"></th>
		<th colspan="1">	
			<div class="row buttons">
			<?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		    <?php echo CHtml::Button('Place Order',array('onclick'=>"window.location.href = '" . Yii::app()->createAbsoluteUrl("cart/placeorder"). "';","disabled"=>$disablebtn)); ?></div>
		</th>

	</tr>
</table>

<?php $this->endWidget(); ?>
</div>