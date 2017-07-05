<?php

/**
 * This is the model class for table "penghuni".
 *
 * The followings are the available columns in table 'penghuni':
 * @property integer $id_penghuni
 * @property string $id_pelanggan
 * @property string $id_kamar
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $jenis_bayar
 * @property integer $nilai_kontrak
 * @property string $status
 */
class Penghuni extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Penghuni the static model class
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
		return 'penghuni';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nilai_kontrak', 'numerical', 'integerOnly'=>true),
			array('id_pelanggan, jenis_bayar', 'length', 'max'=>20),
			array('id_kamar, status', 'length', 'max'=>10),
			array('tgl_masuk, tgl_keluar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_penghuni, id_pelanggan, id_kamar, tgl_masuk, tgl_keluar, jenis_bayar, nilai_kontrak, status', 'safe', 'on'=>'search'),
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
			'id_kamar' => 'Id Kamar',
			'tgl_masuk' => 'Tgl Masuk',
			'tgl_keluar' => 'Tgl Keluar',
			'jenis_bayar' => 'Jenis Bayar',
			'nilai_kontrak' => 'Nilai Kontrak',
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

		$criteria->compare('id_penghuni',$this->id_penghuni);
		$criteria->compare('id_pelanggan',$this->id_pelanggan,true);
		$criteria->compare('id_kamar',$this->id_kamar,true);
		$criteria->compare('tgl_masuk',$this->tgl_masuk,true);
		$criteria->compare('tgl_keluar',$this->tgl_keluar,true);
		$criteria->compare('jenis_bayar',$this->jenis_bayar,true);
		$criteria->compare('nilai_kontrak',$this->nilai_kontrak);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}