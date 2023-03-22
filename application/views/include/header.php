<!DOCTYPE html>
<html class="no-js" lang="en">
<?php $settings = get_settings(); ?>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Codericks">
    <meta name="description" content="<?php echo html_escape($settings->description) ?>">
    <meta name="keywords" content="<?php echo html_escape($settings->keywords) ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <?php if (isset($page_title) && $page_title == 'Post details'): ?>
        <title><?php if(isset($post)){echo $post->title;}else{echo html_escape($settings->site_name);} ?> - <?php echo html_escape($settings->site_name) ?></title>
    <?php else: ?>
        <title><?php echo html_escape($settings->site_name); ?> - <?php echo html_escape($settings->site_title) ?></title>
    <?php endif ?>
    
    <!-- Favicon icon -->  
    <link rel="icon" href="<?php echo base_url($settings->favicon) ?>">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/fontawesome.min.css">
    <link href="<?php echo base_url() ?>assets/admin/css/toast.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/animate.css">

    <link href="<?php echo base_url() ?>assets/front/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/simple-line-icons.css">

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/sweet-alert.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/responsive.css">
    <script src="<?php echo base_url() ?>assets/front/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/aos.css"/>

    <!-- csrf token -->
    <script type="text/javascript">
       var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
       var token_name = '<?php echo $this->security->get_csrf_token_name();?>'
    </script>
    
    <!-- google analytics -->
    <?php if (!empty($settings->google_analytics)): ?>
        <?php echo base64_decode($settings->google_analytics) ?>
    <?php endif ?>
    
    <!-- recaptcha js -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body data-target=".primary-menu">

    <div class="respon-logo">
        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url($settings->logo) ?>" alt=""></a>
    </div>

    <!-- mobile nav menu start -->
    <nav class="mobile-navmenu navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-nav-wrapper" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <a href="<?php echo base_url() ?>" class="navbar-brand">
                    <img src="<?php echo base_url($settings->logo) ?>" alt="">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="mobile-nav-wrapper">
                <ul class="nav">
                    <li class="<?php if(isset($page_title) && $page_title == 'Home'){echo'active';} ?>"><a
                            href="<?php echo base_url() ?>">Home</a></li>

                    <li class="<?php if(isset($page_title) && $page_title == 'Pricing'){echo'active';} ?>"><a
                            href="<?php echo base_url('pricing') ?>">Pricing</a></li>

                    <li class="<?php if(isset($page_title) && $page_title == 'Contact'){echo'active';} ?>"><a
                            href="<?php echo base_url('contact') ?>">Contact</a></li>

                    <li class="hide show-xs">
                        <?php if ($this->session->userdata('logged_in') == TRUE): ?>
                        <?php if (is_admin()): ?>
                        <a target="_blank" href="<?php echo base_url('admin/dashboard') ?>" class="bttn-1"> <i
                                class="icon-speedometer"></i> Dashboard</a>
                        <?php else: ?>
                        <?php if ($this->settings->enable_email_verify == 1 && user()->email_verified == 0): ?>
                        <a href="<?php echo base_url('auth/email_verify') ?>" class="bttn-1">Verify Email <i
                                class="icon-check"></i></a>
                        <?php else: ?>
                        <?php if (check_my_payment() == TRUE): ?>
                        <a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="bttn-2"><img
                                class="img-circle" width="30px" src="<?php echo base_url(user()->thumb) ?>" alt="">
                            Manage profile <i class="fa fa-long-arrow-right"></i></a>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                        <?php else: ?>
                        <a href="<?php echo base_url('login') ?>" class="bttn-1 login-button">Log In <i class="icon-login"></i></a>
                        <a href="<?php echo base_url('create-profile') ?>" class="bttn-1 signup-button">Create Profile <i
                                class="icon-note"></i></a>
                        <?php endif ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- mobile nav menu End -->
    
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="container text-center"><div class="spinner-md"></div></div>
    </div> -->
    <!-- /Preloader -->
    
    <!-- Header Area -->
    <header class="header-area">
        <nav class="navbar mainmenu-area <?php if(isset($page_title) && $page_title == 'Home'){echo"fixed-top";}else{echo"static";} ?>" data-spy="affix" data-offset-top="200">
            <div class="container-fluid">
                <div class="equal-height">
                    <div class="site-branding">
                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url($settings->logo) ?>" alt=""></a>
                    </div>
                    <div class="primary-menu">
                        <ul class="nav">
                            <li class="<?php if(isset($page_title) && $page_title == 'Home'){echo'active';} ?>"><a href="<?php echo base_url() ?>">Home</a></li>

                            <li class="<?php if(isset($page_title) && $page_title == 'Pricing'){echo'active';} ?>"><a href="<?php echo base_url('pricing') ?>">Pricing</a></li>

                           <!-- <li class="<?php //if(isset($page_title) && //$page_title == 'Users'){echo'active';} ?>"><a href="<?php //echo base_url('users?sort=all') ?>">Users</a></li> -->

                           
                            
                            <li class="<?php if(isset($page_title) && $page_title == 'Contact'){echo'active';} ?>"><a href="<?php echo base_url('contact') ?>">Contact</a></li>

                            <li class="hide show-xs">
                                <?php if ($this->session->userdata('logged_in') == TRUE): ?>
                                    <?php if (is_admin()): ?>
                                        <a target="_blank" href="<?php echo base_url('admin/dashboard') ?>" class="bttn-1"> <i class="icon-speedometer"></i> Dashboard</a>
                                    <?php else: ?>
                                        <?php if ($this->settings->enable_email_verify == 1 && user()->email_verified == 0): ?>
                                            <a href="<?php echo base_url('auth/email_verify') ?>" class="bttn-1 ">Verify Email <i class="icon-check"></i></a>
                                        <?php else: ?>
                                            <?php if (check_my_payment() == TRUE): ?>
                                                <a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="bttn-2"><img class="img-circle" width="30px" src="<?php echo base_url(user()->thumb) ?>" alt=""> Manage profile <i class="fa fa-long-arrow-right"></i></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php else: ?>
                                    <a href="<?php echo base_url('login') ?>" class="bttn-1 signin-button">Log In <i class="icon-login"></i></a>
                                    <a href="<?php echo base_url('create-profile') ?>" class="bttn-1 signup-button">Create Profile <i class="icon-note"></i></a>
                                <?php endif ?>
                            </li>
                        </ul>
                        <div class="create-btn">
                        <?php if ($this->session->userdata('logged_in') == TRUE): ?>
                            
                            <?php if (is_admin()): ?>
                                <a target="_blank" href="<?php echo base_url('admin/dashboard') ?>" class="bttn-2 dashboard-btn"> <i class="icon-speedometer"></i> Dashboard</a>
                            <?php else: ?>
                                <?php if ($this->settings->enable_email_verify == 1 && user()->email_verified == 0): ?>
                                    <a href="<?php echo base_url('auth/email_verify') ?>" class="bttn-1">Verify Email <i class="icon-check"></i></a>
                                <?php else: ?>
                                    <?php if (check_my_payment() == TRUE): ?>
                                        <a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="bttn-2"><img class="img-circle" width="30px" src="<?php echo base_url(user()->thumb) ?>" alt=""> Manage profile <i class="fa fa-long-arrow-right"></i></a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('login') ?>" class="bttn-1 login-button">Log in <i class="icon-login"></i></a>
                                        <a href="<?php echo base_url('create-profile') ?>" class="bttn-2 signup-button btn">Create Profile <i class="icon-note"></i></a>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endif ?>
                        <?php else: ?>
                            <a href="<?php echo base_url('login') ?>" class="bttn-1 login-button">Log In <i class="icon-login"></i></a>
                            <a href="<?php echo base_url('create-profile') ?>" class="bttn-1 signup-button btn">Create Profile <i class="icon-note"></i></a>
                        <?php endif ?>
                    </div>
                    </div>
                    
                </div>
            </div>
        </nav>
    </header><!-- /Header Area -->  