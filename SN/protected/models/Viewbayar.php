<?php

/**
 * This is the model class for table "viewbayar".
 *
 * The followings are the available columns in table 'viewbayar':
 * @property integer $id_bayar
 * @property integer $id_penghuni
 * @property string $tgl_dibayar
 * @property integer $nilai_bayar
 * @property integer $sisa_bayar
 * @property string $status
 * @property string $tgl_bayar_str
 * @property string $tgl_bayar
 */
class Viewbayar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Viewbayar the static model class
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
		return 'viewbayar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_bayar', 'required'),
			array('id_bayar, id_penghuni, nilai_bayar, sisa_bayar', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>10),
			array('tgl_bayar_str', 'length', 'max'=>69),
			array('tgl_dibayar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bayar, id_penghuni, tgl_dibayar, nilai_bayar, sisa_bayar, status, tgl_bayar_str, tgl_bayar', 'safe', 'on'=>'search'),
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
			'id_bayar' => 'Id Bayar',
			'id_penghuni' => 'Id Penghuni',
			'tgl_dibayar' => 'Tgl Dibayar',
			'nilai_bayar' => 'Nilai Bayar',
			'sisa_bayar' => 'Sisa Bayar',
			'status' => 'Status',
			'tgl_bayar_str' => 'Tgl Bayar Str',
			'tgl_bayar' => 'Tgl Bayar',
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

		$criteria->compare('id_bayar',$this->id_bayar);
		$criteria->compare('id_penghuni',$this->id_penghuni);
		$criteria->compare('tgl_dibayar',$this->tgl_dibayar,true);
		$criteria->compare('nilai_bayar',$this->nilai_bayar);
		$criteria->compare('sisa_bayar',$this->sisa_bayar);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('tgl_bayar_str',$this->tgl_bayar_str,true);
		$criteria->compare('tgl_bayar',$this->tgl_bayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}