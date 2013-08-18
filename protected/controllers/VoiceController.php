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
				'actions'=>array('index', 'voicemail', 
                                    'transcription', 'addTranscriptionShowForm', 'addTranscriptionPostForm'),
				//'users'=>array('admin','voice'),
				'roles'=> array('admin','voice')
			),
			array('deny',
				'roles' => array('sms','org','news','katha')
			),
                        array('deny',  // deny all users
                            'users'=>array('*'),
                        ),
		);
	}

	public function actionIndex()
	{
//		$this->render('index');
            
            $voicemails = Voicemail::model()->findAll();
            $this->render('index', $data = array('voicemails' => $voicemails));
	}
        
        public function actionVoicemail()
	{
            $id = $_GET['id'];
            //$voicemail = Voicemail::model()->with('transcription')->findByPk((int)$id);
            $voicemail = Voicemail::model()->findByPk((int)$id);
            $this->render('voicemail', $data = array('voicemail' => $voicemail));
	}
        
        public function actionTranscription()
	{
            $id = $_GET['id'];
            $transcription = Transcription::model()->findByPk((int)$id);
            $this->render('transcription', $data = array('transcription' => $transcription));
	}
        
        public function actionAddTranscriptionShowForm()
	{
            //$id = $_GET['id'];
            $voicemailId = $_GET['voicemailId'];
            $voicemail = Voicemail::model()->findByPk((int)$voicemailId);
            $this->render('addTranscriptionShowForm', $data = array('voicemail' => $voicemail));
	}
        
        public function actionAddTranscriptionPostForm()
	{
            //$id = $_GET['id'];
//            $voicemailId = $_GET['voicemailId'];
//            $voicemail = Voicemail::model()->findByPk((int)$voicemailId);
            $this->render('addTranscriptionPostForm');
	}
}