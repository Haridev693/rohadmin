<?php

/**
 * This is the model class for table "login".
 *
 * The followings are the available columns in table 'login':
 * @property integer $id
 * @property string $nameOperator
 * @property string $passOperator
 */
class Login extends CActiveRecord
{
//    public $currentPassword;
//    public $newPassword;
//    public $newPasswordRepeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameOperator, passOperator', 'required'),
			array('nameOperator, passOperator', 'length', 'max'=>255),
//            array('newPass', 'compare', 'compareAttribute'=>'reNewPass'),
			array('id, nameOperator, passOperator', 'safe', 'on'=>'search'),
//            array('currentPassword,newPassword,newPasswordRepeat','required'),
//            array('currentPassword,newPassword','sameCheck'),
//            array(
//                'newPasswordRepeat', 'compare',
//                'compareAttribute'=>'newPassword',
//            ),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nameOperator' => 'Name',
			'passOperator' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nameOperator',$this->nameOperator,true);
		$criteria->compare('passOperator',$this->passOperator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Login the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
