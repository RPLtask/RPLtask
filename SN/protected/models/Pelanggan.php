<?php

/**
 * This is the model class for table "pelanggan".
 *
 * The followings are the available columns in table 'pelanggan':
 * @property integer $id_pelanggan
 * @property string $nama_pelanggan
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kota
 * @property string $tanggal_lahir
 * @property string $username
 */
class Pelanggan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pelanggan the static model class
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
		return 'pelanggan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('nama_pelanggan, username', 'length', 'max'=>50),
			array('jenis_kelamin', 'length', 'max'=>10),
			array('alamat', 'length', 'max'=>60),
			array('kelurahan, kecamatan, kota', 'length', 'max'=>30),
			array('tanggal_lahir', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pelanggan, nama_pelanggan, jenis_kelamin, alamat, kelurahan, kecamatan, kota, tanggal_lahir, username', 'safe', 'on'=>'search'),
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
			'id_pelanggan' => 'Id Pelanggan',
			'nama_pelanggan' => 'Nama Pelanggan',
			'jenis_kelamin' => 'Jenis Kelamin',
			'alamat' => 'Alamat',
			'kelurahan' => 'Kelurahan',
			'kecamatan' => 'Kecamatan',
			'kota' => 'Kota',
			'tanggal_lahir' => 'Tanggal Lahir',
			'username' => 'Username',
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

		$criteria->compare('id_pelanggan',$this->id_pelanggan);
		$criteria->compare('nama_pelanggan',$this->nama_pelanggan,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('kelurahan',$this->kelurahan,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}