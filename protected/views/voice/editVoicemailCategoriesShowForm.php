<!--<html>
    <head>
        <script type="text/javascript" src="/assets/jQuery/jquery-2.0.3.min.js"></script>
        <script src="/assets/jQuery/jquery.cookie.js" type="text/javascript"></script>
        <script src="/assets/jQuery/jquery.treeview.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/assets/jQuery/jquery.treeview.css" />
    </head>
    <body>-->
<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */
/* @var $voicemail Voicemail */

$this->breadcrumbs = array(
    'Voice', 'Voicemail', 'Edit VoicemailCategories'
);
?>
<div class="form">
    <?php
    $model = $voicemail->categoriesBoolean;
    $data = array();
    VoicemailCategoriesBool::categoriesAsData($rootCategory, $data);
//            var_dump($model);
//            var_dump($data);

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'voicemailInfo-editVoicemailInfoShowForm-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => false,
        'action' => Yii::app()->createUrl('//voice/editVoicemailCategoriesPostForm', array('voicemailId' => $voicemail->id)),
        'method' => 'post',
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'boolArray'); ?>
        <?php echo $form->checkBoxList($model, 'boolArray', $data); ?>
        <?php echo $form->error($model, 'boolArray'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Save'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<!--    </body>
</html>-->