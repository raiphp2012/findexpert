<?php

class Common extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
   
   public function insert_record($table,$data)
   {
   		try {
				$this->db->insert($table, $data);
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
		catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		}
   }
   
   
    public function insert_record_without_id($table,$data)
   {
   		try {
				$this->db->insert($table, $data);
			}
		catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		}
   }
   
   public function update_record($table,$where,$data)
   {
   		try {

				$this->db->where($where);
				$this->db->update($table, $data); 
			}
		catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		}
   }
   
   public function delete_record($table,$where)
   {
   		try {
				$this->db->where($where);
				$this->db->delete($table); 
			}	
		catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		}	
   }
   
  
   public function select_all_where($table,$where)
   {
   	try
		{
			
			$query = $this->db->get_where($table,$where);
			// if(!$flag)
			return $query->result();
			// else
			// return $query->result_array();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}	
   }
   
   
   
   public function select_scaler_where($table,$where)
   {
   	try
		{
			
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}	
   }
   
  	public function select_all($table,$limit,$start)
	{
		try
		{
			$query = $this->db->get($table,$limit,$start);
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
	}
	
	
	public function select_all_fields($table)
	{
		try
		{
			$query = $this->db->get($table);
			return $query->result();
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
	}
	
	
	public function num_rows($table)
	{
		try
		{
			$num_rows = $this->db->count_all_results($table);
			return $num_rows;
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
	}
	
	public function num_rows_where($table,$where)
	{
		try
		{
			return $this->db->where($where)->count_all_results($table);
		}	
		catch (Exception $exc) 
		{
			$this->exceptionhandler->handle($exc);
		}
	}
	

public function send_push_notification($registrationId,$messsage,$notification_id)
{
define( 'API_ACCESS_KEY', 'AIzaSyDUfBXB0WUofIeMiX2cr28uzBgATBA26Lk' );

        // prep the bundle
        $msg = array
        (
            'body'     => $messsage
         

        );
        $fields = array
        (
            'to'     => $registrationId,
            'notification' => $msg,
			'data' => array("notification_id"=>$notification_id)
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
		//echo "<pre>";print_r($result);exit;
        curl_close( $ch );
}

 }