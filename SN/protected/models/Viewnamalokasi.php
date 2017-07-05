<?php

/**
 * This is the model class for table "viewnamalokasi".
 *
 * The followings are the available columns in table 'viewnamalokasi':
 * @property string $id_lokasi
 * @property string $nama_lokasi
 */
class Viewnamalokasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Viewnamalokasi the static model class
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
		return 'viewnamalokasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lokasi', 'length', 'max'=>10),
			array('nama_lokasi', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_lokasi, nama_lokasi', 'safe', 'on'=>'search'),
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
			'id_lokasi' => 'Id Lokasi',
			'nama_lokasi' => 'Nama Lokasi',
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

		$criteria->compare('id_lokasi',$this->id_lokasi,true);
		$criteria->compare('nama_lokasi',$this->nama_lokasi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}