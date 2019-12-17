<?php

/**
 * Author: Amirul Momenin
 * Desc:Chatbot Model
 */
class Chatbot_model extends CI_Model
{
	protected $chatbot = 'chatbot';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get chatbot by id
	 *@param $id - primary key to get record
	 *
     */
    function get_chatbot($id){
        $result = $this->db->get_where('chatbot',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all chatbot
	 *
     */
    function get_all_chatbot(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('chatbot')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit chatbot
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_chatbot($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('chatbot')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count chatbot rows
	 *
     */
	function get_count_chatbot(){
       $result = $this->db->from("chatbot")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new chatbot
	 *@param $params - data set to add record
	 *
     */
    function add_chatbot($params){
        $this->db->insert('chatbot',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update chatbot
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_chatbot($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('chatbot',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete chatbot
	 *@param $id - primary key to delete record
	 *
     */
    function delete_chatbot($id){
        $status = $this->db->delete('chatbot',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
