<?php

class Dashboard extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }


    function index()
    {
        $MProjects = new MProjects();
        $data = array();
        $data['projects'] = $MProjects->getAllProjects();

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('project', $data);
        $this->load->view('include/footer');
    }

    function test()
    {
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>';
    }


}

?>
