<?php ob_start();

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
            $GetReportData = $MSection->getSectionDetailDataByid($searchData['idSection']);

            /*echo '<pre>';
            print_r($GetReportData);
            echo '</pre>';
            exit();*/


//            $getModules = $MModule->getModulesData($searchData);
            $servername = $GetReportData[0]->db_hostname;
            $username = $GetReportData[0]->db_username;
            $password = $GetReportData[0]->db_password;
            $dbname = $GetReportData[0]->db_database;
            $table = $GetReportData[0]->tableName;
            $columns = $GetReportData[0]->columnToShow;
//            $table = $getModules[0]->db_table;
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

            $query = "SELECT " . $columns . " FROM " . $table;

            $Result = sqlsrv_query($conn, $query);
            if ($Result === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sql_res = array();
            while ($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC)) {
                $sql_res[] = $row;
            }
            sqlsrv_free_stmt($Result);
//            $sql_res = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC);
            $res = '<table id="my_table_pro"  class="table table-striped table-bordered  ">';
            $headrow = '<tr>';
            $tbody = '<tr>';
            foreach ($sql_res as $sql_key => $sql_val) {
                $headrow .= '<th>' . $sql_key . '</th>';
                $tbody .= '<td>' . $sql_val . '</td>';
            }
            $headrow .= '</tr>';
            $tbody .= '</tr>';
            $res .= '<thead>' . $headrow . '</thead>';
            $res .= '<tbody>' . $tbody . '</tbody>';
            $res .= '<tfoot>' . $headrow . '</tfoot>';
            /* $getSections = $MSection->getFormData($searchData);
            $getSectionsResult = $this->questionArr($getSections);
           foreach ($getSections as $k => $v) {
                foreach ($sql_res as $sql_key => $sql_val) {
                    if (strtolower($sql_key) == strtolower($v->variable_name)) {
                        if ($v->question_type == 'Input') {
                            $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <input type="text" value="' . $sql_val . '" class="form-control">
                                            </div>
                                        </div>';
                        }
                        if ($v->question_type == 'Radio') {
                            $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <div class="mb-2">';
                            if (isset($v->myrow_options)) {
                                foreach ($v->myrow_options as $child_key => $child_val) {
                                    $res .= '  <div class="form-check ">
                                            <input class="form-check-input" type="radio" value="' . $sql_val . '" disabled ' . ($sql_val == $child_val->option_value ? "checked" : "") . '>
                                            <label class="form-check-label" ><small>' . $child_val->variable_name . ': </small>' . $child_val->label_l1 . '</label>
                                        </div> ';
                                }
                                $res .= '     </div>
      </div>
                                        </div>';
                            }
                        }
                        if ($v->question_type == 'CheckBox') {
                            $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <div class="mb-2">';
                            if (isset($v->myrow_options)) {
                                foreach ($v->myrow_options as $child_key => $child_val) {
                                    $res .= '  <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="' . $sql_val . '" disabled ' . ($sql_val == $child_val->option_value ? "checked" : "") . '>
                                            <label class="form-check-label" ><small>' . $child_val->variable_name . ': </small>' . $child_val->label_l1 . '</label>
                                        </div> ';
                                }
                                $res .= '     </div>
      </div>
                                        </div>';
                            }
                        }

                    }
                }
            }*/
            $res .= '</table>';
            echo $res;
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