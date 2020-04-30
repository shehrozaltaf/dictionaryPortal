<?php
ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
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
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View CRF Page",
            "result" => "View CRF page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
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
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "Add CRF Page",
            "result" => "View Add CRF page. Fucntion: add_crf(). ProjectSlug: " . $data['getProjectSlug']);
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
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
        $formArray['createdDateTime'] = date('Y-m-d H:i:s');
        $formArray['createdBy'] = $_SESSION['login']['idUser'];
        $formArray['isActive'] =1;
        $InsertData = $Custom->Insert($formArray, 'id_crf', 'crf', 'L');
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "Add CRF Data",
            "result" => "View Add CRF page Data. Fucntion: addData() Result: " . $result ." CRF: ".$formArray['crf_name']);
        $Custom->trackLogs($trackarray, "user_logs");
        $Custom->trackLogs($trackarray, "daily_logs");
        /*==========Log=============*/
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
								<a class="dropdown-item" href="' . base_url('index.php/edit_crf/' . $value->id_crf) . '">Edit CRF</a>
								<a class="dropdown-item" href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->id_crf . '">Delete CRF</a>
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

    function edit_crf($slug)
    {
        $MCRF = new MCRF();
        $data = array();
        $data['getData'] = '';
        if (isset($slug) && $slug != '') {
            $data['getData'] = $MCRF->getCrfLang($slug);
        }
        $MProjects = new MProjects();
        $data['projects'] = $MProjects->getAllProjects();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "Edit CRF Page",
            "result" => "View Edit CRF page. Fucntion: edit_crf()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('edit_crf', $data);
        $this->load->view('include/footer');
    }

    function editData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['id_crf']) && $_POST['id_crf'] != '') {
            $id_crf = $_POST['id_crf'];
            if (isset($_POST['crf_name']) && $_POST['crf_name'] != '') {
                $editArr['crf_name'] = $_POST['crf_name'];
            }
            if (isset($_POST['id_of_pro']) && $_POST['id_of_pro'] != '') {
                $editArr['idProjects'] = $_POST['id_of_pro'];
            }
            if (isset($_POST['crf_title']) && $_POST['crf_title'] != '') {
                $editArr['crf_title'] = $_POST['crf_title'];
            }
            if (isset($_POST['num_of_modules']) && $_POST['num_of_modules'] != '') {
                $editArr['no_of_modules'] = $_POST['num_of_modules'];
            }
            if (isset($_POST['startdate']) && $_POST['startdate'] != '') {
                $editArr['startdate'] = date('Y-m-d', strtotime($_POST['startdate']));
            }
            if (isset($_POST['enddate']) && $_POST['enddate'] != '') {
                $editArr['enddate'] = date('Y-m-d', strtotime($_POST['enddate']));
            }
            if (isset($_POST['crf_name']) && $_POST['crf_name'] != '') {
                $editArr['crf_name'] = $_POST['crf_name'];
            }
            if (isset($_POST['crf_name']) && $_POST['crf_name'] != '') {
                $editArr['crf_name'] = $_POST['crf_name'];
            }
            $languages = '';
            $editArr['l1'] = '';
            $editArr['l2'] = '';
            $editArr['l3'] = '';
            $editArr['l4'] = '';
            $editArr['l5'] = '';
            if ($this->input->post('list_of_languagess') != '' && $this->input->post('list_of_languagess') != 'undefined') {
                $list_of_languagess = $this->input->post('list_of_languagess');
                foreach ($list_of_languagess as $key => $value) {
                    $editArr['l' . ((int)$key + 1)] = $value;
                    if (((int)$key + 1) == count($list_of_languagess)) {
                        $languages .= $value;
                    } else {
                        $languages .= $value . ', ';
                    }
                }
            }
            if (isset($languages) && $languages != '') {
                $editArr['languages'] = $languages;
            }
            $editArr['updateDateTime'] = date('Y-m-d H:i:s');
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editData = $Custom->Edit($editArr, 'id_crf', $id_crf, 'crf');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "Edit CRF Data",
            "result" => "Edit CRF page Data. Fucntion: editData() Result: " . $result ." CRF: ".$id_crf);
        $Custom->trackLogs($trackarray, "user_logs");
        $Custom->trackLogs($trackarray, "daily_logs");
        /*==========Log=============*/
        echo $result;
    }

    function deleteData()
    {
        if (isset($_POST['idDelete']) && $_POST['idDelete'] != '') {
            $Custom = new Custom();
            $id_crf = $_POST['idDelete'];
            $editArr = array();
            $editArr['isActive'] = 0;
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editArr['deletedBy'] = $_SESSION['login']['idUser'];
            $editData = $Custom->Edit($editArr, 'id_crf', $id_crf, 'crf');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            echo 3;
        }

        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "Delete CRF",
            "result" => "Delete CRF page Data. Fucntion: deleteData() Result: " . $result ." CRF: ".$id_crf);
        $Custom->trackLogs($trackarray, "user_logs");
        $Custom->trackLogs($trackarray, "daily_logs");
        /*==========Log=============*/
        echo $result;
    }
}

?>