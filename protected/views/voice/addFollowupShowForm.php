<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Add Followup'
);
?>
<!--<form method="POST" action="<?= Yii::app()->request->baseUrl . '/index.php/voice/addFollowupPostForm/' ?>">
    voicemailId:<input type="text" name="voicemailId" value="<?=$voicemail->id?>" /><br/>
    userId:<input type="text" name="userId" value="" /><br />
    Text: <textarea name="text"></textarea><br />
    <input type="submit" value="Submit" />
    <input type="reset" value="Clear" />
</form>-->
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transcription-addTranscriptionShowForm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('//voice/addFollowupPostForm'),
	'method'=>'post',
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'voicemailId'); ?>
		<?php echo $form->textField($model,'voicemailId'); ?>
		<?php echo $form->error($model,'voicemailId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userId'); ?>
		<?php echo $form->textField($model,'userId'); ?>
		<?php echo $form->error($model,'userId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text'); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->