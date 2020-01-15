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
                                        href="<?php echo base_url('index.php/section') ?>">Section</a></li>
                            <li class="breadcrumb-item active">Add Section</li>
                            <?php if (isset($slug) && $slug != '') {
                                $idModule = $slug;
                            } else {
                                $idModule = 0;
                            }
                            $totallanguages = 0;

                            if (isset($module[0]->l1) && $module[0]->l1 != '') {
                                $totallanguages++;
                            }
                            if (isset($module[0]->l2) && $module[0]->l2 != '') {
                                $totallanguages++;
                            }
                            if (isset($module[0]->l3) && $module[0]->l3 != '') {
                                $totallanguages++;
                            }
                            if (isset($module[0]->l4) && $module[0]->l4 != '') {
                                $totallanguages++;
                            }
                            if (isset($module[0]->l5) && $module[0]->l5 != '') {
                                $totallanguages++;
                            } ?>

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

                                    <div class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i>Add Section</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="project_id">Project Name</label>
                                                        <input type="text" readonly disabled id="project_id"
                                                               class="form-control"
                                                               name="project_id"
                                                               value="<?php echo(isset($module[0]->project_name) && $module[0]->project_name != '' ? $module[0]->project_name : 0) ?> ">
                                                        <input type="hidden" id="idProjectsHidden"
                                                               name="idProjectsHidden"
                                                               value="<?php echo(isset($module[0]->idProjects) && $module[0]->idProjects != '' ? $module[0]->idProjects : 0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="id_of_crf">CRF</label>
                                                        <input type="text" readonly disabled id="id_of_crf"
                                                               class="form-control"
                                                               name="id_of_crf"
                                                               value="<?php echo(isset($module[0]->crf_name) && $module[0]->crf_name != '' ? $module[0]->crf_name : 0) ?>">
                                                        <input type="hidden" id="id_crf" name="id_crf"
                                                               value="<?php echo(isset($module[0]->id_crf) && $module[0]->id_crf != '' ? $module[0]->id_crf : 0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="idModule_name">Module</label>
                                                        <input type="text" readonly disabled id="idModule_name"
                                                               class="form-control"
                                                               name="idModule_name"
                                                               value="<?php echo(isset($module[0]->module_name_l1) && $module[0]->module_name_l1 != '' ? $module[0]->module_name_l1 : 0) ?>">
                                                        <input type="hidden" id="idModule" name="idModule"
                                                               value="<?php echo $idModule; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="section_var_name">Variable Section
                                                            (Alphabet)</label>
                                                        <input type="text" id="section_var_name"
                                                               placeholder="Variable (A, B, C)"
                                                               class="form-control" name="section_var_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="section_status">Section Status</label>
                                                        <select id="section_status" name="section_status"
                                                                class="form-control"
                                                                data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="Priority">
                                                            <option value="Ongoing">Ongoing</option>
                                                            <option value="Completed">Completed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="section_table">Table in Database</label>
                                                        <input type="text" id="section_table"
                                                               placeholder="Table in Database"
                                                               class="form-control" name="section_table">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12 mb-2 file-repeater">
                                                    <?php for ($i = 1; $i <= $totallanguages; $i++) {
                                                        $var = 'l' . $i; ?>
                                                        <label for="list_of_languagess">Languages
                                                            - <?php echo $module[0]->$var ?></label>

                                                        <div class="input-group mb-1" data-repeater-item>
                                                            <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control row_lang" rows="3"
                                                                              id="section_name_L"
                                                                              placeholder="Section Name"
                                                                              name="section_name_L"></textarea>
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="section_desc_L"
                                                                              placeholder="Section Descrition"
                                                                              name="section_desc_L"></textarea>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <!--<div class="row">
                                                <div class="form-group col-12 mb-2 file-repeater">
                                                    <div data-repeater-list="repeater-group">
                                                        <label for="list_of_languagess">Languages</label>
                                                        <button type="button" data-repeater-create class="btn primary">
                                                            <i class="ft-plus"></i> Add
                                                        </button>
                                                        <div data-repeater-list="car">
                                                            <div class="input-group mb-1" data-repeater-item>
                                                                <div class="form-group mb-1 col-sm-5 col-md-5">
                                                                    <textarea class="form-control row_lang" rows="3"
                                                                              id="section_name_L"
                                                                              placeholder="Section Name"
                                                                              name="section_name_L"></textarea>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-5 col-md-5">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="section_desc_L"
                                                                              placeholder="Section Descrition"
                                                                              name="section_desc_L"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-2 col-md-2 text-center mt-2">
                                                                    <button type="button" class="btn btn-danger"
                                                                            data-repeater-delete>
                                                                        <i class="ft-x"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->


                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary mybtn" onclick="addData()">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                        <button type="button" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade text-left" id="modal_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Select Project, CRF & Module</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="selectidProjects">Select Project: </label>
                    <select id="selectidProjects" name="selectidProjects" class="form-control"
                            onchange="changeProject()">
                        <option value="0" disabled readonly="readonly" selected>Select Project</option>
                        <?php
                        foreach ($projects as $key => $values) {
                            echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="selectIdCRF">Select CRF: </label>
                    <select id="selectIdCRF" name="selectIdCRF" class="form-control" onchange="changeCrf()">
                        <option value="0" disabled readonly="readonly" selected>Select CRF</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="selectidModule">Select Module: </label>
                    <?php if (isset($projects) && $projects != '') { ?>
                        <select id="selectidModule" name="selectidModule" class="form-control">
                            <option value="0" disabled readonly="readonly" selected>Select Module</option>
                        </select>
                    <?php } else {
                        echo '<input type="hidden" id="selectidModule" name="selectidModule" value="' . $idModule . '">';
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="setData()">Get Data
                </button>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/vendors/js/forms/repeater/jquery.repeater.min.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.mysection').addClass('open');
        $('.section_add').addClass('active');
        addrow();
        var idModule = $('#idModule').val();
        if (idModule != '' && idModule != undefined && idModule != 0 && idModule != '$1') {
            // getData();
        } else {
            $('#modal_project').modal('show');
            $('#modal_project').modal({backdrop: 'static', keyboard: false});
        }
    });

    function addrow() {
        if ($('.file-repeater').find('.row_lang').length < 5) {
            $(".file-repeater").repeater({
                show: function () {
                    $(this).slideDown().addClass('aaa');
                }, hide: function (e) {
                    $(this).slideUp(e)
                }
            })
        } else {
            toastMsg('5 Maximum Languages', 'You can add maximum 5 languages', 'warning');
        }

    }

    function setData() {
        $('#selectidProjects').css('border', '1px solid #babfc7');
        $('#selectIdCRF').css('border', '1px solid #babfc7');
        $('#selectidModule').css('border', '1px solid #babfc7');

        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        data['idCRF'] = $('#selectIdCRF').val();
        data['idModule'] = $('#selectidModule').val();
        var flag = 0;

        if (data['idProjects'] == '' || data['idProjects'] == undefined) {
            $('#selectidProjects').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }

        if (data['idCRF'] == '' || data['idCRF'] == undefined) {
            $('#selectIdCRF').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
            flag = 1;
            return false;
        }

        if (data['idModule'] == '' || data['idModule'] == undefined) {
            $('#selectidModule').css('border', '1px solid red');
            toastMsg('Module', 'Invalid Module', 'error');
            flag = 1;
            return false;
        }


        var idModule = data['idModule'];
        if (idModule != '' && idModule != undefined && idModule != 0 && idModule != '$1') {
            window.location.href = '<?php echo base_url() ?>' + 'index.php/add_section?module=' + idModule;
        } else {
            toastMsg('Invalid Project', 'Please select Project, CRF & Module', 'error');
        }
    }

    function changeProject() {
        var data = {};
        data['idProjects'] = $('#selectidProjects').val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            showloader();
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                hideloader();
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
                $('#selectIdCRF').html('').html(items);
            });
        }
    }

    function changeCrf() {
        var data = {};
        data['idCrf'] = $('#selectIdCRF').val();
        if (data['idCrf'] != '' && data['idCrf'] != undefined && data['idCrf'] != '0' && data['idCrf'] != '$1') {
            showloader();
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                hideloader();
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
                $('#selectidModule').html('').html(items);
            });
        }
    }


    function addData() {

        var flag = 0;
        $('#project_id').css('border', '1px solid #babfc7');
        $('#id_of_crf').css('border', '1px solid #babfc7');
        $('#idModule_name').css('border', '1px solid #babfc7');
        $('#section_var_name').css('border', '1px solid #babfc7');
        $('#section_status').css('border', '1px solid #babfc7');
        $('#section_table').css('border', '1px solid #babfc7');

        var data = {};
        data['project_id'] = $('#idProjectsHidden').val();
        if (data['project_id'] == '' || data['project_id'] == undefined) {
            $('#project_id').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            flag = 1;
            return false;
        }

        data['id_of_crf'] = $('#id_crf').val();
        if (data['id_of_crf'] == '' || data['id_of_crf'] == undefined) {
            $('#id_of_crf').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
            flag = 1;
            return false;
        }
        data['idModule'] = $('#idModule').val();
        if (data['idModule'] == '' || data['idModule'] == undefined) {
            $('#idModule_name').css('border', '1px solid red');
            toastMsg('Module', 'Invalid Module', 'error');
            flag = 1;
            return false;
        }

        data['section_var_name'] = $('#section_var_name').val();
        if (data['section_var_name'] == '' || data['section_var_name'] == undefined) {
            $('#section_var_name').css('border', '1px solid red');
            toastMsg('Variable', 'Invalid Section Variable', 'error');
            flag = 1;
            return false;
        }

        data['section_status'] = $('#section_status').val();
        if (data['section_status'] == '' || data['section_status'] == undefined) {
            $('#section_status').css('border', '1px solid red');
            toastMsg('Section Status', 'Invalid Section Status', 'error');
            flag = 1;
            return false;
        }

        data['section_table'] = $('#section_table').val();
        if (data['section_table'] == '' || data['section_table'] == undefined) {
            $('#section_table').css('border', '1px solid red');
            toastMsg('Table Name', 'Invalid Database table name', 'error');
            flag = 1;
            return false;
        }

        var list_of_name = new Array();
        $("textarea[id=section_name_L]").each(function () {
            if ($(this).val() == '' || $(this).val() == undefined) {
                $(this).css('border', '1px solid red');
                toastMsg('Name', 'Invalid Name', 'error');
                flag = 1;
                return false;
            } else {
                $(this).css('border', '1px solid #babfc7');
                list_of_name.push($(this).val());
            }
        });
        data['section_name_Languages'] = list_of_name;

        var list_of_desc = new Array();
        $("textarea[id=section_desc_L]").each(function () {
            list_of_desc.push($(this).val());
            /*if ($(this).val() == '' || $(this).val() == undefined) {
                $(this).css('border', '1px solid red');
                toastMsg('Description', 'Invalid Description', 'error');
                flag = 1;
                return false;
            } else {
                $(this).css('border', '1px solid #babfc7');
                list_of_desc.push($(this).val());
            }*/
        });
        data['section_desc_Languages'] = list_of_desc;


        if (flag == 0) {
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            CallAjax('<?php echo base_url('index.php/Section/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url('index.php/section/'); ?>" + data['idModule'];
                    }, 1000);
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }

            });
        }
    }
</script>
