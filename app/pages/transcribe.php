<?php
    if(isset($_GET['audio_id'])){
        $audio_id = $_GET['audio_id'];
    }
    
    if($audio_id){
        //$audio_file_query
        $path=realpath("/nfsshare/audiofiles/msg0000.wav");
?>
<audio src ="<?php echo $path; ?>" controls></audio>
<br />
<div id="information_input_form">
    <form action="http://vawhackdevel.com?page=fill_up_form" method="post">
        Name: <input type="text" name="name"><br />
        Address: <input type="text" name="address"><br />
        Language: <input type="text" name="language"><br />
        Information: <textarea name="information"></textarea>
        <input type="hidden" name="audio_id" value="<?= $audio_id ?>">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<?php
    }
    else{
?>  
        Audio Id is not provided.
<?php
    }
?>