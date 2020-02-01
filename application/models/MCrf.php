<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MCrf extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $table = 'crf';
    }

    function getAllCrfs()
    {

        $this->db->select('crf.id_crf,
                    crf.idProjects,
                    crf.crf_name,
                    crf.crf_title,
                    crf.languages,
                    crf.startdate,
                    crf.enddate,
                    crf.no_of_modules');
        $this->db->from('crf');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getCrfById($idCrf)
    {
        $this->db->select('crf.id_crf,
crf.idProjects,
crf.crf_name,
crf.crf_title,
crf.languages,
crf.l1,
crf.l2,
crf.l3,
crf.l4,
crf.l5,
crf.languages,
crf.startdate,
crf.enddate,
crf.isActive,
crf.no_of_modules,
projects.project_name,
projects.short_title');
        $this->db->from('crf');
        $this->db->join('projects', 'crf.idProjects = projects.idProjects', 'left');
        $this->db->where('crf.isActive', 1);
        $this->db->where('crf.id_crf', $idCrf);
        $query = $this->db->get();
        return $query->result();
    }

    function getCrfByPro($idProjects)
    {

        $this->db->select('crf.id_crf,
crf.idProjects,
crf.crf_name,
crf.crf_title,
crf.languages,
crf.startdate,
crf.enddate,
crf.isActive,
crf.no_of_modules');
        $this->db->from('crf');
        $this->db->where('isActive', 1);
        $this->db->where('idProjects', $idProjects);
        $query = $this->db->get();
        return $query->result();
    }

    function getCrfLang($idCRF)
    {

        $this->db->select('crf.id_crf,
crf.idProjects,
crf.crf_name,
crf.crf_title,
crf.languages,
crf.l1,
crf.l2,
crf.l3,
crf.l4,
crf.l5');
        $this->db->from('crf');
        $this->db->where('isActive', 1);
        $this->db->where('id_crf', $idCRF);
        $query = $this->db->get();
        return $query->result();
    }

    function getCRFs($searchdata)
    {
        $start = 0;
        $length = 25;
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
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }
        $this->db->select('crf.id_crf,
	crf.crf_name,
	crf.crf_title,
	crf.languages,
	crf.startdate,
	crf.enddate,
	crf.no_of_modules,
	projects.project_name,
	projects.short_title,
	crf.idProjects,
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
	modules.module_type');
        $this->db->from('crf');
        $this->db->join('projects', 'crf.idProjects = projects.idProjects', 'left');
        $this->db->join('modules', 'crf.id_crf = modules.id_crf', 'left');
        $this->db->where('crf.idProjects', $idProjects);
        $this->db->where('crf.isActive', 1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalCrf($searchdata)
    {
        $idProjects = 0;
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $idProjects = $searchdata['idProjects'];
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
        }
        $this->db->select('count(id_crf) as cnttotal');
        $this->db->from('crf');
        $this->db->where('idProjects', $idProjects);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }
}