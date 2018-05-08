<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 20/08/2014
 * Time: 11:17
 */
class SearchLoginAction extends CAction
{
    public function run()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$printsettings = printsetting::model()->findByPk('1');

		
		
        if(($id)==0)
        {

            $log = Login::model()->findAll();
        }
        else
        {

           $log = Login::model()->findAll(array(
                'condition'=>'id= :id',
                'params'=>array(
                    ':id'=>$id
                )
            ));
        }
       // $path= Yii::app()->getBaseUrl(true);
        //$log= Login::model()->findAll();
        foreach($log as $item)
        {

            $data[]= array(
                'id'=>$item->id,
                'nameOperator'=>$item->nameOperator,
                'passOperator'=>$item->passOperator,

            );
        }

        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
	    'setting' => $printsettings
        )));


    }
}