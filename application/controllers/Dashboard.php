<?php
ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
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
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard",
            "result" => "View Dashboard page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('project', $data);
        $this->load->view('include/footer');
    }

    /*Setting Page, User Rights*/
    function getMenuData()
    {
        $this->load->model('msettings');
        $idGroup = $_SESSION['login']['idGroup'];
        $Menu = '';
        $Msetting = new MSettings();
        $getDataRights = $Msetting->getUserRights($idGroup, '1', '');
        if (isset($getDataRights) && count($getDataRights) >= 1) {

            $myresult = array();
            foreach ($getDataRights as $key => $value) {
                if (isset($value->idParent) && $value->idParent != '' && array_key_exists(strtolower($value->idParent), $myresult)) {
                    $mykey = strtolower($value->idParent);
                    $myresult[strtolower($mykey)]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->idPages);
                    $myresult[strtolower($mykey)] = $value;
                }
            }
            foreach ($myresult as $pages) {
                if ($pages->isParent == 1) {
                    $Menu .= '<li class=" nav-item   ' . $pages->menuClass . ' has-sub">
                                      <a href="javascript:void(0)"> 
                                         <i class="' . $pages->menuIcon . '"></i>
                                          <span class="menu-title" data-i18n="">' . $pages->pageName . '</span>
                                       </a> <ul class="menu-content"> ';
                    if (isset($pages->myrow_options) && $pages->myrow_options != '') {
                        foreach ($pages->myrow_options as $options) {
                            $Menu .= ' <li class="' . $options->menuClass . '">
                                        <a class="menu-item " href="' . base_url($options->pageUrl) . '">
                                           ' . $options->pageName . '
                                        </a>
                                      </li>';
                        }
                    }
                    $Menu .= ' </ul></li>';
                } else {
                    $Menu .= '<li class=" nav-item ' . $pages->menuClass . '">
                                    <a href="' . base_url($pages->pageUrl) . '" class="">
                                        <i class="ft-file-text"></i>
                                        <span class="menu-title" data-i18n="">' . $pages->pageName . '</span>
                                    </a>
                              </li>';
                }
            }
        } else {
            $Menu = '';
        }
        $Menu .= '<li class=" nav-item">
                <a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i class="ft-power"></i>
                    Logout</a>
            </li>';
        echo $Menu;
    }

}

?>