<?php

/**
 * This is the model class for table "transcription".
 *
 * The followings are the available columns in table 'transcription':
 * @property integer $id
 * @property integer $voicemailId
 * @property integer $userId
 * @property string $callerName
 * @property string $callerLoc
 * @property string $lang
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Voicemail $voicemail
 */
class Transcription extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transcription';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voicemailId, userId, callerName, callerLoc, lang, text', 'required'),
			array('voicemailId, userId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, voicemailId, userId, callerName, callerLoc, lang, text', 'safe', 'on'=>'search'),
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
			'id' => 'Primary Key.',
			'voicemailId' => 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id). Indicates the Voicemail which this Transcription is for.',
			'userId' => 'Foreign key: users.id. Indicates the user who created this transcription.',
			'callerName' => 'Full name of the caller. Transcribed by the user.',
			'callerLoc' => 'Location of the caller. Transcribed by user.',
			'lang' => 'Language of this transcription.',
			'text' => 'Transcription text.',
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
		$criteria->compare('userId',$this->userId);
		$criteria->compare('callerName',$this->callerName,true);
		$criteria->compare('callerLoc',$this->callerLoc,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transcription the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
