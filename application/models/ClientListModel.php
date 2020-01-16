<?php
class ClientListModel extends CI_Model
{
	public function client_list()
	{
		$sql="SELECT client_personal_details.`clientId`,client_personal_details.`clientName`,client_personal_details.`clientEmailId`,client_personal_details.`clientMobileNumber`,GROUP_CONCAT(distinct services.`serviceName`) as `serviceName`  
	    FROM  `client_personal_details`  left join servicemaping on client_personal_details.clientId=servicemaping.clientId
        left join services on services.serviceId=servicemaping.serviceId "; 
		if($this->session->userdata('parent_id')==0){
		$sql.="WHERE client_personal_details.`expertId`=?";	
		$sql.="group by client_personal_details.`clientId`";
		$expert_id = $this->session->userdata('expertId');
		$query =$this->db->query($sql,array($expert_id));	
			
		}
		else if($this->session->userdata('parent_id')!=0){
		$expert_id = $this->session->userdata('expertId');
		$sql.="join services_details on services_details.client_id=client_personal_details.`clientId`";	
		$sql.="WHERE client_personal_details.`expertId`=? and services_details.assign_member=?";		
		$sql.="group by client_personal_details.`clientId`";
		$parent_id = $this->session->userdata('parent_id');
		$query =$this->db->query($sql,array($parent_id ,$expert_id));	
		}
		
		
	
    
	return $query->result();

	}

	function getServiceslist()
	{
	   $this->db->select('*');
       $this->db->from('services');
		$query = $this->db->get();
		return $query->result();
	}

	function getClientList($expertId)
	{
		
		$q = $this->db->select('clientId,clientName')
				->where('expertId', $expertId)
				->get('client_personal_details');
				return $q->result();


	}
	function get_stuff_personal_details($expertId)
	{
		
		$q = $this->db->select('*')
				->where('expert_id', $expertId)
				->get('office_staff');
				return $q->result();


	}
	function getTeamMemberList($expertId)
	{
		$this->db->select('expertId,expertName');
		$this->db->where('parent_id',$expertId);
		$query=$this->db->get('expert_personal_details');
		return $query->result();

	}


	public function client_delete($clientId)
	{

		return $this->db->delete('client_personal_details',['clientId'=>$clientId]);
	}
	
	public function client_edit($clientId)
	{
		$q = $this->db->select('*')
		->where('clientId', $clientId)
				->get('client_personal_details');

				return $q->row();

	}

	public function update_client($clientId, Array $clientEdit)
	{
		
				
				
				for ($i=0; $i<count($clientEdit['ServicesList']); $i++) { 
                echo  $clientEdit['ServicesList'][$i];
                $data['clientId']=$clientId;
                $data['date']=date('Y-m-d');
                $data['expertId']=$this->session->userdata('expertId');
                $data['serviceId']=$clientEdit['ServicesList'][$i];
                $this->db->insert('servicemaping', $data);
                
            }
            return $this->db->where('clientId', $clientId)->update('client_personal_details', ['clientName'=>$clientEdit['clientName'],'clientEmailId'=>$clientEdit['clientEmailId'],'clientMobileNumber'=>$clientEdit['clientMobileNumber']]);






	}

	public function update_client_service($clientId, Array $clientEditService)
	{
		return $this->db
		       ->where(['clientId'=> $clientId,'expertId'=>$this->session->userdata('expertId')])
		       ->update('servicemaping', $clientEditService);
	}

	public function getSelectedServices($clientId)
	{
		$query=$this->db->select('serviceId')
		->where(['clientId'=> $clientId,'expertId'=>$this->session->userdata('expertId')])
		->get('servicemaping');
		return $query->result_array();
		


	}

	public function servicesTaken($clientId)
	{
		$this->db->select('services.serviceName');
		$this->db->from('services');
		$this->db->join('servicemaping', 'servicemaping.serviceId = services.serviceId');
		$this->db->join('client_personal_details', 'client_personal_details.clientId = servicemaping.clientId');
		$this->db->where(['client_personal_details.clientId'=> $clientId,'servicemaping.expertId'=>$this->session->userdata('expertId')]);
		$query = $this->db->get(); 
        print_r($query->result());
  
	}
	function saveServicesRequetNumber($data)
	{
		

		$query = $this->db->get_where('services_details', array(
            'assign_member' =>  $data['assign_member'],
  			'SRN'=>$data['SRN'],
  			'client_id'=>$data['client_id']           
        ));

        $count = $query->num_rows();
        if($count==0){
        	 $this->db->insert('services_details', $data);
        }

		return TRUE;
	}

	function apply_for_leave($data){
		$this->db->insert('leave_details', $data);
		return TRUE;
	}

	
	function save_office_stuff_details($data)
	{
		
		$this->db->insert('office_staff', $data);
		return TRUE;
	}
	public function get_particular_stuff_details($stuff_id)
	{
		
		$query=$this->db->select('*')
		->where(['stuff_id'=> $stuff_id])
		->get('office_staff');
		return $query->row();
		
	}
	function update_particular_stuff_details($stuff_id,$data){
	
		$this->db->where('stuff_id',$stuff_id);
		$this->db->update('office_staff',$data);
		return TRUE;	
	}



	function getServicesDetails()
	{
	
    $sql="SELECT client_personal_details.`clientId`,services_details.srn_id,client_personal_details.`clientName`, services.serviceName,expert_personal_details.expertName,status.statusName,create_mode.modeName,services_details.created_date,services_details.modified_date 
FROM `services_details` join client_personal_details on services_details.client_id=client_personal_details.`clientId`
 join services on services.serviceId=services_details.SRN 
join expert_personal_details on expert_personal_details.expertId=services_details.assign_member
join status on status.status_id=services_details.status_id
join create_mode on create_mode.mode_id=services_details.mode_id
  where client_personal_details.`expertId`=?";
  
 if($this->session->userdata('parent_id')!=0){
	 $sql.="and services_details.assign_member=?";
	$parent_id=$this->session->userdata('parent_id');
	$expertId=$this->session->userdata('expertId');
	$query=$this->db->query($sql,array($parent_id,$expertId));
}
 else if($this->session->userdata('parent_id')==0){
	$expertId=$this->session->userdata('expertId');	
	$query=$this->db->query($sql,array($expertId));
}
  
       
       return $query->result();
	}
	
	function getServiceRequestDetails($srnid)
	{
		$sql="SELECT client_personal_details.clientId,client_personal_details.clientName,expert_personal_details.expertName,services.serviceName,create_mode.modeName,status.statusName,
services_details.*		
FROM services_details 
join services on services.serviceId=services_details.SRN
join client_personal_details on  
client_personal_details.clientId=services_details.client_id
join create_mode on create_mode.mode_id=services_details.mode_id
join status on status.status_id=services_details.status_id
join expert_personal_details on expert_personal_details.expertId=services_details.assign_member
WHERE  services_details.`srn_id`=?";
	$query=$this->db->query($sql,array($srnid));
       return $query->row();
	}
	function getStatusList(){

	   $this->db->select('*');
       $this->db->from('status');
		$query = $this->db->get();
		return $query->result();
	

	}
	function get_user_time_off_details($expertId)
	{
		if($this->session->userdata('parent_id')==0){
			$arr=array('expert_personal_details.parent_id'=>$expertId);
		}
		else if($this->session->userdata('parent_id')!=0)
		{
			$arr=array('expert_personal_details.parent_id'=>$this->session->userdata('parent_id'));
		}	
		
		$q = $this->db->select('*')
				->where($arr)
				->join('expert_personal_details', 'expert_personal_details.expertId = leave_details.stuff_id', 'left')
				->get('leave_details');
			//echo $this->db->last_query();
			//exit();	
				return $q->result();

	}
	function get_particular_stuff_leave_details($leave_id){
		
		$query=$this->db->select('*')
		->where(['leave_id'=> $leave_id])
		->join('expert_personal_details', 'expert_personal_details.expertId = leave_details.stuff_id', 'left')
		->get('leave_details');
		return $query->row();

	}
	function update_particular_stuff_off_time_details($leave_id,$data){
	
		$this->db->where('leave_id',$leave_id);
		$this->db->update('leave_details', $data);
		return TRUE;	
	}
	function save_reminder_details($data)
	{
	 $officeautomation=$this->load->database('officeautomation',TRUE);
	 $officeautomation->insert('reminder', $data);
		return TRUE;

	}
	function fetch_reminder_details($expertId){
		
		$query=$this->db->select('*')
		->where(['expert_id'=> $expertId])	
		->get('reminder');
		return $query->result();

	}
	function fetch_reminder_detailsby_id($id){
		
		$query=$this->db->select('*')
		->where(['reminder_id'=> $id])	
		->get('reminder');
		return $query->row();

	}
	function update_reminder_details($data,$reminder_id){
		
		$this->db->where('reminder_id',$reminder_id);
		$this->db->update('reminder', $data);
		return TRUE;

	}
	function update_worked_status($data,$srn_id){	
		$this->db->where('srn_id',$srn_id);
		$this->db->update('services_details', $data);
		return TRUE;

	}
	 function getNoteDetails($expertId,$clientId)
    {
       
        $con="(expertId ='$expertId' and shared=1 and clientId='$clientId' ) or (owner ='Expert-$expertId'  and clientId='$clientId' ) ";
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->where($con);
        $this->db->order_by("chat_id", "DESC");
        //echo $this->db->last_query();
        //exit();
         $appointmentDataNotes = $this->db->get();
        
        if ($appointmentDataNotes->num_rows()) {
            return $appointmentDataNotes->result();
        } else {
            return $appointmentDataNotes='No Note Available';
        }



    }

	

}
