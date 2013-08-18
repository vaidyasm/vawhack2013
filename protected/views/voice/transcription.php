<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Voice', 'Voicemail', 'Transcriptions'
);
echo "<pre>Selected Voicemail:</pre>";
echo "<pre>Voicemail: {id: " . $voicemail->id . ", callTime: " . $voicemail->callTime . ", callerId: " . $voicemail->callerId . "}</pre>";
echo "<pre>Add Transcription:</pre>";
?>
<form method="POST" action="<?= Yii::app()->request->baseUrl . '/index.php/voice/addTranscription/' ?>"></form>