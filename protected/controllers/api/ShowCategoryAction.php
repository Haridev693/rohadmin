<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 20/08/2014
 * Time: 11:17
 */
class ShowCategoryAction extends CAction
{
    public function run()
    {
        $CategoryId = isset($_REQUEST['CategoryId']) ? $_REQUEST['CategoryId'] : '';
        if(strlen($CategoryId)==0)
        {

            $log = Category::model()->findAll();
        }
        else
        {

           $log = Category::model()->findAll(array(
                'condition'=>'id= :id',
                'params'=>array(
                    ':id'=>$CategoryId
                )
            ));
        }

        foreach($log as $item)
        {
            /*$sta =$item->status;
            $ope = $item->operatorId;
            $a= intval($ope);
            $b= intval($sta);*/
            $path= Yii::app()->getBaseUrl(true);
            if(strlen($item->ImageUrl)>0)
            $image= $path.'/images/category/'.$item->ImageUrl;
            $data[]= array(
                'id'=>$item->id,
                'imageUrl'=>$image,
                'name'=>$item->Name

            );
        }

        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));


    }
}