<?php

/**
 * This is the model class for table "rute".
 *
 * The followings are the available columns in table 'rute':
 * @property string $id_rute
 * @property string $berangkat
 * @property string $tujuan
 * @property string $waktu
 * @property double $harga
 * @property string $kelas
 * @property string $id_bus
 */
class Rute extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rute the static model class
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
		return 'rute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rute, tujuan, id_bus', 'required'),
			array('harga', 'numerical'),
			array('id_rute, id_bus', 'length', 'max'=>10),
			array('berangkat, tujuan', 'length', 'max'=>100),
			array('kelas', 'length', 'max'=>30),
			array('waktu', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rute, berangkat, tujuan, waktu, harga, kelas, id_bus', 'safe', 'on'=>'search'),
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
			'id_rute' => 'Id Rute',
			'berangkat' => 'Berangkat',
			'tujuan' => 'Tujuan',
			'waktu' => 'Waktu',
			'harga' => 'Harga',
			'kelas' => 'Kelas',
			'id_bus' => 'Id Bus',
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

		$criteria->compare('id_rute',$this->id_rute,true);
		$criteria->compare('berangkat',$this->berangkat,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('id_bus',$this->id_bus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}