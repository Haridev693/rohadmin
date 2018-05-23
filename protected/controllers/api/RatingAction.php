<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 25/08/2014
 * Time: 16:15
 */
class RatingAction extends CAction
{
    public function run()
    {
      
//        $CategoryId=isset($_REQUEST['CategoryId']) ? $_REQUEST['CategoryId'] : '';
        $json= isset($_REQUEST['json']) ? $_REQUEST['json'] : '';

////        $data= array();
//        $cat= Product::model()->findAll(array(
//            'condition'=> "categoryId= :id",
//            'params'=>array(':id'=>$CategoryId)
//            
//            
//        ));
        
        $ha=json_decode($json);
            foreach ($ha as $key => $value) {
        $customerdet = new Rating();
        $customerdet->questionId= $key;
        $customerdet->rating = $value;
        $customerdet->customerId = $_REQUEST['custId'];
            $customerdet->suggestion = $_REQUEST['suggestion'];
        if($_REQUEST['suggestion']=='0'){
            $customerdet->suggestion = '';
        }
          date_default_timezone_set("Asia/Kolkata");
        $customerdet->date = date('Y-m-d H:i');
       $customerdet->save();

             }
        if($customerdet){
            $error=0;
        }else{
            $error=1;
        }
//exit;        

        ApiController::sendResponse(200, CJSON::encode(array(

  //          'data' => $data,
            'error' => $error,
//            'customerid'=> intval($custd)
//            'details'=>$customerdet->phone.' '.$count
        )));

    }
}