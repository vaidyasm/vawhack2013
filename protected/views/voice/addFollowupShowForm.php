<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Followup'
);
?>
<form method="POST" action="<?= Yii::app()->request->baseUrl . '/index.php/voice/addFollowupPostForm/' ?>">
    voicemailId:<input type="text" name="voicemailId" value="<?=$voicemail->id?>" /><br/>
    userId:<input type="text" name="userId" value="" /><br />
    Text: <textarea name="text"></textarea><br />
    <input type="submit" value="Submit" />
    <input type="reset" value="Clear" />
</form>