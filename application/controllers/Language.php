<?php ob_start();

class Language extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mlanguage');
        $this->load->library('session');
        $this->load->library('tcpdf');
        $this->load->helper('string');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MLanguage = new MLanguage();
        $data = array();
        $data['language'] = $MLanguage->getAllLanguage();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('language', $data);
        $this->load->view('include/footer');
    }

    public function getEdit()
    {
        $MLanguage = new MLanguage();
        $result = $MLanguage->getEditLanguage($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLanguage']) && $_POST['idLanguage'] != '' && isset($_POST['languageName']) && $_POST['languageName'] != '') {
            $idLanguage = $_POST['idLanguage'];
            $editArr['languageName'] = $_POST['languageName'];
            $editArr['updateBy'] = $_SESSION['login']['idUser'];
            $editArr['updateDataTime'] = date('Y-m-d H:m:s');
            $editData = $Custom->Edit($editArr, 'idLanguage', $idLanguage, 'language');
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

    function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLanguage']) && $_POST['idLanguage'] != '') {
            $idLanguage = $_POST['idLanguage'];
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idLanguage', $idLanguage, 'language');
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

    function addData()
    {
        ob_end_clean();
        if (isset($_POST['languageName']) && $_POST['languageName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['languageName'] = ucfirst($_POST['languageName']);
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:m:s');

            $InsertData = $Custom->Insert($formArray, 'idLanguage', 'language', 'N');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }

        echo $result;
    }


} ?>





