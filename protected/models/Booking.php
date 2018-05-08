<?php

/**
 * This is the model class for table "booking".
 *
 * The followings are the available columns in table 'booking':
 * @property integer $id
 * @property string $productId
 * @property string $tableId
 * @property string $img
 * @property string $productName
 * @property string $price
 * @property integer $number
 * @property string $note
 * @property integer $cartId
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Tables $table
 */
class Booking extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, cartId, dateCreated', 'numerical', 'integerOnly'=>true),
			array('productId, tableId, img, productName, price, note', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, productId, tableId, img, productName, price, number, note, cartId', 'safe', 'on'=>'search'),
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
			'table' => array(self::BELONGS_TO, 'Tables', 'tableId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'productId' => 'Product',
			'tableId' => 'Table',
			'img' => 'Img',
			'productName' => 'Product',
			'price' => 'Price',
			'number' => 'Number',
			'note' => 'Note',
			'cartId' => 'Cart',
			'dateCreated' => 'Date Created',
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
		$criteria->compare('productId',$this->productId,true);
		$criteria->compare('tableId',$this->tableId,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('productName',$this->productName,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('cartId',$this->cartId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder' => 'id DESC'
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Booking the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
