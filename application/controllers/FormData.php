<?php ob_start();
error_reporting(0);

class FormData extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('MProjects');
        $this->load->model('MSection');
        $this->load->model('Mformdata');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MProjects = new MProjects();
        $data = array();
        $data['projects'] = $MProjects->getAllProjects();/*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Form Data Page",
            "result" => "View Form Data page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('formdata', $data);
        $this->load->view('include/footer');
    }

    function getData()
    {
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {
            $idProject = $_REQUEST['project'];
            $this->load->model('mmodule');
            $this->load->model('msection');
            $MProjects = new MProjects();
            $MModule = new MModule();
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $idProject;
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $searchData['hfcode'] = (isset($_REQUEST['hfcode']) && $_REQUEST['hfcode'] != '' && $_REQUEST['hfcode'] != 0 ? $_REQUEST['hfcode'] : 0);
            $GetReportData = $MSection->getSectionDetailDataByid($searchData['idSection']);
            $servername = $GetReportData[0]->db_hostname;
            $username = $GetReportData[0]->db_username;
            $password = $GetReportData[0]->db_password;
            $dbname = $GetReportData[0]->db_database;
            if (isset($GetReportData[0]->tableName) && $GetReportData[0]->tableName != '') {
                $table = $GetReportData[0]->tableName;
            } else {
                die(print_r('Invalid Table', true));
            }

            if (isset($GetReportData[0]->columnToShow) && $GetReportData[0]->columnToShow != '') {
                $columns = $GetReportData[0]->columnToShow;
            } else {
                $columns = '*';
            }
            if ($GetReportData[0]->db_type == 'sqlserver') {
                $connectionInfo = array("Database" => $dbname, "UID" => $username, "PWD" => $password);
                $conn = sqlsrv_connect($servername, $connectionInfo);
                if ($conn === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
            } else {
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            }

            $query = "SELECT TOP(1) " . $columns . " FROM " . $table . " where hfcode='" . $searchData['hfcode'] . "' ";

            $Result = sqlsrv_query($conn, $query);
            if ($Result === false) {
                die(print_r(sqlsrv_errors(), true));
            }


            $sql_res = array();

            while ($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC)) {
                $sql_res[] = $row;
            }
            sqlsrv_free_stmt($Result);

            $getSections = $MSection->getFormData($searchData);
            $data = $this->questionArr($getSections);

            $res = '';
            /*echo '<pre>';
               print_r($sql_res);
               echo '</pre>';
               exit();*/
            $html = '';
            $innterHtml = '';
            if (isset($data) && $data != '') {
                foreach ($data as $k => $v) {
                    $var = strtolower($v->variable_name);
                    $sql_val = $sql_res[0][$var];

                    if (array_key_exists($var, $sql_res[0]) || $v->nature == 'Title') {
                        $missingClass = '';
                    } else {
                        $missingClass = 'missing';
                    }


                    if (isset($v->skipQuestion) && $v->skipQuestion != '') {
                        $skip = '<p class="red">Note: skip to ' . $v->skipQuestion . '</p>';
                        $from = "'$var'";
                        $to = "'$v->skipQuestion'";
                        $skipTo = 'onclick="skipTo(this,' . strtolower($from) . ',' . strtolower($to) . ')"';
                    } else {
                        $skip = '';
                        $skipTo = '';
                    }
                    if ($v->nature == 'Radio' || $v->nature == 'CheckBox') {
                        $innterHtml = '<label class="main_question_head ' . strtolower($var) . ' ' . $missingClass . ' ">
                                                                            <small>' . strtolower($var) . ':</small> ' . $v->label_l1 . '
                                                                       </label>' . $skip;
                    } elseif ($v->nature == 'Input' || $v->nature == 'Input-Numeric') {
                        $innterHtml = '<div class="' . strtolower($var) . '">
                                                                            <label for="' . strtolower($var) . '" class="main_question_head ' . $missingClass . '">
                                                                                <small>' . strtolower($var) . ':</small> ' . $v->label_l1 . '
                                                                            </label>
                                                                            <input type="text"   readonly disabled value="' . $sql_val . '" id="' . strtolower($var) . '" name="' . strtolower($var) . '" >
                                                                        </div>';
                    } elseif ($v->nature == 'Title') {
                        $innterHtml = '<h6 class="main_question_head  ' . $missingClass . ' ' . strtolower($var) . '">
                                                                            <small>' . strtolower($var) . ':</small> ' . $v->label_l1 . ' 
                                                                       </h6>';
                    }

                    if (isset($v->myrow_options) && $v->myrow_options != '') {
                        foreach ($v->myrow_options as $c_k => $c_v) {
                            $c_var = strtolower($c_v->variable_name);

                            if ($v->nature == 'Radio') {
                                $c_sql_val = $sql_res[0][$var];
                            } else {
                                $c_sql_val = $sql_res[0][$c_var];
                                if (array_key_exists($c_var, $sql_res[0]) || $c_v->nature == 'Title') {
                                    $c_missingClass = '';
                                } else {
                                    $c_missingClass = 'missing';
                                }
                            }

                            if (isset($c_v->skipQuestion) && $c_v->skipQuestion != '') {
                                $c_skip = '<small class="red">Note: skip to ' . $c_v->skipQuestion . '</small>';
                                $from = "'$var'";
                                $to = "'$c_v->skipQuestion'";
                                $c_skipTo = 'onchange="skipTo(this,' . strtolower($from) . ',' . strtolower($to) . ')"';
                            } else {
                                $from = "'$var'";
                                $to = "'$var'";
                                $c_skip = '';
                                $c_skipTo = 'onchange="returnTo(this,' . strtolower($from) . ')"';;
                            }

                            if ($c_v->nature == 'Radio' || $c_v->nature == 'CheckBox') {
                                $innterHtml .= '<div class="form-check ' . $c_var . '">
                                                                                    <input type="' . strtolower($c_v->nature) . '" class="form-check-input" 
                                                                                         value="' . $c_sql_val . '" disabled ' .
                                    ($c_sql_val == $c_v->option_value ? "checked" : "") . ' 
                                                                                         id="' . $c_var . '"
                                                                                         name="' . strtolower($var) . '" ' . $c_skipTo . '>
                                                                                    <label for="' . $c_var . '" class="form-check-label  ' . $c_missingClass . '">
                                                                                        <small>' . $c_var . ':</small> ' . $c_v->label_l1 . '
                                                                                    </label> ' . $c_skip . '
                                                                                </div>';
                            } elseif (($v->nature == 'Radio' || $v->nature == 'CheckBox') && ($c_v->nature == 'Input' || $c_v->nature == 'Input-Numeric')) {
                                $innterHtml .= '<div class="form-check ' . $c_var . '">
                                                                                    <input type="' . strtolower($v->nature) . '" class="form-check-input" 
                                                                                         value="' . $c_v->option_value . '" disabled ' .
                                    ($c_sql_val == $c_v->option_value ? "checked" : "") . ' id="' . $c_var . '"
                                                                                         name="' . strtolower($var) . '" onclick="showInp(this)"  ' . $c_skipTo . '>
                                                                                    <label for="' . $c_var . '" class="form-check-label  ' . $c_missingClass . '">
                                                                                        <small>' . $c_var . ':</small> ' . $c_v->label_l1 . '
                                                                                    </label>' . $c_skip . '
                                                                                </div>';
                                $va = $sql_res[0][$c_var . 'x'];
                                if (isset($va) && $va != '' && $va != '-1' &&
                                    ($c_v->nature == 'Input' || $c_v->nature == 'Input-Numeric')) {
                                    $innterHtml .= '<div class="  toggleInp ' . $c_var . 'x">
                                                                                        <label for="' . $c_var . 'x" class=" ' . $c_missingClass . '">
                                                                                            <small>' . $c_var . 'x:</small> ' . $c_v->label_l1 . '
                                                                                        </label>' . $c_skip . '
                                                                                        <input type="text"  class="form-control" id="' . $c_var . 'x" 
                                                                                        readonly disabled   value="' . $va . '"
                                                                                            name="' . $c_var . 'x" >
                                                                                </div>';
                                }
                            } elseif ($c_v->nature == 'Input' || $c_v->nature == 'Input-Numeric') {
                                $innterHtml .= '<div class="' . $c_var . '">
                                                                                    <label for="' . $c_var . '" class=" ' . $c_missingClass . '">
                                                                                        <small>' . $c_var . ':</small> ' . $c_v->label_l1 . '
                                                                                    </label>' . $c_skip . '
                                                                                    <input type="text" readonly disabled   value="' . $c_sql_val . '" 
                                                                                            id="' . $c_var . '" name="' . $c_var . '" >
                                                                                </div>';
                            }


                        }
                    }


                    $html = '<li class="list-group-item bg-blue-grey bg-lighten-4 mainli div_' . strtolower($var) . '">';
                    $html .= $innterHtml;
                    $html .= '</li> ';
                    echo $html;
                }
            }


            $chkNextSec = $MSection->chkNextSec($searchData);

            if (isset($chkNextSec[0]) && $chkNextSec[0] != '') {
                $res .= ' <button type="button" class="btn bg-gradient-radial-red white"
                                            onclick="getNextSect(' . $chkNextSec[0]->idSection . ';)"> Next Section (' . $chkNextSec[0]->section_title . ')
                                    </button>';
            }

            $html .= $res;

            echo $html;
        } else {
            echo 'Invalid Project, Please select project';
        }
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

} ?>