<?php

/**
 * This is the model class for table "voicemail".
 *
 * The followings are the available columns in table 'voicemail':
 * @property integer $id
 * @property string $callTime
 * @property string $callerId
 * @property string $vmFileName
 *
 * The followings are the available model relations:
 * @property Followup[] $followups
 * @property Transcription[] $transcriptions
 * @property Category[] $categories
 * @property VoicemailCategoriesBool $categoriesBoolean
 * @property VoicemailInfo $voicemailInfo
 */
class Voicemail extends CActiveRecord
{

    public function getCategoriesBoolean()
    {
        $categoriesBool = new VoicemailCategoriesBool($this);
        return $categoriesBool;
    }

    function getSelectedCategoryIds()
    {
        $rval = array();
        
        foreach($this->categories as $category)
        {
            array_push($rval, $category ->id);
        }
        return $rval;
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'voicemail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('callTime, vmFileName', 'required'),
            array('callerId', 'length', 'max' => 64),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, callTime, callerId, vmFileName', 'safe', 'on' => 'search'),
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
            'followups' => array(self::HAS_MANY, 'Followup', 'voicemailId'),
            'transcriptions' => array(self::HAS_MANY, 'Transcription', 'voicemailId'),
            'categories' => array(self::MANY_MANY, 'Category', 'voicemailcategory(voicemailId, categoryId)'),
            'voicemailInfo' => array(self::HAS_ONE, 'VoicemailInfo', 'voicemailId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Primary Key.',
            'callTime' => 'Voicemail received at this timestamp.',
            'callerId' => 'Phone number of the caller.',
            'vmFileName' => 'File name on voice-mail file server.',
            'selectedCategoryIds' => 'Assigned Categories',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('callTime', $this->callTime, true);
        $criteria->compare('callerId', $this->callerId, true);
        $criteria->compare('vmFileName', $this->vmFileName, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Voicemail the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}
