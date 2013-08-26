<!DOCTYPE html><?php
/* @var $this VoiceController */
/* @var $dataProvider CActiveDataProvider */
/* @var $voicemail Voicemail */
/* @var $voicemailInfo VoicemailInfo */
if (!isset($voicemail))
    die("No such voicemail!");
$voicemailInfo = $voicemail->voicemailInfo;
$voicemailInfo = (isset($voicemailInfo)) ? $voicemailInfo : new VoicemailInfo();
?><html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>VawHack</title>
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/responsive-style.css">
        <link rel="stylesheet" href="/assets/css/dropkick.css">
        <script type="text/javascript" src="/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/assets/js/responsive.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.leanModal.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.dropkick-1.0.0.js"></script>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <header class="sticky">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="#"><img src="/assets/images/logo.png" alt="" width="207" height="191"></a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Organizations</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Mero Katha</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="wrapper">
                <div class="top-bar">
                    <div class="admin">
                        Hi <span>Username</span>
                    </div>
                </div>
                <div class="district-wrapper">
                    <div class="district-inner-wrapper">
                        <div class="dashboard-back">
                            <a href="/index.php/voice">Back to dashboard</a>
                        </div>
                        <div class="voice-section">
                            <div class="voice-top-section">
                                <h2>Voice <?=$voicemail->id?></h2>
                                <span class="voice-icons">icons</span>
                            </div>
                            <div class="voice-left-section">
                                <ul>
                                    <li><span class="title">Recorded on</span><?= $voicemail->callTime ?></li>
                                    <li><span class="title">Phone no.</span><?= $voicemail->callerId ?></li>
                                    <li><span class="title">District <?=' <a href="' . Yii::app()->createUrl('//voice/editVoicemailInfoShowForm', array('voicemailId'=>$voicemail->id)) . '">Edit</a></pre>'?></span><?=$voicemailInfo->callerDistrict?></li>
                                    <li><span class="title">Category <?=' <a href="' . Yii::app()->createUrl('//voice/editVoicemailCategoriesShowForm', array('voicemailId' => $voicemail->id)) . '">Edit</a></pre>'?></span><?php
                                        if (isset($voicemail->categories) && count($voicemail->categories) > 0)
                                        {
                                            echo '<ul>';
                                            foreach ($voicemail->categories as $category)
                                            {
                                                echo "<li>" . $category->title . "</li><br />";
                                            }
                                            echo "</ul>";
                                        }
                                        ?></li>
                                </ul>
                            </div>
                            <div class="voice-right-section">
                                <div class="transcription-block">
                                    <h3>Transcription</h3>
                                    <?php
                                    if (isset($voicemail->transcriptions) && count($voicemail->transcriptions) > 0)
                                    {
                                        echo '<ul>';
                                        foreach ($voicemail->transcriptions as $transcription)
                                        {
                                            $user = $transcription->user;
                                            echo '<li><pre><ul>' .
                                            '<li>id: ' . $transcription->id . '</li>' .
                                            '<li>voicemailId: ' . $transcription->voicemailId . '</li>' .
                                            '<li>userId: ' . $transcription->userId . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
                                            '<li>editTimestamp: ' . $transcription->editTimestamp . '</li>' .
                                            '<li>lang: ' . $transcription->lang . '</li>' .
                                            '<li>text: ' . $transcription->text . '</li>' .
                                            '</ul></pre></li>';
                                        }
                                        echo '</ul>';
                                    }
                                    else
                                    {
                                        echo '<p class="none">This is not transcribed yet.</p>';
                                    }
                                    echo '<a href="' . 
                                            Yii::app()->request->baseUrl . 
                                            '/index.php/voice/addTranscriptionShowForm/voicemailId/' . 
                                            $voicemail->id . 
                                            '" class="button">Add a transcription</a>';
                                    ?>
                                </div>
                                <div class="transcription-block">
                                    <h3>Follow up</h3>
                                    <?php
                                    if (isset($voicemail->followups) && count($voicemail->followups) > 0)
                                    {
                                        echo "<ul>";
                                        foreach ($voicemail->followups as $followup)
                                        {
                                            $user = $followup->user;
                                            echo '<li><pre><ul>' .
                                            '<li>id: ' . $followup->id . '</li>' .
                                            '<li>voicemailId: ' . $followup->voicemailId . '</li>' .
                                            '<li>userId: ' . $followup->userId . ' (' . $user->firstName . ' ' . $user->lastName . ' [' . $user->role . ']' . ')' . '</li>' .
                                            '<li>editTimestamp: ' . $followup->editTimestamp . '</li>' .
                                            '<li>text: ' . $followup->text . '</li>' .
                                            '</ul></pre></li>';
                                        }
                                        echo "</ul>";
                                    }
                                    else
                                    {
                                        echo '<p class="none">This is not followed yet.</p>';
                                    }
                                    echo '<a href="' . Yii::app()->request->baseUrl . '/index.php/voice/addFollowupShowForm/voicemailId/' . $voicemail->id . '" class="button">Add followup</a>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/assets/js/script.js"></script>
    </body>
</html>