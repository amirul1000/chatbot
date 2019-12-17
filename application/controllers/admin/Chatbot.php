<?php

 /**
 * Author: Amirul Momenin
 * Desc:Chatbot Controller
 *
 */
class Chatbot extends CI_Controller{
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
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of chatbot table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['chatbot'] = $this->Chatbot_model->get_limit_chatbot($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/chatbot/index');
		$config['total_rows'] = $this->Chatbot_model->get_count_chatbot();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/chatbot/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save chatbot
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'question' => html_escape($this->input->post('question')),
'answer' => html_escape($this->input->post('answer')),
'date_time_created' => html_escape($this->input->post('date_time_created')),
'date_time_updated' => html_escape($this->input->post('date_time_updated')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['chatbot'] = $this->Chatbot_model->get_chatbot($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Chatbot_model->update_chatbot($id,$params);
                redirect('admin/chatbot/index');
            }else{
                $data['_view'] = 'admin/chatbot/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $chatbot_id = $this->Chatbot_model->add_chatbot($params);
                redirect('admin/chatbot/index');
            }else{  
			    $data['chatbot'] = $this->Chatbot_model->get_chatbot(0);
                $data['_view'] = 'admin/chatbot/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details chatbot
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['chatbot'] = $this->Chatbot_model->get_chatbot($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/chatbot/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting chatbot
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $chatbot = $this->Chatbot_model->get_chatbot($id);

        // check if the chatbot exists before trying to delete it
        if(isset($chatbot['id'])){
            $this->Chatbot_model->delete_chatbot($id);
            redirect('admin/chatbot/index');
        }
        else
            show_error('The chatbot you are trying to delete does not exist.');
    }
	
	/**
     * Search chatbot
	 * @param $start - Starting of chatbot table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
$this->db->or_like('question', $key, 'both');
$this->db->or_like('answer', $key, 'both');
$this->db->or_like('date_time_created', $key, 'both');
$this->db->or_like('date_time_updated', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['chatbot'] = $this->db->get('chatbot')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/chatbot/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('question', $key, 'both');
$this->db->or_like('answer', $key, 'both');
$this->db->or_like('date_time_created', $key, 'both');
$this->db->or_like('date_time_updated', $key, 'both');

		$config['total_rows'] = $this->db->from("chatbot")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/chatbot/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export chatbot
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'chatbot_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $chatbotData = $this->Chatbot_model->get_all_chatbot();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Question","Answer","Date Time Created","Date Time Updated"); 
		   fputcsv($file, $header);
		   foreach ($chatbotData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $chatbot = $this->db->get('chatbot')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/chatbot/print_template.php');
			$html = ob_get_clean();
			include(APPPATH."third_party/mpdf60/mpdf.php");					
			$mpdf=new mPDF('','A4'); 
			//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
			//$mpdf->mirrorMargins = true;
		    $mpdf->SetDisplayMode('fullpage');
			//==============================================================
			$mpdf->autoScriptToLang = true;
			$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
			$mpdf->autoVietnamese = true;
			$mpdf->autoArabic = true;
			$mpdf->autoLangToFont = true;
			$mpdf->setAutoBottomMargin = 'stretch';
			$stylesheet = file_get_contents(APPPATH."third_party/mpdf60/lang2fonts.css");
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->WriteHTML($html);
			//$mpdf->AddPage();
			$mpdf->Output($filePath);
			$mpdf->Output();
			//$mpdf->Output( $filePath,'S');
			exit;	
	  }
	   
	}
}
//End of Chatbot controller