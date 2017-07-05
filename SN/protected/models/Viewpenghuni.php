<?php

/**
 * This is the model class for table "viewpenghuni".
 *
 * The followings are the available columns in table 'viewpenghuni':
 * @property integer $id_penghuni
 * @property integer $id_pelanggan
 * @property string $nama
 * @property string $nama_lokasi
 * @property string $nomor_kamar
 * @property string $nama_tipe
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $jenis_bayar
 * @property integer $nilai_kontrak
 */
class Viewpenghuni extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Viewpenghuni the static model class
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
		return 'viewpenghuni';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('id_penghuni, id_pelanggan, nilai_kontrak', 'numerical', 'integerOnly'=>true),
			array('nama, nama_lokasi', 'length', 'max'=>50),
			array('nomor_kamar, nama_tipe, jenis_bayar', 'length', 'max'=>20),
			array('tgl_masuk, tgl_keluar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_penghuni, id_pelanggan, nama, nama_lokasi, nomor_kamar, nama_tipe, tgl_masuk, tgl_keluar, jenis_bayar, nilai_kontrak', 'safe', 'on'=>'search'),
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
			'id_penghuni' => 'Id Penghuni',
			'id_pelanggan' => 'Id Pelanggan',
			'nama' => 'Nama',
			'nama_lokasi' => 'Nama Lokasi',
			'nomor_kamar' => 'Nomor Kamar',
			'nama_tipe' => 'Nama Tipe',
			'tgl_masuk' => 'Tgl Masuk',
			'tgl_keluar' => 'Tgl Keluar',
			'jenis_bayar' => 'Jenis Bayar',
			'nilai_kontrak' => 'Nilai Kontrak',
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

		$criteria->compare('id_penghuni',$this->id_penghuni);
		$criteria->compare('id_pelanggan',$this->id_pelanggan);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nama_lokasi',$this->nama_lokasi,true);
		$criteria->compare('nomor_kamar',$this->nomor_kamar,true);
		$criteria->compare('nama_tipe',$this->nama_tipe,true);
		$criteria->compare('tgl_masuk',$this->tgl_masuk,true);
		$criteria->compare('tgl_keluar',$this->tgl_keluar,true);
		$criteria->compare('jenis_bayar',$this->jenis_bayar,true);
		$criteria->compare('nilai_kontrak',$this->nilai_kontrak);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}