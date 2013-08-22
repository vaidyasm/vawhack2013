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
            array('allow', // allow users to perform 'index' and 'view' actions
                'actions' => array('index', 'voicemail',
                    'transcription', 'addTranscriptionShowForm', 'addTranscriptionPostForm',
                    'addFollowupShowForm', 'addFollowupPostForm'),
                //'users'=>array('admin','voice'),
                'roles' => array('admin', 'voice')
            ),
            array('deny',
                'roles' => array('sms', 'org', 'news', 'katha')
            ),
            array('deny', // deny all users
                'users' => array('*'),
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
        $voicemail = Voicemail::model()->findByPk((int) $id);
        $this->render('voicemail', $data = array('voicemail' => $voicemail));
    }

    public function actionTranscription()
    {
        $id = $_GET['id'];
        $transcription = Transcription::model()->findByPk((int) $id);
        $this->render('transcription', $data = array('transcription' => $transcription));
    }

    public function actionAddTranscriptionShowForm()
    {
        $voicemailId = $_GET['voicemailId'];
        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);
//        $this->render('addTranscriptionShowForm', $data = array('voicemail' => $voicemail));
        $transcription = Transcription::model();
        $transcription->voicemailId = $voicemail->id;
        $this->render('addTranscriptionShowForm', $data = array(
            'voicemail' => $voicemail,
            'model' => $transcription));
    }

    public function actionAddTranscriptionPostForm()
    {
//        $voicemailId = $_GET['voicemailId'];
//        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);
        $this->render('addTranscriptionPostForm');
    }

    public function actionAddFollowupShowForm()
    {
        $voicemailId = $_GET['voicemailId'];
        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);
        $this->render('addFollowupShowForm', $data = array('voicemail' => $voicemail));
    }

    public function actionAddFollowupPostForm()
    {
//        $id = $_GET['id'];
//        $voicemailId = $_GET['voicemailId'];
//        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);
        $this->render('addFollowupPostForm');
    }

}