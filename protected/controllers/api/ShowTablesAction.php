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
        // $data="";
        if(strlen($id)==0)
        {
            $log = Tables::model()->findAll();
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


        }
        else
        {
           /*$log = Tables::model()->findAll(array(
                'condition'=>'id= :id',
                'params'=>array(
                    ':id'=>$TablesId
                )
            ));*/
            $log=Yii::app()->db->createCommand()
                ->select('tableset.Id,assigntable.WaiterId,tableset.TableId,tableset.Status')
                ->from('assigntable')
                   ->join('tableset', 'tableset.Id=assigntable.TablesetId')
                   ->where("WaiterId=".$id)
                   ->queryAll();
    if(!empty($log)){
        foreach ($log as $item) {
            $itemexplode=explode(',',$item['TableId']);
            for($i=0;$i<count($itemexplode);$i++){

            // check  tables 
           $tables = Tables::model()->find(array(
                'condition'=>'id= :id',
                'params'=>array(
                    ':id'=>$itemexplode[$i]
                )
            ));
//           print_r($tables);

            $data[]= array(
                'id'=>$itemexplode[$i],
                'operatorId'=>intval($item['WaiterId']),
//                'status'=>intval($item['Status']),
                'status'=>intval($tables->status),

            );


            }
         }
}
else{
                $log = Tables::model()->findAll();
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

}

        }
        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));


    }
}