<?php
 require_once(Yii::app()->basePath . '/vendor/mike42/escpos-php/autoload.php');
// require_once(Yii::app()->basePath . '/vendor/flot/Chart.php');
// require_once(Yii::app()->basePath . '/vendor/flot-master/Plugin.php');

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

Yii::import('ext.MYPDF');
class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions

			// 	'actions'=>array('index','view'),
			// 	'users'=>array('*'),
			// ),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
			// 	'actions'=>array('create','update'),
			// 	'users'=>array('@'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
			// 	'actions'=>array('admin','delete'),
			// 	'users'=>array('admin'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
			// 	'actions'=>array('print','print'),
			// 	'users'=>array('@'),
			// ),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
				'actions'=>array('admin','delete','view','index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createpdf'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','view','index'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('print','print'),
				'users'=>array('@'),
			),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cart;
		$cat="";
		$chartdata="";
		$catstatus="";
		$chartstatus=false;
		$aprocount=array();
			 
		$chartweekdata=array();
		$weekdays=array();
		$chartname="";
		$av1=array();
		$hinumber=0;
		$dataweek="";
		$weekdate=array();
		$weekdata=array();
		$getallmonth=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y-%m") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();
		$getallyear=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//echo date( "Y-m-d", strtotime( $_GET['Cart']['status']." -7 days " ) );
//				   print_r($_REQUEST);
		if(isset($_GET['Cart']))
		{
			$chartname=$_GET['Cart']['time'];
			$catstatus=$_GET['Cart']['status'];
			$data = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.number) as hinumber,history.price')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId')
   				   ->where("cart.status=0");
   				if($_GET['Cart']['time']=='day'){

			   $data=$data->where('DATE_FORMAT(cart.time, "%Y-%m-%d")=:date', array(':date'=>$_GET['Cart']['status']));
				$data=$data->group('productId');
   				}

   				if($_GET['Cart']['time']=='week' && $_GET['Cart']['status']!=""){

			   $data=$data->where("cart.time BETWEEN  '".$_GET['Cart']['status']." 00:00:00' AND '".date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ) )." 23:59:00'");
				$data=$data->group('productId');

				 // week sales 
			    $dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$_GET['Cart']['status']." 00:00:00' AND '".date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ) )." 23:59:00' AND cart.status=0");
//			    $dataweek=$dataweek->where("cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus.=' To '.date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ));

   				}
   				if($_GET['Cart']['time']=='month' && $_GET['Cart']['month']!=""){

   				$csmonth=date('Y-m',strtotime($_GET['Cart']['month']));
				$cemonth=date("Y-m-t", strtotime($_GET['Cart']['month']));
//exit;

			   	$data=$data->where("cart.time BETWEEN  '".$csmonth."-01 00:00:00' AND '".$cemonth." 23:59:00'");
				$data=$data->group('productId');
				// month sales
				$dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$csmonth."-01 00:00:00' AND '".$cemonth." 23:59:00' AND cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus=$csmonth.'-01 To '.$cemonth;

				}
				if($_GET['Cart']['time']=='year' && $_GET['Cart']['year']!=""){
   				$cmonth=$_GET['Cart']['year'];
			   	$data=$data->where("cart.time BETWEEN  '".$cmonth."-01-01 00:00:00' AND '".$cmonth."-12-31 23:59:00'");
				$data=$data->group('productId');
			//	echo $cmonth;
				// month sales
				$dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$cmonth."-01-01 00:00:00' AND '".$cmonth."-12-31 23:59:00' AND cart.status=0");
//			    $dataweek=$dataweek->where("cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus=$cmonth.'-01-01 To '.$cmonth.'-12-31';

				}

				$data=$data->order('date');
				$data=$data->queryAll();

			 $chartstatus=true;
			 if($_GET['Cart']['status']!="" || $_GET['Cart']['month']!="" || $_GET['Cart']['year']!=""){

			 $chartstatus=false;
            $taxs = Tax::model()->findByPk('1');
            $totaltax=round($taxs['tax']/2,2);



			 foreach ($data as $key => $value) {
//			 	if($aprocount)
			 	// day
			// 	print_r($value);
			 	$cat=$cat."'".$value['productName']."',";
			 	$chartdata=$chartdata.$value['hinumber'].","; 
			 	$stotalTax=$value['hinumber']*$value['price'];
			   if($taxs['status']==1){
	            	 $stotalTax=($value['hinumber']*$value['price']) + round(((($value['hinumber']*$value['price'])*$taxs['tax'])/100),2);
	         	}
			 	$hinumber= $hinumber +  $stotalTax;//$value['hinumber']*$value['price'];

			 	// week

			 	if(!in_array($value['date'], $weekdays, true)){
			   //      array_push($liste, $value);
				 	 array_push($weekdays,$value['date']);
				 }
			 	if(!in_array($value['productName'], $aprocount, true)){
				 	array_push($aprocount,$value['productName']);
				 }
			 }
			 // week sales 
			 if($dataweek!=""){
			 foreach ($dataweek as $key => $value) {
//			 	print_r($value['hinumber'].' '.$value['number']);
			 	array_push($weekdate,$value['date']);
			 	$stotalTax=$value['hinumber'];
			   if($taxs['status']==1){
	            	 $stotalTax=$value['hinumber'] + round((($value['hinumber']*$taxs['tax'])/100),2);
	         	}
	         
			 	array_push($weekdata,$stotalTax);
			 }
			}


		}
	}
		$this->render('admin',array(
			'model'=>$model,
			'cat'=>$aprocount,
			'chartname'=>$chartname,
			'chartdata'=>$chartdata,
			'hinumber'=>$hinumber,
			'catstatus'=>$catstatus,
			'chartstatus' =>$chartstatus,
			'chartweekdata'=>$av1,
			// 'chartweekdata'=>$av1,
			// 'chartweekdata'=>$av1,
			'salesweekdate'=>$weekdate,
			'salesweekdata'=>$weekdata,
			'getallmonth'=>$getallmonth,
			'getallyear'=>$getallyear,

		));
	}

	public function actionCreatepdf()
	{
		$model=new Cart;
		$cat="";
		$chartdata="";
		$catstatus="";
		$chartstatus=false;
		$aprocount=array();
			 
		$chartweekdata=array();
		$weekdays=array();
		$chartname="";
		$av1=array();
		$hinumber=0;
		$dataweek="";
		$weekdate=array();
		$weekdata=array();
		$getallmonth=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y-%m") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();
		$getallyear=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//echo date( "Y-m-d", strtotime( $_GET['Cart']['status']." -7 days " ) );
//				   print_r($_REQUEST);
		if(isset($_GET['Cart']))
		{
			$chartname=$_GET['Cart']['time'];
			$catstatus=$_GET['Cart']['status'];
			$data = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.number) as hinumber,history.price')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId')
   				   ->where("cart.status=0");
   				if($_GET['Cart']['time']=='day'){

			   $data=$data->where('DATE_FORMAT(cart.time, "%Y-%m-%d")=:date', array(':date'=>$_GET['Cart']['status']));
				$data=$data->group('productId');
   				}

   				if($_GET['Cart']['time']=='week' && $_GET['Cart']['status']!=""){

			   $data=$data->where("cart.time BETWEEN  '".$_GET['Cart']['status']." 00:00:00' AND '".date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ) )." 23:59:00'");
				$data=$data->group('productId');

				 // week sales 
			    $dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$_GET['Cart']['status']." 00:00:00' AND '".date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ) )." 23:59:00' AND cart.status=0");
//			    $dataweek=$dataweek->where("cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus.=' To '.date( "Y-m-d", strtotime( $_GET['Cart']['status']." +6 days " ));

   				}
   				if($_GET['Cart']['time']=='month' && $_GET['Cart']['month']!=""){

   				$csmonth=date('Y-m',strtotime($_GET['Cart']['month']));
				$cemonth=date("Y-m-t", strtotime($_GET['Cart']['month']));
//exit;

			   	$data=$data->where("cart.time BETWEEN  '".$csmonth."-01 00:00:00' AND '".$cemonth." 23:59:00'");
				$data=$data->group('productId');
				// month sales
				$dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$csmonth."-01 00:00:00' AND '".$cemonth." 23:59:00' AND cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus=$csmonth.'-01 To '.$cemonth;

				}
				if($_GET['Cart']['time']=='year' && $_GET['Cart']['year']!=""){
   				$cmonth=$_GET['Cart']['year'];
			   	$data=$data->where("cart.time BETWEEN  '".$cmonth."-01-01 00:00:00' AND '".$cmonth."-12-31 23:59:00'");
				$data=$data->group('productId');
			//	echo $cmonth;
				// month sales
				$dataweek = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m") as date,history.productId,history.productName,sum(history.price * history.number) as hinumber')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId');
			    $dataweek=$dataweek->where("cart.time BETWEEN  '".$cmonth."-01-01 00:00:00' AND '".$cmonth."-12-31 23:59:00' AND cart.status=0");
//			    $dataweek=$dataweek->where("cart.status=0");
				$dataweek=$dataweek->group('date');
				$dataweek=$dataweek->order('date');
				$dataweek=$dataweek->queryAll();
				$catstatus=$cmonth.'-01-01 To '.$cmonth.'-12-31';

				}

				$data=$data->order('date');
				$data=$data->queryAll();

			 $chartstatus=true;
			 if($_GET['Cart']['status']!="" || $_GET['Cart']['month']!="" || $_GET['Cart']['year']!=""){

			 $chartstatus=false;
            $taxs = Tax::model()->findByPk('1');
            $totaltax=round($taxs['tax']/2,2);



			 foreach ($data as $key => $value) {
//			 	if($aprocount)
			 	// day
			// 	print_r($value);
			 	$cat=$cat."'".$value['productName']."',";
			 	$chartdata=$chartdata.$value['hinumber'].","; 
			 	$stotalTax=$value['hinumber']*$value['price'];
			   if($taxs['status']==1){
	            	 $stotalTax=($value['hinumber']*$value['price']) + round(((($value['hinumber']*$value['price'])*$taxs['tax'])/100),2);
	         	}
			 	$hinumber= $hinumber +  $stotalTax;//$value['hinumber']*$value['price'];

			 	// week

			 	if(!in_array($value['date'], $weekdays, true)){
			   //      array_push($liste, $value);
				 	 array_push($weekdays,$value['date']);
				 }
			 	if(!in_array($value['productName'], $aprocount, true)){
				 	array_push($aprocount,$value['productName']);
				 }
			 }
			 // week sales 
			 if($dataweek!=""){
			 foreach ($dataweek as $key => $value) {
//			 	print_r($value['hinumber'].' '.$value['number']);
			 	array_push($weekdate,$value['date']);
			 	$stotalTax=$value['hinumber'];
			   if($taxs['status']==1){
	            	 $stotalTax=$value['hinumber'] + round((($value['hinumber']*$taxs['tax'])/100),2);
	         	}
	         
			 	array_push($weekdata,$stotalTax);
			 }
			}


		}
	}



// print_r($aprocount);
// print_r($chartname);
// print_r($chartdata);
// echo "<br/>";


// print_r($weekdate);
// echo "<br/>";
// print_r($weekdata);


 $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase','autoload'));

        // set document information
        $pdf->SetCreator(PDF_CREATOR);

        $pdf->SetTitle("Sales Report");
        $pdf->SetHeaderData('', 50, " Sales Report ".$catstatus, "");
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetFont('freesans', '', 14);
        $pdf->SetTextColor(10,10,10);
        $pdf->AddPage();

        //Write the html
        $html = "<div style='margin-bottom:15px;text-align:center;margin-left:30px' align='center'><h1>Product Sales. ".$catstatus." </h2></div>";
        //Convert the Html to a pdf document
   
        $pdf->writeHTML($html, true, false, true, false, 'C');
 
        // data loading

$tbl = '
<table cellspacing="0" cellpadding="1" border="1">
	<tr style="background-color:#d8e4e9">
		<th style="text-center;font-size:12px;" align="center" width="80%"><h4>Product Name</h4></th>
		<th style="text-center;font-size:12px;" align="center" width="20%"><h4>Total Qty</h4></th>
	</tr>';

	$explode=explode(',', $chartdata);
	$sumofproduct=0;
for($i=0;$i<count($aprocount);$i++){
$tbl.='<tr ><th style="text-center;font-size:12px;"> '.$aprocount[$i].'</th>
			<th style="text-right;font-size:12px;" align="right"> '.$explode[$i].'</th>
		</tr>';	
		$sumofproduct=$sumofproduct + $explode[$i];
}
$tbl.='<tr ><th style="text-center;font-size:14px;font-weight:bold;"> Total Qty </th>
			<th style="text-right;font-size:14px; font-weight:bold;" align="right"> '.$sumofproduct.'</th>
		</tr>';	


$tbl.='</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');

     //   $pdf->ColoredTable($header, $data);
        // reset pointer to the last page
if(!empty($weekdata)){

$pdf->AddPage();

 $html = "<div style='margin-bottom:15px;text-align:center;margin-left:30px' align='center'><h1>".ucfirst($chartname)."ly Sales. ".$catstatus."</h2></div>";
        //Convert the Html to a pdf document
   
        $pdf->writeHTML($html, true, false, true, false, 'C');
$tbl = '
<table cellspacing="0" cellpadding="1" border="1">
	<tr style="background-color:#d8e4e9">
		<th style="text-center;font-size:12px;" align="center" width="80%"><h4>Date</h4></th>
		<th style="text-center;font-size:12px;" align="center" width="20%"><h4>Total Price</h4></th>
	</tr>';
	$sumofprice=0;
for($i=0;$i<count($weekdate);$i++){
$tbl.='<tr ><th style="text-center;font-size:12px;"> '.$weekdate[$i].'</th>
			<th style="text-center;font-size:12px;" align="right"> '.$weekdata[$i].'</th>
		</tr>';	
		$sumofprice=$sumofprice + $weekdata[$i];
}
$tbl.='<tr ><th style="text-center;font-size:14px;font-weight:bold;"> Total Sales </th>
			<th style="text-right;font-size:14px; font-weight:bold;" align="right"> '.$sumofprice.'</th>
		</tr>';	

$tbl.='</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');

}
        $pdf->lastPage();

        //Close and output PDF document
         $pdf->Output('filename.pdf', 'I');
         Yii::app()->end();
//print_r($catstatus);

		// $this->render('admin',array(
		// 	'model'=>$model,
		// 	'cat'=>$aprocount,
		// 	'chartname'=>$chartname,
		// 	'chartdata'=>$chartdata,
		// 	'hinumber'=>$hinumber,
		// 	'catstatus'=>$catstatus,
		// 	'chartstatus' =>$chartstatus,
		// 	'chartweekdata'=>$av1,
		// 	// 'chartweekdata'=>$av1,
		// 	// 'chartweekdata'=>$av1,
		// 	'salesweekdate'=>$weekdate,
		// 	'salesweekdata'=>$weekdata,
		// 	'getallmonth'=>$getallmonth,
		// 	'getallyear'=>$getallyear,

		// ));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cart']))
		{
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{







		$model=new Cart;
		$cat="";
		$chartdata="";
		$catstatus="";
		$chartstatus=false;
		$aprocount=array();
			 
		$chartweekdata=array();
		$weekdays=array();
		$chartname="";
		$av1=array();
		$hinumber="";
		$dataweek="";
		$weekdate=array();
		$weekdata=array();
		$getallmonth=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y-%m") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();
		$getallyear=Yii::app()->db->createCommand()
    			->select('cart.id,DATE_FORMAT(cart.time, "%Y") as date')
   				->from('cart')
   				   ->where("cart.status=0")
   			   	   ->group('date')
				   ->queryAll();

			$chartname='day';
			$catstatus=date('Y-m-d');
			$data = Yii::app()->db->createCommand()
    			->select('cart.id, cart.time,DATE_FORMAT(cart.time, "%Y-%m-%d") as date,history.productId,history.productName,sum(history.number) as hinumber,history.price')
   				->from('cart')
   				   ->join('history', 'cart.cartId=history.cartId')
   				   ->where("cart.status=0");
			   $data=$data->where('DATE_FORMAT(cart.time, "%Y-%m-%d")=:date', array(':date'=>$catstatus));
				$data=$data->group('productId');
				$data=$data->order('date');
				$data=$data->queryAll();
			 	$chartstatus=true;
		 	$taxs = Tax::model()->findByPk('1');
            $totaltax=round($taxs['tax']/2,2);
			 foreach ($data as $key => $value) {
//			 	if($aprocount)
			 	// day
			 	$cat=$cat."'".$value['productName']."',";
			 	$chartdata=$chartdata.$value['hinumber'].",";
			 	$stotalTax=$value['hinumber']*$value['price'];
			   if($taxs['status']==1){
	            	 $stotalTax=($value['hinumber']*$value['price']) + round(((($value['hinumber']*$value['price'])*$taxs['tax'])/100),2);
	         	}
			 	$hinumber= $hinumber +  $stotalTax; 
//			 	$hinumber=$hinumber+ $value['hinumber']*$value['price'];
			 	if(!in_array($value['productName'], $aprocount, true)){
				 	array_push($aprocount,$value['productName']);
				 }
			}


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['Cart']))
		{
//			$model->attributes=$cat;
			// if($model->save())
			// 	$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('admin',array(
			'model'=>$model,
			'cat'=>$aprocount,
			'chartname'=>$chartname,
			'chartdata'=>$chartdata,
			'hinumber'=>$hinumber,
			'catstatus'=>$catstatus,
			'chartstatus' =>$chartstatus,
			'chartweekdata'=>$av1,
			// 'chartweekdata'=>$av1,
			// 'chartweekdata'=>$av1,
			'salesweekdate'=>$weekdate,
			'salesweekdata'=>$weekdata,
			'getallmonth'=>$getallmonth,
			'getallyear'=>$getallyear,

		));
// //		$model=new History;
// 		$model=new Cart('search');
// 		$model->unsetAttributes();  // clear any default values
// 		if(isset($_GET['Cart']))
// 			$model->attributes=$_GET['Cart'];
// 			$model->dbCriteria->order='time DESC';
// 		$this->render('admin',array(
// 			'model'=>$model,
// 		));
	}
	public function actionPrint()
	{
		$this->render('print');

	}
	public function actionDynamicStates()
	{
			    $vals['value']="";
		echo CHtml::tag('option', $vals , CHtml::encode('Select'),true);
		if($_POST['Cart']['time']!=""){
        $data = Yii::app()->db->createCommand()
    			->select('id,DATE_FORMAT(time, "%Y-%m-%d") as date')
   				->from('cart')
				->group('date')
			    ->queryAll();

//		$state = isset($_POST['hidden_state']);
		
		foreach($data as $value) {
			print_r($value['date']);
//			echo $value.' :'.$name;
//			echo "<br/>";
//			echo CHtml::tag('option', $opt , CHtml::encode('10/04/2018'),true);
			$opt = array();
			$opt['value'] = $value['date'];
			// if($state == $value) $opt['selected'] = "selected";
			echo CHtml::tag('option', $opt , CHtml::encode($value['date']),true);
		}}
		die;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cart the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cart::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cart $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
