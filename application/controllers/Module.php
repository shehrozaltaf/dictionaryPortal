<?php ob_start();
header('Content-type: text/html; charset=utf-8');

class Module extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->model('mcrf');
        $this->load->model('mmodule');
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
        $this->load->view('module', $data);
        $this->load->view('include/footer');
    }

    function add_module()
    {
        $MCrf = new MCrf();
        $data = array();
        $idCRF = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
        if (!isset($idCRF) || $idCRF == '' || $idCRF == '$1' || $idCRF == 0) {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
        }
        $data['slug'] = $idCRF;
        $data['crf'] = $MCrf->getCrfById($idCRF);
//        $data['all_crfs'] = $MCrf->getAllCrfs();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_module', $data);
        $this->load->view('include/footer');
    }

    function edit_module($slug)
    {
        ob_end_clean();
        $data = array();
        if (isset($slug) && $slug != '' && $slug != '$1' && $slug != 0) {
            $data['idModule'] = $slug;
            $MModule = new MModule();
            $data['getData'] = $MModule->getModuleById($data['idModule']);
        } else {
            $data['error'] = 'Invalid Module';
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('edit_module', $data);
        $this->load->view('include/footer');
    }

    function deleteModule()
    {
        if (isset($_POST['idDelete']) && $_POST['idDelete'] != '') {
            $Custom = new Custom();
            $idModule = $_POST['idDelete'];
            $editArr = array();
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idModule', $idModule, 'modules');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            echo 3;
        }
        echo $result;
    }

    function editData()
    {
        $Custom = new Custom();
        $formArray = array();
        if (isset($_POST['idModule']) && $_POST['idModule'] != '') {
            $idModule = $_POST['idModule'];
            $formArray['variable_module'] = $this->input->post('variable_module');
            $module_l_name = '';
            if ($this->input->post('module_name_Languages') != '' && $this->input->post('module_name_Languages') != 'undefined') {
                $name_languagess = $this->input->post('module_name_Languages');
                foreach ($name_languagess as $key => $value) {
                    $formArray['module_name_l' . ((int)$key + 1)] = $value;
                    if (((int)$key + 1) == count($name_languagess)) {
                        $module_l_name .= $value;
                    } else {
                        $module_l_name .= $value . ', ';
                    }
                }
            }
            $module_l_desc = '';
            if ($this->input->post('module_desc_Languages') != '' && $this->input->post('module_desc_Languages') != 'undefined') {
                $desc_languagess = $this->input->post('module_desc_Languages');
                foreach ($desc_languagess as $key => $value) {
                    $formArray['module_desc_l' . ((int)$key + 1)] = $value;
                    if (((int)$key + 1) == count($desc_languagess)) {
                        $module_l_desc .= $value;
                    } else {
                        $module_l_desc .= $value . ', ';
                    }
                }
            }
            $formArray['module_status'] = $this->input->post('module_status');
            $formArray['module_type'] = $this->input->post('module_type');
            $editData = $Custom->Edit($formArray, 'idModule', $idModule, 'modules');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }

        echo $result;
    }

    function getData()
    {
        $MModule = new MModule();
        $searchData = array();
        $searchData['idProjects'] = (isset($_REQUEST['idProjects']) && $_REQUEST['idProjects'] != '' && $_REQUEST['idProjects'] != 0 ? $_REQUEST['idProjects'] : 0);
        $searchData['idCRF'] = (isset($_REQUEST['idCRF']) && $_REQUEST['idCRF'] != '' && $_REQUEST['idCRF'] != 0 ? $_REQUEST['idCRF'] : 0);
        $result = $MModule->getModulesData($searchData);
        echo json_encode($result, true);
    }

    function getModuleByCrf()
    {
        $MModule = new MModule();
        $searchdata = array();
        $searchdata['idCRF'] = (isset($_REQUEST['idCrf']) && $_REQUEST['idCrf'] != '' && $_REQUEST['idCrf'] != 0 ? $_REQUEST['idCrf'] : 0);
        $data = $MModule->getModulesData($searchdata);
        echo json_encode($data, true);
    }

    function addData()
    {
        $Custom = new Custom();
        $this->form_validation->set_rules('id_of_crf', 'CRF', 'required');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('variable_module', 'variable_module', 'required');
        $this->form_validation->set_rules('module_name_Languages', 'Language Name', 'required');
        $this->form_validation->set_rules('module_status', 'Module Status', 'required');
        $this->form_validation->set_rules('module_type', 'Module Type', 'required');

        $formArray = array();
        $formArray['id_crf'] = $this->input->post('id_of_crf');
        $formArray['idProjects'] = $this->input->post('project_id');
        $formArray['variable_module'] = $this->input->post('variable_module');

        $module_l_name = '';
        if ($this->input->post('module_name_Languages') != '' && $this->input->post('module_name_Languages') != 'undefined') {
            $name_languagess = $this->input->post('module_name_Languages');
            foreach ($name_languagess as $key => $value) {
                $formArray['module_name_l' . ((int)$key + 1)] = $value;
                if (((int)$key + 1) == count($name_languagess)) {
                    $module_l_name .= $value;
                } else {
                    $module_l_name .= $value . ', ';
                }
            }
        }

        $module_l_desc = '';
        if ($this->input->post('module_desc_Languages') != '' && $this->input->post('module_desc_Languages') != 'undefined') {
            $desc_languagess = $this->input->post('module_desc_Languages');
            foreach ($desc_languagess as $key => $value) {
                $formArray['module_desc_l' . ((int)$key + 1)] = $value;
                if (((int)$key + 1) == count($desc_languagess)) {
                    $module_l_desc .= $value;
                } else {
                    $module_l_desc .= $value . ', ';
                }
            }
        }
        $formArray['module_status'] = $this->input->post('module_status');
        $formArray['module_type'] = $this->input->post('module_type');

        $InsertData = $Custom->Insert($formArray, 'idModule', 'modules', 'M');
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

} ?>