<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */
/* @var $voicemailInfo VoicemailInfo */

$this->breadcrumbs = array(
    'Voice', 'Voicemail', 'VoicemailInfo', 'Update'
);
?>
<?php
echo ($saveSuccess == TRUE) ? 'VoicemailInfo was updated. ' : 'VoicemailInfo is yet to be updated! Please have patience.';

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

//$voicemailCategories = (isset($voicemail->categories) && !is_null($voicemail->categories)) ? $voicemail->categories : array();
$categoriesAsHTMLListTree = categoriesAsHTMLListTree($rootCategory, $assignedCategories);
?>
<div id="categoryTree" class="filetree treeview-famfamfam"><?= $categoriesAsHTMLListTree ?></div>
<script>
    $(document).ready(function() {
        $("#categoryTree").treeview({
            toggle: function() {
                console.log("%s was toggled.", $(this).find(">span").text());
            }
        });
    });
</script>
