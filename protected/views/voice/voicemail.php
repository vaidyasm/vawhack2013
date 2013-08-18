<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

//$this->layout = 'protected/views/layouts/main_bootstrap.php';
//$this->layout = 'main_bootstrap.php';

$this->breadcrumbs = array(
    'Voice', 'Voicemail',
);
echo "<pre>Selected Voicemail:</pre>";
echo "<pre>Voicemail: {id: " . $voicemail->id . ", callTime: " . $voicemail->callTime . ", callerId: " . $voicemail->callerId . "}</pre>";
echo "<pre>Associated Transcription[]:</pre>";
?>
<a href="<?= Yii::app()->request->baseUrl . '/index.php/voice/addTranscription/voicemailId/' . $voicemail->id ?>">Add Transcription</a>
<?php
foreach ($voicemail->transcriptions as $transcription)
{
    echo '<pre>' .
    '<a href="' . Yii::app()->request->baseUrl . '/index.php/voice/transcription/' . $transcription->id . '">' .
    '{ id: ' . $transcription->id .
    ', voicemailId: ' . $transcription->voicemailId .
    ', userId: ' . $transcription->userId .
    ', callerName: ' . $transcription->callerName .
    ', callerLoc: ' . $transcription->callerLoc .
    ', lang: ' . $transcription->lang .
    ', text: ' . $transcription->text . '}' .
    '</a></pre>';
}
?>