<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $Id
 * @property integer $Code
 * @property string $Price
 * @property integer $NumberName
 * @property string $Name
 * @property string $CategoryId
 *
 * The followings are the available model relations:
 * @property Name $categoryName
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('Code, Price, Name, CategoryId,Stockstatus', 'required'),
            array('Code, NumberName', 'numerical', 'integerOnly'=>true),
            //array('Price', 'numerical'),
            array('Name, CategoryId,Price,Totalqty', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Code, Price, NumberName, Name, CategoryId,Totalqty,Stockstatus', 'safe', 'on'=>'search'),
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
			'categoryId' => array(self::BELONGS_TO, 'Name', 'CategoryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Code' => 'Code',
			'Price' => 'Price',
			'NumberName' => 'Number Name',
			'Name' => 'Name',
			'Totalqty'=>'Total Quantity',
			'Stockstatus'=>'Stock Status',
			'CategoryId' => 'Category Id',
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
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Price',$this->Price,true);
		$criteria->compare('NumberName',$this->NumberName,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('CategoryId',$this->CategoryId,true);
		$criteria->compare('Totalqty',$this->Totalqty,true);
		$criteria->compare('Stockstatus',$this->Stockstatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
