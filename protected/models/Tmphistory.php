<?php

/**
 * This is the model class for table "Temp history".
 *
 * The followings are the available columns in table 'history':
 * @property integer $id
 * @property string $productId
 * @property string $productName
 * @property string $price
 * @property integer $number
 * @property string $note
 * @property integer $cartId
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class Tmphistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmphistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, FoodcompanyId', 'numerical', 'integerOnly'=>true),
			array('type,productId, productName, price', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,type, productId,  productName, price, number, FoodcompanyId', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'productId'),
			'foodcompany' => array(self::BELONGS_TO, 'Foodcompany', 'FoodcompanyId'),
//			'table' => array(self::BELONGS_TO, 'Tables', 'tableId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type'=>'Type',
			'productId' => 'Product',
			'productName' => 'Product Name',
			'price' => 'Price',
			'number' => 'Number',
			'FoodcompanyId' => 'FoodcompanyId',
			//'note' => 'Note',
			'tmpcartId' => 'Cart',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('productId',$this->productId,true);
		$criteria->compare('productName',$this->productName,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('FoodcompanyId',$this->FoodcompanyId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
