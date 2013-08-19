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
<?php
    $cat = (Category::model()->findByPk(11));
    echo var_dump($cat);
    echo var_dump($cat->parentCategory);
    echo var_dump($cat->childCategory);    
    echo var_dump($cat->voicemails);
?>