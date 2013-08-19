<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

//$this->layout = 'protected/views/layouts/main_bootstrap.php';
//$this->layout = 'main_bootstrap.php';

$this->breadcrumbs = array(
    'Voice', 'Voicemail',
);
echo "<pre>Selected Voicemail:</pre>";
echo "<pre>Voicemail: {id: " . $voicemail->id . 
        ", callTime: " . $voicemail->callTime . 
        ", callerId: " . $voicemail->callerId . 
        ", vmFileName: " . $voicemail->vmFileName . 
     "}</pre>";

echo "<pre>Voicemail Categories[]:</pre>";
echo "<ul>";
foreach ($voicemail->categories as $category)
{
    echo "<li>" . $category->title . "</li><br />";
}
echo "</ul>";
echo "<pre>Associated Transcription[]:</pre>";
echo "<ul>";
foreach ($voicemail->transcriptions as $transcription)
{
    echo '<li><pre>' .
//    '<a href="' . Yii::app()->request->baseUrl . '/index.php/voice/addTranscription/' . $transcription->id . '">' .
    '{ id: ' . $transcription->id .
    ', voicemailId: ' . $transcription->voicemailId .
    ', userId: ' . $transcription->userId .
    ', callerName: ' . $transcription->callerName .
    ', callerLoc: ' . $transcription->callerLoc .
    ', lang: ' . $transcription->lang .
    ', text: ' . $transcription->text . ' }' .
//    '</a>' .
    '</pre></li>';
}
echo "</ul>";
?>
<a href="<?= Yii::app()->request->baseUrl . '/index.php/voice/addTranscriptionShowForm/voicemailId/' . $voicemail->id ?>">Add a transcription</a>
<?php
echo "<pre>Associated Followups[]:</pre>";

foreach ($voicemail->followups as $followup)
{
    echo '<pre>' .
//    '<a href="' . Yii::app()->request->baseUrl . '/index.php/voice/addTranscription/' . $transcription->id . '">' .
    '{ id: ' . $followup->id .
    ', voicemailId: ' . $transcription->voicemailId .
    ', userId: ' . $transcription->userId .
    ', callerName: ' . $transcription->callerName .
    ', callerLoc: ' . $transcription->callerLoc .
    ', lang: ' . $transcription->lang .
    ', text: ' . $transcription->text . '}' .
//    '</a>' .
    '</pre>';
}
?>
<a href="<?= Yii::app()->request->baseUrl . '/index.php/voice/addFollowupShowForm/voicemailId/' . $voicemail->id ?>">Add a follow-up message</a>
