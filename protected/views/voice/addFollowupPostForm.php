<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
/* @var $followup Followup */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Followup' , 'Save'
);
?>
<?php
    echo ($saveSuccess == TRUE) ? 'Followup was saved. ' : 'Followup could not be saved.';
    echo '<pre><ul>' .
    '<li>id: ' . $followup->id . '</li>' .
    '<li>voicemailId: ' . $followup->voicemailId . '</li>' .
    '<li>userId: ' . $followup->userId . '</li>' .
    '<li>edited on: ' . $followup->editTimestamp . '</li>' .
    '<li>text: ' . $followup->text . '</li>' .
    '</ul></pre>';
?>