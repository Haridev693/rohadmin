<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property string $questionId
 * @property string $rating
 * @property string $customerId
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Query $question
 * @property Customer $customer
 * @property Tables $table
 */
class Rating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('cartId, status', 'numerical', 'integerOnly'=>true),
			// array('waiter, tableId', 'length', 'max'=>255),
			// array('waiter, tableId', 'length', 'max'=>255),
			// array('waiter, tableId', 'length', 'max'=>255),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, questionId, rating, customerId, suggestion, date', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Query', 'questionId'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customerId'),
			// 'table' => array(self::BELONGS_TO, 'Tables', 'tableId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'questionId' => 'query',
			'rating'=>'rating',
			'customerId' => 'customer',
			'suggestion'=>'suggestion',
			// 'waiter' => 'Waiter',
			// 'tableId' => 'Table',
			// 'cartId' => 'Cart',
			// 'status' => 'Status',
			'date' => 'Date',
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
		$criteria->compare('questionId',$this->questionId,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('customerId',$this->customerId,true);
		$criteria->compare('suggestion',$this->suggestion);
		$criteria->compare('date',$this->date,true);

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
