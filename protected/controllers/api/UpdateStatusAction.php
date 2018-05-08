<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 26/08/2014
 * Time: 09:25
 */
class UpdateStatusAction extends CAction
{
    public function run()
    {
        $TableId = isset($_REQUEST['TableId']) ? $_REQUEST['TableId'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';
        $tab= Tables::model()->findAll(array(
            'condition'=>'Id= :id',
            'params'=>array(':id'=>$TableId)
        ));
       // var_dump($tab);exit;
        foreach($tab as $item)
        {
            if($status == ($item->status))
            {
               // return $item->status;
                $connection=Yii::app()->db;
                $sql = "UPDATE tables SET status = '$status' WHERE Id = $item->Id";
                $command = $connection->createCommand($sql);
                $command->execute();
                $data[]=array(
                    'id'=>$item->Id,
                    'operatorId'=>$item->operatorId,
                    'status'=>$status
                );

            }
            else
            {
                $connection=Yii::app()->db;
                $sql = "UPDATE tables SET status = '$status' WHERE Id = $item->Id";
                $command = $connection->createCommand($sql);
                $command->execute();
                //$status=$item->status;
                $data[]=array(
                    'id'=>$item->Id,
                    'operatorId'=>$item->operatorId,
                    'status'=>$status
                );
            }

        }
        ApiController::sendResponse(200, CJSON::encode(array(

            'data' => $data,
            'error' => 0,
        )));

    }
}