<?php

class Section extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->model('msection');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index($slug)
    {
        $data = array();
        $data['slug'] = $slug;
        if (!isset($slug) || $slug == '' || $slug == '$1') {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('section', $data);
        $this->load->view('include/footer');
    }

    function getData()
    {
        $MModule = new MSection();
        $searchData = array();
        $searchData['idProjects'] = (isset($_REQUEST['idProjects']) && $_REQUEST['idProjects'] != '' && $_REQUEST['idProjects'] != 0 ? $_REQUEST['idProjects'] : 0);
        $searchData['idCRF'] = (isset($_REQUEST['idCRF']) && $_REQUEST['idCRF'] != '' && $_REQUEST['idCRF'] != 0 ? $_REQUEST['idCRF'] : 0);
        $searchData['idModule'] = (isset($_REQUEST['idModule']) && $_REQUEST['idModule'] != '' && $_REQUEST['idModule'] != 0 ? $_REQUEST['idModule'] : 0);
        $result = $MModule->getSectionData($searchData);
        echo json_encode($result, true);
    }

    function getSectionDetail()
    {
        $myresult = array();
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = (isset($_REQUEST['idSection']) && $_REQUEST['idSection'] != '' && $_REQUEST['idSection'] != 0 ? $_REQUEST['idSection'] : 0);
        $result = $MSection->getSectionDetailData($searchData);
        foreach ($result as $key => $value) {
            if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists($value->idParentQuestion, $myresult)) {
                $mykey = $value->idParentQuestion;
                $myresult[$mykey]->myrow_options[] = $value;
            } else {
                $mykey = $value->variable_name;
                $myresult[$mykey] = $value;
            }
        }

        $data = array();
        foreach ($myresult as $val) {
            $data[] = $val;
        }

        echo json_encode($data, true);
    }

    /*function getSectionDetail()
    {
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = (isset($_REQUEST['idSection']) && $_REQUEST['idSection'] != '' && $_REQUEST['idSection'] != 0 ? $_REQUEST['idSection'] : 0);
        $result = $MSection->getSectionDetailData($searchData);
        echo json_encode($result, true);
    }*/

    function add_section()
    {
        $data = array();
        $idModule = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
        if (!isset($idModule) || $idModule == '' || $idModule == '$1' || $idModule == 0) {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
        }
        $data['slug'] = $idModule;
        $this->load->model('mmodule');
        $MModule = new MModule();
        $data['module'] = $MModule->getModuleById($idModule);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_section', $data);
        $this->load->view('include/footer');
    }

    function getSectionByModule()
    {
        $MCRF = new MSection();
        $formArray = array();
        $formArray['idModule'] = (isset($_REQUEST['idModule']) && $_REQUEST['idModule'] != '' && $_REQUEST['idModule'] != 0 ? $_REQUEST['idModule'] : 0);
        $data = $MCRF->getSectionData($formArray);
        echo json_encode($data, true);
    }

    function addData()
    {
        $Custom = new Custom();
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('id_of_crf', 'CRF', 'required');
        $this->form_validation->set_rules('idModule', 'CRF', 'required');
        $this->form_validation->set_rules('section_var_name', 'section_var_name', 'required');
        $this->form_validation->set_rules('section_status', 'section_status', 'required');
        $this->form_validation->set_rules('section_table', 'section_table', 'required');

        $formArray = array();
        $formArray['idProjects'] = $this->input->post('project_id');
        $formArray['id_crf'] = $this->input->post('id_of_crf');
        $formArray['idModule'] = $this->input->post('idModule');
        $formArray['section_var_name'] = $this->input->post('section_var_name');
        $formArray['section_status'] = $this->input->post('section_status');
        $formArray['tableName'] = $this->input->post('section_table');

        $section_l_name = '';
        if ($this->input->post('section_name_Languages') != '' && $this->input->post('section_name_Languages') != 'undefined') {
            $name_languagess = $this->input->post('section_name_Languages');
            $formArray['section_title'] = $name_languagess[0];
            foreach ($name_languagess as $key => $value) {
                $formArray['section_title_l' . ((int)$key + 1)] = $value;

                if (((int)$key + 1) == count($name_languagess)) {
                    $section_l_name .= $value;
                } else {
                    $section_l_name .= $value . ', ';
                }
            }
        }
        $section_l_desc = '';
        if ($this->input->post('section_desc_Languages') != '' && $this->input->post('section_desc_Languages') != 'undefined') {
            $desc_languagess = $this->input->post('section_desc_Languages');
            $formArray['section_desc'] = $desc_languagess[0];
            foreach ($desc_languagess as $key => $value) {
                $formArray['section_desc_l' . ((int)$key + 1)] = $value;
                if (((int)$key + 1) == count($desc_languagess)) {
                    $section_l_desc .= $value;
                } else {
                    $section_l_desc .= $value . ', ';
                }
            }
        }
        $InsertData = $Custom->Insert($formArray, 'idSection', 'section', 'M');
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }


    function add_sectiondetail()
    {
        $MSection = new MSection();
        $data = array();
        $idSection = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
        $data['result'] = $MSection->getSectionDetailDataByid($idSection);
        /* $idCRF = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
         if (!isset($idCRF) || $idCRF == '' || $idCRF == '$1' || $idCRF == 0) {
             $MProjects = new MProjects();
             $data['projects'] = $MProjects->getAllProjects();
         } else {
             $data['projects'] = '';
         }
         $data['slug'] = $idCRF;

         $data['crf'] = $MCrf->getCrfById($idCRF); */

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_sectiondetail', $data);
        $this->load->view('include/footer');
    }

    function add_sectiondetail2()
    {
        $MSection = new MSection();
        $data = array();
        $idSection = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
        $data['result'] = $MSection->getSectionDetailDataByid($idSection);
        /* $idCRF = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
         if (!isset($idCRF) || $idCRF == '' || $idCRF == '$1' || $idCRF == 0) {
             $MProjects = new MProjects();
             $data['projects'] = $MProjects->getAllProjects();
         } else {
             $data['projects'] = '';
         }
         $data['slug'] = $idCRF;

         $data['crf'] = $MCrf->getCrfById($idCRF); */

        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_secdetail', $data);
        $this->load->view('include/footer');
    }

    function getSectionDetailData()
    {
        $MSection = new MSection();
        $formArray = array();
        $formArray['idSection'] = (isset($_REQUEST['idSection']) && $_REQUEST['idSection'] != '' && $_REQUEST['idSection'] != 0 ? $_REQUEST['idSection'] : 0);
        $data = $MSection->getSectionDetailData($formArray);
        echo json_encode($data, true);
    }

    function add_sectiondetail_data()
    {
        $Custom = new Custom();
        $formArray = array();
        $subformArray = array();
        $formArray['idSection'] = $this->input->post('idSection');
        $formArray['idModule'] = $this->input->post('idModule');
        $formArray['id_crf'] = $this->input->post('id_crf');
        $formArray['idProjects'] = $this->input->post('idProjects');
        $formArray['variable_name'] = (isset($_POST['variable']) && $_POST['variable'] != '' ? $_POST['variable'] : '');
        $formArray['nature'] = (isset($_POST['nature']) && $_POST['nature'] != '' ? $_POST['nature'] : '');

        if ($formArray['nature'] == 'Input') {
            $formArray['nature_var'] = 'E';
        } elseif ($formArray['nature'] == 'Title') {
            $formArray['nature_var'] = 'T';
        } elseif ($formArray['nature'] == 'Input-Numeric') {
            $formArray['nature_var'] = 'EN';
        } elseif ($formArray['nature'] == 'SelectBox') {
            $formArray['nature_var'] = 'S';
        } elseif ($formArray['nature'] == 'Radio') {
            $formArray['nature_var'] = 'T';
        } elseif ($formArray['nature'] == 'CheckBox') {
            $formArray['nature_var'] = 'C';
        } elseif ($formArray['nature'] == 'TextArea') {
            $formArray['nature_var'] = 'TA';
        } else {
            $formArray['nature_var'] = '';
        }

        $formArray['question_type'] = (isset($_POST['question_type']) && $_POST['question_type'] != '' ? $_POST['question_type'] : '');
        $formArray['MinVal'] = (isset($_POST['min_val']) && $_POST['min_val'] != '' ? $_POST['min_val'] : '');
        $formArray['MaxVal'] = (isset($_POST['max_val']) && $_POST['max_val'] != '' ? $_POST['max_val'] : '');
        $formArray['skipQuestion'] = (isset($_POST['skipQuestion']) && $_POST['skipQuestion'] != '' ? $_POST['skipQuestion'] : '');
        $formArray['idParentQuestion'] = (isset($_POST['parentQuestion']) && $_POST['parentQuestion'] != '' ? $_POST['parentQuestion'] : '');
        $formArray['required'] = (isset($_POST['Required']) && $_POST['Required'] != '' ? $_POST['Required'] : '');
        $formArray['readonly'] = (isset($_POST['ReadOnly']) && $_POST['ReadOnly'] != '' ? $_POST['ReadOnly'] : '');
        $formArray['label_l1'] = (isset($_POST['L1']) && $_POST['L1'] != '' ? $_POST['L1'] : '');
        $formArray['label_l2'] = (isset($_POST['L2']) && $_POST['L2'] != '' ? $_POST['L2'] : '');
        $formArray['label_l3'] = (isset($_POST['L3']) && $_POST['L3'] != '' ? $_POST['L3'] : '');
        $formArray['label_l4'] = (isset($_POST['L4']) && $_POST['L4'] != '' ? $_POST['L4'] : '');
        $formArray['label_l5'] = (isset($_POST['L5']) && $_POST['L5'] != '' ? $_POST['L5'] : '');
        $formArray['insertDB'] = (isset($_POST['insertDB']) && $_POST['insertDB'] != '' ? $_POST['insertDB'] : '');
        $formArray['dbType'] = (isset($_POST['dbType']) && $_POST['dbType'] != '' ? $_POST['dbType'] : '');
        $formArray['dbLength'] = (isset($_POST['dbLength']) && $_POST['dbLength'] != '' ? $_POST['dbLength'] : '');
        $formArray['dbDecimal'] = (isset($_POST['dbDecimal']) && $_POST['dbDecimal'] != '' ? $_POST['dbDecimal'] : '');
        $InsertData = $Custom->Insert($formArray, 'idSectionDetail', 'section_detail', 'Y');
        if (isset($_POST['options']) && $_POST['options'] != '') {
            foreach ($_POST['options'] as $keys => $options) {
                $subformArray['idProjects'] = $formArray['idProjects'];
                $subformArray['id_crf'] = $formArray['id_crf'];
                $subformArray['idModule'] = $formArray['idModule'];
                $subformArray['idSection'] = $formArray['idSection'];
                $subformArray['nature'] = (isset($options['nature']) && $options['nature'] != '' ? $options['nature'] : '');

                if ($subformArray['nature'] == 'Input') {
                    $subformArray['nature_var'] = 'E';
                } elseif ($subformArray['nature'] == 'Title') {
                    $subformArray['nature_var'] = 'T';
                } elseif ($subformArray['nature'] == 'Input-Numeric') {
                    $subformArray['nature_var'] = 'EN';
                } elseif ($subformArray['nature'] == 'SelectBox') {
                    $subformArray['nature_var'] = 'S';
                } elseif ($subformArray['nature'] == 'Radio') {
                    $subformArray['nature_var'] = 'R';
                } elseif ($subformArray['nature'] == 'TextArea') {
                    $subformArray['nature_var'] = 'TA';
                } else {
                    $subformArray['nature_var'] = '';
                }

                $subformArray['variable_name'] = (isset($options['option_var']) && $options['option_var'] != '' ? $options['option_var'] : '');
//                $subformArray['option_title'] = (isset($options['option_title']) && $options['option_title'] != '' ? $options['option_title'] : '');
                $subformArray['label_l1'] = (isset($options['label_l1']) && $options['label_l1'] != '' ? $options['label_l1'] : '');
                $subformArray['label_l2'] = (isset($options['label_l2']) && $options['label_l2'] != '' ? $options['label_l2'] : '');
                $subformArray['label_l3'] = (isset($options['label_l3']) && $options['label_l3'] != '' ? $options['label_l3'] : '');
                $subformArray['label_l4'] = (isset($options['label_l4']) && $options['label_l4'] != '' ? $options['label_l4'] : '');
                $subformArray['label_l5'] = (isset($options['label_l5']) && $options['label_l5'] != '' ? $options['label_l5'] : '');
                $subformArray['option_value'] = (isset($options['option_value']) && $options['option_value'] != '' ? $options['option_value'] : '');
                $subformArray['MinVal'] = (isset($options['option_min_val']) && $options['option_min_val'] != '' ? $options['option_min_val'] : '');
                $subformArray['MaxVal'] = (isset($options['option_max_val']) && $options['option_max_val'] != '' ? $options['option_max_val'] : '');
                $subformArray['skipQuestion'] = (isset($options['option_skipQuestion']) && $options['option_skipQuestion'] != '' ? $options['option_skipQuestion'] : '');
                $subformArray['dbType'] = (isset($options['OptionDbType']) && $options['OptionDbType'] != '' ? $options['OptionDbType'] : '');
                $subformArray['dbLength'] = (isset($options['OptionDbLength']) && $options['OptionDbLength'] != '' ? $options['OptionDbLength'] : '');
                $subformArray['dbDecimal'] = (isset($options['OptionDbDecimal']) && $options['OptionDbDecimal'] != '' ? $options['OptionDbDecimal'] : '');
                $subformArray['idParentQuestion'] = $formArray['variable_name'];
                $Custom->Insert($subformArray, 'idSectionDetail', 'section_detail', 'N');
            }
        }
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }
    function add_sectiondetail_data_option()
    {
        $Custom = new Custom();
        $formArray = array();
        $subformArray = array();
        $formArray['idSection'] = $this->input->post('idSection');
        $formArray['idModule'] = $this->input->post('idModule');
        $formArray['id_crf'] = $this->input->post('id_crf');
        $formArray['idProjects'] = $this->input->post('idProjects');

        if (isset($_POST['options']) && $_POST['options'] != '') {
            foreach ($_POST['options'] as $keys => $options) {
                $subformArray['idProjects'] = $formArray['idProjects'];
                $subformArray['id_crf'] = $formArray['id_crf'];
                $subformArray['idModule'] = $formArray['idModule'];
                $subformArray['idSection'] = $formArray['idSection'];
                $subformArray['nature'] = (isset($options['nature']) && $options['nature'] != '' ? $options['nature'] : '');

                if ($subformArray['nature'] == 'Input') {
                    $subformArray['nature_var'] = 'E';
                } elseif ($subformArray['nature'] == 'Title') {
                    $subformArray['nature_var'] = 'T';
                } elseif ($subformArray['nature'] == 'Input-Numeric') {
                    $subformArray['nature_var'] = 'EN';
                } elseif ($subformArray['nature'] == 'SelectBox') {
                    $subformArray['nature_var'] = 'S';
                } elseif ($subformArray['nature'] == 'Radio') {
                    $subformArray['nature_var'] = 'R';
                } elseif ($subformArray['nature'] == 'TextArea') {
                    $subformArray['nature_var'] = 'TA';
                } else {
                    $subformArray['nature_var'] = '';
                }

                $subformArray['variable_name'] = (isset($options['option_var']) && $options['option_var'] != '' ? $options['option_var'] : '');
//                $subformArray['option_title'] = (isset($options['option_title']) && $options['option_title'] != '' ? $options['option_title'] : '');
                $subformArray['label_l1'] = (isset($options['label_l1']) && $options['label_l1'] != '' ? $options['label_l1'] : '');
                $subformArray['label_l2'] = (isset($options['label_l2']) && $options['label_l2'] != '' ? $options['label_l2'] : '');
                $subformArray['label_l3'] = (isset($options['label_l3']) && $options['label_l3'] != '' ? $options['label_l3'] : '');
                $subformArray['label_l4'] = (isset($options['label_l4']) && $options['label_l4'] != '' ? $options['label_l4'] : '');
                $subformArray['label_l5'] = (isset($options['label_l5']) && $options['label_l5'] != '' ? $options['label_l5'] : '');
                $subformArray['option_value'] = (isset($options['option_value']) && $options['option_value'] != '' ? $options['option_value'] : '');
                $subformArray['MinVal'] = (isset($options['option_min_val']) && $options['option_min_val'] != '' ? $options['option_min_val'] : '');
                $subformArray['MaxVal'] = (isset($options['option_max_val']) && $options['option_max_val'] != '' ? $options['option_max_val'] : '');
                $subformArray['skipQuestion'] = (isset($options['option_skipQuestion']) && $options['option_skipQuestion'] != '' ? $options['option_skipQuestion'] : '');

                $subformArray['dbType'] = (isset($options['OptionDbType']) && $options['OptionDbType'] != '' ? $options['OptionDbType'] : '');
                $subformArray['dbLength'] = (isset($options['OptionDbLength']) && $options['OptionDbLength'] != '' ? $options['OptionDbLength'] : '');
                $subformArray['dbDecimal'] = (isset($options['OptionDbDecimal']) && $options['OptionDbDecimal'] != '' ? $options['OptionDbDecimal'] : '');


                $subformArray['idParentQuestion'] = (isset($options['OptionParentQuestion']) && $options['OptionParentQuestion'] != '' ? $options['OptionParentQuestion'] : '');

                $InsertData=  $Custom->Insert($subformArray, 'idSectionDetail', 'section_detail', 'N');
            }
        }
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

    function add_sectiondetail_data2()
    {
        $Custom = new Custom();
        $formArray = array();
        $subformArray = array();
        $formArray['idSection'] = $this->input->post('idSection');
        $formArray['idModule'] = $this->input->post('idModule');
        $formArray['id_crf'] = $this->input->post('id_crf');
        $formArray['idProjects'] = $this->input->post('idProjects');


        foreach ($_POST['data'] as $key => $value) {
            $formArray['variable_name'] = $value['variable'];
            $formArray['nature'] = $value['nature'];
            $formArray['seq_no'] = $key;
            $formArray['MinVal'] = (isset($value['min_val']) && $value['min_val'] != '' ? $value['min_val'] : '');
            $formArray['MaxVal'] = (isset($value['max_val']) && $value['max_val'] != '' ? $value['max_val'] : '');
            $formArray['skipQuestion'] = (isset($value['skipQuestion']) && $value['skipQuestion'] != '' ? $value['skipQuestion'] : '');
            $formArray['required'] = (isset($value['required']) && $value['required'] != '' ? $value['required'] : '');
            $formArray['readonly'] = (isset($value['readonly']) && $value['readonly'] != '' ? $value['readonly'] : '');
            $formArray['label_l1'] = (isset($value['L1']) && $value['L1'] != '' ? $value['L1'] : '');
            $formArray['label_l2'] = (isset($value['L2']) && $value['L2'] != '' ? $value['L2'] : '');
            $formArray['label_l3'] = (isset($value['L3']) && $value['L3'] != '' ? $value['L3'] : '');
            $formArray['label_l4'] = (isset($value['L4']) && $value['L4'] != '' ? $value['L4'] : '');
            $formArray['label_l5'] = (isset($value['L5']) && $value['L5'] != '' ? $value['L5'] : '');

            $InsertData = $Custom->Insert($formArray, 'idSectionDetail', 'section_detail', 'Y');
            if (isset($value['options']) && $value['options'] != '') {
                foreach ($value['options'] as $keys => $options) {
                    if ($value['nature'] == 'SelectBox') {
                        $subformArray['nature'] = 'Options';
                    } elseif ($value['nature'] == 'Radio') {
                        $subformArray['nature'] = 'RadioOptions';
                    } elseif ($value['nature'] == 'Checkbox') {
                        $subformArray['nature'] = 'COption';
                    }
                    $subformArray['idProjects'] = $formArray['idProjects'];
                    $subformArray['id_crf'] = $formArray['id_crf'];
                    $subformArray['idModule'] = $formArray['idModule'];
                    $subformArray['idSection'] = $formArray['idSection'];
                    $subformArray['variable_name'] = (isset($options['option_var']) && $options['option_var'] != '' ? $options['option_var'] : '');
                    $subformArray['option_title'] = (isset($options['option_title']) && $options['option_title'] != '' ? $options['option_title'] : '');
                    $subformArray['label_l1'] = (isset($options['option_title_0']) && $options['option_title_0'] != '' ? $options['option_title_0'] : '');
                    $subformArray['label_l2'] = (isset($options['option_title_1']) && $options['option_title_1'] != '' ? $options['option_title_1'] : '');
                    $subformArray['label_l3'] = (isset($options['option_title_2']) && $options['option_title_2'] != '' ? $options['option_title_2'] : '');
                    $subformArray['label_l4'] = (isset($options['option_title_3']) && $options['option_title_3'] != '' ? $options['option_title_3'] : '');
                    $subformArray['label_l5'] = (isset($options['option_title_4']) && $options['option_title_4'] != '' ? $options['option_title_4'] : '');
                    $subformArray['option_value'] = (isset($options['option_value']) && $options['option_value'] != '' ? $options['option_value'] : '');
                    $subformArray['idParentQuestion'] = $formArray['variable_name'];
                    $Custom->Insert($subformArray, 'idSectionDetail', 'section_detail', 'N');
                }
            }


            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
        }
        echo $result;
    }


    function deleteSectionDetail()
    {
        if (isset($_POST['idSectionDetail']) && $_POST['idSectionDetail'] != '') {
            $Custom = new Custom();
            $idSectionDetail = $_POST['idSectionDetail'];
            $editArr = array();
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idSectionDetail', $idSectionDetail, 'section_detail');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            echo 3;
        }
        echo $result;
    }


    function getSectionDetailById()
    {
        $MSection = new MSection();
        $formArray = array();
        $formArray['idSectionDetail'] = (isset($_REQUEST['idSectionDetail']) && $_REQUEST['idSectionDetail'] != '' && $_REQUEST['idSectionDetail'] != 0 ? $_REQUEST['idSectionDetail'] : 0);
        $data = $MSection->getSectionDetailsByid($formArray);
        echo json_encode($data, true);
    }

    function editSectionDetail()
    {
        if (isset($_POST['edit_idSectionDetail']) && $_POST['edit_idSectionDetail'] != '') {
            $Custom = new Custom();
            $idSectionDetail = $_POST['edit_idSectionDetail'];
            $editArr = array();

            $editArr['nature'] = (isset($_POST['edit_nature']) && $_POST['edit_nature'] != '' ? $_POST['edit_nature'] : '');
            if ($editArr['nature'] == 'Input') {
                $editArr['nature_var'] = 'E';
            } elseif ($editArr['nature'] == 'Label' || $editArr['nature'] == 'Title' ) {
                $editArr['nature_var'] = 'T';
            } elseif ($editArr['nature'] == 'Input-Numeric') {
                $editArr['nature_var'] = 'EN';
            } elseif ($editArr['nature'] == 'SelectBox') {
                $editArr['nature_var'] = 'S';
            } elseif ($editArr['nature'] == 'Radio') {
                $editArr['nature_var'] = 'R';
            } elseif ($editArr['nature'] == 'TextArea') {
                $editArr['nature_var'] = 'TA';
            } else {
                $editArr['nature_var'] = '';
            }

            $editArr['MinVal'] = (isset($_POST['edit_MinVal']) && $_POST['edit_MinVal'] != '' ? $_POST['edit_MinVal'] : '');
            $editArr['MaxVal'] = (isset($_POST['edit_MaxVal']) && $_POST['edit_MaxVal'] != '' ? $_POST['edit_MaxVal'] : '');
            $editArr['skipQuestion'] = (isset($_POST['edit_skipQuestion']) && $_POST['edit_skipQuestion'] != '' ? $_POST['edit_skipQuestion'] : '');
            $editArr['idParentQuestion'] = (isset($_POST['edit_idParentQuestion']) && $_POST['edit_idParentQuestion'] != '' ? $_POST['edit_idParentQuestion'] : '');
            $editArr['required'] = (isset($_POST['edit_Required']) && $_POST['edit_Required'] != '' ? 'Required' : '');
            $editArr['readonly'] = (isset($_POST['edit_ReadOnly']) && $_POST['edit_ReadOnly'] != '' ? 'ReadOnly' : '');
            $editArr['label_l1'] = (isset($_POST['edit_label_l1']) && $_POST['edit_label_l1'] != '' ? $_POST['edit_label_l1'] : '');
            $editArr['label_l2'] = (isset($_POST['edit_label_l2']) && $_POST['edit_label_l2'] != '' ? $_POST['edit_label_l2'] : '');
            $editArr['label_l3'] = (isset($_POST['edit_label_L3']) && $_POST['edit_label_L3'] != '' ? $_POST['edit_label_L3'] : '');
            $editArr['label_l4'] = (isset($_POST['edit_label_L4']) && $_POST['edit_label_L4'] != '' ? $_POST['edit_label_L4'] : '');
            $editArr['label_l5'] = (isset($_POST['edit_label_L5']) && $_POST['edit_label_L5'] != '' ? $_POST['edit_label_L5'] : '');

            $editArr['option_value'] = (isset($_POST['edit_option_value']) && $_POST['edit_option_value'] != '' ? $_POST['edit_option_value'] : '');
            $editArr['insertDB'] = (isset($_POST['edit_insertDB']) && $_POST['edit_insertDB'] != '' ? $_POST['edit_insertDB'] : '');
            $editArr['dbType'] = (isset($_POST['edit_dbType']) && $_POST['edit_dbType'] != '' ? $_POST['edit_dbType'] : '');
            $editArr['dbLength'] = (isset($_POST['edit_dbLength']) && $_POST['edit_dbLength'] != '' ? $_POST['edit_dbLength'] : '');
            $editArr['dbDecimal'] = (isset($_POST['edit_dbDecimal']) && $_POST['edit_dbDecimal'] != '' ? $_POST['edit_dbDecimal'] : '');

            $editData = $Custom->Edit($editArr, 'idSectionDetail', $idSectionDetail, 'section_detail');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            echo 3;
        }
        echo $result;
    }

} ?>





