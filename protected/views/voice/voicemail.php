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

echo '<pre>Additional Info:</pre>';
$voicemailInfo = $voicemail->voicemailInfo;
if (is_null($voicemailInfo))
    echo "<pre>No additional info.</pre>";
else
{
     echo "<pre>VoicemailInfo: {id: " . $voicemailInfo->id . 
        ", Caller Name: " . $voicemailInfo->callerName . 
        ", Caller District: " . $voicemailInfo->callerDistrict . 
        ", Last Follow up on: " . $voicemailInfo->lastFollowUp . 
     "}</pre>";
}
echo ' <a href="' . Yii::app()->createUrl('//voice/editVoicemailInfoShowForm', array('voicemailId'=>$voicemail->id)) . '">Edit</a>';
echo '<pre>Voicemail Categories[]:</pre>';
echo '<ul>';
foreach ($voicemail->categories as $category)
{
    echo "<li>" . $category->title . "</li><br />";
}
echo "</ul>";
echo "<pre>Associated Transcription[]:</pre>";
echo "<ul>";
foreach ($voicemail->transcriptions as $transcription)
{
    $user = $transcription->user;
    echo '<li><pre><ul>' .
    '<li>id: ' . $transcription->id . '</li>' .
    '<li>voicemailId: ' . $transcription->voicemailId . '</li>' .
    '<li>userId: ' . $transcription->userId . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
    '<li>editTimestamp: ' . $transcription->editTimestamp . '</li>' .
    '<li>lang: ' . $transcription->lang . '</li>' .
    '<li>text: ' . $transcription->text . '</li>' .
    '</ul></pre></li>';
}
echo "</ul>";
?>
<a href="<?= Yii::app()->request->baseUrl . '/index.php/voice/addTranscriptionShowForm/voicemailId/' . $voicemail->id ?>">Add a transcription</a>
<?php
echo "<pre>Associated Followups[]:</pre>";
echo "<ul>";
foreach ($voicemail->followups as $followup)
{
    $user = $followup->user;
    echo '<li><pre><ul>' .
    '<li>id: ' . $followup->id . '</li>' .
    '<li>voicemailId: ' . $followup->voicemailId . '</li>' .
    '<li>userId: ' . $followup->userId . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
    '<li>editTimestamp: ' . $followup->editTimestamp . '</li>' .
    '<li>text: ' . $followup->text . '</li>' .
    '</ul></pre></li>';
}
echo "</ul>";
?>
<a href="<?= Yii::app()->request->baseUrl . '/index.php/voice/addFollowupShowForm/voicemailId/' . $voicemail->id ?>">Add a follow-up message</a>
