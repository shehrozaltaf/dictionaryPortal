<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MUser extends CI_Model
{
    function getAllUser()
    {

        $this->db->select('idUser, userName,email');
        $this->db->from('users');
        $this->db->where('users.status', 1);
        $this->db->order_By('idUser', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditUser($idUser)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.idUser', $idUser);
        $query = $this->db->get();
        return $query->result();
    }
}
