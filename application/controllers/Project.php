<?php ob_start();
header('Content-type: text/html; charset=utf-8');
ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
error_reporting(0);

class Project extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');

        $this->load->library('session');
        $this->load->library('tcpdf');
        $this->load->helper('string');

        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MCustom = new Custom();
        /*==========Log=============*/
        $trackarray = array("action" => "View Project Page",
            "result" => "View the Main Project Page");
        $MCustom->trackLogs($trackarray,"user_logs");
        /*==========Log=============*/

        $MProjects = new MProjects();
        $data = array();
        $data['projects'] = $MProjects->getAllProjects();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('project', $data);
        $this->load->view('include/footer');
    }

    function add_project()
    {
        $Custom = new Custom();
        /*==========Log=============*/
        $trackarray = array("action" => "Add Project Page",
            "result" => "View the Add Project Page");
        $Custom->trackLogs($trackarray,"user_logs");
        /*==========Log=============*/
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_project');
        $this->load->view('include/footer');
    }


    function getProjects()
    {
        $MProjects = new MProjects();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'idProjects');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $MProjects->getProjects($searchData);
        $table_data = array();
        $result_table_data = array();
        foreach ($data as $key => $value) {
            $table_data[$value->project_name]['project_name'] = $value->project_name;
            $table_data[$value->project_name]['short_title'] = $value->short_title;
            $table_data[$value->project_name]['startdate'] = date('d-m-Y', strtotime($value->startdate));
            $table_data[$value->project_name]['enddate'] = date('d-m-Y', strtotime($value->enddate));
            $table_data[$value->project_name]['no_of_crf'] = $value->no_of_crf;
            $table_data[$value->project_name]['languages'] = $value->languages;
            $table_data[$value->project_name]['no_of_sites'] = $value->no_of_sites;
            $table_data[$value->project_name]['email_of_person'] = $value->email_of_person;
            $table_data[$value->project_name]['action'] = ' <div class="btn-group mr-1 mb-1">
							<button class="btn btn-danger dropdown-toggle btn-sm" type="button" 
							id="dropdownMenuButton' . $value->idProjects . '" data-toggle="dropdown" >
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a class="dropdown-item" href="' . base_url('index.php/project/edit_project?project=' . $value->idProjects) . '">Edit Project</a>
								<a class="dropdown-item" href="' . base_url('index.php/crf/' . $value->idProjects) . '">View CRFs</a>
								<a class="dropdown-item" href="' . base_url('index.php/add_crf?project=' . $value->idProjects) . '">Add CRF</a> 
							</div>
						</div>';
            $myarr = array();
            $myarr['crf_name'] = $value->crf_name;
            $myarr['crf_title'] = $value->crf_title;
            $myarr['crf_languages'] = $value->crf_languages;
            $table_data[$value->project_name]['crf'][] = $myarr;
        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }
        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 100000;
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $MProjects->getCntTotalProjects($totalsearchData);
        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;
        echo json_encode($result, true);
    }

    function addData()
    {
        ob_end_clean();
        $Custom = new Custom();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('projectName', 'projectName', 'required');
        $this->form_validation->set_rules('shortTitle', 'shortTitle', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $result = 3;
        } else {
            $formArray = array();
            $formArray['project_name'] = ucfirst($this->input->post('projectName'));
            $formArray['short_title'] = $this->input->post('shortTitle');
            $formArray['startdate'] = (isset($_POST['startdate']) && $_POST['startdate'] != '' ? date('Y-m-d', strtotime($this->input->post('startdate'))) : date('Y-m-d'));
            $formArray['enddate'] = (isset($_POST['enddate']) && $_POST['enddate'] != '' ? date('Y-m-d', strtotime($this->input->post('enddate'))) : date('Y-m-d'));
            $formArray['no_of_crf'] = $this->input->post('num_of_crf');
            $formArray['languages'] = $this->input->post('languages');
            $formArray['no_of_sites'] = $this->input->post('num_of_site');
            $formArray['email_of_person'] = $this->input->post('email');
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['isActive'] = 1;
            $InsertData = $Custom->Insert($formArray, 'idProjects', 'projects', 'N');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
        }
        /*==========Log=============*/
        $trackarray = array("action" => "Add Project Page",
            "result" => "User " . $_SESSION['login']['UserName'] . ": add project page data. Result: " . $result ." Project: ".$formArray['project_name']);
        $Custom->trackLogs($trackarray,"daily_logs");
        $Custom->trackLogs($trackarray,"user_logs");
        /*==========Log=============*/
        echo $result;
    }


    function edit_project()
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
        $this->load->view('edit_project', $data);
        $this->load->view('include/footer');
        $Custom = new Custom();
        /*==========Log=============*/
        $trackarray = array("action" => "Edit Project Page",
            "result" => "View the edit project page. Project Id: ".$idProject);
        $Custom->trackLogs($trackarray,"user_logs");
        /*==========Log=============*/
    }

    function edit()
    {
        $Custom = new Custom();
        $editArr = array();
        $idproject = $this->input->post('idproject');
        $editArr['project_name'] = $this->input->post('projectName');
        $editArr['short_title'] = $this->input->post('shortTitle');
        $editArr['startdate'] = $this->input->post('startdate');
        $editArr['enddate'] = $this->input->post('enddate');
        $editArr['no_of_crf'] = $this->input->post('num_of_crf');
        $editArr['languages'] = $this->input->post('languages');
        $editArr['no_of_sites'] = $this->input->post('num_of_site');
        $editArr['email_of_person'] = $this->input->post('email');
        $editArr['updateDateTime'] = date('Y-m-d H:i:s');
        $editArr['updatedBy'] = $_SESSION['login']['idUser'];
        $editData = $Custom->Edit($editArr, 'idProjects', $idproject, 'projects');
        if ($editData) {
            $result = 1;
        } else {
            $result = 2;
        }
        /*==========Log=============*/
        $trackarray = array("action" => "Edit Project Page",
            "result" => "User " . $_SESSION['login']['UserName'] . ": edit project page data. Result: " . $result
                ." ProjectName: ".$editArr['project_name'] ." ProjectId: ". $idproject);
        $Custom->trackLogs($trackarray,"daily_logs");
        $Custom->trackLogs($trackarray,"user_logs");
        /*==========Log=============*/
        echo $result;
    }

} ?>