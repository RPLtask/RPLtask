<?php

/**
 * This is the model class for table "notifikasi".
 *
 * The followings are the available columns in table 'notifikasi':
 * @property integer $id_notifikasi
 * @property integer $id_penghuni
 * @property string $tgl_notifikasi
 * @property integer $total_tagihan
 * @property integer $periode_tagihan
 * @property string $status
 */
class Notifikasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Notifikasi the static model class
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
		return 'notifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_penghuni, total_tagihan, periode_tagihan', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>10),
			array('tgl_notifikasi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_notifikasi, id_penghuni, tgl_notifikasi, total_tagihan, periode_tagihan, status', 'safe', 'on'=>'search'),
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
			'id_notifikasi' => 'Id Notifikasi',
			'id_penghuni' => 'Id Penghuni',
			'tgl_notifikasi' => 'Tgl Notifikasi',
			'total_tagihan' => 'Total Tagihan',
			'periode_tagihan' => 'Periode Tagihan',
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

		$criteria->compare('id_notifikasi',$this->id_notifikasi);
		$criteria->compare('id_penghuni',$this->id_penghuni);
		$criteria->compare('tgl_notifikasi',$this->tgl_notifikasi,true);
		$criteria->compare('total_tagihan',$this->total_tagihan);
		$criteria->compare('periode_tagihan',$this->periode_tagihan);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}