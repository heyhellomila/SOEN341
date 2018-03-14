	<div id="menu">
	<ul>
		<li>
			<a href="#" style="padding:10px 0;">
			<img src="images.png" style="width: 21px;" />
			<?php
			include("MySQLrequest.php");
				$sql=mysql_query("select * from comments");
				$comment_count=mysql_num_rows($sql);
				if($comment_count!=0)
				{
				echo '<span id="mes">'.$comment_count.'</span>';
				}
			?>
			</a>
		<ul class="sub-menu">
		
			<?php
			
			$msql=mysql_query("select * from messages order by msg_id desc");
			while($messagecount=mysql_fetch_array($msql))
			$id=$messagecount['msg_id'];
			$msgcontent=$messagecount['message'];
			?>
			<li class="egg">
			<div class="toppointer"><img src="top.png" /></div>
				<?php 

				$sql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id");
				$comment_count=mysql_num_rows($sql);

				if($comment_count>2)
				{
				$second_count=$comment_count-2;
				} 
				else 
				{
				$second_count=0;
				}
				?>

				<div id="view_comments<?php echo $id; ?>"></div>

				<div id="two_comments<?php echo $id; ?>">
				<?php
				$listsql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id limit $second_count,2 ");
				while($rowsmall=mysql_fetch_array($listsql))
				{ 
				$c_id=$rowsmall['com_id'];
				$comment=$rowsmall['comments'];
				?>

				<div class="comment_ui">

				<div class="comment_text">
				<div  class="comment_actual_text"><?php echo $comment; ?></div>
				</div>

				</div>
				
				<div class="bbbbbbb" id="view<?php echo $id; ?>">
					<div style="background-color: #F7F7F7; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; position: relative; z-index: 100; padding:8px; cursor:pointer;">
					<a href="#" class="view_comments" id="<?php echo $id; ?>">View all <?php echo $comment_count; ?> comments</a>
					</div>
				</div>
			</li>
		</ul>
		</li>
	</ul>
</div>