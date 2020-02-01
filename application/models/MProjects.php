<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MProjects extends CI_Model
{

    function getAllProjects()
    {
        $this->db->select('projects.project_name,
	projects.short_title,
	projects.idProjects');
        $this->db->from('projects');
        $this->db->where('projects.isActive', 1);
		$this->db->order_By('idProjects', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getProjects($searchdata)
    {
        $start = 0;
        $length = 25;
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }
        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_By($searchdata['orderby'], $searchdata['ordersort']);
        }else{
			$this->db->order_By('idProjects', 'DESC');
		}
        $this->db->select('projects.project_name,
	projects.short_title,
	projects.startdate,
	projects.enddate,
	projects.no_of_crf,
	projects.languages,
	projects.no_of_sites,
	projects.email_of_person,
	projects.idProjects, 
	crf.crf_name,
	crf.crf_title,
	crf.languages as crf_languages');
        $this->db->from('projects');
        $this->db->join('crf', 'projects.idProjects = crf.idProjects', 'left');
        $this->db->where('projects.isActive', 1);
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function getCntTotalProjects($searchdata)
    {
        if (isset($searchdata['start']) && $searchdata['start'] != '' && $searchdata['start'] != null) {
            $start = $searchdata['start'];
        }
        if (isset($searchdata['length']) && $searchdata['length'] != '' && $searchdata['length'] != null) {
            $length = $searchdata['length'];
        }

        if (isset($searchdata['search']) && $searchdata['search'] != '' && $searchdata['search'] != null) {
            $search = $searchdata['search'];
        }
        $this->db->select('count(idProjects) as cnttotal');
        $this->db->from('projects');
        $this->db->where('projects.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getPDFData($searchdata)
    {
        $idProjects = 1;
        $this->db->select('projects.project_name,
	projects.short_title,
	projects.startdate,
	projects.enddate,
	projects.no_of_crf,
	projects.languages,
	projects.no_of_sites,
	projects.email_of_person,
	projects.idProjects, 
	crf.id_crf,
	crf.crf_name,
	crf.crf_title,
	crf.languages as crf_languages');
        $this->db->from('projects');
        $this->db->join('crf', 'projects.idProjects = crf.idProjects', 'left');
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $idProjects = $searchdata['idProjects'];
        }
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $this->db->where('crf.id_crf', $searchdata['idCRF']);
        }
        $this->db->where('projects.idProjects', $idProjects);
        $this->db->where('projects.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditProject($idProject){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('projects.idProjects', $idProject);
        $query = $this->db->get();
        return $query->result();
    }
}