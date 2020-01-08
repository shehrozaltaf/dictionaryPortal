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

    function getModByCrf($idCrf)
    {
        $this->db->select('*');
        $this->db->from('modules');
        $this->db->where('isActive', 1);
        $this->db->where('id_crf', $idCrf);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalModule($searchdata)
    {
        $idProjects = 0;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $idProjects = $searchdata['idProjects'];
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
            /* $this->db->where('i2_hb1ac.WHOWID', 'like', '%' . $search . '%');
             $this->db->orWhere('i2_hb1ac.SAMPLEID', 'like', '%' . $search . '%');
             $this->db->orWhere('i2_hb1ac.HBA1C_Res', 'like', '%' . $search . '%');*/
        }
        $this->db->select('count(id_Module) as cnttotal');
        $this->db->from('Module');
        $this->db->where('idProjects', $idProjects);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}
