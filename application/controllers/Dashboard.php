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
        echo 1;
        $data = array(
            'B204',
            'B204_1',
            'B204_1',
            'B204_11',
            'B204_12',
            'B204_13',
            'B204_13_TITLE',
            'B204_14',
            'B204_15',
            'B204_16',
            'B204_18',
            'B204_19',
            'B204_2',
            'B204_20',
            'B204_21',
            'B204_22',
            'B204_23',
            'B204_23TITLE',
            'B204_24',
            'B204_25',
            'B204_27',
            'B204_28',
            'B204_3',
            'B204_30',
            'B204_31',
            'B204_4',
            'B204_5',
            'B204_6',
            'B204_7',
            'B204_X1',
            'B204_X2',
            'B204_X3'



        );
        $e = $this->RadixSort($data, 7);
        print_r($e);
    }

    function RadixSort(&$data, $count)
    {
        for ($shift = 31; $shift > -1; $shift--) {
            $j = 0;

            for ($i = 0; $i < $count; $i++) {
                $move = ($data[$i] << $shift) >= 0;

                if ($shift == 0 ? !$move : $move)
                    $data[$i - $j] = $data[$i];
                else
                    $temp[$j++] = $data[$i];
            }

            for ($i = 0; $i < $j; $i++) {
                $data[($count - $j) + $i] = $temp[$i];
            }
        }

        $temp = null;
        return $data;
    }


}

?>
