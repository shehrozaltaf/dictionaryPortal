<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Add CRF</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/crf') ?>">CRFs</a></li>
                            <li class="breadcrumb-item active">Add CRF</li>
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
                                                <i class="ft-flag"></i>Add CRF</h4>
                                            <?php if (isset($getProjectSlug) && $getProjectSlug != '') {
                                                $projectSlug = $getProjectSlug;
                                            } else {
                                                $projectSlug = 0;
                                            } ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="crf_name">CRF Name</label>
                                                        <input type="text" id="crf_name" class="form-control"
                                                               placeholder="CRF Name" name="crf_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="crf_title">CRF Title</label>
                                                        <input type="text" id="crf_title" class="form-control"
                                                               placeholder="CRF Title" name="crf_title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="id_of_pro">Project</label>
                                                        <?php if (isset($projects) && $projects != '') { ?>
                                                            <select id="id_of_pro" name="id_of_pro"
                                                                    class="form-control">
                                                                <option value="0" disabled
                                                                        readonly="readonly" <?php echo($projectSlug == 0 ? 'selected' : '') ?>>
                                                                    Select Project
                                                                </option>
                                                                <?php
                                                                foreach ($projects as $key => $values) {
                                                                    echo '<option value="' . $values->idProjects . '" ' . ($projectSlug == $values->idProjects ? 'selected' : '') . '>' . $values->project_name . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyinput1">Number Of Modules</label>
                                                        <input type="number" id="num_of_modules" class="form-control"
                                                               min="0"
                                                               placeholder="Number Of Modules" name="num_of_modules"
                                                               value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Start Date</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="startdate"
                                                                   class="form-control date-inputmask"
                                                                   name="startdate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">End Date</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="enddate"
                                                                   class="form-control date-inputmask"
                                                                   name="enddate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 mb-2 file-repeater">
                                                    <div data-repeater-list="repeater-group">

                                                        <label for="list_of_languagess">Languages</label>
                                                        <button type="button" data-repeater-create class="btn primary">
                                                            <i class="ft-plus"></i> Add
                                                        </button>
                                                        <div class="input-group mb-1" data-repeater-item>
                                                            <input type="text" placeholder="Languages"
                                                                   class="form-control" id="list_of_languagess"
                                                                   name="list_of_languagess">
                                                            <span class="input-group-append" id="button-addon2">
                                                                    <button class="btn btn-danger" type="button"
                                                                            data-repeater-delete>
                                                                        <i class="ft-x"></i>
                                                                    </button>
                                                            </span>
                                                        </div>
                                                    </div>
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
            </section>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts/forms/extended/form-inputmask.min.js"
        type="text/javascript"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/repeater/jquery.repeater.min.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.mycrf').addClass('open');
        $('.crf_add').addClass('active');
        addrow();

    });
    function addrow() {
        if ($('.file-repeater').find('input').length < 5) {
            $(".file-repeater").repeater({
                show: function () {
                    $(this).slideDown();
                }, hide: function (e) {
                    $(this).slideUp(e)
                }
            })
        } else {
            toastMsg('5 Maximum Languages', 'You can add maximum 5 languages', 'warning');
        }
    }

    function addData() {
        var flag = 0;
        $('#crf_name').css('border', '1px solid #babfc7');
        $('#crf_title').css('border', '1px solid #babfc7');
        $('#id_of_pro').css('border', '1px solid #babfc7');
        $('#num_of_modules').css('border', '1px solid #babfc7');
        $('#startdate').css('border', '1px solid #babfc7');
        $('#enddate').css('border', '1px solid #babfc7');
        $('#list_of_languagess').css('border', '1px solid #babfc7');
        var data = {};
        data['crf_name'] = $('#crf_name').val();
        if (data['crf_name'] == '' || data['crf_name'] == undefined) {
            $('#crf_name').css('border', '1px solid red');
            toastMsg('CRF Name', 'Invalid CRF Name', 'error');
            flag = 1;
            return false;
        }
        data['crf_title'] = $('#crf_title').val();
        if (data['crf_title'] == '' || data['crf_title'] == undefined) {
            $('#crf_title').css('border', '1px solid red');
            toastMsg('CRF Title', 'Invalid CRF Title', 'error');
            flag = 1;
            return false;
        }
        data['id_of_pro'] = $('#id_of_pro').val();
        if (data['id_of_pro'] == '' || data['id_of_pro'] == undefined) {
            $('#id_of_pro').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Selected Project', 'error');
            flag = 1;
            return false;
        }
        data['num_of_modules'] = $('#num_of_modules').val();
        if (data['num_of_modules'] == '' || data['num_of_modules'] == undefined) {
            $('#num_of_modules').css('border', '1px solid red');
            toastMsg('Modules', 'Invalid No of Modules', 'error');
            flag = 1;
            return false;
        }
        data['startdate'] = $('#startdate').val();
        data['enddate'] = $('#enddate').val();
        var list_of_languagess = [];
        $("input[id=list_of_languagess]").each(function () {
            if ($(this).val() == '' || $(this).val() == undefined) {
                $(this).css('border', '1px solid red');
                toastMsg('Language', 'Invalid Language', 'error');
                flag = 1;
                return false;
            } else {
                list_of_languagess.push($(this).val());
            }
        });
        data['list_of_languagess'] = list_of_languagess;
        if (data['list_of_languagess'] == '' || data['list_of_languagess'] == undefined) {
            $('#list_of_languagess').css('border', '1px solid red');
            toastMsg('Langauges', 'Invalid Langauges', 'error');
            flag = 1;
            return false;
        }
        if (flag == 0) {
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            CallAjax('<?php echo base_url('index.php/Crf/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url('index.php/crf/'); ?>" + data['id_of_pro'];
                    }, 1000);
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }
</script>