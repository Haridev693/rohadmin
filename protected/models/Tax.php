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
class Tax extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tax';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gst_no', 'required'),
			array('gst_no', 'length', 'max'=>255),
			array('tax, status', 'numerical', 'integerOnly'=>true),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tax, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'tax' => 'Tax',
			'gst_no' => 'gst_no',
			'status' => 'Status',
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
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('gst_no',$this->gst_no,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('time',$this->time,true);

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
