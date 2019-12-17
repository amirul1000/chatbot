<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Amirul Momenin
 * Desc:Landing Page
 */
class Home extends CI_Controller {
    function __construct(){
			parent::__construct();
			 $this->load->helper('url'); 
			 $this->load->helper('form');
			 $this->load->library('session');
			 $this->load->helper(array('cookie', 'url')); 	
			 $this->load->database(); 
		} 
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index(){    
		$data['_view'] = 'front_homepage';
		$this->load->view('layouts/front/body',$data);
	}
	
}
