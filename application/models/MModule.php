<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MModule extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getAllModules()
    {
        $this->db->select('*');
        $this->db->from('modules');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getModulesData($searchdata)
    {
        $idCrf = 0;
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $idCrf = $searchdata['idCRF'];
        }
        $this->db->select('*');
        $this->db->from('modules');
        $this->db->where('id_crf', $idCrf);
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('idModule', $searchdata['idModule']);
        }
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getModuleById($idModule)
    {

        $this->db->select('modules.idModule,
	modules.id_crf,
	modules.variable_module,
	modules.module_name_l1,
	modules.module_desc_l1,
	modules.module_name_l2,
	modules.module_desc_l2,
	modules.module_name_l3,
	modules.module_desc_l3,
	modules.module_name_l4,
	modules.module_desc_l4,
	modules.module_name_l5,
	modules.module_desc_l5,
	modules.module_status,
    modules.module_type,
    modules.locked,
	crf.id_crf,
	crf.idProjects,
	crf.crf_name,
	crf.languages,
	crf.l1,
    crf.l2,
    crf.l3,
    crf.l4,
    crf.l5,
	projects.idProjects,
	projects.project_name,
	projects.short_title');
        $this->db->from('modules');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->join('projects', 'crf.idProjects = projects.idProjects', 'left');
        $this->db->where('modules.idModule', $idModule);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalModule($searchdata)
    {
        $idProjects = 0;
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $idProjects = $searchdata['idProjects'];
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
        }
        $this->db->select('count(id_Module) as cnttotal');
        $this->db->from('Module');
        $this->db->where('idProjects', $idProjects);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}