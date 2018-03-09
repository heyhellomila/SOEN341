 <?php
 include("db.php");

if(isSet($_POST['msg_id']))
{
$id=$_POST['msg_id'];
$com=mysql_query("select * from comments where msg_id_fk='$id' order by com_id");
while($r=mysql_fetch_array($com))
{
$c_id=$r['com_id'];
$comment=$r['comments'];
?>


<div class="comment_ui" >
<div class="comment_text">
<div  class="comment_actual_text"><?php echo $comment; ?></div>
</div>
</div>


<?php } }?>