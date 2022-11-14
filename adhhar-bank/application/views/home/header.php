<!DOCTYPE html>
<html>

<head>
    <title> YBI Bank | Home </title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/logo/YBIogo.ico">

    <!-- Web Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/footer.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/line-icons-pro/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

</head>

<body>
    <div class="wrapper">
        <!--=== Header v1 ===-->
        <div class="header-v1">
            <!-- Topbar -->
            <div class="topbar-v1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline top-v1-contacts">
                                <li>
                                    <i class="fa fa-envelope"></i> Email: ybi@gmail.com
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> Contact no : 88666 00555
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Topbar -->

            <!-- Navbar -->
            <div class="navbar mega-menu" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="res-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-brand">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>assets/img/logo/YBILogo1.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <!--/end responsive container-->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <div class="res-container">
                            <ul class="nav navbar-nav">
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <!-- Home  -->
                                <li class="mega-menu-fullwidth">
                                    <a href="<?php echo base_url(); ?>">
                                        HOME
                                    </a>
                                </li>
                                <!-- End Home-->

                                <!-- About Us -->
                                <li class="mega-menu-fullwidth">
                                    <a href="<?php echo base_url(); ?>/home/about">
                                        ABOUT US
                                    </a>
                                </li>
                                <!-- End About us -->

                                <!-- Blog -->
                                <li class="mega-menu-fullwidth">
                                    <a href="<?php echo base_url(); ?>/home/services">
                                        SERVICES
                                    </a>
                                </li>
                                <!-- End Blog -->
                                <!-- Registration -->
                                <li class="mega-menu-fullwidth">
                                    <a href="<?php echo base_url(); ?>/home/registration">
                                        REGISTRATION
                                    </a>
                                </li>
                                <!-- End registration -->
                                <li class="mega-menu-fullwidth">
                                    <a href="<?php echo base_url(); ?>/home/notification"><i class='fa fa-bell' style='font-size:20px;color:red' title="Addhar Update Count"></i> <span class="badge" style="margin-bottom: 20px;"><?php echo $update_count; ?></span></a><br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>