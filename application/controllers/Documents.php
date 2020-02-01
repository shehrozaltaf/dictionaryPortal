<?php ob_start();

class Documents extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->model('mdocuments');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index($slug)
    {
        $data = array();
        $data['slug'] = $slug;
        $data['data'] = '';
        if (!isset($slug) || $slug == '' || $slug == '$1') {
            $MProjects = new MProjects();
            $data['projects'] = $MProjects->getAllProjects();
        } else {
            $data['projects'] = '';
            $MDocuments = new MDocuments();
            $data['data'] = $MDocuments->getProjectDocuments($slug);
        }
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('documents', $data);
        $this->load->view('include/footer');
    }

    function addDocument()
    {
        ob_end_clean();
        if (isset($_POST['idProjects']) && $_POST['idProjects'] != '') {
            if (isset($_POST['document_name']) && $_POST['document_name'] != '') {
                $idProjects = $_POST['idProjects'];
                $document_name = $_POST['document_name'];
                $filename = date('d_m_y') . '_' . str_replace(str_split(' ()\\/,:*?"<>|'), '_',
                        $_FILES["document_file"]['name']);

                $path = 'assets/uploads/' . $idProjects;
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $config['upload_path'] = $path;
                $config["allowed_types"] = "*";
                $config['max_size'] = 100000;
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('document_file')) {
                    $data = array('0' => 'error', '1' => $this->upload->display_errors());
                } else {
//            $data = array('upload_data' => $this->upload->data());
                    $Custom = new Custom();
                    $formArray = array();
                    $formArray['idProjects'] = $idProjects;
                    $formArray['document_name'] = $document_name;
                    $formArray['document_file'] = $filename;
                    $InsertData = $Custom->Insert($formArray, 'idProjectDocument', 'project_documents', 'N');
                    if ($InsertData) {
                        $data = array('0' => 'success', '1' => 'Successfully Inserted');
                    } else {
                        $data = array('0' => 'error', '1' => 'Error while Inserting');
                    }
                }
            } else {
                $data = array('0' => 'error', '1' => 'Invalid Document Name');
            }
        } else {
            $data = array('0' => 'error', '1' => 'Invalid Project');
        }

        echo json_encode($data);
    }

    function deleteData()
    {
        if (isset($_POST['idProjectDocument']) && $_POST['idProjectDocument'] != '') {
            $Custom = new Custom();
            $idProjectDocument = $_POST['idProjectDocument'];
            $editArr = array();
            $editArr['isActive'] = 0;
            $editData = $Custom->Edit($editArr, 'idProjectDocument', $idProjectDocument, 'project_documents');
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