<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Edit Project</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item "><a
                                        href="<?php echo base_url('index.php/project') ?>">Projects</a></li>
                            <li class="breadcrumb-item active">Edit Projects</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
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
                                                <i class="ft-flag"></i>Edit Project</h4>

                                            <?php $project = $getProjectData[0]; ?>
                                            <input type="hidden" id="idproject" name="idproject"
                                                   value="<?php echo $project->idProjects; ?>"/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectName">Project Name</label>
                                                        <input type="text" id="projectName" class="form-control"
                                                               placeholder="Project Name" name="projectName"
                                                               value="<?php echo $project->project_name; ?>">
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="shortTitle">Short Title</label>
                                                        <input type="text" id="shortTitle" class="form-control"
                                                               placeholder="Short Title" name="shortTitle"
                                                               value="<?php echo $project->short_title; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="startdate">Expected Start Date</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="startdate"
                                                                   class="form-control date-inputmask"
                                                                   placeholder="yyyy/mm/dd" name="startdate"
                                                                   value="<?php echo $project->startdate; ?>">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="enddate">Expected End Date</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="enddate"
                                                                   class="form-control date-inputmask"
                                                                   placeholder="yyyy/mm/dd" name="enddate"
                                                                   value="<?php echo $project->enddate; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="num_of_crf">Number Of CRF</label>
                                                        <input type="number" id="num_of_crf"
                                                               class="form-control num_of_crf"
                                                               placeholder="No Of CRF" name="num_of_crf"
                                                               value="<?php echo $project->no_of_crf; ?>">
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="languages">Languages (comma seperated)</label>
                                                        <input type="text" id="languages" class="form-control"
                                                               placeholder="Languages" name="languages"
                                                               value="<?php echo $project->languages; ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="num_of_site">Number Of Sites</label>
                                                        <input type="number" id="num_of_site"
                                                               class="form-control num_of_site"
                                                               placeholder="No Of Sites" name="num_of_site"
                                                               value="<?php echo $project->no_of_sites; ?>">
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Supervisor Email</label>
                                                        <input type="text" id="email"
                                                               class="form-control email-inputmask"
                                                               placeholder="Email Of Person" name="email"
                                                               value="<?php echo $project->email_of_person; ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <!--<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput5">Id Of User</label>
                                                        <select id="id_user" name="priority" class="form-control"
                                                                data-toggle="tooltip" data-trigger="hover">
                                                            data-placement="top"
                                                            data-title="Priority">
                                                            <option value="low">Low</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="high">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>-->


                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-primary" onclick="editData()">
                                            <i class="la la-check-square-o"></i> Update
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
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
        type="text/javascript"></script>
<!--<script src="<?php /*echo base_url(); */ ?>assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
        type="text/javascript"></script>
<script src="<?php /*echo base_url(); */ ?>assets/vendors/js/forms/extended/card/jquery.card.js"
        type="text/javascript"></script>-->
<!-- END: Page Vendor JS-->

<script src="<?php echo base_url(); ?>assets/js/scripts/forms/extended/form-inputmask.min.js"
        type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('.myproject').addClass('open');
        $('.myproject_add').addClass('active');
    });


    function editData() {
        var flag = 0;
        $('#projectName').css('border', '1px solid #babfc7');
        $('#shortTitle').css('border', '1px solid #babfc7');
        $('#startdate').css('border', '1px solid #babfc7');
        $('#enddate').css('border', '1px solid #babfc7');
        $('#num_of_crf').css('border', '1px solid #babfc7');
        $('#languages').css('border', '1px solid #babfc7');
        $('#num_of_site').css('border', '1px solid #babfc7');
        $('#email').css('border', '1px solid #babfc7');
        var data = {};

        data['idproject'] = $('#idproject').val();
        data['projectName'] = $('#projectName').val();
        if (data['projectName'] == '' || data['projectName'] == undefined) {
            $('#projectName').css('border', '1px solid red');
            toastMsg('Project Name', 'Invalid Project Name', 'error');
            flag = 1;
            return false;
        }

        data['shortTitle'] = $('#shortTitle').val();
        if (data['shortTitle'] == '' || data['shortTitle'] == undefined) {
            $('#shortTitle').css('border', '1px solid red');
            toastMsg('Short Title', 'Invalid Project Short Title', 'error');
            flag = 1;
            return false;
        }

        data['startdate'] = $('#startdate').val();
        /* if (data['startdate'] == '' || data['startdate'] == undefined) {
             $('#startdate').css('border', '1px solid red');
             toastMsg('Start Date', 'Invalid Start Date', 'error');
             flag = 1;
             return false;
         }*/


        data['enddate'] = $('#enddate').val();
        /* if (data['enddate'] == '' || data['enddate'] == undefined) {
             $('#enddate').css('border', '1px solid red');
             toastMsg('End Date', 'Invalid End Date', 'error');
             flag = 1;
             return false;
         }*/

        data['num_of_crf'] = $('#num_of_crf').val();
        /* if (data['num_of_crf'] == '' || data['num_of_crf'] == undefined) {
             $('#num_of_crf').css('border', '1px solid red')
             flag = 1;
             return false;
         }*/


        data['languages'] = $('#languages').val();
        if (data['languages'] == '' || data['languages'] == undefined) {
            $('#languages').css('border', '1px solid red');
            toastMsg('Languages', 'Invalid Languages', 'error');
            flag = 1;
            return false;
        }

        data['num_of_site'] = $('#num_of_site').val();
        /* if (data['num_of_site'] == '' || data['num_of_site'] == undefined) {
             $('#num_of_site').css('border', '1px solid red')
             flag = 1;
             return false;
         }*/


        data['email'] = $('#email').val();
        if (data['email'] == '' || data['email'] == undefined) {
            $('#email').css('border', '1px solid red');
            toastMsg('Email', 'Invalid Email', 'error');
            flag = 1;
            return false;
        }

        if (flag == 0) {
            CallAjax('<?php echo base_url('index.php/Project/edit'); ?>', data, 'POST', function (result) {
                if (result == 1) {
                    toastMsg('Success', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url('index.php/project'); ?>";
                    }, 1000)
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }
</script>



