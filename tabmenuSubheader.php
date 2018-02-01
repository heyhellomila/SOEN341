<div class="tab-select" style=" margin:20px;">
    	<ul class="nav nav-tabs">
<?php 
	$tab='';
 if(!isset($_GET['tab'])){
    $tab = 'Post Table.php';
 } else{
    $tab = $_GET['tab'];
 }
//$tab=$_REQUEST['tab'];
if ($tab== 'activetab'){?>
		 <li><b><span>Setup</span></b></li>
	  <?php }else{ ?>
    <li class="tab"><a data-toggle="tab" href="?tab=activetab">Active</a></li>
    <?php } ?>
        <?php if($tab=='newquestiontab'){ ?>
		   <li><b><span>New</span></b></li>
		<?php }else{ ?>
        		<li><a data-toggle="tab" href="?tab=newquestiontab">New</a></li>
		<?php if($tab=='unansweredtab'){ ?>
		 <li><b><span>Unanswered</span></b></li>
		<?php }else{ ?>
        		<li><a data-toggle="tab" href="?tab=unansweredtab">Unanswered</a></li>
    		</ul>
    		<div class="tab-content">
        		<div id="active" class="tab-pane fade in active">
            			<h3>Active</h3>
            			<p>Active Questions go here</p>
        		</div>
        		<div id="new" class="tab-pane fade">
            			<h3>New</h3>
            			<p>New Questions go here</p>
        		</div>
        		<div id="unanswered" class="tab-pane fade">
            			<h3>Unanswered</h3>
            			<p>Unanswered Questions go here</p>
        		</div>
    		</div>
	</div>
require($tab.'.php');
