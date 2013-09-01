<?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */
/* @var $voicemail Voicemail */
/* @var $model VoicemailInfo */

$this->breadcrumbs=array(
	'Voice', 'Voicemail', 'Edit VoicemailInfo'
);
?>
<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'voicemailInfo-editVoicemailInfoShowForm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('//voice/editVoicemailInfoPostForm' , array('voicemailId' => $voicemail->id)),
	'method'=>'post',
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'voicemailId'); ?>
		<?php echo //$form->textField($model,'voicemailId'); 
                           $form->hiddenField($model,'voicemailId'); ?>
		<?php //echo $form->error($model,'voicemailId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'callerName'); ?>
		<?php echo $form->textField($model,'callerName');?>
		<?php echo $form->error($model,'callerName'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'callerDistrict'); ?>
		<?php echo $form->textField($model,'callerDistrict');?>
		<?php echo $form->error($model,'callerDistrict'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->