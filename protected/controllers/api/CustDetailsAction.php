<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 25/08/2014
 * Time: 16:15
 */
class CustDetailsAction extends CAction
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
        $customerdet = new Customer();
        $customerdet->name= $ha->{'name'};
        $customerdet->emailID = $ha->{'emailID'};
        $customerdet->phone = $ha->{'phone'};
        $customerdet->dob = $ha->{'dob'};
        
//        $customerdet->save();
//        $phonenum = $ha->{'phone'};
        
        
//        if($phonenum)
//        if(is_null($phonenum)){}
//        else{
        $custlist = Customer::model()->find(array(
            'condition'=>'phone= :phn',
                'params'=>array(':phn'=>$customerdet->phone)));
        
        
//        }
        if(count($custlist)>0)
        {
            $custlist->name = $ha->{'name'};
            $custlist->emailID = $ha->{'emailID'};
            $custlist->dob = $ha->{'dob'};
            $custlist->save();
            $custd = $custlist->id;
        }
        else
        {
            $customerdet->save();
            $custd = $customerdet->id;  
        }
        
//        if(count($custlist)>0)
//        {
//            $customerdet->Update();
//        }
//        else
//        {
//            $customerdet->save();
//        }
            
//        $customerdet->update()|| Save();
        
//        $query = new Query();
        $query = Query::model()->findAll();
        
        
        $data = array();
        
        foreach($query as $item)
        {
            $data[]= array(
                'Id'=>intval($item->Id),
                'Question'=>$item->Question
            );
        }
//        $customer
        
//        foreach($cat as $item)
//        {
//            $data[]=array(
//                'id'=>$customerdet->id,
//                'code'=>intval($item->Code),
//                'price'=>doubleval($item->Price),
//                'numbername'=>intval($item->NumberName),
//                'name'=>$item->Name,
//                'categoryId'=>$item->CategoryId
//            );
//        }


        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
            'customerid'=> intval($custd)
//            'details'=>$customerdet->phone.' '.$count
        )));

    }
}