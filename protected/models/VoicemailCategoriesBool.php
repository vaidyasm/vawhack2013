<?php

/**
 * @property array $boolArray
 * @property Voicemail $voicemail
 */
class VoicemailCategoriesBool extends CModel
{
    public $boolArray = null;
    private $voicemail = null;

    public function __construct($voicemail)
    {
        $this->boolArray = array();
        $rootCategory = Category::getRootCategory();
        $this->voicemail = $voicemail;
        if (isset($this->voicemail))
        {
            $voicemailCategories = (isset($this->voicemail->categories) && !is_null($this->voicemail->categories)) ?
                    $this->voicemail->categories : array();
            self::categoriesAsBoolAray($rootCategory, $voicemailCategories, $this->boolArray);
        }
    }

    static function categoriesAsBoolAray($rootCategory, $assignedCategories, &$rval)
    {
        $childCategories = $rootCategory->childCategories;
        foreach ($childCategories as $childCategory)
        {
            $assigned = FALSE;
            foreach ($assignedCategories as $assignedCtegory)
            {
                if ($childCategory->id == $assignedCtegory->id)
                {
                    $assigned = TRUE;
                    break;
                }
            }
            $rval[$childCategory->id] = $assigned;
            //array_push($rval, self::categoriesAsBoolAray($childCategory, $assignedCategories));
            self::categoriesAsBoolAray($childCategory, $assignedCategories, $rval);
        }

        return $rval;
    }

    public static function categoriesAsData($rootCategory, &$rval)
    {
        $childCategories = $rootCategory->childCategories;
        foreach ($childCategories as $childCategory)
        {
            $rval[$childCategory->id] = $childCategory->title;
            self::categoriesAsData($childCategory, $rval);
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
//        // NOTE: you should only define rules for those attributes that
//        // will receive user inputs.
        return array(
//            array('voicemailId, categoryTypeId', 'required'),
//            array('voicemailId, categoryTypeId', 'numerical', 'integerOnly' => true),
//            // The following rule is used by search().
//            // @todo Please remove those attributes that should not be searched.
//            array('id, voicemailId, categoryTypeId', 'safe', 'on' => 'search'),
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
//            'voicemail' => array(self::BELONGS_TO, 'Voicemail', 'voicemailId'),
//            'categoryType' => array(self::BELONGS_TO, 'CategoryType', 'categoryTypeId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
//            'id' => 'Primary Key.',
//            'voicemailId' => 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id)',
//            'categoryTypeId' => 'CONSTRAINT FOREIGN KEY (categoryTypeId) REFERENCES CategoryType(id)',
            'boolArray' => 'Categories',
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

//        $criteria->compare('id', $this->id);
//        $criteria->compare('voicemailId', $this->voicemailId);
//        $criteria->compare('categoryTypeId', $this->categoryTypeId);

        return new CActiveDataProvider($this, array(
//            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Voicemailcategory the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function attributeNames()
    {
        return array('boolArray');
    }

}