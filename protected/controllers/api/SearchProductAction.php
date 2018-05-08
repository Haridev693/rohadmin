<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 25/08/2014
 * Time: 16:15
 */
class SearchProductAction extends CAction
{
    public function run()
    {
        $CategoryId=isset($_REQUEST['CategoryId']) ? $_REQUEST['CategoryId'] : '';
        $data= array();
        $cat= Product::model()->findAll(array(
            'condition'=> "categoryId= :id",
            'params'=>array(':id'=>$CategoryId)
        ));
        foreach($cat as $item)
        {
            $data[]=array(
                'id'=>$item->Id,
                'code'=>intval($item->Code),
                'price'=>doubleval($item->Price),
                'numbername'=>intval($item->NumberName),
                'name'=>$item->Name,
                'categoryId'=>$item->CategoryId
            );
        }


        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));

    }
}