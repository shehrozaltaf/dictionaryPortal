<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Custom extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function selectAll($Qry)
    {
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        } else {
            return 0;
        }
    }

    function Insert($Data, $idReturn, $table, $getLastId = 'N')
    {
        $insert = $this->db->insert($table, $Data);
        if ($insert) {
            if ($getLastId === 'Y') {
                $returnValue = $this->db->insert_id();
            } elseif (!isset($Data[$idReturn]) || $Data[$idReturn] == '') {
                $returnValue = 1;
            } else {
                $returnValue = $Data[$idReturn];
            }
            return $returnValue;
        } else {
            return FALSE;
        }
    }

    function Edit($Data, $key, $value, $table)
    {
        $this->db->where($key, $value);
        $update = $this->db->update($table, $Data);
        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function getGUID()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12);
            return $uuid;
        }
    }

    /*==========Log=============*/
    function trackLogs($array)
    {
        date_default_timezone_set("Asia/Karachi");
        $UserName = (isset($array['UserName ']) ? $array['UserName '] : $_SESSION['login']['UserName']);
        if (isset($array['log_type']) && $array['log_type'] == 'user_logs') {
            $logFilePath = 'customLogs/user_logs/' . $UserName . 'logs_' . date("n_j_Y") . '.txt';
        } else {
            $logFilePath = 'customLogs/daily_logs/logs_' . date("n_j_Y") . '.txt';
        }
        $action = (isset($array['action']) ? $array['action'] : 'Invalid Action');
        $result = (isset($array['result']) ? $array['result'] : 'Invalid Result');
        $idUser = (isset($array['idUser']) ? $array['idUser'] : $_SESSION['login']['idUser']);


        $log = "UserIPAddress: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F-j-Y g:i a") . PHP_EOL .
            "idUser: " . $idUser .
            ", UserName: " . $UserName . PHP_EOL .
            "Action: " . $action . PHP_EOL .
            "Result: " . $result . PHP_EOL .
            "-------------------------------------------------" . PHP_EOL;
        $txt = fopen($logFilePath, "a") or die("Unable to open file!");
        fwrite($txt, $log);
        fclose($txt);
//        echo file_put_contents($logFilePath . date("n_j_Y") . '.txt', $log);
    }

}