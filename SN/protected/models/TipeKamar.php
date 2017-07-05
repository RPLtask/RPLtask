<?php

/**
 * This is the model class for table "tipe_kamar".
 *
 * The followings are the available columns in table 'tipe_kamar':
 * @property integer $id_tipe
 * @property string $nama_tipe
 * @property string $fasilitas
 */
class TipeKamar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipeKamar the static model class
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
		return 'tipe_kamar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_tipe, fasilitas', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipe, nama_tipe, fasilitas', 'safe', 'on'=>'search'),
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
			'id_tipe' => 'Id Tipe',
			'nama_tipe' => 'Nama Tipe',
			'fasilitas' => 'Fasilitas',
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

		$criteria->compare('id_tipe',$this->id_tipe);
		$criteria->compare('nama_tipe',$this->nama_tipe,true);
		$criteria->compare('fasilitas',$this->fasilitas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}