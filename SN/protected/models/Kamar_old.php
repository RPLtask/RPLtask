<?php

/**
 * This is the model class for table "kamar".
 *
 * The followings are the available columns in table 'kamar':
 * @property integer $id_kamar
 * @property integer $id_tipe
 * @property integer $id_lokasi
 * @property string $nomor_kamar
 * @property string $img_kamar
 * @property string $ukuran
 * @property integer $tarif
 * @property integer $status_h
 */
class Kamar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kamar the static model class
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
		return 'kamar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kamar', 'required'),
			array('id_kamar, id_tipe,  tarif, status_h', 'numerical', 'integerOnly'=>true),
			array('nomor_kamar, ukuran','id_lokasi', 'length', 'max'=>20),
			array('img_kamar', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_kamar, id_tipe, id_lokasi, nomor_kamar, img_kamar, ukuran, tarif, status_h', 'safe', 'on'=>'search'),
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
		'tipe' => array(self::BELONGS_TO, 'TipeKamar','id_tipe'),
		'lokasi' => array(self::BELONGS_TO, 'LokasiKost','id_lokasi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kamar' => 'Id Kamar',
			'id_tipe' => 'Id Tipe',
			'id_lokasi' => 'Id Lokasi',
			'nomor_kamar' => 'Nomor Kamar',
			'img_kamar' => 'Img Kamar',
			'ukuran' => 'Ukuran',
			'tarif' => 'Tarif',
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

		$criteria->compare('id_kamar',$this->id_kamar);
		$criteria->compare('id_tipe',$this->id_tipe);
		$criteria->compare('id_lokasi',$this->id_lokasi);
		$criteria->compare('nomor_kamar',$this->nomor_kamar,true);
		$criteria->compare('img_kamar',$this->img_kamar,true);
		$criteria->compare('ukuran',$this->ukuran,true);
		$criteria->compare('tarif',$this->tarif);
		$criteria->compare('status_h',$this->status_h);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}