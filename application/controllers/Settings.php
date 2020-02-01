<?php ob_start();

class Settings extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->library('session');
        $this->load->helper('string');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    /*Groups*/
    function groups()
    {
        $MSettings = new MSettings();
        $data = array();
        $data['groups'] = $MSettings->getAllGroups();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'form');
        $this->load->view('include/header', $data);
        $this->load->view('include/sidebar');
        $this->load->view('settings/group');
        $this->load->view('include/footer');
    }

    function addGroupData()
    {
        ob_end_clean();
        if (isset($_POST['groupName']) && $_POST['groupName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['groupName'] = ucfirst($_POST['groupName']);
            $InsertData = $Custom->Insert($formArray, 'idGroup', 'group', 'N');
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

    public function getGroupEdit()
    {
        $MSettings = new MSettings();
        $result = $MSettings->getEditGroup($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editGroupData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idGroup']) && $_POST['idGroup'] != '' && isset($_POST['groupName']) && $_POST['groupName'] != '') {
            $idGroup = $_POST['idGroup'];
            $editArr['groupName'] = $_POST['groupName'];
            $editData = $Custom->Edit($editArr, 'idGroup', $idGroup, 'group');
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

    function deleteGroupData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idGroup']) && $_POST['idGroup'] != '') {
            $idGroup = $_POST['idGroup'];
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idGroup', $idGroup, 'group');
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


    /*Group Settings*/

    function groupSettings($slug)
    {
        if (!$slug) {
            redirect(base_url());
        } else {
            $MSettings = new MSettings();
            $data = array();
            $data['slug'] = $slug;
            $data['groups'] = $MSettings->getEditGroup($slug);
            $this->load->view('include/header', $data);
            $this->load->view('include/sidebar');
            $this->load->view('settings/groupSettings');
            $this->load->view('include/footer');
        }
    }

    public function getFormGroupData()
    {
        $id = $_POST['idGroup'];
        if ($id) {
            $MSettings = new MSettings();
            $getData = $MSettings->selectFormGroupData($id);
            echo json_encode($getData);
        }
    }

    public function fgAdd()
    {
        $mSetting = new Msettings();
        $last = "";
        for ($i = 0; $i < count($_POST); $i++) {
            if (isset($_POST[$i]["CanViewAllDetail"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanViewAllDetail' => ($_POST[$i]["CanViewAllDetail"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } elseif (isset($_POST[$i]["CanView"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanView' => ($_POST[$i]["CanView"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } elseif (isset($_POST[$i]["CanAdd"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanAdd' => ($_POST[$i]["CanAdd"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } elseif (isset($_POST[$i]["CanEdit"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanEdit' => ($_POST[$i]["CanEdit"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } elseif (isset($_POST[$i]["CanDelete"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanDelete' => ($_POST[$i]["CanDelete"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            }
        }
        echo $last;
    }

} ?>