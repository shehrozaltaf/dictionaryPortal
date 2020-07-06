<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLogin extends CI_Model
{
    public $Modal;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->Modal = new Custom();
    }

    function validate($user, $pass)
    {
        $this->db->select('idUser,
	username,
	password,
	email,
	idGroup');
        $this->db->from('users');
        $this->db->where('password', $pass);
        $this->db->where('username', $user);
        $this->db->or_where('email', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function ForgetPass($email)
    {
        $this->db->select('idUser,
	username,
	password,
	email,
	idGroup');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function updateUserPassword($idUser, $newPassword)
    {
        $pramArray = array();
        $pramArray['Password'] = $newPassword;
        $result = $this->Modal->Edit($pramArray, 'idUser', $idUser, 'user');
        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }

    function ChkOldPassword($id, $Password)
    {
        $query = "select Password from user where idUser='$id' and Password='$Password'";
        return $this->Modal->selectAll($query);
    }

    function changeUserPassword($idPerson, $newPassword)
    {
        $pramArray = array();
        $pramArray['Password'] = $newPassword;
        $result = $this->Modal->Edit($pramArray, 'idUser', $idPerson, 'user');
        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
}