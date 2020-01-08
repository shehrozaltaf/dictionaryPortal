<?php ob_start();
header('Content-type: text/html; charset=utf-8');
error_reporting(0);

class Project extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');

        $this->load->library('session');
        $this->load->library('tcpdf');
        $this->load->helper('string');
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

    function add_project()
    {
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('add_project');
        $this->load->view('include/footer');
    }


    function getProjects()
    {
        $MProjects = new MProjects();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'idProjects');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $MProjects->getProjects($searchData);
        $table_data = array();
        $result_table_data = array();
        /* <a href="' . base_url('index.php/crf/' . $value->idProjects) . '"><i class="font-medium-5 info ft-eye"></i></a>
  <a href="#"><i class="font-medium-5  success-lighten-1 ft-edit"></i></a>
  <a href="#"><i class="font-medium-5 blue-grey ft-plus-circle"></i></a>
  <a href="' . base_url('index.php/Project/getPDF/' . $value->idProjects) . '"  target="_blank" data-idProjects="' . $value->idProjects . '"><i class="font-medium-5 blue-grey ft-plus-square"></i></a> */

        foreach ($data as $key => $value) {
            $table_data[$value->project_name]['project_name'] = $value->project_name;
            $table_data[$value->project_name]['short_title'] = $value->short_title;
            $table_data[$value->project_name]['startdate'] = date('d-m-Y', strtotime($value->startdate));
            $table_data[$value->project_name]['enddate'] = date('d-m-Y', strtotime($value->enddate));
            $table_data[$value->project_name]['no_of_crf'] = $value->no_of_crf;
            $table_data[$value->project_name]['languages'] = $value->languages;
            $table_data[$value->project_name]['no_of_sites'] = $value->no_of_sites;
            $table_data[$value->project_name]['email_of_person'] = $value->email_of_person;
            $table_data[$value->project_name]['action'] = ' <div class="btn-group mr-1 mb-1">
							<button class="btn btn-danger dropdown-toggle btn-sm" type="button" 
							id="dropdownMenuButton' . $value->idProjects . '" data-toggle="dropdown" >
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a class="dropdown-item" href="' . base_url('index.php/project/edit_project?project=' . $value->idProjects) . '">Edit Project</a>
								<a class="dropdown-item" href="' . base_url('index.php/crf/' . $value->idProjects) . '">View CRFs</a>
								<a class="dropdown-item" href="' . base_url('index.php/add_crf?project=' . $value->idProjects) . '">Add CRF</a>
								<a class="dropdown-item" href="' . base_url('index.php/Project/getPDF/' . $value->idProjects) . '"  target="_blank" data-idProjects="' . $value->idProjects . '">Export PDF</a>
								<a class="dropdown-item" href="javascript:void(0)" onclick="getExcelModal()" data-idProjects="' . $value->idProjects . '">Export Excel</a>
							</div>
						</div>';
            $myarr = array();
            $myarr['crf_name'] = $value->crf_name;
            $myarr['crf_title'] = $value->crf_title;
            $myarr['crf_languages'] = $value->crf_languages;
            $table_data[$value->project_name]['crf'][] = $myarr;
        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 100000;
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $MProjects->getCntTotalProjects($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function getExcel($slug)
    {
        ob_end_clean();
        $this->load->model('msection');
        $fileName = 'data-dictionaryportal-' . time() . '.xlsx';
        $this->load->library('excel');
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = $slug;
        $listInfo = $MSection->getExcelData($searchData);
        $objPHPExcel = new    PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Variable');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Variable App');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Option Title');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Option Values');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Skip On xml');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tag No');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Min Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Max Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Language 1');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Language 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Language 3');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Language 4');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Language 5');
        $objPHPExcel->getActiveSheet()->getStyle("A1:N1")->getFont()->setBold(true);
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nature);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->option_title);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->option_value);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->MinVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->MaxVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->label_l1);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->label_l2);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->label_l3);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->label_l4);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->label_l5);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');


        /*$this->load->model('msection');
        if (isset($slug) && $slug != '') {
            $MSection = new MSection();
            $searchData = array();
            $searchData['idSection'] = $slug;
            $GetReportData = $MSection->getExcelData($searchData);

            $delimiter = ",";
            ob_start();
            //create a file pointer
            $f = fopen('php://memory', 'w');
            //set column headers
            $fields = array('Variable', 'Variable App', 'type', 'Option Title', 'Option Values', 'Skip On xml', 'Tag No', 'Min Range', 'Max Range',
                'Language 1', 'Language 2', 'Language 3', 'Language 4', 'Language 5');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            if ($GetReportData) {
                foreach ($GetReportData as $row) {
                    $lineData = array(
                        $row->variable_name,
                        $row->variable_name,
                        $row->nature,
                        $row->option_title,
                        $row->option_value,
                        $row->skipQuestion,
                        $row->skipQuestion,
                        $row->MinVal,
                        $row->MaxVal,
                        $row->label_l1,
                        $row->label_l2,
                        $row->label_l3,
                        $row->label_l4,
                        $row->label_l5);
                    fputcsv($f, $lineData, $delimiter);
                }
            }

            //move back to beginning of file
            fseek($f, 0);
            //set headers to download file rather than displayed
            $filename = "dictionary_" . date('Y-m-d') . ".csv";
            ob_end_clean();

//			header("Content-Disposition: attachment; filename=' . $filename . ' ");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            header('Content-Type: text/csv,  charset=UTF-8; encoding=UTF-8');


//			header('Content-type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            fpassthru($f);

        } else {
            echo 2;
        }*/
    }

    function getPDF($slug)
    {
        header('Content-type: text/html; charset=utf-8');
        /*  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('Nicola Asuni');
          $pdf->SetTitle('TCPDF Example 008');
          $pdf->SetSubject('TCPDF Tutorial');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('freeserif', '', 12);
          $pdf->AddPage();
          $utf8text = file_get_contents(base_url() . '/utf8test.txt', false);
          $pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);
          ob_end_clean();
          $pdf->Output('example_008.pdf', 'I');
          exit();*/


        $this->load->model('mmodule');
        $this->load->model('msection');
        if (isset($slug) && $slug != '') {
            $searchData = array();
            $searchData['idProjects'] = $slug;

            $MProjects = new MProjects();
            $MModule = new MModule();
            $MSection = new MSection();
            $GetReportData = $MProjects->getPDFData($searchData);


            $searchData['idCRF'] = $GetReportData[0]->id_crf;
            $html = '';
            if ($GetReportData) {
                $project_name = $GetReportData[0]->project_name;
                $short_title = strtoupper($GetReportData[0]->short_title);
                $title = $project_name . ' (' . $short_title . ')';

                $crf_name = $GetReportData[0]->crf_name;
                $crf_title = strtoupper($GetReportData[0]->crf_title);
                $crf_title = $crf_name . ' (' . $crf_title . ')';

                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Dictionary Portal');
                $pdf->SetTitle($title);
                $pdf->SetSubject($title);
                $pdf->SetKeywords($title . ',' . $crf_title);
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once(dirname(__FILE__) . '/lang/eng.php');
//                    $pdf->setLanguageArray($l);
                }
                $pdf->setFontSubsetting(true);
                $pdf->SetFont('freeserif', '', 12);

                $pdf->AddPage();


                $style = "<style>
                        h1{text-align: center; font-size: 30px;  color: #002D57;}
                        h3{text-align: center; font-size: 22px;}
                        h4{font-size: 18px;}
                        small{font-size: 14px}
                        table { border:1px solid black; }
                        table tr th{ border:1px solid black;text-align: center; font-weight: bold; background-color: #0277bd; color: #ffffff;   }
                        table tr td{ border:1px solid black; }
                        .createdby{text-align: right;}
                        </style>";
                $Mainheader = "<div class='head'>
                                    <h1 class='mainheading'>" . $title . "</h1>
                                    <h3 class='subheading'>" . $crf_title . "</h3>
                               </div>";
                $pdf->writeHTML($style . $Mainheader, true, false, true, false, 'centre');
                $pdf->AddPage();


                $getModules = $MModule->getModulesData($searchData);
                /* echo '<pre>';
                 print_r($getModules);
                 echo '</pre>';
                 exit() ;*/
                foreach ($getModules as $keyModule => $valueModule) {

                    $subhtml = "<div class='moduleDiv'>";
                    if (isset($valueModule->module_name_l1) && $valueModule->module_name_l1 != '') {
                        $subhtml .= "<h4>" . htmlentities($valueModule->module_name_l1) . " : <small>" . $valueModule->module_desc_l1 . "</small></h4>";
                    }
                    if (isset($valueModule->module_name_l2) && $valueModule->module_name_l2 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l2 . "</h4><h5>" . $valueModule->module_desc_l2 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l3) && $valueModule->module_name_l3 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l3 . "</h4><h5>" . $valueModule->module_desc_l3 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l4) && $valueModule->module_name_l4 = '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l4 . "</h4><h5>" . $valueModule->module_desc_l4 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l5) && $valueModule->module_name_l5 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l5 . " </h4><h5>" . $valueModule->module_desc_l5 . "</h5>";
                    }
                    $subhtml .= "</div>";

                    $ModuleSearchData = array();
                    $ModuleSearchData['idModule'] = $valueModule->idModule;
                    $getSections = $MSection->getSectionData($ModuleSearchData);


                    foreach ($getSections as $keySection => $valueSection) {
                        $subhtml .= "<div class='sectionDiv'>";
                        if (isset($valueSection->section_title) && $valueSection->section_title != '') {
                            $subhtml .= "<h4>" . htmlentities($valueSection->section_title) . " : <small>" . $valueSection->section_desc . " (" . $valueSection->var_name . ")</small></h4>";
                        }
                        $subhtml .= "</div>";

                        $ModuleSearchData['idSection'] = $valueSection->idSection;
                        $getSectionDetails = $MSection->getSectionDetailsData($ModuleSearchData);

                        $subhtml .= "<div class='sectionDetailDiv'><table>
                                        <thead>
                                            <tr>
                                                <th>Variable</th>
                                                <th width='10'>Label</th>
                                                <th>Nature</th>
                                                <th>Option Title</th>
                                                <th>Option Value</th>
                                            </tr>   
                                        </thead>
                                        <tbody> ";


                        foreach ($getSectionDetails as $keySectionDetail => $valueSectionDetail) {
                            if (isset($valueSectionDetail->variable_name) && $valueSectionDetail->variable_name != '') {
                                $subhtml .= "<tr>
                                    <td>" . $valueSectionDetail->variable_name . "</td>
                                    <td width='10'>
                                        " . $valueSectionDetail->label_l1 . "<br>
                                         " . $valueSectionDetail->label_l2 . "<br>
                                         " . $valueSectionDetail->label_l3 . "<br>
                                         " . $valueSectionDetail->label_l4 . "<br>
                                         " . $valueSectionDetail->label_l5 . "
                                    </td>
                                     <td> " . $valueSectionDetail->nature . "</td>
                                    <td> " . $valueSectionDetail->option_title . "</td>
                                    <td> " . $valueSectionDetail->option_value . "</td>
                                   
                                    </tr> ";
                            }


                        }
                        $subhtml .= "</tbody></table></div>";

                    }
                    $pdf->writeHTML($style . $subhtml, true, false, true, false, '');
                    $pdf->AddPage();
                }


                $endheader = "<div class='head'>
                                    <h1 class='mainheading'>The END</h1> 
                               </div>";
                $pdf->writeHTML($style . $endheader, true, false, true, false, 'centre');

                $bMargin = $pdf->getBreakMargin();
                $auto_page_break = $pdf->getAutoPageBreak();
                $pdf->SetAutoPageBreak(true, 0);
                $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
                $pdf->setPageMark();
                ob_end_clean();
                $pdf->Output('dictionary.pdf', 'I');
//                $this->CreatePDF($html);
            }
        } else {
            echo 'Invalid Project';
            exit();
        }


    }

    public function CreatePDF($HTMLData)
    {
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('PRO-DMU');

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        // remove default footer
        $pdf->setPrintFooter(false);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            //            $pdf->setLanguageArray($l);
        }
        // set font
        $pdf->SetFont('times', '', 11);
        // --- example with background set on page ---
        // remove default header
        $pdf->setPrintHeader(false);
        // add a page
        $pdf->AddPage();
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);

        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();
        $pdf->writeHTML($HTMLData, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output('dictionary.pdf', 'I');

    }


    function addData()
    {
        ob_end_clean();
        $Custom = new Custom();
        $this->form_validation->set_rules('projectName', 'projectName', 'required');
        $this->form_validation->set_rules('shortTitle', 'shortTitle', 'required');
        $this->form_validation->set_rules('startdate', 'startdate', 'required');
        $this->form_validation->set_rules('enddate', 'enddate', 'required');
        $this->form_validation->set_rules('num_of_crf', 'Number Of CRF', 'required');
        $this->form_validation->set_rules('languages', 'languages', 'required');
        $this->form_validation->set_rules('num_of_site', 'Number Of Sites', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        $formArray = array();
        $formArray['project_name'] = ucfirst($this->input->post('projectName'));
        $formArray['short_title'] = $this->input->post('shortTitle');
        $formArray['startdate'] = date('y-m-d', strtotime($this->input->post('startdate')));
        $formArray['enddate'] = date('y-m-d', strtotime($this->input->post('enddate')));
        $formArray['no_of_crf'] = $this->input->post('num_of_crf');
        $formArray['languages'] = $this->input->post('languages');
        $formArray['no_of_sites'] = $this->input->post('num_of_site');
        $formArray['email_of_person'] = $this->input->post('email');
        $formArray['createdBy'] = $_SESSION['login']['idUser'];

        $InsertData = $Custom->Insert($formArray, 'idProjects', 'projects', 'N');
        if ($InsertData) {
            $result = 1;
        } else {
            $result = 2;
        }


        echo $result;
    }


    function edit_project()
    {
        if (isset($_GET['project']) && $_GET['project'] != '') {
            $idProject = $_GET['project'];
        } else {
            $idProject = '';
        }
        $data = array();
        $Mproject = new MProjects();
        $data['getProjectData'] = $Mproject->getEditProject($idProject);
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('edit_project', $data);
        $this->load->view('include/footer');
    }

    function edit()
    {
        $Custom = new Custom();
        $editArr = array();
        $idproject = $this->input->post('idproject');
        $editArr['project_name'] = $this->input->post('projectName');
        $editArr['short_title'] = $this->input->post('shortTitle');
        $editArr['startdate'] = $this->input->post('startdate');
        $editArr['enddate'] = $this->input->post('enddate');
        $editArr['no_of_crf'] = $this->input->post('num_of_crf');
        $editArr['languages'] = $this->input->post('languages');
        $editArr['no_of_sites'] = $this->input->post('num_of_site');
        $editArr['email_of_person'] = $this->input->post('email');
        $editData = $Custom->Edit($editArr, 'idProjects', $idproject, 'projects');
        if ($editData) {
            $result = 1;
        } else {
            $result = 2;
        }
        echo $result;
    }

} ?>





