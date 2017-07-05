<?php

/**
 * This is the model class for table "pemesanan".
 *
 * The followings are the available columns in table 'pemesanan':
 * @property integer $id_pemesanan
 * @property string $id_pelanggan
 * @property string $id_rute
 * @property string $tgl_pemesanan
 * @property string $no_kursi
 * @property string $waktu_berangkat
 * @property string $waktu_sampai
 * @property string $status
 */
class Pemesanan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pemesanan the static model class
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
		return 'pemesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pelanggan, id_rute, no_kursi, status', 'length', 'max'=>10),
			array('no_kursi', 'required'),
			array('tgl_pemesanan, waktu_berangkat, waktu_sampai', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pemesanan, id_pelanggan, id_rute, tgl_pemesanan, no_kursi, waktu_berangkat, waktu_sampai, status', 'safe', 'on'=>'search'),
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
		'pelanggan'=>array(self::BELONGS_TO,'pelanggan','id_pelanggan'),
		'rute'=>array(self::BELONGS_TO,'rute','id_rute'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pemesanan' => 'Id Pemesanan',
			'id_pelanggan' => 'Id Pelanggan',
			'id_rute' => 'Id Rute',
			'tgl_pemesanan' => 'Tgl Pemesanan',
			'no_kursi' => 'No Kursi',
			'waktu_berangkat' => 'Waktu Berangkat',
			'waktu_sampai' => 'Waktu Sampai',
			'status' => 'Status',
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

		$criteria->compare('id_pemesanan',$this->id_pemesanan);
		$criteria->compare('id_pelanggan',$this->id_pelanggan,true);
		$criteria->compare('id_rute',$this->id_rute,true);
		$criteria->compare('tgl_pemesanan',$this->tgl_pemesanan,true);
		$criteria->compare('no_kursi',$this->no_kursi,true);
//		$criteria->compare('waktu_sampai',$this->waktu_sampai,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}