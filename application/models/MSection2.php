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
        $this->db->order_by('section.sort_no', 'asc');
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
        $this->db->order_by('section.sort_no', 'asc');
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
        $this->db->order_by('section.sort_no', 'asc');
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
	section.tableName,
	section.columnToShow,
	modules.variable_module,
	modules.idModule,
	modules.module_name_l1,
	crf.id_crf,
	crf.crf_name,
	crf.languages,
	crf.locked,
    crf.l1,
    crf.l2,
    crf.l3,
    crf.l4,
    crf.l5,
	projects.idProjects,
	projects.project_name,
	projects.db_hostname,
    projects.db_username,
    projects.db_password,
    projects.db_database,
    projects.db_type'
        );
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

    function maxVariable($searchdata)
    {
        $this->db->select('MAX(seq_no) as maxVariable');
        $this->db->from('section_detail');
        $this->db->where('isActive', 1);
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('idModule', $searchdata['idModule']);
        }
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('idSection', $searchdata['idSection']);
        }
        if (isset($searchdata['variable_name']) && $searchdata['variable_name'] != '' && $searchdata['variable_name'] != null) {
            $this->db->where('variable_name', $searchdata['variable_name']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function checkVariable_maxVariable($searchdata)
    {
        $this->db->select('variable_name');
        $this->db->from('section_detail');
        $this->db->where('isActive', 1);
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('idModule', $searchdata['idModule']);
        }
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('idSection', $searchdata['idSection']);
        }
        if (isset($searchdata['variable_name']) && $searchdata['variable_name'] != '' && $searchdata['variable_name'] != null) {
            $this->db->where('variable_name', $searchdata['variable_name']);
        }
        $this->db->group_by("variable_name");
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
        $this->db->where("variable_name='" . $variable_name . "' or idParentQuestion= '" . $variable_name . "' ");
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    /*=====================================Reports=======================================*/
    /*getStings || getXml || getPDF || getSaveDraftData ||getExcel || getTableQuery*/
    function getSectionDetailData($searchdata)
    {
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $this->db->where('idProjects', $searchdata['idProjects']);
        }
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $this->db->where('id_crf', $searchdata['idCRF']);
        }
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('idModule', $searchdata['idModule']);
        }
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('idSection', $searchdata['idSection']);
        }
        if (isset($searchdata['type']) && $searchdata['type'] != '' && $searchdata['type'] != null) {
            $this->db->order_by('idSection', 'asc');
        }

        $this->db->select('*');
        $this->db->from('section_detail');
        $this->db->where('isActive', 1);
        $this->db->order_by('seq_no', 'asc');
        $this->db->order_by('child_seq_no', 'asc');
        $this->db->order_by('variable_name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    /*getNewStings*/
    function getAllData($searchdata)
    {
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $this->db->where('section_detail.idProjects', $searchdata['idProjects']);
        }
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $this->db->where('section_detail.id_crf', $searchdata['idCRF']);
        }
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('section_detail.idModule', $searchdata['idModule']);
        }
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section_detail.idSection', $searchdata['idSection']);
        }
        if (isset($searchdata['orderby']) && $searchdata['orderby'] != '' && $searchdata['orderby'] != null) {
            $this->db->order_by('section_detail.' . $searchdata['orderby'], 'asc');
        }

        $this->db->select('crf.crf_name,
	section_detail.variable_name,
	section_detail.label_l1,
	section_detail.label_l2,
	section_detail.label_l3,
	section_detail.label_l4,
	section_detail.label_l5,
	section_detail.option_value,
	section_detail.dbType,
	section.tableName,
	section_detail.insertDB,
	section_detail.idParentQuestion,
	section_detail.dbLength,
	section_detail.nature,
	modules.module_name_l1,
    section.section_title,
    projects.project_name,
    section_detail.MinVal,
section_detail.MaxVal
 ');
        $this->db->from('section_detail');
        $this->db->join('section', 'section_detail.idSection =section.idSection', 'RIGHT');
        $this->db->join('modules', 'section.idModule = modules.idModule', 'left');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->join('projects', 'crf.idProjects = projects.idProjects', 'left');
        $this->db->where('crf.idProjects', $searchdata['idProjects']);
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section.idSection', $searchdata['idSection']);
        }
        $this->db->where("section_detail.nature!='Title' ");
        $this->db->where('crf.isActive', 1);
        $this->db->where('modules.isActive', 1);
        $this->db->where('section.isActive', 1);
        $this->db->where('section_detail.isActive', 1);
        $this->db->order_by('section_detail.variable_name', 'ASC');
        $this->db->order_by('section_detail.seq_no', 'asc');
        $this->db->order_by('section_detail.child_seq_no', 'asc');
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
        $this->db->join('section', 'section_detail.idSection =section.idSection', 'RIGHT');
        $this->db->join('modules', 'section.idModule = modules.idModule', 'left');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->where('crf.idProjects', $searchdata['idProjects']);
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section.idSection', $searchdata['idSection']);
        }
        $this->db->where("section_detail.nature!='Title' ");
        $this->db->where('section.isActive', 1);
        $this->db->where('section_detail.isActive', 1);
        $this->db->order_by('section_detail.variable_name', 'ASC');
        $this->db->order_by('section_detail.seq_no', 'asc');
        $this->db->order_by('section_detail.child_seq_no', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    /*getXmlQuestions*/
    function getXmlQuestionsData($searchdata)
    {
        $this->db->select('
	section_detail.variable_name,
	section_detail.label_l1');
        $this->db->from('section_detail');
        $this->db->join('section', 'section_detail.idSection =section.idSection', 'RIGHT');
        $this->db->join('modules', 'section.idModule = modules.idModule', 'left');
        $this->db->join('crf', 'modules.id_crf = crf.id_crf', 'left');
        $this->db->where('crf.idProjects', $searchdata['idProjects']);
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section.idSection', $searchdata['idSection']);
        }
        $this->db->where('section.isActive', 1);
        $this->db->where('section_detail.isActive', 1);
        $this->db->where("(section_detail.idParentQuestion is null  or section_detail.idParentQuestion ='')");
        $this->db->order_by('section_detail.variable_name', 'ASC');
        $this->db->order_by('section_detail.seq_no', 'asc');
        $this->db->order_by('section_detail.child_seq_no', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    /*getMissingLabels*/
    function getMissingLabels($searchdata)
    {
        $this->db->select('section_detail.variable_name,
section_detail.idSectionDetail,
section_detail.label_l1,
section_detail.label_l2,
section_detail.label_l3,
section_detail.label_l4,
section_detail.label_l5');
        $this->db->from('section_detail');
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $this->db->where('section_detail.idProjects', $searchdata['idProjects']);
        }
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $this->db->where('section_detail.id_crf', $searchdata['idCRF']);
        }
        $whereLabel = '(';
        $whereLabel .= " label_l1 is null OR label_l1='' ";
        if (isset($searchdata['label_l2']) && $searchdata['label_l2'] != '' && $searchdata['label_l2'] != null) {
            $whereLabel .= " OR label_l2 is null OR label_l2='' ";
        }
        if (isset($searchdata['label_l3']) && $searchdata['label_l3'] != '' && $searchdata['label_l3'] != null) {
            $whereLabel .= " OR label_l3 is null OR label_l3='' ";
        }
        if (isset($searchdata['label_l4']) && $searchdata['label_l4'] != '' && $searchdata['label_l4'] != null) {
            $whereLabel .= " OR label_l4 is null OR label_l4='' ";
        }
        if (isset($searchdata['label_l5']) && $searchdata['label_l5'] != '' && $searchdata['label_l5'] != null) {
            $whereLabel .= " OR label_l5 is null OR  label_l5='' ";
        }
        $whereLabel .= ')';
        $this->db->where('section_detail.isActive', 1);
        $this->db->where($whereLabel);
        $query = $this->db->get();
        return $query->result();
    }

    /*get Form Data*/
    function getFormData($searchdata)
    {
        $this->db->select('section_detail.variable_name,
section_detail.idSectionDetail,
section_detail.idParentQuestion,
section_detail.label_l1,
section_detail.label_l2,
section_detail.label_l3,
section_detail.label_l4,
section_detail.label_l5,
section_detail.option_value,
section_detail.question_type');
        $this->db->from('section_detail');
        if (isset($searchdata['idProjects']) && $searchdata['idProjects'] != '' && $searchdata['idProjects'] != null) {
            $this->db->where('section_detail.idProjects', $searchdata['idProjects']);
        }
        if (isset($searchdata['idCRF']) && $searchdata['idCRF'] != '' && $searchdata['idCRF'] != null) {
            $this->db->where('section_detail.id_crf', $searchdata['idCRF']);
        }
        if (isset($searchdata['idModule']) && $searchdata['idModule'] != '' && $searchdata['idModule'] != null) {
            $this->db->where('section_detail.idModule', $searchdata['idModule']);
        }
        if (isset($searchdata['idSection']) && $searchdata['idSection'] != '' && $searchdata['idSection'] != null) {
            $this->db->where('section_detail.idSection', $searchdata['idSection']);
        }
        $this->db->where('section_detail.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }


}