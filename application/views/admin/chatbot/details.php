<a  href="<?php echo site_url('admin/chatbot/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Chatbot'); ?></h5>
<!--Data display of chatbot with id--> 
<?php
	$c = $chatbot;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Question</td><td><?php echo $c['question']; ?></td></tr>

<tr><td>Answer</td><td><?php echo $c['answer']; ?></td></tr>

<tr><td>Date Time Created</td><td><?php echo $c['date_time_created']; ?></td></tr>

<tr><td>Date Time Updated</td><td><?php echo $c['date_time_updated']; ?></td></tr>


</table>
<!--End of Data display of chatbot with id//--> 