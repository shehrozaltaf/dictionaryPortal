<style>
    .missing {
        text-decoration: #ff0000 underline !important;
    }
</style>
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
                                                                <option value="14">UEN (Umeed-e-Nau)</option>

                                                                <!--<option value="0" selected>
                                                                    Select Project
                                                                </option>
                                                                --><?php /*foreach ($projects as $key => $values) {
                                                                    echo '<option value="' . $values->idProjects . '">' . $values->project_name . '</option>';
                                                                } */ ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="crf_id">CRF</label>
                                                        <!--  onchange="changeCrf()"-->
                                                        <select id="crf_id" name="crf_id" class="form-control"
                                                                onchange="changeCrf()">
                                                            <option value="34">Health Facility Assesment</option>
                                                            <option value="38">Health Facility Assessment</option>
                                                            <!-- <option value="0" selected>
                                                                 Select CRF
                                                             </option>-->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="idModule">Module</label>
                                                        <!-- <select id="idModule" name="idModule" class="form-control"
                                                                 onchange="changeModule() ">
                                                             <option value="0" selected="">Select Module</option>
                                                             <option value="68">MODULE-A: FACILITY IDENTIFICATION
                                                             </option>
                                                             <option value="69">MODULE-B: INPATIENT &amp; OBSERVATION
                                                                 BEDS
                                                             </option>
                                                             <option value="70">MODULE-C: STAFFING (NUMBERS &amp; THEIR
                                                                 CAPACITY)
                                                             </option>
                                                             <option value="71">MODULE-D: INFRASTRUCTURE</option>
                                                             <option value="72">MODULE-E: AVAILABLE SERVICES</option>
                                                             <option value="73">MODULE-F: DIAGNOSTICS</option>
                                                             <option value="74">MODULE-G: COMMODITIES &amp; SUPPLIES
                                                             </option>
                                                             <option value="75">MODULE-H: RECORDING AND REPORTING OF
                                                                 DATA
                                                             </option>
                                                             <option value="76">SECTION-I: CLIENT / PATIENT’S
                                                                 SATISFACTION
                                                             </option>
                                                             <option value="77">MODULE-J: QUALITY ASSESSMENT OF HEALTH
                                                                 CARE PROVIDER AT FACILITY
                                                             </option>
                                                             <option value="80">MODULE-K: COVID-19 ARRANGEMENTS IN HEALTH
                                                                 FACILITY
                                                             </option>
                                                         </select>-->
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

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="hfcode">HF Code</label>
                                                        <input type="number" id="hfcode" name="hfcode"
                                                               class="form-control" max="6" value="211033">
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

                                        <!--<button type="button" class="btn bg-gradient-x-cyan white"
                                                onclick="getUnmatched()">
                                            <i class="la la-file-pdf-o"></i> Get Unmatched
                                        </button>-->
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
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-group myresult"></ul>
                                        </div>
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
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/tables/datatable/datatables.min.js"
        type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<script>
    $(document).ready(function () {
        $('.myformdata').addClass('active');
        changeCrf();
        setTimeout(function () {
            changeModule();
        }, 700);
    });

    function getNextSect(id) {
        if (id != '' && id != undefined) {
            $('#idSection').val(id);
            getData();
        } else {
            $('#idSection').css('border', '1px solid red');
            toastMsg('Next Section', 'Invalid next Section', 'error');
            return false;
        }

    }

    function getData() {
        $('#idProject').css('border', '1px solid #babfc7');
        $('#crf_id').css('border', '1px solid #babfc7');
        $('#idModule').css('border', '1px solid #babfc7');
        $('#idSection').css('border', '1px solid #babfc7');
        $('#hfcode').css('border', '1px solid #babfc7');
        var data = {};
        data['idProjects'] = $('#idProject').val();
        data['crf_id'] = $('#crf_id').val();
        data['idModule'] = $('#idModule').val();
        data['idSection'] = $('#idSection').val();
        data['hfcode'] = $('#hfcode').val();
        var flag = 0;
        var url = '<?php echo base_url('index.php/FormData/getData?') ?>';
        if (data['idProjects'] != '' && data['idProjects'] != undefined && data['idProjects'] != null) {
            url += 'project=' + data['idProjects'];
        } else {
            flag = 1;
            $('#idProject').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            return false;
        }
        if (data['crf_id'] != '' && data['crf_id'] != '0' && data['crf_id'] != undefined && data['crf_id'] != null) {
            url += '&crf=' + data['crf_id'];
        } else {
            flag = 1;
            $('#crf_id').css('border', '1px solid red');
            toastMsg('CRF', 'Invalid CRF', 'error');
            return false;
        }
        if (data['idModule'] != '' && data['idModule'] != '0' && data['idModule'] != undefined && data['idModule'] != null) {
            url += '&module=' + data['idModule'];
        } else {
            flag = 1;
            $('#idModule').css('border', '1px solid red');
            toastMsg('Module', 'Invalid Module', 'error');
            return false;
        }
        if (data['idSection'] != '' && data['idSection'] != '0' && data['idSection'] != undefined && data['idSection'] != null) {
            url += '&section=' + data['idSection'];
        } else {
            flag = 1;
            $('#idSection').css('border', '1px solid red');
            toastMsg('Section', 'Invalid Section', 'error');
            return false;
        }
        if (data['hfcode'] != '' && data['hfcode'] != '0' && data['hfcode'] != undefined && data['hfcode'] != null) {
            url += '&hfcode=' + data['hfcode'];
        } else {
            flag = 1;
            $('#hfcode').css('border', '1px solid red');
            toastMsg('HF Code', 'Invalid HF Code', 'error');
            return false;
        }
        if (flag == 0) {
            showloader();
            CallAjax(url, data, 'POST', function (res) {
                $('.myresult').html('').html(res);
                $('#my_table_pro').DataTable();
                hideloader();
            });
        } else {
            $('#idProject').css('border', '1px solid red');
            toastMsg('Project', 'Invalid Project', 'error');
            return false;
        }
    }


    function getUnmatched() {
        $('#idProject').css('border', '1px solid #babfc7');
        $('#crf_id').css('border', '1px solid #babfc7');
        $('#idModule').css('border', '1px solid #babfc7');
        $('#idSection').css('border', '1px solid #babfc7');
        var data = {};
        data['idProjects'] = $('#idProject').val();
        data['crf_id'] = $('#crf_id').val();
        data['idModule'] = $('#idModule').val();
        data['idSection'] = $('#idSection').val();
        var url = '<?php echo base_url('index.php/FormData/unMatched?') ?>';
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
                $('#my_table_pro').DataTable();
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
            showloader();
            CallAjax('<?php echo base_url() . 'index.php/Module/getModuleByCrf'  ?>', data, 'POST', function (res) {
                hideloader();
                // var items = '<option value="0"  selected>Select Module</option>';
                var items = '';
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
            showloader();
            CallAjax('<?php echo base_url() . 'index.php/Section/getSectionByModule'  ?>', data, 'POST', function (res) {
                hideloader();
                // var items = '<option value="0"   selected>Select Section</option>';
                var items = '';
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

    function showInp(obj) {
        if ($(obj).is(":checked")) {
            $(obj).parents('.form-check').next('.toggleInp').removeClass('hidden');
        } else {
            $(obj).parents('.form-check').next('.toggleInp').addClass('hidden');
        }
    }

    function skipTo(obj, divFrom, divTo) {
        $(".div_" + divFrom).next(".div_" + divTo).find('input').removeAttr('disabled', 'disabled');
        if ($(obj).is(":checked")) {
            $(".div_" + divFrom).nextUntil(".div_" + divTo).find('input').attr('disabled', 'disabled')
        } else {
            $(".div_" + divFrom).nextUntil(".div_" + divTo).find('input').removeAttr('disabled', 'disabled')
        }

    }


    function returnTo(obj, div) {
        $(".div_" + div).next('.mainli').find('input').removeAttr('disabled', 'disabled');

    }


</script>