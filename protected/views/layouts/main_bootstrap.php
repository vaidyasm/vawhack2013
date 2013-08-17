<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap-responsive.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/jQuery/jquery-2.0.3.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>

        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
			if(Yii::app()->user->isGuest) {
				$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				)
				));
			} else {
				if(Yii::app()->user->roles == 'admin') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Voice', 'url'=>array('/voice/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'SMS', 'url'=>array('/sms/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Org', 'url'=>array('/organization/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'News', 'url'=>array('/news/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Katha', 'url'=>array('/katha/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); 
				} else if (Yii::app()->user->roles == 'voice') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Voice', 'url'=>array('/voice/index')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'))
						),
					)); 
				} else if (Yii::app()->user->roles == 'sms') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'SMS', 'url'=>array('/sms/index')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'))
						),
					)); 
				} else if (Yii::app()->user->roles == 'org') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Org', 'url'=>array('/organization/index')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'))
						),
					));
				} else if (Yii::app()->user->roles == 'news') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'News', 'url'=>array('/news/index')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'))
						),
					));
				} else if (Yii::app()->user->roles == 'katha') {
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Katha', 'url'=>array('/katha/index')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/users/logout'))
						),
					));
				}
			}
	?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
