<?php

class VoiceController extends Controller
{
    private $user;

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->user = Users::model()->findByPk(Yii::app()->user->id);
    }

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
                    'addFollowupShowForm', 'addFollowupPostForm',
                    'editVoicemailInfoShowForm', 'editVoicemailInfoPostForm'),
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
        $voicemail = Voicemail::model()->with('voicemailInfo')->findByPk((int) $id);
        $this->render('voicemail', $data = array('voicemail' => $voicemail));
    }

    public function actionEditVoicemailInfoShowForm()
    {
        $keyName = 'voicemailId';
        $paramVoicemailId = array_key_exists($keyName, $_GET) ?
                $_GET[$keyName] : null;
        $voicemailId = (is_numeric($paramVoicemailId) && $paramVoicemailId > 0) ?
                $paramVoicemailId : null;
        if (is_null($voicemailId))
        {
            echo 'Error: A valid numeric parameter "voicemailId" must be provided!';
        }
        else
        {
            $voicemail = Voicemail::model()->with('voicemailInfo')->findByPk($voicemailId);
            $voicemailInfo = $voicemail->voicemailInfo;
            if (!isset($voicemailInfo) || is_null($voicemailInfo))
            {
                $voicemailInfo = new VoicemailInfo();
                $voicemailInfo->voicemailId = $voicemail->id;
            }
            
            $this->render('editVoicemailInfoShowForm', $data = array(
                'voicemail' => $voicemail,
                'model' => $voicemailInfo,
            ));
        }
    }

    public function actionEditVoicemailInfoPostForm()
    {
        $voicemail = null;
        $voicemailInfo = null;
        $saveSuccess = FALSE;

        
        $keyName = 'voicemailId';
        $paramVoicemailId = array_key_exists($keyName, $_GET) ?
                $_GET[$keyName] : null;
        $voicemailId = (is_numeric($paramVoicemailId) && $paramVoicemailId > 0) ?
                $paramVoicemailId : null;
        if (is_null($voicemailId))
        {
            echo 'Error: Invalid post url! A valid numeric parameter "voicemailId" must be provided!';
        }
        else
        {
            $voicemail = Voicemail::model()->with('voicemailInfo')->findByPk($voicemailId);
            $voicemailInfo = $voicemail->voicemailInfo;
            if (!isset($voicemailInfo) || is_null($voicemailInfo))
            {
                $voicemailInfo = new VoicemailInfo();
                $voicemailInfo->attributes = $_POST['VoicemailInfo'];
                $voicemailInfo->voicemailId = $voicemail->id;
            }
            
            if (isset($_POST['VoicemailInfo']))
            {
                $POST_voicemailInfo = $_POST['VoicemailInfo'];
                $POST_voicemailInfo_AR = new VoicemailInfo();
                $POST_voicemailInfo_AR->attributes = $POST_voicemailInfo;

                $voicemailInfo->callerName = $POST_voicemailInfo_AR->callerName;
                $voicemailInfo->callerDistrict = $POST_voicemailInfo_AR->callerDistrict;

                if ($voicemailInfo->validate())
                {
                    $saveSuccess = $voicemailInfo->save();
                }
            }
        }
        
        $this->render('editVoicemailInfoPostForm', $data = array(
            'voicemailInfo' => $voicemailInfo,
            'saveSuccess' => $saveSuccess,
        ));
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
        $transcription->userId = $this->user->id;
        $this->render('addTranscriptionShowForm', $data = array(
            'voicemail' => $voicemail,
            'model' => $transcription));
    }

    public function actionAddTranscriptionPostForm()
    {
//        $voicemailId = $_GET['voicemailId'];
//        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);

        $transcription = new Transcription();
        $saveSuccess = FALSE;
        if (isset($_POST['Transcription']))
        {
            $transcription->attributes = $_POST['Transcription'];
            if ($transcription->validate())
            {
                $saveSuccess = $transcription->save();
            }
        }

        $this->render('addTranscriptionPostForm', $data = array(
            'transcription' => $transcription,
            'saveSuccess' => $saveSuccess,
        ));
    }

    public function actionAddFollowupShowForm()
    {
        $voicemailId = $_GET['voicemailId'];
        $voicemail = Voicemail::model()->findByPk((int) $voicemailId);
        $followup = Followup::model();
        $followup->voicemailId = $voicemail->id;
        $followup->userId = $this->user->id;
        $this->render('addFollowupShowForm', $data = array(
            'voicemail' => $voicemail,
            'model' => $followup));
    }

    public function actionAddFollowupPostForm()
    {
        $followup = new Followup();
        $saveSuccess = FALSE;
        if (isset($_POST['Followup']))
        {
            $followup->attributes = $_POST['Followup'];
            if ($followup->validate())
            {
                $saveSuccess = $followup->save();
            }
        }

        $this->render('addFollowupPostForm', $data = array(
            'followup' => $followup,
            'saveSuccess' => $saveSuccess,
        ));
    }

}