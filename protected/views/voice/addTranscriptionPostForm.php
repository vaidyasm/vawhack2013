<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Transcription' , 'Save'
);
?>
<?php
    $user = $transcription->user;
    echo ($saveSuccess == TRUE) ? 'Transcription was saved. ' : 'Transcription could not be saved.';
    echo '<pre><ul>' .
    '<li>id: ' . $transcription->id . '</li>' .
    '<li>voicemailId: ' . $transcription->voicemailId . '</li>' .
    '<li>userId: ' . $transcription->userId . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
    '<li>edited on: ' . $transcription->editTimestamp . '</li>' .
    '<li>lang: ' . $transcription->lang . '</li>' .
    '<li>text: ' . $transcription->text . '</li>' .
    '</ul></pre>';
?>
