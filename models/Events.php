<?php

/**
 * This is the model class for table "{{events}}".
 *
 * The followings are the available columns in table '{{events}}':
 * @property integer $event_id
 * @property string $event_name
 * @property string $start_date
 * @property string $end_date
 * @property string $details
 * @property string $customer
 */
class Events extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{events}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		/*
			//it should be like this in model/customer 
			Yii::import('application.modules.dhtmlCalYii.models.*');

			return array(
			'event'=>array(self::HAS_MANY,'Events','customer'),
			'eventCount'=>array(self::STAT,'Events','customer'),

			);
		*/
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_name, start_date, end_date, details, customer', 'required'),
			array('event_name', 'length', 'max'=>127),
			array('customer', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('event_id, event_name, start_date, end_date, details, customer', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
//		Yii::app()->getModule('Customer');
		return array(
			'customerid'=>array(self::BELONGS_TO,'Customer','customer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_id' => 'Event',
			'event_name' => 'Event Name',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'details' => 'Details',
			'customer' => 'Customer',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('event_name',$this->event_name,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('customer',$this->customer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
