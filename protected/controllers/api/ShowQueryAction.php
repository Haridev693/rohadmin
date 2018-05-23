<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 20/08/2014
 * Time: 11:17
 */
class ShowQueryAction extends CAction
{
    public function run()
    {
        $QueryId = isset($_REQUEST['QueryId']) ? $_REQUEST['QueryId'] : '';
        if(strlen($QueryId)==0)
        {

            $log = Query::model()->findAll();
        }
        else
        {

           $log = Query::model()->findAll(array(
                'condition'=>'Id= :Id',
                'params'=>array(
                    ':Id'=>$QueryId
                )
            ));
        }

        foreach($log as $item)
        {
            /*$sta =$item->status;
            $ope = $item->operatorId;
            $a= intval($ope);
            $b= intval($sta);*/
            //$path= Yii::app()->getBaseUrl(true);
            // if(strlen($item->ImageUrl)>0)
//            $image= $path.'/images/category/'.$item->ImageUrl;
            $data[]= array(
                'id'=>$item->Id,
                // 'imageUrl'=>$image,
                 'name'=>$item->Question

            );
        }

        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));


    }
}