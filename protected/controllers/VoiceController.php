<?php 
class VoiceController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				//'users'=>array('admin','voice'),
				'roles'=> array('admin','voice')
			),
			array('deny',
				'roles' => array('sms','org','news','katha')
			)
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
}