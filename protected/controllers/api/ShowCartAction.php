<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 26/08/2014
 * Time: 11:21
 */
class ShowCartAction extends CAction
{
    public function run()
    {
        $tableId= isset($_REQUEST['tableId']) ? $_REQUEST['tableId'] : '';
        $allCart = Booking::model()->findAll(array(
            'condition'=>'tableId = :tableId',
            'params'=>array(':tableId'=>$tableId),
        ));
        $taxs = Tax::model()->findByPk('1');
        if($taxs['status']==1){ $visibletax=$taxs['tax'];}else{$visibletax='0';}

		$cartData = array();
        foreach($allCart as $cart)
        {
            $cartData[]= array(
                'id'=>$cart->id,
                'productId'=>$cart->productId,
                'tableId'=>$cart->tableId,
                'ImgUrl'=>$cart->img,
                'cartName'=>$cart->productName,
                'price'=>$cart->price*$cart->number,
                'numberCart'=>$cart->number,
                'note'=>$cart->note,
                'cartId'=>$cart->cartId,
            );
        }
        ApiController::sendResponse(200, CJSON::encode(array(
            'status' => 'SUCCESS',
            'data' => $cartData,

            //'data' => array($cartData,'total'=>$totalAmount),
            'tax' => $visibletax,
            'error' => 0,
        )));
    }
}