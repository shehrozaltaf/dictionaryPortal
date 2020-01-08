<?php 
 
 class User_model extends CI_model{
	 
	 function create($formArray){
	
		 $this->db->insert('user',$formArray);
	 }
	 
	 function all(){
	 	return $user = $this->db->get('user')->result_array();
	 
	 }
	 
	 function getuser($userId){
	 	$this->db->where('user_id',$userId);
	 	return $user = $this->db->get('user')->row_array();
	 
	 }
	 
	 function updateuser($userId,$formArray){
	 	$this->db->where('user_id',$userId);
	 	$this->db->update('user', $formArray);
	 }
	 
	 function deleteuser($userId){
	 	$this->db->where('user_id',$userId);
	 	$this->db->delete('user');
	 
	 }
	 
}


?>