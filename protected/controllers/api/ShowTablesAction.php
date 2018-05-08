<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 20/08/2014
 * Time: 11:17
 */
class ShowTablesAction extends CAction
{
    public function run()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        if(strlen($id)==0)
        {
            $log = Tables::model()->findAll();
        }
        else
        {
           /*$log = Tables::model()->findAll(array(
                'condition'=>'id= :id',
                'params'=>array(
                    ':id'=>$TablesId
                )
            ));*/
			$log = Tables::model()->findAll(array(
                'condition'=>'operatorId= :operatorId',
                'params'=>array(
                    ':operatorId'=>$id
                )
            ));
        }

        foreach($log as $item)
        {
            $sta =$item->status;
            $ope = $item->operatorId;
            $a= intval($ope);
            $b= intval($sta);
            $data[]= array(
                'id'=>$item->Id,
                'operatorId'=>$a,
                'status'=>$b,

            );
        }

        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));


    }
}