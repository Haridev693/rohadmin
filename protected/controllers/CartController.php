<?php
require_once(Yii::app()->basePath . '/vendor/mike42/escpos-php/autoload.php');

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use yii\helpers\Html;

class CartController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dynamicProducts','dynamicProductSearch','addToCartAjax','placeorder'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','cart','cartdelete','checkout','placeorder','printerdemo','delete'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('print','print'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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

		if(isset($_POST['Cart']))
		{
			echo $model->id;
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionDynamicProducts()
	{
	    $vals['value']="";
		//echo CHtml::tag('option', $vals , CHtml::encode('Select'),true);
		
		if($_POST['Cart']['id']!=""){
	echo  '<label for="Cart_Select_Product">Select  Product</label>';
	echo "<div class='row rowheader'>
			<div class='col-md-1'>Name</div>
			<div class='col-md-1 floatright'>Qty</div>
			</div>";
        $data = Yii::app()->db->createCommand()
    			->select('Id,Code,Name,Price')
   				->from('product')
   				->where("CategoryId='".$_POST['Cart']['id']."'")
			    ->queryAll();
			
		foreach($data as $value) {
			$opt = array();
			$opt['value'] = $value['Id'];
			echo "<div class='row'>";
			echo CHtml::checkBox('Cart[productId][]',false,array('value'=>$value['Id'].'-'.$value['Name'].'-'.$value['Price'])).' '.$value['Name']; 
			echo '&nbsp; &nbsp;'.CHtml::numberField('qty['.$value["Id"].']', '1',['class' => 'form-control qtywidth','onchange'=>"this.value=this.value.replace(/[^\d]/,'')","min"=>"1"]);
			echo "</div>";
		}

	}
		die;
	}
	public function actionDynamicProductSearch(){
		
        $data = Yii::app()->db->createCommand()
    			->select('Id,Code,Name,Price')
   				->from('product')
   				->where("CategoryId='".$_POST['id']."' and Name like '%".$_POST['q']."%'")
			    ->queryAll();
			
	echo  '<label for="Cart_Select_Product">Select  Product</label>';
echo "<div class='row rowheader'>
			<div class='col-md-1'>Name</div>
			<div class='col-md-1 floatright'>Qty</div>
			</div>";
		foreach($data as $value) {
			$opt = array();
			$opt['value'] = $value['Id'];
			echo "<div class='row'>";
			echo CHtml::checkBox('Cart[productId][]',false,array('value'=>$value['Id'].'-'.$value['Name'].'-'.$value['Price'])).' '.$value['Name'];
				echo '&nbsp; &nbsp;'.CHtml::numberField('qty['.$value["Id"].']', '1',['class' => 'form-control qtywidth','onchange'=>'return checknum(this.value)',"min"=>"1"]);
			echo "</div>";
		}


	}

	public function actionAddToCartAjax()
	{
		$date = strtotime('Now');
		// check cart
		
	    // add history
	   
	    $productid=$_POST['Cart']['productId'];
	    $qty=$_POST['qty'];
	  
	    if(count($productid)!=0){
	    	for($i=0;$i<count($productid);$i++){
    		$explodeproduct=explode('-',$productid[$i]);
    		$checkhistory = Yii::app()->db->createCommand()->
            select(' id, productId')->
            from('tmphistory')->
            where('productId = '.$explodeproduct[0])->
            queryAll();

//print_r(count($checkhistory));
	            if(count($checkhistory)==0){
				   	$history=new Tmphistory();
			        $history->type=$_POST['Cart']['type'];
			        $history->productId=$explodeproduct[0];
			        $history->productId=$explodeproduct[0];
			        $history->productName=$explodeproduct[1];
			        $history->price = $explodeproduct[2];
			        $history->number= $qty[$explodeproduct[0]];
			      //	$history->tmpcartId = $date;
			        if($_POST['Cart']['type']=='offline'){
			        $history->FoodcompanyId=$_POST['Cart']['waiter'];
			    	}else{
			        $history->FoodcompanyId=$_POST['Cart']['FoodcompanyId'];

			    	}
			       	$history->save();

		    	}
	    	}

	    }

	}
	public function actionCart()
	{
		
		if(isset($_POST['qty']))
		{
			
			foreach($_POST['qty'] as $key => $value){
				if($value > 0){
				// $update = Yii::app()->db->createCommand()
				// 		->update('tmphistory', array('number'=>$value),
				// 		'id=:id',array(':id'=>$key));
				}
			}
		}
		$model=Yii::app()->db->createCommand()
    			->select('*')
   				->from('tmphistory')
			   	->queryAll();
		$this->render('cart',array(
			'model'=>$model,
		));
	}
	public function actionCartdelete()
	{
		
		if(isset($_GET['id']))
		{
		$this->loadTmpHistoryModel($_GET['id'])->delete();
			
		}
		$this->redirect(array('cart/cart'));
	}

	public function actionCheckout()
	{
		$model=Yii::app()->db->createCommand()
    			->select('*')
   				->from('tmphistory')
			   	->queryAll();
		$this->render('checkout',array(
			'model'=>$model,
		));
	}
	public function actionplaceorder()
	{

		$model=Yii::app()->db->createCommand()
    			->select('*')
   				->from('tmphistory')
			   	->queryAll();

        $cartId = strtotime('Now');

	   	$cart = new Cart();
        $cart->waiter = 'admin';
        $cart->tableId = '';
        $cart->status = 0; // 0 - finished   1 - ordering
        $cart->cartId = $cartId;
        $cart->type = $model[0]['type'];
        $cart->FoodcompanyId = $model[0]['FoodcompanyId'];
        $cart->time = date("Y-m-d H:i:s", $cartId);
        $cart->save();
		foreach($model as $cart){
			// add to bill 
		 	$history=new History();
            $history->productId=$cart['productId'];
            $history->tableId='';
            $history->img='';
            $history->productName=$cart['productName'];
            $history->price = $cart['price'];
            $history->number= $cart['number'];
            $history->note = '';
            $history->cartId = $cartId;
            $history->waiter = '';
            $history->save();

		$this->loadTmpHistoryModel($cart['id'])->delete();

		}
		$lastcartid=Yii::app()->db->createCommand()->select('cart.id,cart.cartId')
   				->from('cart')->where('status="0" and waiter="admin" and tableId=""')
   				->order('cartId desc')
   				->limit(1)
   				->queryRow();

		$this->render('successorder',array(
			'model'=>$this->loadModel($lastcartid['id']),
			'orderid'=>$cartId,
		));
	}
	public function actionPrinterdemo()
	{
		$this->render('ipprinter',array(
			'model'=>'',
//			'orderid'=>$cartId,
		));
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
		$model=new Cart('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cart']))
			$model->attributes=$_GET['Cart'];
			$model->dbCriteria->order='time DESC';
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionPrint()
	{
		$this->render('print');

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
	public function loadTmpHistoryModel($id)
	{
		$model=Tmphistory::model()->findByPk($id);
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
