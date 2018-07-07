<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property string $waiter
 * @property string $tableId
 * @property integer $cartId
 * @property integer $status
 * @property string $time
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Tables $table
 */
class TmpCart extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmpcart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tmpcartId, status', 'numerical', 'integerOnly'=>true),
			array('type,gst,totalprice,FoodcompanyId', 'length', 'max'=>255),
			array('time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tmpcartId, status, time,totalprice', 'safe', 'on'=>'search'),
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
//			'product' => array(self::BELONGS_TO, 'Product', 'productId'),
	//		'table' => array(self::BELONGS_TO, 'Tables', 'tableId'),
			'foodcompany' => array(self::BELONGS_TO, 'Foodcompany', 'FoodcompanyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tmpcartId' => 'Cart',
			'status' => 'Status',
			'gst' => 'Gst',
			'totalprice' => 'TotalPrice',
			'time' => 'Time',
			'type' => 'type',
			'FoodcompanyId' => 'FoodcompanyId',
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
		$criteria->compare('tmpcartId',$this->cartId);
		$criteria->compare('status',$this->status);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('gst',$this->gst,true);
		$criteria->compare('totalprice',$this->totalprice,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
