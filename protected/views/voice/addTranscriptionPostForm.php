<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Transcription' , 'Save'
);
?>
<?php
    echo ($saveSuccess == TRUE) ? 'Transcription was saved. ' : 'Transcription could not be saved.';
    echo '<pre><ul>' .
    '<li>id: ' . $transcription->id . '</li>' .
    '<li>voicemailId: ' . $transcription->voicemailId . '</li>' .
    '<li>userId: ' . $transcription->userId . '</li>' .
    '<li>edited on: ' . $transcription->editTimestamp . '</li>' .
    '<li>lang: ' . $transcription->lang . '</li>' .
    '<li>text: ' . $transcription->text . '</li>' .
    '</ul></pre>';
?>
