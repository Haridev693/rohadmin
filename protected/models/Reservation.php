<?php

/**
 * This is the model class for table "reservation".
 *
 * The followings are the available columns in table 'reservation':
 * @property integer $Id
 * @property integer $TableId
 * @property String $Name
 * @property String $Number
 * @property String $Person
 * @property DateTime $Datetime
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property Tables[] $tables
 */
class Reservation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TableId,Name,Number,Person,Date,Time', 'required'),
			array('Id, Name,Number,Person', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, TableId,Name,Number,Person,Date,Time,Status,CurrentTime', 'safe', 'on'=>'search'),
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
			'tables' => array(self::HAS_MANY, 'tables', 'TableId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'Id',
			'TableId' => 'Table Number',
			'Name' => 'Booking Name',
			'Number' => 'Phone Number',
			'Person' => 'Number of Person',
			'Date' => 'Date',
			'Time' => 'Time',
			'Status' => 'Status',
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
		$criteria->compare('TableId',$this->TableId);
		$criteria->compare('Name',$this->Name);
		$criteria->compare('Number',$this->Number);
		$criteria->compare('Person',$this->Person);
		$criteria->compare('Date',$this->Date);
		$criteria->compare('Time',$this->Time);
//		$criteria->addSearchCondition('TableId', $this->TableId, true, 'IN');
		$criteria->compare('Status',$this->Status);

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
