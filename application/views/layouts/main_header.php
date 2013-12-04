<!DOCTYPE html>
<html>
    <head>
        <title>Codeigniter Easy CRUD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>assets/css/style_main.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">    
        <link href="<?php echo base_url() ?>assets/css/bootstrap-fileupload.min.css" rel="stylesheet">    

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url() ?>/asset/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url() ?>ico/favicon.png">

        <script src="<?php echo base_url() ?>assets/js/jquery-latest.min.js"></script>  
    </head>
    <body>
        <div id="wrap">
            <div id="wrap-content">
                <!-- Begin page content -->
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="brand" href="#">Codeigniter Easy CRUD</a>
                            <div class="nav-collapse collapse">
                                <ul class="nav pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            admin				
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href='#'>Profile</a></li>
                                            <li><a href='#'>Logout</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li class="divider-vertical"></li> -->
                                </ul>			
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>


                <div class="container-fluid">
                    <div class="row-fluid">

                        <div class="span3">  
                            <?php $this->view("layouts/main_sidebar"); ?>
                        </div><!--/span3 -->

                        <div class="span9">