<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Voice', 'Voicemail', 'Update Voicemail Categories'
);
?>
<?php
echo 
    '<a href="' . 
        Yii::app()->createUrl('//voice/voicemail', 
                array('id' => $voicemailId)) . 
        '">Voicemail</a>\'s associated categories ' . 
                (($updateSuccess == TRUE) 
                ? 'have been updated. ' 
                : ('could not be updated. Please contact website admin.' . 
                    'Save New: ' . (($saveSuccess) ? "OK" : "Failed") . 
                    'Delete Old: ' . (($deleteSuccess) ? "OK" : "Failed")
                    ));

function categoriesAsHTMLListTree($rootCategory, $assignedCategories)
{
    $rval = '<ul>';
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
        $childCategoriesCount = count($childCategory->childCategories);
        $nodeClassName = ($childCategoriesCount > 0) ? "folder" : "file";

        $rval .= '<li>' . '<span class="' . $nodeClassName . '">' . $childCategory->title . '</span>' . (($assigned) ? ' &#x2714;' : '') . '</li>';
        $rval .= categoriesAsHTMLListTree($childCategory, $assignedCategories);
    }
    $rval .= '</ul>';

    return $rval;
}

echo categoriesAsHTMLListTree(Category::getRootCategory(), $assignedCategories);
?>