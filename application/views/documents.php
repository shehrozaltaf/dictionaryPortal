<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Documents</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Documents
                            </li>
                        </ol>
                    </div>
                    <?php if (isset($slug) && $slug != '') {
                        $idProject = $slug;
                    } else {
                        $idProject = 0;
                    } ?>

                </div>
            </div>
        </div>
        <?php if (isset($data) && $data != '') { ?>
            <div class="content-body vcaMenu_redesign_item">
                <section id="dropzone-examples">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Upload Document</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        <form class="uk-form-stacked" id="document_form" method="post"
                                              onsubmit="return false"
                                              enctype="multipart/form-data">
                                            <input type="hidden" id="idProjects" name="idProjects"
                                                   value="<?php echo $idProject; ?>">
                                            <div class="form-group">
                                                <label for="document_name">File Name & Description</label>
                                                <input type="text" class="form-control" id="document_name"
                                                       required name="document_name">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                          id="document_file_addon">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" name="document_file"
                                                           id="document_file"
                                                           required aria-describedby="document_file_addon">
                                                    <label class="custom-file-label" for="document_file">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <p id="document_label"></p>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-primary mybtn"
                                                        onclick="addDocument()">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ordering">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Documents </h4>

                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="dt_colVis_buttons"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="my_table_pro"
                                                   class="table table-striped table-bordered show-child-rows">
                                                <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Name</th>
                                                    <th>Document</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $SNo = 0;
                                                foreach ($data as $documentData) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $documentData->document_name ?></td>
                                                        <td>
                                                            <a target="_blank"
                                                               href="<?php echo base_url() . 'assets/uploads/' . $idProject . '/' . $documentData->document_file ?>">
                                                                <?php echo $documentData->document_file ?>
                                                            </a>
                                                        </td>
                                                        <td data-id="<?php echo $documentData->idProjectDocument ?>">
                                                            <a href="javascript:void(0)" onclick="getDelete(this)">
                                                                <i class="ft-trash-2"></i>
                                                                Delete </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Name</th>
                                                    <th>Document</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
    </div>
</div>
<!-- END: Content-->
<!-- Modal -->
<div class="modal fade text-left" id="modal_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Select Project</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectidProjects">Select Project: </label>
                    <select id="selectidProjects" name="selectidProjects" class="form-control">
                        <option value="0" disabled readonly="readonly" selected>Select Project</option>
                        <?php
                        if (isset($projects) && $projects != '') {
                            foreach ($projects as $key => $values) {
                                echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="changeProject()">Get Data
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delete"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Document</h4>
                <input type="hidden" id="delete_idProjectDocument" name="delete_idProjectDocument">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteData()">Delete
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.mydocuments').addClass('open');
        $('.mydocuments').addClass('active');
        var idProjects = $('#idProjects').val();
        if (idProjects != '' && idProjects != undefined && idProjects != 0 && idProjects != '$1') {
            // getData();
        } else {
            $('#modal_project').modal('show');
        }
        $('#document_file').change(function () {
            $('#document_label').text(this.files[0].name);
        });
    });

    function changeProject() {
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            window.location.href = '<?php echo base_url() ?>index.php/documents/' + data['idProjects'];
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idProjectDocument').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idProjectDocument'] = $('#delete_idProjectDocument').val();
        if (data['idProjectDocument'] == '' || data['idProjectDocument'] == undefined || data['idProjectDocument'] == 0) {
            toastMsg('Document', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Documents/deleteData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Language', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        $('#deleteModal').modal('hide');
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Language', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Language', 'Invalid Language', 'error');
                }
            });
        }
    }

    function addDocument() {
        $('#document_name').css('border', '1px solid #babfc7');
        $('#document_file').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idProjects'] = $('#idProjects').val();
        data['document_name'] = $('#document_name').val();
        data['document_file'] = $('#document_file').val();
        if (data['idProjects'] == '' || data['idProjects'] == undefined) {
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }
        if (data['document_name'] == '' || data['document_name'] == undefined) {
            $('#document_name').css('border', '1px solid red');
            toastMsg('Name', 'Invalid Name', 'error');
            flag = 1;
            return false;
        }
        if (data['document_file'] == '' || data['document_file'] == undefined) {
            $('#document_file').css('border', '1px solid red');
            toastMsg('File', 'Invalid File', 'error');
            flag = 1;
            return false;
        }
        if (flag == 0) {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            var formData = new FormData($("#document_form")[0]);
            CallAjax('<?php echo base_url('index.php/Documents/addDocument')?>', formData, 'POST', function (result) {
                hideloader();
                var response = JSON.parse(result);
                try {
                    toastMsg(response[0], response[1], response[0]);
                    if (response[0] == 'success') {
                        $('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    }
                } catch (e) {
                }
            }, true);
        }
    }
</script>