<?php
/**
 * Created by PhpStorm.
 * User: NguyenDuy
 * Date: 9/25/2017
 * Time: 10:57 AM
 */

class ChangePassword extends CActiveRecord
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    public function tableName()
    {
        return 'login';
    }


    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('currentPassword,newPassword,newPasswordRepeat','required'),
            array('currentPassword,newPassword','sameCheck'),
            array(
                'newPasswordRepeat', 'compare',
                'compareAttribute'=>'newPassword',
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'currPass' => 'Current password',
            'newPass' => 'new password',
            'reNewPass' => 'repeat password'
        );
    }

    public  function sameCheck()
    {
        $user_id = Yii::app()->user->id;
        $model = Login::model()->findByPk($user_id);
        $model->attributes=$_POST['Login'];
        if($model->passOperator === $model->newPassword)
            $this->addError('newPassword', 'Current Password and New password are the same, you need to choose different one');
    }
}