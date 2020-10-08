<?php

class AppForm extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msection');
        $this->load->model('mprojects');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard",
            "result" => "View Dashboard page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        /*$searchData['idProjects'] = 34;
        $searchData['idCRF'] = 56;
        $searchData['idModule'] = 111;
        $searchData['idSection'] = 427;*/

        $searchData = array();
        $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
        $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
        $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
        $searchData['includeTitle'] = 'Y';
        $searchData['orderby'] = '';
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {
            $searchData['idProjects'] = $_REQUEST['project'];
            $MSection = new MSection();
            $getSectionDetails = $MSection->getAllData($searchData);
            $data['data'] = $this->questionArr($getSectionDetails);
        } else {
            $searchData['idProjects'] = 0;
            $data['data'] = '';
        }

        $MProjects = new MProjects();
        $data['projects'] = $MProjects->getAllProjects();

        $data['slug_projects'] = $searchData['idProjects'];
        $data['slug_crf'] = $searchData['idCRF'];
        $data['slug_module'] = $searchData['idModule'];
        $data['slug_section'] = $searchData['idSection'];

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('appForm', $data);
        $this->load->view('include/footer');
    }

    function questionArr($dataarr)
    {
        $myresult = array();
        foreach ($dataarr as $key => $value) {
            if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists(strtolower($value->idParentQuestion), $myresult)) {
                $mykey = strtolower($value->idParentQuestion);
                $myresult[strtolower($mykey)]->myrow_options[] = $value;
            } else {
                $mykey = strtolower($value->variable_name);
                $myresult[strtolower($mykey)] = $value;
            }
        }
        $data = array();
        foreach ($myresult as $val) {
            $data[] = $val;
        }
        return $data;
    }

}

?>