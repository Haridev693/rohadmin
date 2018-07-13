<?php

/**
 * This is the model class for table "tax".
 *
 * The followings are the available columns in table 'tax':
 * @property integer $id
 * @property string $tax
 * @property integer $status
 * @property string $time
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Tables $table
 */
class Bill extends CActiveRecord
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
			array('rest_name', 'required'),
			array('rest_name', 'length', 'max'=>255),
			array('address_1', 'required'),
			array('address_1', 'length', 'max'=>255),
			array('address_2', 'required'),
			array('address_2', 'length', 'max'=>255),
			array('sales_invoice', 'required'),
			array('sales_invoice', 'length', 'max'=>255),
			array('footer_1', 'required'),
			array('footer_1', 'length', 'max'=>255),
			array('footer_2', 'length', 'max'=>255),
			array('footer_3', 'length', 'max'=>255),
			array('printer_ip', 'length', 'max'=>30),
			array('app_bill', 'numerical', 'integerOnly'=>true),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, printsetting', 'safe', 'on'=>'search'),
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
//			'table' => array(self::BELONGS_TO, 'Tables', 'tableId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'rest_name' => 'rest_name',
			'address_1' => 'address_1',
			'address_2' => 'address_2',
			'sales_invoice' => 'sales_invoice',
			'footer_1' => 'footer_1',
			'footer_2' => 'footer_2',
			'footer_3' => 'footer_3',
			'printer_ip' => 'printer ip',
			'app_bill' => 'app_bill',
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
		$criteria->compare('printer_ip',$this->printer_ip,true);
		$criteria->compare('app_bill',$this->app_bill);
//		$criteria->compare('status',$this->status);
//		$criteria->compare('time',$this->time,true);

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
