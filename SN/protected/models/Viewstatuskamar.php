<?php

/**
 * This is the model class for table "viewstatuskamar".
 *
 * The followings are the available columns in table 'viewstatuskamar':
 * @property integer $status_angka
 * @property string $status_h
 */
class Viewstatuskamar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Viewstatuskamar the static model class
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
		return 'viewstatuskamar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_angka', 'numerical', 'integerOnly'=>true),
			array('status_h', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status_angka, status_h', 'safe', 'on'=>'search'),
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
			'status_angka' => 'Status Angka',
			'status_h' => 'Status H',
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

		$criteria->compare('status_angka',$this->status_angka);
		$criteria->compare('status_h',$this->status_h,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}