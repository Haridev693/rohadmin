<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 26/08/2014
 * Time: 10:40
 */
class AddHistoryAction extends CAction
{
    public function run()
    {
        $tableId= isset($_REQUEST['tableId']) ? $_REQUEST['tableId'] : '';
        $cartId= isset($_REQUEST['cartId']) ? $_REQUEST['cartId'] : '';

//        $allCart = Cart::model()->findAll(array(
//            'condition'=>'tableId = :tableId',
//            'params'=>array(':tableId'=>$tableId),
//        ));
//        $criteria = new CDbCriteria();
//        $criteria->select = 'id, productId, tableId, ImgUrl, cartName, SUM(price) AS TotalPrice, SUM(numberCart) AS TotalNumber ';
//        $criteria->condition = 'tableId = :tableId';
//        $criteria->group = 'productId';
//        $criteria->params = array(':tableId' => $tableId);
//        $allCart = Cart::model()->model()->findAll($criteria);
        $waiter = Cart::model()->find('cartId='.$cartId, 'status=1');	
		//if(isset($waiter))
		//{
			//$waiter_name = $waiter->waiter;
		//}else
		//{
			//$waiter_name = '';
		//}

        // History::model()->deleteAll('tableId ='.$tableId.' and cartId = '.$cartId);

        $allCart = Yii::app()->db->createCommand()->
            select(' id, productId, tableId, img, productName, price , sum(number)')->
            from('booking')->
            where('tableId = '.$tableId)->
            group('productId')->
            //order('count(player) DESC')->
            //limit(10)->
            queryAll();

        foreach($allCart as $cart)
        {
//            $cartData[]= array(
//                'id'=>$cart['id'],
//                'productId'=>$cart['productId'],
//                'tableId'=>$cart['tableId'],
//                'ImgUrl'=>$cart['ImgUrl'],
//                'cartName'=>$cart['cartName'],
//                'price'=>$cart['sum(price)'],
//                'numberCart'=>$cart['sum(numberCart)'],
//                //'note'=>$cart->note,
//                //'cartId'=>$cart->cartId,
//
//            );

            $newComment=new History();
            $newComment->productId=$cart['productId'];
            $newComment->tableId=$cart['tableId'];
            $newComment->img=$cart['img'];
            $newComment->productName=$cart['productName'];
            $newComment->price = $cart['price'];
            $newComment->number= $cart['sum(number)'];
            $newComment->note = '';
            $newComment->cartId = $cartId;
            $newComment->waiter = isset($waiter_name) ? $waiter_name : '';
            $newComment->save();
        }

        $oldTable= Tables::model()->find('Id = '.$tableId);
        //var_dump($oldTable);exit;
        $oldTable->status=1;  // active
        $oldTable->save();

        $oldCart=Cart::model()->find('cartId='.$cartId, 'status=1');
		if(count($oldCart) > 0)
		{
			$oldCart->status=0; // finished
			$oldCart->save();
		}

        Booking::model()->deleteAll('cartId='.$cartId.' and tableId='.$tableId);

        ApiController::sendResponse(200, CJSON::encode(array(
            'status' => 'SUCCESS',
            'data' => '',
            'error' => 0,
        )));
    }
}