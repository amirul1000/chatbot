<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Chatbot'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of chatbot-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Question</th>
<th>Answer</th>
<th>Date Time Created</th>
<th>Date Time Updated</th>

    </tr>
	<?php foreach($chatbot as $c){ ?>
    <tr>
		<td><?php echo $c['question']; ?></td>
<td><?php echo $c['answer']; ?></td>
<td><?php echo $c['date_time_created']; ?></td>
<td><?php echo $c['date_time_updated']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of chatbot//--> 