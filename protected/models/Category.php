<?php

/**
 * This is the model class for table "categorytype".
 *
 * The followings are the available columns in table 'categorytype':
 * @property integer $id
 * @property integer $parent
 * @property string $title
 * @property string $description
 */
class Category extends CActiveRecord
{

    public static function getRootCategory()
    {
        return Category::model()->with('childCategories')->findByPk(1);
    }

    public static function getAllCategories()
    {
        $rval = array();
        self::categoriesAsArray(self::getRootCategory(), $rval);
        return $rval;
    }

    public static function categoriesAsArray($rootCategory, &$rval)
    {
        $childCategories = $rootCategory->childCategories;
        foreach ($childCategories as $childCategory)
        {
            $rval[$childCategory->id] = $childCategory->title;
            self::categoriesAsArray($childCategory, $rval);
        }
    }

    static function selectedCategoriesAsArray($rootCategory, $selectedCategories, &$rval)
    {
        $childCategories = $rootCategory->childCategories;
        foreach ($childCategories as $childCategory)
        {
            foreach ($selectedCategories as $selectedCategory)
            {
                if ($childCategory->id == $selectedCategory->id)
                {
                    $rval[$childCategory->id] = $childCategory->title;
                    break;
                }
            }
            self::selectedCategoriesAsArray($childCategory, $selectedCategories, $rval);
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent, title, description', 'required'),
            array('parent', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent, title, description', 'safe', 'on' => 'search'),
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
            'parentCategory' => array(self::MANY_MANY, 'Category', 'category(id, parent)'),
            'childCategories' => array(self::MANY_MANY, 'Category', 'category(parent, id)'),
            'voicemails' => array(self::MANY_MANY, 'Voicemail', 'voicemailcategory(voicemailId, categoryId)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Primary key.',
            'parent' => 'Self ref key: category.id',
            'title' => 'Very short name of this type of violence.',
            'description' => 'Brief description about this type of violence.',
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
        $criteria->compare('parent', $this->parent);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categorytype the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}
