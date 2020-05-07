<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Add Section</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item "><a
                                        href="<?php echo base_url('index.php/upload_data') ?>">Upload Data</a></li>
                            <li class="breadcrumb-item active">Upload Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="uk-form-stacked" id="document_form" method="post"
                                          onsubmit="return false" enctype="multipart/form-data">
                                        <div class="form">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="ft-flag"></i>Upload Excel File</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="idProjects">Project Name</label>
                                                            <select id="idProjects" name="idProjects"
                                                                    class="form-control"
                                                                    required
                                                                    onchange="changeProject('idProjects','id_crf')">
                                                                <option value="0" disabled readonly="readonly" selected>
                                                                    Select Project
                                                                </option>
                                                                <?php
                                                                if (isset($projects) && $projects != '') {
                                                                    foreach ($projects as $key => $values) {
                                                                        echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="id_crf">CRF</label>
                                                            <select id="id_crf" name="id_crf" class="form-control"
                                                                    required
                                                                    onchange="changeCrf('id_crf','idModule')">
                                                                <option value="0" disabled readonly="readonly" selected>
                                                                    Select CRF
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="idModule">Module</label>
                                                            <select id="idModule" name="idModule" class="form-control"
                                                                    required
                                                                    onchange="changeModule('idModule','idSection')">
                                                                <option value="0" disabled readonly="readonly" selected>
                                                                    Select Module
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="idSection">Section</label>
                                                            <select id="idSection" name="idSection" class="form-control"
                                                                    required>
                                                                <option value="0" disabled readonly="readonly" selected>
                                                                    Select Section
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                          id="document_file_addon">Upload</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="form-control"
                                                                       name="document_file"
                                                                       id="document_file"
                                                                       required aria-describedby="document_file_addon">
                                                                <label class="custom-file-label" for="document_file">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                        <p id="document_label"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary mybtn" onclick="addData()">
                                                <i class="la la-check-square-o"></i> Upload
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.myupload_data').addClass('open');
        $('.myupload_data').addClass('active');
        $('#document_file').change(function () {
            $('#document_label').text(this.files[0].name);
        });

    });

    function changeProject(idProjects, IdCRF) {
        if (idProjects == '' || idProjects == undefined) {
            idProjects = 'selectidProjects';
        }
        if (IdCRF == '' || IdCRF == undefined) {
            IdCRF = 'selectIdCRF';
        }
        var data = {};
        data['idProjects'] = $('#' + idProjects).val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select CRF</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.id_crf + '">' + v.crf_name + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#' + IdCRF).html('').html(items);
            });
        }
    }

    function changeCrf(IdCRF, idModule) {
        if (IdCRF == '' || IdCRF == undefined) {
            IdCRF = 'selectIdCRF';
        }
        if (idModule == '' || idModule == undefined) {
            idModule = 'selectidModule';
        }
        var data = {};
        data['idCrf'] = $('#' + IdCRF).val();
        if (data['idCrf'] != '' && data['idCrf'] != undefined && data['idCrf'] != '0' && data['idCrf'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select Module</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idModule + '">' + v.module_name_l1 + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#' + idModule).html('').html(items);
            });
        }
    }

    function changeModule(idModule, idSection) {
        var data = {};
        if (idModule == '' || idModule == undefined) {
            idModule = 'idModule';
        }
        if (idSection == '' || idSection == undefined) {
            idSection = 'idSection';
        }
        data['idModule'] = $('#' + idModule).val();
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != '0' && data['idModule'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule'  ?>', data, 'POST', function (res) {
                var items = '<option value="0" disabled readonly="readonly" selected>Select Section</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idSection + '">' + v.section_title + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#' + idSection).html('').html(items);
            });
        }
    }

    function addData() {
        $('#idProjects').css('border', '1px solid #babfc7');
        $('#id_crf').css('border', '1px solid #babfc7');
        $('#idModule').css('border', '1px solid #babfc7');
        $('#idSection').css('border', '1px solid #babfc7');
        $('#document_file').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idProjects'] = $('#idProjects').val();
        data['id_crf'] = $('#id_crf').val();
        data['idModule'] = $('#idModule').val();
        data['idSection'] = $('#idSection').val();
        data['document_file'] = $('#document_file').val();
        if (data['idProjects'] == '' || data['idProjects'] == undefined) {
            $('#idProjects').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }
        if (data['id_crf'] == '' || data['id_crf'] == undefined) {
            $('#id_crf').css('border', '1px solid red');
            toastMsg('Crf', 'Invalid Crf', 'error');
            flag = 1;
            return false;
        }
        if (data['idModule'] == '' || data['idModule'] == undefined) {
            $('#idModule').css('border', '1px solid red');
            toastMsg('Module', 'Invalid Module', 'error');
            flag = 1;
            return false;
        }
        if (data['idSection'] == '' || data['idSection'] == undefined) {
            $('#idSection').css('border', '1px solid red');
            toastMsg('Section', 'Invalid Section', 'error');
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
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            var formData = new FormData($("#document_form")[0]);
            CallAjax('<?php echo base_url('index.php/Section/uploadExcelData')?>', formData, 'POST', function (result) {
                $('.mybtn').removeAttr('disabled', 'disabled');
                hideloader();
                var response = JSON.parse(result);
                try {
                    toastMsg(response[0], response[1], response[0]);
                    if (response[0] == 'success') {
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
