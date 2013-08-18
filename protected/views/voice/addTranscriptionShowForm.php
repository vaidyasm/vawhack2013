<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Transcription'
);
?>
<form method="POST" action="<?= Yii::app()->request->baseUrl . '/index.php/voice/addTranscriptionPostForm/' ?>">
    voicemailId:<input type="text" name="voicemailId" value="<?=$voicemail->id?>" /><br/>
    userId:<input type="text" name="userId" value="" /><br />
    Caller Name: <input type ="text" name="callerName" value=""/><br />
    Caller Location: <input type="text" name="callerLoc" value="" /><br />
    Language: <input type="text" name="lang" value="" /><br />
    Text: <textarea name="text"></textarea><br />
    <input type="submit" value="Submit" />
    <input type="reset" value="Clear" />
</form>