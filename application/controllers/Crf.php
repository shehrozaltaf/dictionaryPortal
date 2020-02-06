<?php

class Crf extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->model('mcrf');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index($slug)
    {
        $data = array();
        $data['slug'] = $slug;
        if (!isset($slug) || $slug == '' || $slug == '$1') {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('crf', $data);
        $this->load->view('include/footer');
    }

    function add_crf()
    {
        $MProjects = new MProjects();
        $data['projects'] = $MProjects->getAllProjects();
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '') {
            $data['getProjectSlug'] = $_REQUEST['project'];
        } else {
            $data['getProjectSlug'] = 0;
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_crf', $data);
        $this->load->view('include/footer');
    }

    function addData()
    {
        $Custom = new Custom();
        $this->form_validation->set_rules('id_of_pro', 'Id Of Project', 'required');
        $this->form_validation->set_rules('crf_name', 'CRF Name', 'required');
        $this->form_validation->set_rules('crf_title', 'CRF Title', 'required');
        $this->form_validation->set_rules('list_of_languagess', 'List Of Languages', 'required');
        $this->form_validation->set_rules('startdate', 'Start Date', 'required');
        $this->form_validation->set_rules('enddate', 'End Date', 'required');
        $this->form_validation->set_rules('num_of_modules', 'Number Of Modules', 'required');
        $formArray = array();
        $formArray['crf_name'] = $this->input->post('crf_name');
        $formArray['crf_title'] = $this->input->post('crf_title');
        $formArray['idProjects'] = $this->input->post('id_of_pro');
        $languages = '';
        if ($this->input->post('list_of_languagess') != '' && $this->input->post('list_of_languagess') != 'undefined') {
            $list_of_languagess = $this->input->post('list_of_languagess');
            foreach ($list_of_languagess as $key => $value) {
                $formArray['l' . ((int)$key + 1)] = $value;
                if (((int)$key + 1) == count($list_of_languagess)) {
                    $languages .= $value;
                } else {
                    $languages .= $value . ', ';
                }
            }
        }
        $formArray['languages'] = $languages;
        $formArray['startdate'] = (isset($_POST['startdate']) && $_POST['startdate'] != '' ? date('Y-m-d', strtotime($this->input->post('startdate'))) : date('Y-m-d'));
        $formArray['enddate'] = (isset($_POST['enddate']) && $_POST['enddate'] != '' ? date('Y-m-d', strtotime($this->input->post('enddate'))) : date('Y-m-d'));
        $formArray['no_of_modules'] = $this->input->post('num_of_modules');

        $InsertData = $Custom->Insert($formArray, 'id_crf', 'crf', 'L');
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

    function getCRFByProject()
    {
        $MCRF = new MCRF();
        $idProjects = (isset($_REQUEST['idProjects']) && $_REQUEST['idProjects'] != '' && $_REQUEST['idProjects'] != 0 ? $_REQUEST['idProjects'] : 0);
        $data = $MCRF->getCrfByPro($idProjects);
        echo json_encode($data, true);
    }
    function getCrfLanguages()
    {
        $MCRF = new MCRF();
        $idCrf = (isset($_REQUEST['idCrf']) && $_REQUEST['idCrf'] != '' && $_REQUEST['idCrf'] != 0 ? $_REQUEST['idCrf'] : 0);
        $data = $MCRF->getCrfLang($idCrf);
        echo json_encode($data, true);
    }


    function getCRFs()
    {
        $MCrf = new MCrf();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();
        $searchData['idProjects'] = (isset($_REQUEST['idProjects']) && $_REQUEST['idProjects'] != '' && $_REQUEST['idProjects'] != 0 ? $_REQUEST['idProjects'] : 0);
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'id_crf');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $MCrf->getCRFs($searchData);
        $table_data = array();
        $result_table_data = array();
        foreach ($data as $key => $value) {
            $table_data[$value->crf_name]['crf_name'] = $value->crf_name;
            $table_data[$value->crf_name]['crf_title'] = $value->crf_title;
            $table_data[$value->crf_name]['languages'] = $value->languages;
            $table_data[$value->crf_name]['startdate'] = $value->startdate;
            $table_data[$value->crf_name]['enddate'] = $value->enddate;
            $table_data[$value->crf_name]['no_of_modules'] = $value->no_of_modules;
            $table_data[$value->crf_name]['action'] = '<div class="btn-group mr-1 mb-1">
							<button class="btn btn-danger dropdown-toggle btn-sm" type="button" 
							id="dropdownMenuButton' . $value->id_crf . '" data-toggle="dropdown" >
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a class="dropdown-item" href="#">Edit CRF</a>
								<a class="dropdown-item" href="' . base_url('index.php/module/' . $value->id_crf) . '">View Modules</a>
								<a class="dropdown-item" href="' . base_url('index.php/add_module?crf=' . $value->id_crf) . '">Add Module</a> 
							</div>
						</div> ';
            $myarr = array();
            $myarr['module_name_l1'] = $value->module_name_l1;
            $myarr['module_desc_l1'] = $value->module_desc_l1;
            $myarr['module_name_l2'] = $value->module_name_l2;
            $myarr['module_desc_l2'] = $value->module_desc_l2;
            $myarr['module_name_l3'] = $value->module_name_l3;
            $myarr['module_desc_l3'] = $value->module_desc_l3;
            $myarr['module_name_l4'] = $value->module_name_l4;
            $myarr['module_desc_l4'] = $value->module_desc_l4;
            $myarr['module_name_l5'] = $value->module_name_l5;
            $myarr['module_desc_l5'] = $value->module_desc_l5;
            $table_data[$value->crf_name]['module'][] = $myarr;
        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 100000;
        $totalsearchData['idProjects'] = $searchData['idProjects'];
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $MCrf->getCntTotalCrf($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function edit_crf()
    {
        if (isset($_GET['project']) && $_GET['project'] != '') {
            $idProject = $_GET['project'];
        } else {
            $idProject = '';
        }
        $data = array();
        $Mproject = new MProjects();
        $data['getProjectData'] = $Mproject->getEditProject($idProject);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('edit_crf', $data);
        $this->load->view('include/footer');
    }

    function edit()
    {
        $Custom = new Custom();
        $editArr = array();
        $id_crf = $this->input->post('id_crf');
        $idproject = $this->input->post('idproject');
        $editArr['crf_name'] = $this->input->post('crf_name');
        $editArr['crf_title'] = $this->input->post('crf_title');
        $editArr['languages'] = $this->input->post('list_of_languagess');
        $editArr['no_of_modules'] = $this->input->post('num_of_modules');
        $editArr['startdate'] = $this->input->post('startdate');
        $editArr['enddate'] = $this->input->post('enddate');
        $editData = $Custom->Edit($editArr, 'idProjects', $idproject, 'projects');
        if ($editData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }
}

?>