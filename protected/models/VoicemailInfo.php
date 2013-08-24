<?php

/**
 * This is the model class for table "voicemailinfo".
 *
 * The followings are the available columns in table 'voicemailinfo':
 * @property integer $id
 * @property integer $voicemailId
 * @property string $callerName
 * @property string $callerDistirict
 * @property string $lastFollowUp
 *
 * The followings are the available model relations:
 * @property Voicemail $voicemail
 */
class VoicemailInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voicemailinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, voicemailId, callerName, callerDistirict', 'required'),
			array('id, voicemailId', 'numerical', 'integerOnly'=>true),
			array('lastFollowUp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, voicemailId, callerName, callerDistirict, lastFollowUp', 'safe', 'on'=>'search'),
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
			'voicemail' => array(self::BELONGS_TO, 'Voicemail', 'voicemailId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'voicemailId' => 'Id of voicemail this record belongs to.',
			'callerName' => 'Name of the caller.',
			'callerDistirict' => 'District of the caller.',
			'lastFollowUp' => 'Timestamp of last followup if any.',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('voicemailId',$this->voicemailId);
		$criteria->compare('callerName',$this->callerName,true);
		$criteria->compare('callerDistirict',$this->callerDistirict,true);
		$criteria->compare('lastFollowUp',$this->lastFollowUp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Voicemailinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
