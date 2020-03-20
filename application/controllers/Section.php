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

    function getSectionDetail()
    {
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = (isset($_REQUEST['idSection']) && $_REQUEST['idSection'] != '' && $_REQUEST['idSection'] != 0 ? $_REQUEST['idSection'] : 0);
        $result = $MSection->getSectionDetailData($searchData);
        $data = $this->questionArr($result);
        echo json_encode($data, true);
    }

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
        $formArray['isActive'] = 1;
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
        $InsertData = $Custom->Insert($formArray, 'idSections', 'section', 'M');
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
        $formArray['variable_name'] = (isset($_POST['variable']) && $_POST['variable'] != '' ? trim($_POST['variable']) : '');
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
        $formArray['idParentQuestion'] = (isset($_POST['parentQuestion']) && $_POST['parentQuestion'] != '' ? trim($_POST['parentQuestion']) : '');
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
        $formArray['child_seq_no'] = 0;
        $formArray['isActive'] = 1;
        $MSection = new MSection();

        $maxVarArray = array();
        $maxVarArray['idSection'] = $formArray['idSection'];
        $maxVarArray['idModule'] = $formArray['idModule'];
        $maxVariable = $MSection->maxVariable($maxVarArray);

        if (isset($maxVariable[0]->maxVariable) && $maxVariable[0]->maxVariable != '') {
            $formArray['seq_no'] = $maxVariable[0]->maxVariable + 1;
        } else {
            $formArray['seq_no'] = 1;
        }

        $checkVariable = $MSection->checkVariable_maxVariable($formArray);

        if (isset($checkVariable[0]->variable_name) && $checkVariable[0]->variable_name != '') {
            $result[] = array('0' => 'error', '1' => 'Duplicate question variable: ' . $formArray['variable_name']);
        } else {
            $InsertData = $Custom->Insert($formArray, 'idSectionDetail', 'section_detail', 'Y');
            if ($InsertData) {
                $result[] = array('0' => 'success', '1' => 'Successfully inserted: ' . $formArray['variable_name']);
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
                        } elseif ($subformArray['nature'] == 'CheckBox') {
                            $subformArray['nature_var'] = 'C';
                        } elseif ($subformArray['nature'] == 'TextArea') {
                            $subformArray['nature_var'] = 'TA';
                        } else {
                            $subformArray['nature_var'] = '';
                        }
                        $subformArray['variable_name'] = (isset($options['option_var']) && $options['option_var'] != '' ? trim($options['option_var']) : '');
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
                        $subformArray['idParentQuestion'] = trim($formArray['variable_name']);
                        $subformArray['seq_no'] = $formArray['seq_no'];
                        $subformArray['child_seq_no'] = $keys + 1;
                        $subformArray['isActive'] = 1;
                        $checkChildVariable = $MSection->checkVariable_maxVariable($subformArray);
                        if (isset($checkChildVariable[0]->variable_name) && $checkChildVariable[0]->variable_name != '') {
                            $result[] = array('0' => 'error', '1' => 'Duplicate options variable: ' . $subformArray['variable_name']);
                        } else {
                            $InsertChildData = $Custom->Insert($subformArray, 'idSectionDetail', 'section_detail', 'N');
                            if ($InsertChildData) {
                                $result[] = array('0' => 'success', '1' => 'Option inserted successfully: ' . $subformArray['variable_name']);
                            } else {
                                $result[] = array('0' => 'error', '1' => 'Error while inserting option variable: ' . $subformArray['variable_name']);
                            }
                        }
                    }
                }
            } else {
                $result[] = array('0' => 'error', '1' => 'Error while inserting question variable: ' . $formArray['variable_name']);
            }
        }
        echo json_encode($result);
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
                } elseif ($subformArray['nature'] == 'CheckBox') {
                    $subformArray['nature_var'] = 'C';
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
                $InsertData = $Custom->Insert($subformArray, 'idSectionDetail', 'section_detail', 'N');
            }
        }
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

    /*Edit Section*/
    function edit_section($slug)
    {
        ob_end_clean();
        $data = array();
        if (isset($slug) && $slug != '' && $slug != '$1' && $slug != 0) {
            $data['idSection'] = $slug;
            $MSection = new MSection();
            $searchdata = array();
            $searchdata['idSection'] = $data['idSection'];
            $data['getData'] = $MSection->getSectionDataById($searchdata);
        } else {
            $data['error'] = 'Invalid Section';
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('edit_section', $data);
        $this->load->view('include/footer');
    }

    function editData()
    {
        $Custom = new Custom();
        $this->form_validation->set_rules('section_var_name', 'section_var_name', 'required');
        $this->form_validation->set_rules('section_status', 'section_status', 'required');
        $this->form_validation->set_rules('section_table', 'section_table', 'required');
        if (isset($_POST['idSection']) && $_POST['idSection'] != '') {
            $idSection = $_POST['idSection'];
            $formArray = array();
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
            $editData = $Custom->Edit($formArray, 'idSection', $idSection, 'section');
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

    /*  function add_sectiondetail_data2()
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
              $formArray['seq_no'] = (int)$key + 1;
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
      }*/

    function deleteSection()
    {
        if (isset($_POST['idDelete']) && $_POST['idDelete'] != '') {
            $Custom = new Custom();
            $idSection = $_POST['idDelete'];
            $editArr = array();
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idSection', $idSection, 'section');
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
            } elseif ($editArr['nature'] == 'Label' || $editArr['nature'] == 'Title') {
                $editArr['nature_var'] = 'T';
            } elseif ($editArr['nature'] == 'Input-Numeric') {
                $editArr['nature_var'] = 'EN';
            } elseif ($editArr['nature'] == 'CheckBox') {
                $editArr['nature_var'] = 'C';
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
            $editArr['label_l3'] = (isset($_POST['edit_label_l3']) && $_POST['edit_label_l3'] != '' ? $_POST['edit_label_l3'] : '');
            $editArr['label_l4'] = (isset($_POST['edit_label_l4']) && $_POST['edit_label_l4'] != '' ? $_POST['edit_label_l4'] : '');
            $editArr['label_l5'] = (isset($_POST['edit_label_l5']) && $_POST['edit_label_l5'] != '' ? $_POST['edit_label_l5'] : '');
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
            $result = 3;
        }
        echo $result;
    }

    function cloneDataSection()
    {
        $MSection = new MSection();
        $searchArray = array();
        $searchArray['idSection'] = (isset($_REQUEST['idSection_clone']) && $_REQUEST['idSection_clone'] != '' && $_REQUEST['idSection_clone'] != 0 ? $_REQUEST['idSection_clone'] : 0);
        $getSection_Clone = $MSection->getSectionDataById($searchArray);
        if (isset($getSection_Clone) && $getSection_Clone != '') {
            $getSectionDetail_Clone = $MSection->getSectionDetailData($searchArray);
            $idProjects = (isset($_REQUEST['selectidProjects_clone']) && $_REQUEST['selectidProjects_clone'] != '' && $_REQUEST['selectidProjects_clone'] != 0 ? $_REQUEST['selectidProjects_clone'] : 0);
            $idCrf = (isset($_REQUEST['selectIdCRF_clone']) && $_REQUEST['selectIdCRF_clone'] != '' ? $_REQUEST['selectIdCRF_clone'] : 0);
            $idModule = (isset($_REQUEST['selectidModule_clone']) && $_REQUEST['selectidModule_clone'] != '' ? $_REQUEST['selectidModule_clone'] : 0);
            $Custom = new Custom();
            $formArray = array();
            foreach ($getSection_Clone as $sectionData) {
                $formArray['idModule'] = $idModule;
                $formArray['id_crf'] = $idCrf;
                $formArray['idProjects'] = $idProjects;
                $formArray['section_title'] = $sectionData->section_title;
                $formArray['section_desc'] = $sectionData->section_desc;
                $formArray['section_title_l1'] = $sectionData->section_title_l1;
                $formArray['section_desc_l1'] = $sectionData->section_desc_l1;
                $formArray['section_title_l2'] = $sectionData->section_title_l2;
                $formArray['section_desc_l2'] = $sectionData->section_desc_l2;
                $formArray['section_title_l3'] = $sectionData->section_title_l3;
                $formArray['section_desc_l3'] = $sectionData->section_desc_l3;
                $formArray['section_title_l4'] = $sectionData->section_title_l4;
                $formArray['section_desc_l4'] = $sectionData->section_desc_l4;
                $formArray['section_title_l5'] = $sectionData->section_title_l5;
                $formArray['section_desc_l5'] = $sectionData->section_desc_l5;
                $formArray['section_var_name'] = $sectionData->section_var_name;
                $formArray['section_status'] = $sectionData->section_status;
                $formArray['tableName'] = $sectionData->tableName;
                $InsertSection = $Custom->Insert($formArray, 'idSection', 'section', 'Y');
                if ($InsertSection) {
                    if (isset($getSectionDetail_Clone) && $getSectionDetail_Clone != '') {
                        foreach ($getSectionDetail_Clone as $data) {
                            $formArray_Detail = array();
                            $formArray_Detail['idSection'] = $InsertSection;
                            $formArray_Detail['idModule'] = $idModule;
                            $formArray_Detail['id_crf'] = $idCrf;
                            $formArray_Detail['idProjects'] = $idProjects;
                            $formArray_Detail['variable_name'] = $data->variable_name;
                            $formArray_Detail['nature'] = (isset($data->nature) && $data->nature != '' ? $data->nature : '');
                            $formArray_Detail['nature_var'] = (isset($data->nature_var) && $data->nature_var != '' ? $data->nature_var : '');
                            $formArray_Detail['question_type'] = (isset($data->question_type) && $data->question_type != '' ? $data->question_type : '');
                            $formArray_Detail['MinVal'] = (isset($data->MinVal) && $data->MinVal != '' ? $data->MinVal : '');
                            $formArray_Detail['MaxVal'] = (isset($data->MaxVal) && $data->MaxVal != '' ? $data->MaxVal : '');
                            $formArray_Detail['skipQuestion'] = (isset($data->skipQuestion) && $data->skipQuestion != '' ? $data->skipQuestion : '');
                            $formArray_Detail['idParentQuestion'] = (isset($data->idParentQuestion) && $data->idParentQuestion != '' ? $data->idParentQuestion : '');
                            $formArray_Detail['required'] = (isset($data->required) && $data->required != '' ? $data->required : '');
                            $formArray_Detail['readonly'] = (isset($data->readonly) && $data->readonly != '' ? $data->readonly : '');
                            $formArray_Detail['label_l1'] = (isset($data->label_l1) && $data->label_l1 != '' ? $data->label_l1 : '');
                            $formArray_Detail['label_l2'] = (isset($data->label_l2) && $data->label_l2 != '' ? $data->label_l2 : '');
                            $formArray_Detail['label_l3'] = (isset($data->label_l3) && $data->label_l3 != '' ? $data->label_l3 : '');
                            $formArray_Detail['label_l4'] = (isset($data->label_l4) && $data->label_l4 != '' ? $data->label_l4 : '');
                            $formArray_Detail['label_l5'] = (isset($data->label_l5) && $data->label_l5 != '' ? $data->label_l5 : '');
                            $formArray_Detail['option_value'] = (isset($data->option_value) && $data->option_value != '' ? $data->option_value : '');
                            $formArray_Detail['insertDB'] = (isset($data->insertDB) && $data->insertDB != '' ? $data->insertDB : '');
                            $formArray_Detail['dbType'] = (isset($data->dbType) && $data->dbType != '' ? $data->dbType : '');
                            $formArray_Detail['dbLength'] = (isset($data->dbLength) && $data->dbLength != '' ? $data->dbLength : '');
                            $formArray_Detail['dbDecimal'] = (isset($data->dbDecimal) && $data->dbDecimal != '' ? $data->dbDecimal : '');
                            $formArray_Detail['seq_no'] = (isset($data->seq_no) && $data->seq_no != '' ? $data->seq_no : '');
                            $formArray_Detail['child_seq_no'] = (isset($data->child_seq_no) && $data->child_seq_no != '' ? $data->child_seq_no : '');
                            $InsertData = $Custom->Insert($formArray_Detail, 'idSectionDetail', 'section_detail', 'N');
                            if ($InsertData) {
                                $result = 1;
                            } else {
                                $result = 3;
                            }
                        }
                    } else {
                        $result = 6;
                    }
                } else {
                    $result = 2;
                }
            }
        } else {
            $result = 5;
        }
        echo $result;
    }

    function cloneData()
    {
        $MSection = new MSection();
        $searchArray = array();
        $searchArray['idSection'] = (isset($_REQUEST['idSection']) && $_REQUEST['idSection'] != '' && $_REQUEST['idSection'] != 0 ? $_REQUEST['idSection'] : 0);
        $searchArray['idModule'] = (isset($_REQUEST['idModule']) && $_REQUEST['idModule'] != '' && $_REQUEST['idModule'] != 0 ? $_REQUEST['idModule'] : 0);
        $searchArray['variable_name'] = (isset($_REQUEST['variable_name']) && $_REQUEST['variable_name'] != '' ? $_REQUEST['variable_name'] : 0);
        $searchArray['newSectionVariable'] = (isset($_REQUEST['newSectionVariable']) && $_REQUEST['newSectionVariable'] != '' ? $_REQUEST['newSectionVariable'] : 0);
        $getSectionDetails_Clone = $MSection->getSectionDetails_Clone($searchArray);
        $Custom = new Custom();
        foreach ($getSectionDetails_Clone as $data) {
            $formArray = array();
            $formArray['idSection'] = $data->idSection;
            $formArray['idModule'] = $data->idModule;
            $formArray['id_crf'] = $data->id_crf;
            $formArray['idProjects'] = $data->idProjects;
            if (isset($data->idParentQuestion) && $data->idParentQuestion != '') {
                $new_variable_name = preg_replace('/\D/', '', $searchArray['newSectionVariable']);
                $variable_name = preg_replace('/[0-9]+/', $new_variable_name, $data->variable_name);
            } else {
                $variable_name = $searchArray['newSectionVariable'];
            }
            $formArray['variable_name'] = $variable_name;
            $formArray['nature'] = (isset($data->nature) && $data->nature != '' ? $data->nature : '');
            $formArray['nature_var'] = (isset($data->nature_var) && $data->nature_var != '' ? $data->nature_var : '');
            $formArray['question_type'] = (isset($data->question_type) && $data->question_type != '' ? $data->question_type : '');
            $formArray['MinVal'] = (isset($data->MinVal) && $data->MinVal != '' ? $data->MinVal : '');
            $formArray['MaxVal'] = (isset($data->MaxVal) && $data->MaxVal != '' ? $data->MaxVal : '');
            $formArray['skipQuestion'] = (isset($data->skipQuestion) && $data->skipQuestion != '' ? $data->skipQuestion : '');
            $formArray['idParentQuestion'] = (isset($data->idParentQuestion) && $data->idParentQuestion != '' ? str_replace($data->idParentQuestion, $searchArray['newSectionVariable'], $data->idParentQuestion) : '');
            $formArray['required'] = (isset($data->required) && $data->required != '' ? $data->required : '');
            $formArray['readonly'] = (isset($data->readonly) && $data->readonly != '' ? $data->readonly : '');
            $formArray['label_l1'] = (isset($data->label_l1) && $data->label_l1 != '' ? $data->label_l1 : '');
            $formArray['label_l2'] = (isset($data->label_l2) && $data->label_l2 != '' ? $data->label_l2 : '');
            $formArray['label_l3'] = (isset($data->label_l3) && $data->label_l3 != '' ? $data->label_l3 : '');
            $formArray['label_l4'] = (isset($data->label_l4) && $data->label_l4 != '' ? $data->label_l4 : '');
            $formArray['label_l5'] = (isset($data->label_l5) && $data->label_l5 != '' ? $data->label_l5 : '');
            $formArray['option_value'] = (isset($data->option_value) && $data->option_value != '' ? $data->option_value : '');
            $formArray['insertDB'] = (isset($data->insertDB) && $data->insertDB != '' ? $data->insertDB : '');
            $formArray['dbType'] = (isset($data->dbType) && $data->dbType != '' ? $data->dbType : '');
            $formArray['dbLength'] = (isset($data->dbLength) && $data->dbLength != '' ? $data->dbLength : '');
            $formArray['dbDecimal'] = (isset($data->dbDecimal) && $data->dbDecimal != '' ? $data->dbDecimal : '');
            $formArray['seq_no'] = (isset($data->seq_no) && $data->seq_no != '' ? $data->seq_no : '');
            $formArray['child_seq_no'] = (isset($data->child_seq_no) && $data->child_seq_no != '' ? $data->child_seq_no : '');
            $formArray['isActive'] = 1;
            $InsertData = $Custom->Insert($formArray, 'idSectionDetail', 'section_detail', 'N');
        }
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

    /*Sorting*/

    function sortQuestions()
    {
        if (isset($_POST['variable']) && $_POST['variable'] != '' && $_POST['variable'] != 'undefined') {
            $idProjects = (isset($_POST['idProjects']) && $_POST['idProjects'] != '' ? $_POST['idProjects'] : 0);;
            $id_crf = (isset($_POST['id_crf']) && $_POST['id_crf'] != '' ? $_POST['id_crf'] : 0);;
            $idModule = (isset($_POST['idModule']) && $_POST['idModule'] != '' ? $_POST['idModule'] : 0);;
            $idSection = (isset($_POST['idSection']) && $_POST['idSection'] != '' ? $_POST['idSection'] : 0);;
            $variable_name = $_POST['variable'];

            $this->db->where('idProjects', $idProjects);
            $this->db->where('id_crf', $id_crf);
            $this->db->where('idModule', $idModule);
            $this->db->where('idSection', $idSection);

            $editArr = array();
            if (isset($_POST['isParent']) && $_POST['isParent'] == 1) {
//                $this->db->where('(variable_name="' . $variable_name . '" or  idParentQuestion="' . $variable_name . '" )');
                $this->db->where("(variable_name='" . $variable_name . "' or  idParentQuestion='" . $variable_name . "')");
                $editArr['seq_no'] = (isset($_POST['seq_no']) && $_POST['seq_no'] != '' ? $_POST['seq_no'] : '0');
            } else {
                $this->db->where('variable_name', $variable_name);
                $editArr['child_seq_no'] = (isset($_POST['seq_no']) && $_POST['seq_no'] != '' ? $_POST['seq_no'] : '0');
            }

            $update = $this->db->update('section_detail', $editArr);
            if ($update) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }
        echo $result;
    }

    /*function sortQuestions()
    {
        if (isset($_POST) && $_POST != '') {
            $Custom = new Custom();
            foreach ($_POST as $key => $value) {
                $idSectionDetail = $key;
                $editArr = array();
                $editArr['seq_no'] = (isset($value) && $value != '' ? $value : '0');
                $editData = $Custom->Edit($editArr, 'idSectionDetail', $idSectionDetail, 'section_detail');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
        } else {
            $result = 3;
        }
        echo $result;
    }*/

    /*Upload Data View*/
    function upload_data()
    {
        $data = array();
        $MProjects = new MProjects();
        $data['projects'] = $MProjects->getAllProjects();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('upload_data', $data);
        $this->load->view('include/footer');
    }

    public function uploadExcelData()
    {
        $model = new MSection();
        $config['upload_path'] = 'assets/uploads/excelsUpload';
        $config['allowed_types'] = 'xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('document_file')) {
            /* $error = array('error' => $this->upload->display_errors());
             print_r($error);*/
            $data = array('0' => 'error', '1' => $this->upload->display_errors());
        } else {
            $Custom = new Custom();
            $data = array('document_file' => $this->upload->data());
            $file = 'assets/uploads/excelsUpload/' . $data['document_file']['file_name'];
            if (file_exists($file)) {
                //load the excel library
                $this->load->library('excel');
                //read file from path
                $objPHPExcel = PHPExcel_IOFactory::load($file);
                //get only the Cell Collection
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                //extract to a PHP readable array format
                foreach ($cell_collection as $cell) {
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    //header will/should be in row 1 only. of course this can be modified to suit your need.
                    if ($row == 1) {
                        $header[$row][$column] = $data_value;
                    } else {
                        $arr_data[$row][$column] = $data_value;
                    }
                }
                //send the data in an array format
                $data['header'] = $header;
                $data['values'] = $arr_data;
                $r = range('A', 'Z');
                foreach ($data['values'] as $key => $val) {
                    if (isset($val[$r[0]])) {
                        if ($val[$r[1]] == 'E') {
                            $type = 'Input';
                        } elseif ($val[$r[1]] == 'T') {
                            $type = 'Title';
                        } elseif ($val[$r[1]] == 'EN') {
                            $type = 'Input-Numeric';
                        } elseif ($val[$r[1]] == 'S') {
                            $type = 'SelectBox';
                        } elseif ($val[$r[1]] == 'R') {
                            $type = 'Radio';
                        } elseif ($val[$r[1]] == 'C') {
                            $type = 'CheckBox';
                        } elseif ($val[$r[1]] == 'TA') {
                            $type = 'TextArea';
                        } else {
                            $type = '';
                        }
                        $formArray_Detail = array();
                        $formArray_Detail['idSection'] = $_POST['idSection'];
                        $formArray_Detail['idModule'] = $_POST['idModule'];
                        $formArray_Detail['id_crf'] = $_POST['id_crf'];
                        $formArray_Detail['idProjects'] = $_POST['idProjects'];
                        $formArray_Detail['variable_name'] = (isset($val[$r[0]]) && $val[$r[0]] != '' ? $val[$r[0]] : '');
                        $formArray_Detail['nature'] = $type;
                        $formArray_Detail['nature_var'] = (isset($val[$r[1]]) && $val[$r[1]] != '' ? $val[$r[1]] : '');
                        $formArray_Detail['question_type'] = (isset($val[$r[8]]) && $val[$r[8]] != '' ? $type : '');
                        $formArray_Detail['MinVal'] = (isset($val[$r[10]]) && $val[$r[10]] != '' ? $val[$r[10]] : '');
                        $formArray_Detail['MaxVal'] = (isset($val[$r[11]]) && $val[$r[11]] != '' ? $val[$r[11]] : '');
                        $formArray_Detail['skipQuestion'] = (isset($val[$r[9]]) && $val[$r[9]] != '' ? $val[$r[9]] : '');
                        $formArray_Detail['idParentQuestion'] = (isset($val[$r[8]]) && $val[$r[8]] != '' ? $val[$r[8]] : '');
                        $formArray_Detail['required'] = (isset($val[$r[16]]) && $val[$r[16]] != '' ? $val[$r[16]] : '');
                        $formArray_Detail['readonly'] = '';
                        $formArray_Detail['label_l1'] = (isset($val[$r[2]]) && $val[$r[2]] != '' ? $val[$r[2]] : '');
                        $formArray_Detail['label_l2'] = (isset($val[$r[3]]) && $val[$r[3]] != '' ? $val[$r[3]] : '');
                        $formArray_Detail['label_l3'] = (isset($val[$r[4]]) && $val[$r[4]] != '' ? $val[$r[4]] : '');
                        $formArray_Detail['label_l4'] = (isset($val[$r[5]]) && $val[$r[5]] != '' ? $val[$r[5]] : '');
                        $formArray_Detail['label_l5'] = (isset($val[$r[6]]) && $val[$r[6]] != '' ? $val[$r[6]] : '');
                        $formArray_Detail['option_value'] = (isset($val[$r[7]]) && $val[$r[7]] != '' ? $val[$r[7]] : '');
                        $formArray_Detail['insertDB'] = (isset($val[$r[12]]) && $val[$r[12]] != '' ? $val[$r[12]] : '');
                        $formArray_Detail['dbType'] = (isset($val[$r[13]]) && $val[$r[13]] != '' ? $val[$r[13]] : '');
                        $formArray_Detail['dbLength'] = (isset($val[$r[14]]) && $val[$r[14]] != '' ? $val[$r[14]] : '');
                        $formArray_Detail['dbDecimal'] = (isset($val[$r[15]]) && $val[$r[15]] != '' ? $val[$r[15]] : '');
                        $formArray_Detail['seq_no'] = (isset($val[$r[17]]) && $val[$r[17]] != '' ? $val[$r[17]] : $key);
                        $formArray_Detail['child_seq_no'] = (isset($val[$r[18]]) && $val[$r[18]] != '' ? $val[$r[18]] : 0);
                        $formArray_Detail['isActive'] = 1;
                        $InsertData = $Custom->Insert($formArray_Detail, 'idSectionDetail', 'section_detail', 'N');
                        if ($InsertData) {
                            $data = array('0' => 'success', '1' => 'Successfully Uploaded');
                        } else {
                            $data = array('0' => 'error', '1' => 'Error while inserting data');
                        }
                    } else {
                        $data = array('0' => 'error', '1' => 'Invalid File');
                    }
                }
            } else {
                $data = array('0' => 'error', '1' => 'Error while uploading file');
            }
        }
        echo json_encode($data);
    }

    /*Missing Variable*/

    function missinglabel()
    {
        $data = array();
        $data['slug'] = (isset($_REQUEST['project']) && $_REQUEST['project'] != '' ? $_REQUEST['project'] : '');
        if (!isset($slug) || $slug == '' || $slug == '$1') {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('missinglabel', $data);
        $this->load->view('include/footer');
    }

    function getMissingLabelData()
    {

        $this->load->model('mcrf');
        $idProjects = $_REQUEST['Projects'];
        $idCRF = $_REQUEST['crf'];
        $MCrf = new MCrf();
        $getCrfLang = $MCrf->getCrfLang($idCRF);
        $thead = '<thead><th>Variable</th>';
        $l1 = 'N';
        $l2 = 'N';
        $l3 = 'N';
        $l4 = 'N';
        $l5 = 'N';
        $searchData = array();
        foreach ($getCrfLang as $crf) {
            if (isset($crf->l1) && $crf->l1 != '') {
                $l1 = 'Y';
                $searchData['label_l1'] = 'Y';
                $thead .= '<th>' . $crf->l1 . '</th>';
            }
            if (isset($crf->l2) && $crf->l2 != '') {
                $l2 = 'Y';
                $searchData['label_l2'] = 'Y';
                $thead .= '<th>' . $crf->l2 . '</th>';
            }
            if (isset($crf->l3) && $crf->l3 != '') {
                $l3 = 'Y';
                $searchData['label_l3'] = 'Y';
                $thead .= '<th>' . $crf->l3 . '</th>';
            }
            if (isset($crf->l4) && $crf->l4 != '') {
                $l4 = 'Y';
                $searchData['label_l4'] = 'Y';
                $thead .= '<th>' . $crf->l4 . '</th>';
            }
            if (isset($crf->l5) && $crf->l5 != '') {
                $l5 = 'Y';
                $searchData['label_l5'] = 'Y';
                $thead .= '<th>' . $crf->l5 . '</th>';
            }
        }
        $thead .= '</thead>';
        $MSection = new MSection();

        $searchData['idProjects'] = $idProjects;
        $searchData['idCRF'] = $idCRF;
        $data = $MSection->getMissingLabels($searchData);
        $tbody = '';
        foreach ($data as $key => $values) {
            $tbody .= '<tr>
                       <td>' . $values->variable_name . '</td>';
            if ($l1 == 'Y') {
                $tbody .= '<td>' . $values->label_l1 . '</td>';
            }
            if ($l2 == 'Y') {
                $tbody .= '<td>' . $values->label_l2 . '</td>';
            }
            if ($l3 == 'Y') {
                $tbody .= '<td>' . $values->label_l3 . '</td>';
            }
            if ($l4 == 'Y') {
                $tbody .= '<td>' . $values->label_l4 . '</td>';
            }
            if ($l5 == 'Y') {
                $tbody .= '<td>' . $values->label_l5 . '</td>';
            }
            $tbody .= ' </tr>';
        }
        $table = $thead . $tbody;
        echo $table;

    }

    function getMissingLabelData2()
    {
        $this->load->model('mcrf');
        $MSection = new MSection();
        $idProjects = 14;
        $idCRF = 26;
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'idProjects');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $searchData['idProjects'] = $idProjects;
        $searchData['idCRF'] = $idCRF;
        $data = $MSection->getMissingLabels($searchData);


        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 100000;
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 100000;
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalsearchData['idProjects'] = $idProjects;
        $totalsearchData['idCRF'] = $idCRF;
        $totalrecords = $MSection->getMissingLabels($totalsearchData);
        $result["recordsTotal"] = count($totalrecords);
        $result["recordsFiltered"] = count($totalrecords);
        $result["data"] = $data;
        echo json_encode($result, true);

    }

} ?>