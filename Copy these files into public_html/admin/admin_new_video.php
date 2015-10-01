<?

include('connect.php');

$videonum=$_GET['videoID'];
if (isset($videonum)){

?>
<FORM ENCTYPE="multipart/form-data"  METHOD="POST">

<input type="hidden" name="playlist" value="<?echo $videonum;?>">

<br><INPUT TYPE="text" name="title" placeholder="Video Title">

<br>YouTube.com/watch?v=<INPUT TYPE="text" name="youtubeID" style="width: 150px">

<!--<p>Enter any embed code: <br><textarea name="long_text" style="width: auto;">
</textarea></p>-->

<P><INPUT TYPE="submit" name="submitnewvideo" VALUE="Add Video"></FORM>
<?

}

?>