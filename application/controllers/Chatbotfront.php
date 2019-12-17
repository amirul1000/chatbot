<?php

 /**
 * Author: Amirul Momenin
 * Desc:Chatbot Controller
 *
 */
class Chatbotfront extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Chatbot_model');
    } 
	
	/*
	* get_chat_data
	*/
	function get_chat_data()
	{
		$msg = strtolower(trim($this->input->post('msg')));
	
		$arrInput = explode(" ",$msg);
		//debug($arrInput);
		 
		$this->db->order_by('id', 'desc');
		$arr = $this->Chatbot_model->get_all_chatbot();
		
		$arrCount = array();
		
		
		for($i=0;$i<count($arr);$i++)
		{							
			$question =  strtolower($arr[$i]['question']);
			$arrQuestion = explode(" ",$question);
			$arrCount[$i]=0;
			//debug($arrQuestion);
			for($j=0;$j<count($arrInput);$j++)
			{
			  for($k=0;$k<count($arrQuestion);$k++)
			  {
				if($arrInput[$j]==$arrQuestion[$k])
				{
					$arrCount[$i]=$arrCount[$i]+1;
				}
			  }
			}	
			//$answer   = strtolower($arr[$i]['answer']);
		}
		//debug($arrCount);
		
		if(array_sum($arrCount)==0)
		{
		  echo "Sorry I can't recognize you.Please provide a bit more details"; 
		  exit;	
		}
		else
		{
			$max = $arrCount[0];
			$indicate = 0;
			for($i=1;$i<count($arrCount);$i++)
			{
				if($arrCount[$i]>$max)
				{
					$max = $arrCount[$i];
					$indicate = $i;
				}
			}
			echo $arr[$indicate]['answer'];
			exit;
		}
	}
	
}
//End of Chatbot controller