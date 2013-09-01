<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */
/* @var $voicemailInfo VoicemailInfo */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'VoicemailInfo' , 'Update'
);
?>
<?php
    echo ($saveSuccess == TRUE) ? 'VoicemailInfo was updated. ' : 'VoicemailInfo could not be updated.';
    echo '<pre><ul>' .
    '<li>id: ' . $voicemailInfo->id . '</li>' .
    '<li>voicemailId: ' . $voicemailInfo->voicemailId . '</li>' .
    '<li>callerName: ' . $voicemailInfo->callerName . '</li>' .
    '<li>callerDistrict: ' . $voicemailInfo->callerDistrict . '</li>' .
    '<li>lastFollowUp: ' . $voicemailInfo->lastFollowUp . '</li>' .
    '</ul></pre>';
?>
