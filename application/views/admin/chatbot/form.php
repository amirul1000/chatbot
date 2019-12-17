<a  href="<?php echo site_url('admin/chatbot/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Chatbot'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/chatbot/save/'.$chatbot['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                        <label for="Question" class="col-md-4 control-label">Question</label> 
          <div class="col-md-8"> 
           <textarea  name="question"  id="question"  class="form-control" rows="4"/><?php echo ($this->input->post('question') ? $this->input->post('question') : $chatbot['question']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Answer" class="col-md-4 control-label">Answer</label> 
          <div class="col-md-8"> 
           <textarea  name="answer"  id="answer"  class="form-control" rows="4"/><?php echo ($this->input->post('answer') ? $this->input->post('answer') : $chatbot['answer']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Date Time Created" class="col-md-4 control-label">Date Time Created</label> 
          <div class="col-md-8"> 
           <input type="text" name="date_time_created"  id="date_time_created"  value="<?php echo ($this->input->post('date_time_created') ? $this->input->post('date_time_created') : $chatbot['date_time_created']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Date Time Updated" class="col-md-4 control-label">Date Time Updated</label> 
          <div class="col-md-8"> 
           <input type="text" name="date_time_updated"  id="date_time_updated"  value="<?php echo ($this->input->post('date_time_updated') ? $this->input->post('date_time_updated') : $chatbot['date_time_updated']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($chatbot['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			