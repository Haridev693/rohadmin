<?php
/* @var $this CartController */
/* @var $model Cart */
$this->breadcrumbs=array(
	'Carts'=>array('admin'),
	'Order Cart',
	'Checkout',
	'Success Order',
	
);

$this->menu=array(
	
	array('label'=>'Create Order', 'url'=>array('create')),
//	array('label'=>' Cart', 'url'=>array('admin')),
);
?>

<h1>Success Order #<?php echo $model->id; ?></h1>

<?php
$taxs = Tax::model()->findByPk('1');
if($taxs['status']==1){ $visibletax=true;}else{$visibletax=false;}

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'waiter',
		'tableId',
		'cartId',
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
                    $ha=$data->cartId;
                    if($data->status==1)
                        $books = Booking::model()->findAll('cartId = '.$ha);
                    if($data->status==0)
                        $books = History::model()->findAll('cartId = '.$ha);

                    $booking = '<table><tr><th style="text-align: center;">Name</th><th style="text-align: center;">Price</th><th style="text-align: center;">Number</th><th style="text-align: center;">Total</th>';
                    foreach ($books as $book)
                    {
                        $booking = $booking.'<tr>';
                        $booking = $booking.'<td style = "text-align: center;">'.$book->productName.'</td>';
                        $booking = $booking.'<td style = "text-align: center;">'.$book->price.'</td>';
                        $booking = $booking.'<td style = "text-align: center;">'.$book->number.'</td>';
                        $booking = $booking.'<td style = "text-align: center;">'.$book->price*$book->number.'</td>';
                        $booking = $booking.'</tr>';
                    }
                    $booking = $booking .'</table>';
                    return $booking;
                }
        ),
        array(
            'label'=>'Tax',
            'type'=>'raw',
            'value'=>function($data)
                {
                    $ha=$data->cartId;
                    if($data->status==1)
                        $books = Booking::model()->findAll('cartId = '.$ha);
                    if($data->status==0)
                        $books = History::model()->findAll('cartId = '.$ha);

                    $totalGrand = 0;
                    $stotalTax=0;
                    foreach ($books as $book)
                    {
                        $totalGrand = $totalGrand + $book->price*$book->number;

                    }
                    $taxs = Tax::model()->findByPk('1');
                    $totaltax=round($taxs['tax']/2,2);

                    if($taxs['status']==1)
                     $stotalTax=($totalGrand*$totaltax)/100;

                  $taxrow='<table><tr><th style="text-align: center;">IGST ('.$totaltax.'%)</th>
                    <td>'.$stotalTax.'</td></tr>';
                  $taxrow.='<tr><th style="text-align: center;">CGST ('.$totaltax.'%)</th>
                        <td >'.$stotalTax.'</td></tr>';
                  $taxrow.='</table>';

                    return $taxrow;
                },
            'visible'=>$visibletax,
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
                    $stotalGrand=0;
                    foreach ($books as $book)
                    {
                        $totalGrand = $totalGrand + $book->price*$book->number;

                    }
                    $taxs = Tax::model()->findByPk('1');
                    if($taxs['status']==1)
                     $stotalGrand=$totalGrand + round((($totalGrand*$taxs['tax'])/100),2);

                    if($taxs['status']==0)
                     $stotalGrand=$totalGrand;

                    return $stotalGrand;
                }
        ),
        'time',
	),
));
  

$ha=$model->cartId;

$books = History::model()->findAll('cartId = '.$ha);

$taxs = Tax::model()->findByPk('1');
if($taxs['status']==1){ $visibletax=true;}else{$visibletax=false;}
$stotalTax=0;
$totalGrand=0;
$printbill = Bill::model()->findAll('id = 1');
?>

<div>
 <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><head><style>@media print { @page { margin: 0 auto; /* imprtant to logo margin */ sheet-size: 350px 85mm; /* imprtant to set paper size */ }html,body{margin:0;padding:0}#printContainer {width:350px;margin: auto;text-align: justify;}table{font-size: 28px;}.address{font-size:28px;}.salesinvoice{font-size:38px;}#logo{font-size:38px;}.underline{text-decoration: underline;}.text-center{text-align: center;}}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
<div id="divToPrint"  style="display:none ;">
<h1 id="logo" class="text-center underline" style="margin-bottom: 0px;"><?php echo $printbill[0]['rest_name']; ?></h1>
<h4  class="text-center address" style="margin: 0px;"><?php echo $printbill[0]['address_1']; ?></h4>
<h4  class="text-center address" style="margin-top:0px;"><?php echo $printbill[0]['address_2']; ?></h4>

<div id='printContainer'>
<h4  class="text-left address" style="margin: auto;">Waiter  Name: <?php echo $model->waiter; ?></h4>
<h4  class="text-left address" style="margin: auto;">Time : <?php echo date('d-m-Y h:s:i',strtotime($model->time)); ?></h4>
<h5  class="text-center salesinvoice" style="margin-bottom: 0px;"><?php echo $printbill[0]['sales_invoice']; ?></h5>
    <table width="100%"  >
        <tr>
        <td colspan="3">        <br/></td>
        </tr>
        <tr>
            <th align="left" class="underline">NAME</th>
            <th align="center" class="underline">QTY</th>
            <th  align="right"  class="underline">PRICE</th>
        </tr>
    <?php
       foreach ($books as $book)
        {
    ?>
        <tr>
            <td align="left"><?php echo $book->productName; ?></td>
            <td align="center"><?php echo $book->number; ?></td>
            <td align="right"><?php echo $book->price*$book->number; ?></td>
        </tr>
    <?php 
        $totalGrand = $totalGrand + $book->price*$book->number;

        }
        $totaltax=round($taxs['tax']/2,2);

        if($taxs['status']==1)
         $stotalTax=($totalGrand*$totaltax)/100;

    ?>
        <tr> <td colspan="3"><br/></td> </tr>
        <tr>
            <td colspan="2">Sub Total</td>
            <td align="right"><?php echo $Grandtotal=$totalGrand; ?></td>
        </tr>
       <?php if($taxs['status']==1){
        $Grandtotal=round($totalGrand+($stotalTax*2),2);
        ?> 
        <tr> <td colspan="3"><br/></td> </tr>
        <tr>
            <td colspan="2">Tax <br/> IGST (<?php echo $totaltax; ?>%)</td>
            <td align="right"><?php echo $stotalTax; ?></td>
        </tr>
        <tr>
            <td colspan="2"> CGST (<?php echo $totaltax; ?>%)</td>
            <td align="right"><?php echo $stotalTax; ?></td>
        </tr>
<?php } ?>
        <tr> <td colspan="3"><br/></td> </tr>
        <tr>
            <td colspan="2"> Total</td>
            <td align="right"><?php echo $Grandtotal; ?></td>
        </tr>
        
        <tr>
        <td colspan="3">        <br/></td>
        </tr>
        <?php if($taxs['status']==1){ ?>
        <tr>
            <td colspan="3"> GST NO.  <?php echo $taxs['gst_no']; ?></td>
        </tr>
        <?php } ?>
        <tr>
        <td colspan="3">        <br/></td>
        </tr>

        <tr>
            <td colspan="3"><?php echo $printbill[0]['footer_1']; ?></td>
        </tr>
        <tr><td colspan="3"><?php echo $printbill[0]['footer_2']; ?></td>
        </tr>
        <tr><td colspan="3"><?php echo $printbill[0]['footer_3']; ?></td>
        </tr>
    </table><
</div>
</div><table width="100%"><tr><td style="text-align: center;"> <a href="#"  onclick="PrintDiv();"  >Print Bill</a></td></tr> </table>
</div>
