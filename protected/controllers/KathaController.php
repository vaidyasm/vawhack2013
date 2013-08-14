<?php 
class KathaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'roles'=>array('admin','katha'),
			),
			array('deny',
				'roles' => array('voice','org','news','sms')
			)
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
}