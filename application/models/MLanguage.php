<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLanguage extends CI_Model
{
    function getAllLanguage()
    {

        $this->db->select('language.idLanguage, language.languageName');
        $this->db->from('language');
        $this->db->where('language.isActive', 1);
        $this->db->order_By('idLanguage', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditLanguage($idLanguage)
    {
        $this->db->select('*');
        $this->db->from('language');
        $this->db->where('language.idLanguage', $idLanguage);
        $query = $this->db->get();
        return $query->result();
    }
}
