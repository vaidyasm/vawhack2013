<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

// $this->layout = 'protected/views/layouts/main_bootstrap.php';
// $this->layout = 'main_bootstrap.php';

$this->breadcrumbs=array(
	'Voice',
);
echo "Your Voice, Our Support";
	$this->widget('bootstrap.widgets.TbMenu', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'stacked'=>false, // whether this is a stacked menu
	    'items'=>array(
	        array('label'=>'Home', 'url'=>'#', 'active'=>true),
	        array('label'=>'Transcription', 'url'=>'transcription/create'),
	        array('label'=>'FollowUps', 'url'=>'#'),
	        array('label'=>'About', 'url'=>'#'),
	        array('label'=>'Contact', 'url'=>'#'),
	    ),
	));

?>
