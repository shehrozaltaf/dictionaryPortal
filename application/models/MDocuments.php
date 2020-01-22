<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MDocuments extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getProjectDocuments($idProject)
    {
        $this->db->select('*');
        $this->db->from('project_documents');
        $this->db->where('isActive', 1);
        $this->db->where('idProjects', $idProject);
        $this->db->order_By('idProjectDocument', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}