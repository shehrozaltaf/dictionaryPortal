<?php

class AppForm extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msection');
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
        $searchData['idProjects'] = 25;
        $searchData['idCRF'] = 48;
        $searchData['idModule'] = 91;
        $searchData['idSection'] = 285;
        $searchData['includeTitle'] = 'Y';
        $searchData['orderby'] = '';
        $MSection = new MSection();
        $getSectionDetails = $MSection->getAllData($searchData);
        $data['data'] = $this->questionArr($getSectionDetails);
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