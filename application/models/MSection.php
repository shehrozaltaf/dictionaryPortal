<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MSection extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*=====================================Sections=======================================*/
    function getAllSections()
    {
        $this->db->select('*');
        $this->db->from('section');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionData($searchdata)
    {
        $idModule = 0;
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $idModule = $searchdata['idModule'];
        }
        $this->db->select('*');
        $this->db->from('section');
        $this->db->where('idModule', $idModule);
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null && $searchdata['idSection'] != 0) {
            $this->db->where('idSection', $searchdata['idSection']);
        }
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionDataById($searchdata)
    {
        $idSection = 0;
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $idSection = $searchdata['idSection'];
        }
        $this->db->select('*');
        $this->db->from('section');
        $this->db->where('idSection', $idSection);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    /*=====================================Section Details=======================================*/

    function getSectionDetailDataByid($idSection)
    {
        $idSectione = 0;
        if (isset($idSection) && $idSection != '' && $idSection != null) {
            $idSectione = $idSection;
        }
        $this->db->select('	section.idSection,
	section_detail.variable_name,
	section.section_title,
	section.section_var_name,
	modules.variable_module,
	modules.idModule,
	modules.module_name_l1,
	crf.id_crf,
	crf.crf_name,
	crf.languages,
    crf.l1,
    crf.l2,
    crf.l3,
    crf.l4,
    crf.l5,
	projects.idProjects,
	projects.project_name');
        $this->db->from('section_detail');
        $this->db->join('section', 'section_detail.idSection = section.idSection', 'RIGHT');
        $this->db->join('modules', 'section.idModule = modules.idModule', 'left');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->join('projects', 'crf.idProjects = projects.idProjects', 'left');
        $this->db->where('section.idSection', $idSectione);
        $this->db->order_by('section_detail.variable_name', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionDetailsByid($searchdata)
    {
        $idSection = 0;
        if (isset($searchdata['idSectionDetail']) && $searchdata['idSectionDetail'] != '' && $searchdata['idSectionDetail'] != null) {
            $idSection = $searchdata['idSectionDetail'];
        }
        $this->db->select('*');
        $this->db->from('section_detail');
        $this->db->where('idSectionDetail', $idSection);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionDetails_Clone($searchdata)
    {
        $idSection = 0;
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $idSection = $searchdata['idSection'];
        }

        $idModule = 0;
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $idModule = $searchdata['idModule'];
        }
        $variable_name = 0;
        if (isset($searchdata['variable_name']) && $searchdata['variable_name'] != '' && $searchdata['variable_name'] != null) {
            $variable_name = $searchdata['variable_name'];
        }
        $this->db->select('*');
        $this->db->from('section_detail');
        $this->db->where('idSection', $idSection);
        $this->db->where('idModule', $idModule);
        $this->db->where('variable_name="' . $variable_name . '" or idParentQuestion= "' . $variable_name . '" ');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    /*=====================================Reports=======================================*/
    /*getStings || getXml || getPDF || getSaveDraftData ||getExcel*/
    function getSectionDetailData($searchdata)
    {
        $idSection = 0;
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $idSection = $searchdata['idSection'];
        }
        $this->db->select('*');
        $this->db->from('section_detail');
        $this->db->where('idSection', $idSection);
        $this->db->where('isActive', 1);
        $this->db->order_by('seq_no', 'asc');
        $this->db->order_by('child_seq_no', 'asc');
        $this->db->order_by('variable_name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    /*getCodeBook*/
    function getCodeBookData($searchdata)
    {
        $this->db->select('crf.crf_name,
	section_detail.variable_name,
	section_detail.label_l1,
	section_detail.label_l2,
	section_detail.option_value,
	section_detail.dbType,
	section.tableName,
	section_detail.insertDB,
	section_detail.idParentQuestion,
	section_detail.dbLength,
	section_detail.nature ');
        $this->db->from('section_detail');
        $this->db->join('section', 'section_detail.idSection = section.idSection', 'RIGHT');
        $this->db->join('modules', 'section.idModule = modules.idModule', 'left');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->where('crf.idProjects', $searchdata['idProjects']);
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section.idSection', $searchdata['idSection']);
        }
        $this->db->where('section_detail.nature!="Title"');
        $this->db->where('section.isActive', 1);
        $this->db->order_by('section_detail.seq_no', 'asc');
        $this->db->order_by('section_detail.child_seq_no', 'asc');
        $this->db->order_by('section_detail.variable_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}