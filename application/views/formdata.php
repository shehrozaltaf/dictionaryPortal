<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Get Reports</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item active">Reports</li>
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
                                                <i class="ft-flag"></i>Get Reports</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="idProject">Project</label>
                                                        <?php if (isset($projects) && $projects != '') { ?>
                                                            <select id="idProject" name="idProject"
                                                                    onchange="changeProject()"
                                                                    class="form-control">
                                                                <option value="0" selected>
                                                                    Select Project
                                                                </option>
                                                                <?php foreach ($projects as $key => $values) {
                                                                    echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                                                                } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="crf_id">CRF</label>
                                                        <select id="crf_id" name="crf_id" class="form-control"
                                                                onchange="changeCrf()">
                                                            <option value="0" selected>
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
                                                                onchange="changeModule() ">
                                                            <option value="0" selected>
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
                                                        <select id="idSection" name="idSection" class="form-control">
                                                            <option value="0" selected>
                                                                Select Section
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions ">
                                        <button type="button" class="btn bg-gradient-x-blue-green white"
                                                onclick="getData()">
                                            <i class="la la-file-pdf-o"></i> Get Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
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
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body myresult">
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
        $('.myformdata').addClass('active');
    });


    function getData() {
        $('#idProject').css('border', '1px solid #babfc7');
        $('#crf_id').css('border', '1px solid #babfc7');
        $('#idModule').css('border', '1px solid #babfc7');
        $('#idSection').css('border', '1px solid #babfc7');
        var data = {};
        data['idProjects'] = $('#idProject').val();
        data['crf_id'] = $('#crf_id').val();
        data['idModule'] = $('#idModule').val();
        data['idSection'] = $('#idSection').val();
        var url = '<?php echo base_url('index.php/FormData/getData?') ?>';
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != null) {
            url += 'project=' + data['idProjects'];
        }
        if (data['crf_id'] != '' && data['crf_id'] != undefined && data['crf_id'] != null) {
            url += '&crf=' + data['crf_id'];
        }
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != null) {
            url += '&module=' + data['idModule'];
        }
        if (data['idSection'] != '' && data['idSection'] != undefined && data['idSection'] != null) {
            url += '&section=' + data['idSection'];
        }
        if (data['idProjects'] == '' && data['idProjects'] == undefined && data['idProjects'] != null) {
            $('#idProject').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            return false;
        } else {
            CallAjax(url, data, 'POST', function (res) {
                $('.myresult').html('').html(res);
            });
        }
    }


    function changeProject() {
        var data = {};
        data['idProjects'] = $('#idProject').val();
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != '0' && data['idProjects'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Crf/getCRFByProject'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"   selected>Select CRF</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.id_crf + '">' + v.crf_name + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#crf_id').html('').html(items);
            });
        } else {
            $('#crf_id').html('');
        }
    }

    function changeCrf() {
        var data = {};
        data['idCrf'] = $('#crf_id').val();
        if (data['idCrf'] != '' && data['idCrf'] != undefined && data['idCrf'] != '0' && data['idCrf'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"  selected>Select Module</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idModule + '">' + v.module_name_l1 + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#idModule').html('').html(items);
            });


        } else {
            $('#idModule').html('');
        }
    }

    function changeModule() {
        var data = {};
        data['idModule'] = $('#idModule').val();
        if (data['idModule'] != '' && data['idModule'] != undefined && data['idModule'] != '0' && data['idModule'] != '$1') {
            CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule'  ?>', data, 'POST', function (res) {
                var items = '<option value="0"   selected>Select Section</option>';
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        $.each(response, function (i, v) {
                            items += '<option value="' + v.idSection + '">' + v.section_title + '</option>';
                        })
                    } catch (e) {
                    }
                }
                $('#idSection').html('').html(items);
            });
        } else {
            $('#idSection').html('');
        }
    }

</script>