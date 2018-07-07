<?php

/**
 * This is the model class for table "stockhistory".
 *
 * The followings are the available columns in table 'stockhistory':
 * @property integer $Id
 * @property integer $ProductId
 * @property String $Qty
 * @property DateTime $Time
 *
 * The followings are the available model relations:
 * @property Product[] $product
 */
class Stock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stockhistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductId,Qty,Time', 'required'),
			array('Id,ProductId,Qty,Time', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id,ProductId,Qty,Time', 'safe', 'on'=>'search'),
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
			'product' => array(self::HAS_MANY, 'product', 'ProductId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'Id',
			'ProductId' => 'Product Number',
			'Qty' => 'Quantity',
			'Time' => 'Time',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('ProductId',$this->ProductId);
		$criteria->compare('Qty',$this->Qty);
		$criteria->compare('Time',$this->Time);
//		$criteria->addSearchCondition('TableId', $this->TableId, true, 'IN');
//		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tables the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
