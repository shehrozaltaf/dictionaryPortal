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
                            <li class="breadcrumb-item active">Add Modules</li>
                            <?php if (isset($slug) && $slug != '') {
                                $idCRF = $slug;
                            } else {
                                $idCRF = 0;
                            } ?>
                            <input type="hidden" id="idCRF" name="idCRF" value="<?php echo $idCRF; ?>">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
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
                                    $totallanguages = 0;

                                    if (isset($crf[0]->l1) && $crf[0]->l1 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($crf[0]->l2) && $crf[0]->l2 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($crf[0]->l3) && $crf[0]->l3 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($crf[0]->l4) && $crf[0]->l4 != '') {
                                        $totallanguages++;
                                    }
                                    if (isset($crf[0]->l5) && $crf[0]->l5 != '') {
                                        $totallanguages++;
                                    } ?>

                                    <div class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i>Add Modules</h4>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="project_id">Project Name</label>
                                                        <input type="text" readonly disabled id="project_id"
                                                               class="form-control"
                                                               name="project_id"
                                                               value="<?php echo(isset($crf[0]->project_name) && $crf[0]->project_name != '' ? $crf[0]->project_name : 0) ?> ">
                                                        <input type="hidden" id="idProjectsHidden"
                                                               name="idProjectsHidden"
                                                               value="<?php echo(isset($crf[0]->idProjects) && $crf[0]->idProjects != '' ? $crf[0]->idProjects : 0) ?>">
                                                        <!--  <?php /*if (isset($projects) && $projects != '') { */ ?>
                                                            <select id="project_id" name="project_id"
                                                                    class="form-control">
                                                                <option value="0" disabled
                                                                        readonly="readonly" <?php /*echo($crf[0]->idProjects == 0 ? 'selected' : '') */ ?>>
                                                                    Select Project
                                                                </option>
                                                                <?php
                                                        /*                                                                foreach ($projects as $key => $values) {
                                                                                                                            echo '<option value="' . $values->idProjects . '" ' . ($crf[0]->idProjects == $values->idProjects ? 'selected' : '') . '>' . $values->project_name . '</option>';
                                                                                                                        }
                                                                                                                        */ ?>
                                                            </select>
                                                        --><?php /*} */ ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="id_of_crf">CRF</label>
                                                        <input type="text" readonly disabled id="id_of_crf"
                                                               class="form-control"
                                                               name="id_of_crf"
                                                               value="<?php echo(isset($crf[0]->crf_name) && $crf[0]->crf_name != '' ? $crf[0]->crf_name : 0) ?>">

                                                        <?php /*if (isset($all_crfs) && $all_crfs != '') { */ ?><!--
                                                            <select id="id_of_crf" name="id_of_crf"
                                                                    class="form-control">
                                                                <option value="0" disabled
                                                                        readonly="readonly" <?php /*echo($crf[0]->id_crf == 0 ? 'selected' : '') */ ?>>
                                                                    Select Project
                                                                </option>
                                                                <?php
                                                        /*                                                                foreach ($all_crfs as $key => $values) {
                                                                                                                            echo '<option value="' . $values->id_crf . '" ' . ($crf[0]->id_crf == $values->id_crf ? 'selected' : '') . '>' . $values->crf_name . '</option>';
                                                                                                                        }
                                                                                                                        */ ?>
                                                            </select>
                                                        --><?php /*} */ ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="variable_module">Variable Module (Alphabet)</label>
                                                        <input type="text" id="variable_module"
                                                               placeholder="Variable (A, B, C)"
                                                               class="form-control" name="variable_module">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12 mb-2 ">
                                                    <?php for ($i = 1; $i <= $totallanguages; $i++) {
                                                        $var = 'l' . $i; ?>
                                                        <label for="list_of_languagess">Languages
                                                            - <?php echo $crf[0]->$var ?></label>
                                                        <div class="input-group mb-1" data-repeater-item>
                                                            <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control row_lang" rows="3"
                                                                              id="module_name_L"
                                                                              placeholder="Module Name"
                                                                              name="module_name_L"></textarea>
                                                            </div>
                                                            <div class="form-group mb-1 col-md-6 col-sm-6">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="module_desc_L"
                                                                              placeholder="Module Descrition"
                                                                              name="module_desc_L"></textarea>
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
                                                                              id="module_name_L"
                                                                              placeholder="Module Name"
                                                                              name="module_name_L"></textarea>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-5 col-md-5">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="module_desc_L"
                                                                              placeholder="Module Descrition"
                                                                              name="module_desc_L"></textarea>
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

                                            <!-- <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Name L1:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_name_L1"
                                                                       placeholder="Module Name L1"
                                                                       name="module_name_L1"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Description L1:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_desc_L1"
                                                                       placeholder="Module Description L1"
                                                                       name="module_desc_L1"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>


                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Name L2:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_name_L2"
                                                                       placeholder="Module Name L2"
                                                                       name="module_name_L2"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>


                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Description L2:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_desc_L2"
                                                                       placeholder="Module Description L2"
                                                                       name="module_desc_L2"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>


                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Name L3:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_name_L3"
                                                                       placeholder="Module Name L3"
                                                                       name="module_name_L3"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>


                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Description L3:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_desc_L3"
                                                                       placeholder="Module Description L3"
                                                                       name="module_desc_L3"></textarea>

                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>


                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Name L4:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_name_L4"
                                                                       placeholder="Module Name L4"
                                                                       name="module_name_L4"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>


                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Description L4:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_desc_L4"
                                                                       placeholder="Module Description L4"
                                                                       name="module_desc_L4"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>


                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Name L5:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_name_L5"
                                                                       placeholder="Module Name L5"
                                                                       name="module_name_L5"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>


                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="comment">Module Description L5:</label>
                                                         <div class="position-relative has-icon-left">
                                                             <textarea class="form-control" rows="3" id="module_desc_L5"
                                                                       placeholder="Module Description L5"
                                                                       name="module_desc_L5"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
 -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput5">Module Status</label>
                                                        <select id="module_status" name="module_status"
                                                                class="form-control"
                                                                data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="Priority">
                                                            <option value="Ongoing">Ongoing</option>
                                                            <option value="Completed">Completed</option>
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
                                                            <option value="Single">Single</option>
                                                            <option value="Multiple">Multiple</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-actions">

                                        <button type="submit" class="btn btn-primary mybtn" onclick="addData()">
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
<!-- Modal -->
<div class="modal fade text-left" id="modal_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">Select Project & CRF</h4>
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

                    <?php if (isset($projects) && $projects != '') { ?>
                        <select id="selectIdCRF" name="selectIdCRF" class="form-control">
                            <option value="0" disabled readonly="readonly" selected>Select CRF</option>
                        </select>
                    <?php } else {
                        echo '<input type="hidden" id="selectIdCRF" name="selectIdCRF" value="' . $idCRF . '">';
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="setData()">Save
                </button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/repeater/jquery.repeater.min.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.mymodule').addClass('open');
        $('.module_add').addClass('active');
        addrow();
        var idCRF = $('#idCRF').val();
        if (idCRF != '' && idCRF != undefined && idCRF != 0 && idCRF != '$1') {
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
        var idCRF = $('#selectIdCRF').val();
        if (idCRF != '' && idCRF != undefined && idCRF != 0 && idCRF != '$1') {
            window.location.href = '<?php echo base_url() ?>' + 'index.php/add_module?crf=' + idCRF;
        } else {
            toastMsg('Invalid Project', 'Please select Project & CRF', 'error');
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

    function addData() {
        var flag = 0;
        $('#project_id').css('border', '1px solid #babfc7');
        $('#id_of_crf').css('border', '1px solid #babfc7');
        $('#module_status').css('border', '1px solid #babfc7');
        $('#module_type').css('border', '1px solid #babfc7');
        var data = {};
        data['project_id'] = $('#idProjectsHidden').val();
        if (data['project_id'] == '' || data['project_id'] == undefined) {
            $('#project_id').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project ', 'error');
            flag = 1;
            return false;
        }
        data['id_of_crf'] = $('#idCRF').val();
        if (data['id_of_crf'] == '' || data['id_of_crf'] == undefined) {
            $('#id_of_crf').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
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
        var list_of_name = [];
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
        var list_of_desc = [];
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
            CallAjax('<?php echo base_url('index.php/Module/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url('index.php/module/'); ?>" + data['id_of_crf'];
                    }, 1000);
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }
</script>