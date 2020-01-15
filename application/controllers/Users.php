<?php ob_start();

class Users extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('muser');
        $this->load->library('session'); 
        $this->load->helper('string');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MUser = new MUser();
        $data = array();
        $data['user'] = $MUser->getAllUser();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('users', $data);
        $this->load->view('include/footer');
    }

    public function getEdit()
    {
        $MUser = new MUser();
        $result = $MUser->getEditUser($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editData()
    {
        $Custom = new Custom();
        $editArr = array();
		$flag=0;
		if(!isset($_POST['idUser']) || $_POST['idUser'] == ''){
			$result=4;$flag=1;
			exit();
		}
		
		if(!isset($_POST['userName']) || $_POST['userName'] == ''){
			$result=5;$flag=1;
			exit();
		}
		
		if(!isset($_POST['email']) || $_POST['email'] == ''){
			$result=6;$flag=1;
			exit();
		}
		
		if(!isset($_POST['password']) || $_POST['password'] == ''){
			$result=7;$flag=1;
			exit();
		}
		
        if ($flag==0) {
            $idUser = $_POST['idUser'];
            $editArr['username'] = $_POST['userName'];
			$editArr['email'] = $_POST['email'];
			$editArr['password'] = $_POST['password'];
            $editArr['updateBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:m:s');
            $editData = $Custom->Edit($editArr, 'idUser', $idUser, 'users');
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
        if (isset($_POST['idUser']) && $_POST['idUser'] != '') {
            $idUser = $_POST['idUser'];
            $editArr['status'] = 0;
            $editData = $Custom->Edit($editArr, 'idUser', $idUser, 'users');
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
        if (isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['userName'] = ucfirst($_POST['username']);
			$formArray['email'] = ucfirst($_POST['email']);
			$formArray['password'] = ucfirst($_POST['password']);
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:m:s');

            $InsertData = $Custom->Insert($formArray, 'idUser', 'users', 'N');
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
	
	
	
	function changePassword()
    {
        $Custom = new Custom();
        $editArr = array();
		$flag = 0;
		if(!isset($_POST['newpassword']) || $_POST['newpassword'] == ''){
			$result = 2;
			$flag = 1;
			exit();
		}
		
		if(!isset($_POST['newpasswordconfirm']) || $_POST['newpasswordconfirm'] == '' || $_POST['newpassword']!=$_POST['newpasswordconfirm']){
			$result=3;
			$flag=1;
			exit();
		} 
        if ($flag==0 && isset($_SESSION['login']['idUser']) && $_SESSION['login']['idUser']!='') {
            $idUser = $_SESSION['login']['idUser'];
            $editArr['password'] = $_POST['newpassword'];
            $editData = $Custom->Edit($editArr, 'idUser', $idUser, 'users');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 4;
        }
        echo $result;
    }


} ?>





