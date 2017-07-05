<?php

/**
 * This is the model class for table "pelanggan".
 *
 * The followings are the available columns in table 'pelanggan':
 * @property integer $id_pelanggan
 * @property string $nama
 * @property string $tlp
 * @property string $email
 * @property string $no_ktp
 * @property string $tlp_ortu
 * @property string $img_ktp
 * @property string $alamat
 * @property string $tgl_lahir
 * @property string $keterangan
 */
class Pelanggan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pelanggan the static model class
	 */
	 
	public $foto;
	 
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
			array('nama', 'length', 'max'=>30),
			array('tlp, email, no_ktp, tlp_ortu', 'length', 'max'=>50,'min'=>8),
			array('keterangan,alamat', 'length', 'max'=>100),
			array('tgl_lahir', 'safe'),
			array('img_ktp', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pelanggan, nama, tlp, email, no_ktp, tlp_ortu, img_ktp, alamat, tgl_lahir, keterangan', 'safe', 'on'=>'search'),
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
			'penghuni'=>array(self::BELONGS_TO,'Penghuni','id_pelanggan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pelanggan' => 'Id Pelanggan',
			'nama' => 'Nama ',
			'tlp' => 'Telepon',
			'email' => 'Email',
			'no_ktp' => 'No Ktp',
			'tlp_ortu' => 'Telepon Orangtua',
			'img_ktp' => 'Img Ktp',
			'alamat' => 'Alamat',
			'tgl_lahir' => 'Tanggal Lahir',
			'keterangan' => 'Keterangan',
			'foto' => 'Photo',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tlp',$this->tlp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('tlp_ortu',$this->tlp_ortu,true);
		$criteria->compare('img_ktp',$this->img_ktp,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('status_p',$this->status_p,true);
				
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}