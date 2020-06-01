<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mformdata extends CI_Model
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


}
