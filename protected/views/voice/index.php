<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Voice', 'Voicemails'
);
?>
<table>
    <?php
    foreach ($voicemails as $voicemail)
    {
        ?><tr><td><?php
                echo '<a href="' . Yii::app()->request->baseUrl . '/index.php/voice/voicemail/' . $voicemail->id . '">' . $voicemail->callTime . ', ' . $voicemail->callerId . "</a>";
                ?></td></tr><?php
    }
    ?>
</table>