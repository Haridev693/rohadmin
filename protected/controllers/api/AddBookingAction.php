<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 26/08/2014
 * Time: 10:40
 */
class AddBookingAction extends CAction
{
    public function run()
    {
        $json= isset($_REQUEST['json']) ? $_REQUEST['json'] : '';
       // $json= '{"data":[{"numberCart":8,"price":"20.5","cartName":"Lobster","tableId":"5","note":"1","productId":"3"},{"numberCart":4,"price":"15.0","cartName":"Fried Crab& Cary","tableId":"5","note":"1","productId":"4"},{"numberCart":6,"price":"3","cartName":"Fanta","tableId":"5","note":"1","productId":"2"}]}';

        //echo $json;exit;
        $ha=json_decode($json);

        $date = strtotime('Now');
        //echo $cartId;exit;
        //echo date('Y-m-d H:i:s',$cartId);exit;

        foreach($ha->{'data'} as $item)
        {
            $tableId =  $item->{'tableId'};
			$cartId = $item->{'cartID'};
            $table = Tables::model()->findByPk($tableId);
			$login = Login::model()->findByPk($table->operatorId);			
            $waiter = isset($login->nameOperator) ? $login->nameOperator : '';
            if($table->status==1) // active
            {
                $cartSearch = Cart::model()->find('tableId = '.$tableId .' and status = 1');
                //$cartSearch = Cart::model()->find('tableId = '.$tableId .' and status = 0');
                if(count($cartSearch) > 0)//////////////
                {
                    $cartId = $cartSearch->cartId;
                }
            }
            else  // status = 2:inactive - using
            {
			
                $cart = new Cart();
                $cart->waiter = $waiter;
                $cart->tableId = $tableId;
                $cart->status = 1; // 0 - finished   1 - ordering
                $cart->cartId = $cartId;
                $cart->time = date("Y-m-d H:i:s", $date);
                $cart->save();
                 $table->status = 1; // inactive
            $table->save();
            }

           
            //add new cart

            $productName =  $item->{'cartName'};
            $productId =  $item->{'productId'};
            $note =  $item->{'note'};
            $numberCart =  $item->{'numberCart'};
            $price =  $item->{'price'};

            $newComment=new Booking;
            $newComment->productId=$productId;
            $newComment->tableId=$tableId;
            $newComment->img='';
            $newComment->productName=$productName;
            $newComment->price = $price;
            $newComment->number= $numberCart;
            $newComment->note = $note;
            $newComment->cartId = $cartId;
            $newComment->dateCreated = $date;
            $newComment->save();
        }
        ApiController::sendResponse(200, CJSON::encode(array(
            'status' => 'SUCCESS',
            'data' => 'NULL',
            //'data' => array($cartData,'total'=>$totalAmount),
            'error' => 0,
        )));
    }
}