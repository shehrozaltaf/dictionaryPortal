<?php header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: shahroz.khan
 * Date: 23/10/2018
 * Time: 10:11 AM
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mlogin');
    }

    function index($msg = NULL)
    {
        $data = array();
        $Login = new MLogin();
        $SeesionInfo = $this->session->all_userdata();
        if (isset($_SESSION['login']['idUser'])) {
            redirect(base_url('index.php/dashboard'));
        } else {
            $this->load->view('login', $data);
        }
    }

    function getLogin()
    {
        $username = $this->input->post('UserName');
        $Password = $this->input->post('Password');
        if (!isset($username) || $username == '' || $username == 'undefined') {
            echo 4;
            exit();
        }
        if (!isset($Password) || $Password == '' || $Password == 'undefined') {
            echo 5;
            exit();
        }
        $Login = new MLogin();
        $this->form_validation->set_rules('UserName', 'UserName', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo 3;
            exit();
        } else {
            $result = $Login->validate($username, $Password);
            if (count($result) == 1) {
                if ($Password === $result[0]->password) {
                    $data = array(
                        'idUser' => $result[0]->idUser,
                        'UserName' => $result[0]->username,
                        'idOrg' => (isset($result[0]->idOrg) && $result[0]->idOrg != '' ? $result[0]->idOrg : ''),
                        'idGroup' => (isset($result[0]->idGroup) && $result[0]->idGroup != '' ? $result[0]->idGroup : '')
                    );
                    $this->session->set_userdata('login', $data);
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 3;
            }
        }
    }

    function getLogout()
    {
        session_destroy();
    }

}
