<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Add Module</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item "><a
                                        href="<?php echo base_url('index.php/module') ?>">Modules</a></li>
                            <li class="breadcrumb-item active">Edit Modules</li>
                            <?php if (!isset($idModule) || $idModule == '') {
                                $idModule = 0;
                            } ?>
                            <input type="hidden" id="idModule" name="idModule" value="<?php echo $idModule; ?>">
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
                                    <?php
                                    $getData = $getData[0];
                                    $totallanguages = 0;


                                    if (isset($getData->l1) && $getData->l1 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($getData->l2) && $getData->l2 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($getData->l3) && $getData->l3 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($getData->l4) && $getData->l4 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($getData->l5) && $getData->l5 != '') {
                                        $totallanguages++;
                                    } ?>

                                    <div class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i>Edit Modules</h4>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="project_id">Project Name</label>
                                                        <input type="text" readonly disabled id="project_id"
                                                               class="form-control"
                                                               name="project_id"
                                                               value="<?php echo(isset($getData->project_name) && $getData->project_name != '' ? $getData->project_name : 0) ?> ">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="id_of_crf">CRF</label>
                                                        <input type="hidden" id="id_crf_hidden" name="id_crf_hidden"
                                                               value="<?php echo(isset($getData->crf_name) && $getData->crf_name != '' ? $getData->id_crf : 0) ?>">
                                                        <input type="text" readonly disabled id="id_of_crf"
                                                               class="form-control"
                                                               name="id_of_crf"
                                                               value="<?php echo(isset($getData->crf_name) && $getData->crf_name != '' ? $getData->crf_name : 0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="variable_module">Variable Module (Alphabet)</label>
                                                        <input type="text" id="variable_module"
                                                               placeholder="Variable (A, B, C)"
                                                               value="<?php echo(isset($getData->variable_module) && $getData->variable_module != '' ? $getData->variable_module : 0) ?>"
                                                               class="form-control" name="variable_module">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 mb-2 ">
                                                    <?php for ($i = 1; $i <= $totallanguages; $i++) {
                                                        $var = 'l' . $i;
                                                        $editLang = 'module_name_l' . $i;
                                                        $editDesc = 'module_desc_l' . $i; ?>
                                                        <label for="list_of_languagess">Languages
                                                            - <?php echo $getData->$var ?></label>

                                                        <div class="input-group mb-1" data-repeater-item>
                                                            <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control row_lang" rows="3"
                                                                              id="module_name_L"
                                                                              placeholder="Module Name"
                                                                              name="module_name_L"><?php echo(isset($getData->$editLang) && $getData->$editLang != '' ? trim($getData->$editLang) : 0) ?></textarea>
                                                            </div>
                                                            <div class="form-group mb-1 col-md-6 col-sm-6">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="module_desc_L"
                                                                              placeholder="Module Descrition"
                                                                              name="module_desc_L"><?php echo(isset($getData->$editDesc) && trim($getData->$editDesc) != '' ? trim($getData->$editDesc) : 0) ?></textarea>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput5">Module Status</label>
                                                        <select id="module_status" name="module_status"
                                                                class="form-control"
                                                                data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="Priority">
                                                            <option value="Ongoing"
                                                                <?php echo(isset($getData->module_status) && $getData->module_status == 'Ongoing' ? 'selected' : 0) ?>>
                                                                Ongoing
                                                            </option>
                                                            <option value="Completed"
                                                                <?php echo(isset($getData->module_status) && $getData->module_status == 'Completed' ? 'selected' : 0) ?>>
                                                                Completed
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput5">Module Type</label>
                                                        <select id="module_type" name="module_type" class="form-control"
                                                                data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="Priority">
                                                            <option value="Single" <?php echo(isset($getData->module_type) && $getData->module_type == 'Single' ? 'selected' : 0) ?>>
                                                                Single
                                                            </option>
                                                            <option value="Multiple" <?php echo(isset($getData->module_type) && $getData->module_type == 'Multiple' ? 'selected' : 0) ?>>
                                                                Multiple
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary mybtn" onclick="editData()">
                                            <i class="la la-check-square-o"></i> Save
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

<script src="<?php echo base_url(); ?>assets/vendors/js/forms/repeater/jquery.repeater.min.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.mymodule').addClass('open');
        $('.module_view').addClass('active');
        addrow();
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

    function editData() {
        var flag = 0;
        $('#module_status').css('border', '1px solid #babfc7');
        $('#module_type').css('border', '1px solid #babfc7');
        var data = {};
        data['id_of_crf'] = $('#id_crf_hidden').val();
        data['idModule'] = $('#idModule').val();
        if (data['idModule'] == '' || data['idModule'] == undefined) {
            toastMsg('Module', 'Invalid Module', 'error');
            flag = 1;
            return false;
        }
        data['variable_module'] = $('#variable_module').val();
        if (data['variable_module'] == '' || data['variable_module'] == undefined) {
            $('#variable_module').css('border', '1px solid red');
            toastMsg('Variable', 'Invalid Module Variable', 'error');
            flag = 1;
            return false;
        }
        var list_of_name = new Array();
        $("textarea[id=module_name_L]").each(function () {
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
        data['module_name_Languages'] = list_of_name;

        var list_of_desc = new Array();
        $("textarea[id=module_desc_L]").each(function () {
            if ($(this).val() == '' || $(this).val() == undefined) {
                $(this).css('border', '1px solid red');
                toastMsg('Description', 'Invalid Description', 'error');
                flag = 1;
                return false;
            } else {
                $(this).css('border', '1px solid #babfc7');
                list_of_desc.push($(this).val());
            }
        });
        data['module_desc_Languages'] = list_of_desc;
        data['module_status'] = $('#module_status').val();
        if (data['module_status'] == '' || data['module_status'] == undefined) {
            $('#module_status').css('border', '1px solid red');
            toastMsg('Module Status', 'Invalid Module Status', 'error');
            flag = 1;
            return false;
        }

        data['module_type'] = $('#module_type').val();
        if (data['module_type'] == '' || data['module_type'] == undefined) {
            $('#module_type').css('border', '1px solid red');
            toastMsg(' Module Type', 'Invalid Module Type', 'error');
            flag = 1;
            return false;
        }
        if (flag == 0) {
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            CallAjax('<?php echo base_url('index.php/Module/editData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url('index.php/module/'); ?>" + data['id_of_crf'];
                    }, 1000);
                } else if (result == 3) {
                    toastMsg('Error', 'Invalid ID Module', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }
</script>