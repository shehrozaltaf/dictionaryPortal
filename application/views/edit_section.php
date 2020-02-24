<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Edit Section</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item "><a
                                        href="<?php echo base_url('index.php/module') ?>">Sections</a></li>
                            <li class="breadcrumb-item active">Edit Sections</li>
                            <?php if (!isset($idSection) || $idSection == '') {
                                $idSection = 0;
                            } ?>
                            <input type="hidden" id="idSection" name="idSection" value="<?php echo $idSection; ?>">

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
                                    <?php $getEditData = $getData[0]; ?>
                                    <div class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i>Edit Section</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="section_var_name">Variable Section
                                                            (Alphabet)</label>
                                                        <input type="text" id="section_var_name"
                                                               placeholder="Variable (A, B, C)"
                                                               value="<?php echo $getEditData->section_var_name ?>"
                                                               class="form-control" name="section_var_name">
                                                        <input type="hidden" id="idModule" name="idModule"
                                                               value="<?php echo $getEditData->idModule; ?>">
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
                                                            <option value="Ongoing" <?php echo(isset($getEditData->section_status) && $getEditData->section_status == 'Ongoing' ? 'selected' : '') ?>>
                                                                Ongoing
                                                            </option>
                                                            <option value="Completed" <?php echo(isset($getEditData->section_status) && $getEditData->section_status == 'Completed' ? 'selected' : '') ?>>
                                                                Completed
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="section_table">Table in Database</label>
                                                        <input type="text" id="section_table"
                                                               placeholder="Table in Database"
                                                               value="<?php echo $getEditData->tableName ?>"
                                                               class="form-control" name="section_table">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 mb-2 file-repeater">
                                                    <label for="list_of_languagess">Languages </label>
                                                    <?php for ($i = 1; $i <= 5; $i++) {
                                                        $title_l = "section_title_l" . $i;
                                                        $desc_l = "section_desc_l" . $i;
                                                        if (isset($getEditData->$title_l) && $getEditData->$title_l != '') { ?>
                                                            <div class="input-group mb-1">
                                                                <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control row_lang" rows="3"
                                                                              id="section_name_L"
                                                                              placeholder="Section Name"
                                                                              name="section_name_L"><?php echo $getEditData->$title_l ?></textarea>
                                                                </div>
                                                                <div class="form-group mb-1 col-sm-6 col-md-6">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="section_desc_L"
                                                                              placeholder="Section Descrition"
                                                                              name="section_desc_L"><?php echo $getEditData->$desc_l ?></textarea>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } ?>
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
        $('.mysection').addClass('open');
        $('.section_add').addClass('active');
    });

    function editData() {
        var flag = 0;
        $('#section_var_name').css('border', '1px solid #babfc7');
        $('#section_status').css('border', '1px solid #babfc7');
        $('#section_table').css('border', '1px solid #babfc7');
        var data = {};
        data['idSection'] = $('#idSection').val();
        data['idModule'] = $('#idModule').val();
        if (data['idSection'] == '' || data['idSection'] == undefined) {
            $('#section_var_name').css('border', '1px solid red');
            toastMsg('Section', 'Invalid Section', 'error');
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
        var list_of_name = [];
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
        var list_of_desc = [];
        $("textarea[id=section_desc_L]").each(function () {
            list_of_desc.push($(this).val());
        });
        data['section_desc_Languages'] = list_of_desc;
        if (flag == 0) {
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            CallAjax('<?php echo base_url('index.php/Section/editData'); ?>', data, 'POST', function (result) {
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