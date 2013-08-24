<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
/* @var $followup Followup */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Followup' , 'Save'
);
?>
<?php
    $user = $followup->user;
    echo ($saveSuccess == TRUE) ? 'Followup was saved. ' : 'Followup could not be saved.';
    echo '<pre><ul>' .
    '<li>id: ' . $followup->id . '</li>' .
    '<li>voicemailId: ' . $followup->voicemailId . '</li>' .
    '<li>userId: ' . $followup->userId . '</li>' . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
    '<li>edited on: ' . $followup->editTimestamp . '</li>' .
    '<li>text: ' . $followup->text . '</li>' .
    '</ul></pre>';
?>