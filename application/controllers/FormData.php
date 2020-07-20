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

            $getSectionsResult = $this->questionArr($getSections);

            $res = '';
            foreach ($getSectionsResult as $k => $v) {
                foreach ($sql_res[0] as $sql_key => $sql_val) {
                    if (strtolower($sql_key) == strtolower($v->variable_name)) {
                        if ($v->question_type == 'Input') {
                            $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <input type="text" readonly disabled value="' . $sql_val . '" class="form-control">
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
                                    $va = $sql_res[0][$sql_key . 'xx'];
                                    if (isset($va) && $va != '' && $va != '-1' && ($child_val->question_type == 'Input' || $child_val->question_type == 'Input-Numeric')) {
                                        $res .= '<div class="col-md-12">
                                                        <div class="form-group"> 
                                                            <input type="text" readonly disabled value="' . $va . '" class="form-control">
                                                        </div>
                                                 </div>';
                                    }
                                }
                            }
                            $res .= '     </div>
                                          </div>
                                        </div>
                                        ';
                        }
                        if ($v->question_type == 'CheckBox') {
                            $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <div class="mb-2">';
                            if (isset($v->myrow_options)) {
                                foreach ($v->myrow_options as $child_key => $child_val) {
                                    $res .= '  <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="' . $v->option_value . '" disabled ' . ($v->option_value == $child_val->option_value ? "checked" : "") . '>
                                            <label class="form-check-label" ><small>' . $child_val->variable_name . ': </small>' . $child_val->label_l1 . '</label>
                                        </div> ';

                                    $va = $sql_res[0][$sql_key . 'xx'];
                                    if (isset($va) && $va != '' && $va != '-1' && ($child_val->question_type == 'Input' || $child_val->question_type == 'Input-Numeric')) {
                                        $res .= '<div class="col-md-12">
                                                        <div class="form-group"> 
                                                            <input type="text" readonly disabled value="' . $va . '" class="form-control">
                                                        </div>
                                                 </div>';
                                    }
                                }
                            }
                            $res .= '     </div>
                                            </div>
                                        </div>';
                        }
                    }
                }
            }


            $chkNextSec = $MSection->chkNextSec($searchData);

            if (isset($chkNextSec[0]) && $chkNextSec[0] != '') {
                $res .= ' <button type="button" class="btn bg-gradient-radial-red white"
                                            onclick="getNextSect(' . $chkNextSec[0]->idSection . ';)"> Next Section (' . $chkNextSec[0]->section_title . ')
                                    </button>';
            }

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

    function has_next($array)
    {
        if (is_array($array)) {
            if (next($array) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    function getData2()
    {
        /*$a1 = array('a01',
            'a03d',
            'a03m',
            'a03y',
            'a07',
            'a08',
            'a09');
        $a2 = array(
            'a01',
            'a02',
            'a03',
            'a04',
            'a05',
            'a06',
            'a06a',
            'a06b',
            'a06c',
            'a07',
            'a07a',
            'a07b' ,
            'a07c',
            'a07d',
            'a07e',
            'a07f',
            'a07g',
            'a07h' ,
            'a08',
            'a09' );
        $result = array_intersect($a1, $a2);
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        exit();*/

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

            $query = "SELECT TOP(1) " . $columns . " FROM " . $table . " ";
            $Result = sqlsrv_query($conn, $query);
            if ($Result === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            $sql_res = array();
            while ($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC)) {
                $sql_res[] = $row;
            }

            $myArr = array();
            $getSections = $MSection->getFormData($searchData);
            foreach ($getSections as $k => $v) {
                $va = strtolower($v->variable_name);
                $myArr[$va] = 0;
            }

            $myArr2 = array();

            foreach ($sql_res[0] as $k => $v) {
                $vaa = strtolower($k);
                $myArr2[$vaa] = 0;
            }
            $result = array_intersect_assoc($myArr2, $myArr);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            exit();


            $getSectionsResult = $this->questionArr($ress);


            $res = '';
            foreach ($getSectionsResult as $k => $v) {
                if ($v->question_type == 'Input') {
                    $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <input type="text" value="' . $v->option_value . '" class="form-control">
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
                                            <input class="form-check-input" type="radio" value="' . $v->option_value . '" disabled ' . ($v->option_value == $child_val->option_value ? "checked" : "") . '>
                                            <label class="form-check-label" ><small>' . $child_val->variable_name . ': </small>' . $child_val->label_l1 . '</label>
                                        </div> ';
                            $va = $v->variable_name . 'xx';
                            if (isset($va) && $va != '' && $va != '-1' && ($child_val->question_type == 'Input' || $child_val->question_type == 'Input-Numeric')) {
                                $res .= '<div class="col-md-12">
                                                        <div class="form-group"> 
                                                            <input type="text" value="' . $va . '" class="form-control">
                                                        </div>
                                                 </div>';
                            }
                        }
                    }
                    $res .= '     </div>
                                          </div>
                                        </div>';
                }
                if ($v->question_type == 'CheckBox') {
                    $res .= '<div class="col-md-12">
                                            <div class="form-group">
                                                <label><small>' . $v->variable_name . '</small>: ' . $v->label_l1 . '</label>
                                                <div class="mb-2">';
                    if (isset($v->myrow_options)) {
                        foreach ($v->myrow_options as $child_key => $child_val) {
                            $res .= '  <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="' . $v->option_value . '" disabled ' . ($v->option_value == $child_val->option_value ? "checked" : "") . '>
                                            <label class="form-check-label" ><small>' . $child_val->variable_name . ': </small>' . $child_val->label_l1 . '</label>
                                        </div> ';

                            $va = $v->variable_name . 'xx';
                            if (isset($va) && $va != '' && $va != '-1' && ($child_val->question_type == 'Input' || $child_val->question_type == 'Input-Numeric')) {
                                $res .= '<div class="col-md-12">
                                                        <div class="form-group"> 
                                                            <input type="text" value="' . $va . '" class="form-control">
                                                        </div>
                                                 </div>';
                            }
                        }
                    }
                    $res .= '     </div>
                                            </div>
                                        </div>';
                }
            }
            echo $res;
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function unMatched()
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

            $query = "SELECT " . $columns . " FROM " . $table . " ";
            $Result = sqlsrv_query($conn, $query);
            if ($Result === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $sql_res = array();
            while ($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC)) {
                $sql_res[] = $row;
            }
            sqlsrv_free_stmt($Result);

            $res = '<table>
                        <tr>
                            <th>Varibale</th>
                            <th>Label</th>
                        </tr>';
            $getSections = $MSection->getFormData($searchData);

            foreach ($getSections as $k => $v) {
                $res .= '<tr>
                                <td>' . strtolower($v->variable_name) . '</td>
                                <td>' . $v->label_l1 . '</td>
                         </tr>';
            }
            $res .= '</table>';
            echo $res;
        } else {
            echo 'Invalid Section, Please select Section';
        }
    }
} ?>