<?php

/**
 * This is the model class for table "lokasi_kost".
 *
 * The followings are the available columns in table 'lokasi_kost':
 * @property integer $id_lokasi
 * @property string $nama_lokasi
 * @property string $alamat_lokasi
 * @property string $pengurus_kost
 * @property string $keterangan
 * @property string $img_kost
 */
class LokasiKost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LokasiKost the static model class
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
		return 'lokasi_kost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lokasi,nama_lokasi, pengurus_kost, keterangan', 'length', 'max'=>50,'min'=>1),
			array('keterangan', 'length', 'max'=>50),
			array('alamat_lokasi', 'length', 'max'=>300,'allowEmpty'=>false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_lokasi, nama_lokasi, alamat_lokasi, pengurus_kost, keterangan, img_kost', 'safe', 'on'=>'search'),
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
			'alamat_lokasi' => 'Alamat Lokasi',
			'pengurus_kost' => 'Pengurus Kost',
			'keterangan' => 'Keterangan',
			'img_kost' => 'Gambar Kost',
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

		$criteria->compare('id_lokasi',$this->id_lokasi);
		$criteria->compare('nama_lokasi',$this->nama_lokasi,true);
		$criteria->compare('alamat_lokasi',$this->alamat_lokasi,true);
		$criteria->compare('pengurus_kost',$this->pengurus_kost,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('img_kost',$this->img_kost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}