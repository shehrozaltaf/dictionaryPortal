<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Dashboard - Dictionary Portal">
    <meta name="keywords" content="Dashboard - Dictionary Portal">
    <meta name="author" content="shahroz.khan@aku.edu">
    <title>Dashboard - Dictionary Portal</title>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/css/core/colors/palette-gradient.min.css">
    <!-- END: Page CSS-->

    <script src="<?php echo base_url(); ?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/css/extensions/toastr.css">

    <style>
        .Urdu{
            font-family: Jameel Noori Nastaleeq;
            font-size: 16px !important;
        }

        #myinnertable td {
            border: 1px solid;
        }

        .btn-link {
            color: #d51313;
        }

        /* Center the loader */
        #loader {

            border: 16px solid #c5c5c5; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 2s linear infinite;

            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            margin: -75px 0 0 -75px;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar " data-open="click"
      data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

<div class="spinner-border " id="loader">
    <span class="sr-only">Loading...</span>
</div>