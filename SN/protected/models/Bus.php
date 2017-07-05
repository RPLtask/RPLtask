<?php

/**
 * This is the model class for table "bus".
 *
 * The followings are the available columns in table 'bus':
 * @property string $id_bus
 * @property string $nama_bus
 * @property string $jumlah_kursi
 * @property string $id_kategori
 */
class Bus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bus the static model class
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
		return 'bus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bus', 'required'),
			array('id_bus, jumlah_kursi, id_kategori', 'length', 'max'=>10),
			array('nama_bus', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bus, nama_bus, jumlah_kursi, id_kategori', 'safe', 'on'=>'search'),
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
			'id_bus' => 'Id Bus',
			'nama_bus' => 'Nama Bus',
			'jumlah_kursi' => 'Jumlah Kursi',
			'id_kategori' => 'Id Kategori',
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

		$criteria->compare('id_bus',$this->id_bus,true);
		$criteria->compare('nama_bus',$this->nama_bus,true);
		$criteria->compare('jumlah_kursi',$this->jumlah_kursi,true);
		$criteria->compare('id_kategori',$this->id_kategori,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}