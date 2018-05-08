<?php

/**
 * This is the model class for table "printsetting".
 *
 * The followings are the available columns in table 'printsetting':
 * @property integer $id
 * @property string $rest_name
 * @property string $address_1
 * @property string $address_2
 * @property string $sales_invoice
 * @property string $footer_1
 * @property string $footer_2
 * @property string $footer_3
 */
class Printsetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'printsetting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, rest_name, address_1, address_2, sales_invoice, footer_1, footer_2, footer_3', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rest_name, address_1, address_2, sales_invoice, footer_1, footer_2, footer_3', 'safe', 'on'=>'search'),
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
			'rest_name' => 'Rest Name',
			'address_1' => 'Address 1',
			'address_2' => 'Address 2',
			'sales_invoice' => 'Sales Invoice',
			'footer_1' => 'Footer 1',
			'footer_2' => 'Footer 2',
			'footer_3' => 'Footer 3',
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
		$criteria->compare('rest_name',$this->rest_name,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('sales_invoice',$this->sales_invoice,true);
		$criteria->compare('footer_1',$this->footer_1,true);
		$criteria->compare('footer_2',$this->footer_2,true);
		$criteria->compare('footer_3',$this->footer_3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Printsetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
