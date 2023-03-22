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
    <title><?php if(isset($post)){echo $post->title;}else{echo html_escape($settings->site_name);} ?> -
        <?php echo html_escape($settings->site_name) ?></title>
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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/aos.css" />

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

<body class="login-page">

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
                                <a target="_blank" href="<?php echo base_url('admin/dashboard') ?>" class="bttn-2"> <i class="icon-speedometer"></i> Dashboard</a>
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
    <div id="login-area" class="log-box">

        <div class="row">
            <div class="col-6 box-one">
                <form id="login-form" method="post" action="<?php echo base_url('auth/log'); ?>">
                    <h1 class="title">Welcome Back!</h1>

                    <div class="form-group">
                        <input type="text" name="user_name" class="form-control" placeholder="Username"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            autocomplete="off">
                    </div>
                    <div class="forgot_pass"><a href="#forgot-area">Forgot Password?</a></div>
                    <div class="row">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                            value="<?php echo $this->security->get_csrf_hash();?>">
                        <button type="submit" class="btn signin_btn">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="col-6 box-two"
                style="background-image: url('<?php echo base_url() ?>assets/images/login.png'); width:50%;background-position: left top;">
                <h4> Designed to Grow Your <br> Audience and Get More Clients</h4>
            </div>
        </div>
        <?php if (settings()->type == 'demo'): ?>
        <div class="alert alert-info mt-4" role="alert" data-aos="fade-up" data-aos-duration="500">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="alert-heading">Admin Access</h4>
                    <p class="mb-0">admin</p>
                    <p class="mb-0">1234</p>
                </div>
                <div class="col-md-6">
                    <h4 class="alert-heading">User Access</h4>
                    <p class="mb-0">user</p>
                    <p class="mb-0">1234</p>
                </div>
            </div>
        </div>
        <?php endif ?>

    </div>
    <div id="forgot-area" class="login-box-body">
        <p class="login-box-msg"
            style="color: #d70a84;font-weight: 600;font-size: 20px;margin-bottom: 20px;text-align: center;">Reset Password </p>

        <form id="lost-form" method="post" action="<?php echo base_url('auth/forgot_password'); ?>">

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Enter your email"
                    style="display: block;width: 100%; border:1px solid black; border-radius:20px; padding: 6px 12px;font-size: 14px;line-height: 1.2;color: #555; background-color: #fff;box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);margin-left: 10px; margin-top: 10px; margin-bottom:20px;">
                <span class="ion ion-email form-control-feedback"></span>
                <a class="pull-right back_login" href="#" style="color:black; margin-bottom:20px"><i
                        class="fa fa-angle-left"></i> Back</a>
            </div>

            <div class="row">
                <!-- csrf token -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                    value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-block signin_btn margin-top-10"
                        style="width:50%; margin:auto;">Submit</button>
                </div>
            </div>
        </form>
        <!-- /.social-auth-links -->

        <div class="margin-top-30 text-center">
        </div>

    </div>

    <footer class="bg_gray bot-10" style="background-image: url('<?php echo base_url() ?>assets/front/images/footer-shape.png'); background-position: left top;">
          <div class="container">
            <div class="row border-bottom p-bot-5">
              <div class="col-md-6">
                <img
                  src="<?php echo base_url($settings->logo) ?>"
                  class="img-responsive logo_img"
                  alt="">
              </div>
              <div class="col-md-6">
                <div class="social-icons text-right m-top-80">
                  <ul>
                    <li>
                    <?php if (!empty($settings->facebook)) : ?>
                                <li><a target="_blank" href="<?php echo html_escape($settings->facebook) ?>" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->twitter)) : ?>
                                <li><a target="_blank" href="<?php echo html_escape($settings->twitter) ?>" title="Twitter">
                                <i class="fab fa-twitter"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->linkedin)) : ?>
                                <li><a target="_blank" href="<?php echo html_escape($settings->linkedin) ?>" title="linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->instagram)) : ?>
                                <li><a target="_blank" href="<?php echo html_escape($settings->instagram) ?>" title="instagram">
                                <i class="fab  fa-instagram"></i>
                                </a></li>
                    <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 p-top-20">
              <p class="footer-para2 text-left">
                © 2023 EKTASI Technology, All Rights Reserved
              </p>
          </div>   
        <div class="col-md-6 p-top-20">
          <div class="footer-link">
            <ul class="text-right footer-para3">  
                <li><a href="<?php echo base_url('privacy_policy') ?>">Privacy Policy |</a></li>
                <li><a href="<?php echo base_url('terms-and-conditions') ?>">Terms and Conditions |</a></li>
                 <li><a href="<?php echo base_url('refund_policy') ?>">Refund Policy</a></li>
                </ul>
            </div>
            </div>
          </div>
        </footer>


    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

    <!-- jQuery 3 -->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>
    <!-- popper -->
    <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
    <!-- Bootstrap 4.0-->
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/admin.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/sweet-alert.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        $(document).on('submit', "#login-form", function() {

            $.post($('#login-form').attr('action'), $('#login-form').serialize(), function(json) {

                if (json.st == 1) {

                    window.location = json.url;

                } else if (json.st == 0) {
                    $('#login_pass').val('');
                    swal({
                        title: "Error..",
                        text: "Sorry your username or password is not correct!",
                        type: "error",
                        confirmButtonText: "Try Again"
                    });
                } else if (json.st == 2) {
                    swal({
                        title: "Error..",
                        text: "Your account is not active",
                        type: "error",
                        confirmButtonText: "Try Again"
                    });
                } else if (json.st == 3) {
                    swal({
                        title: "Error..",
                        text: "Your account has been suspended",
                        type: "warning",
                        confirmButtonText: "Try Again"
                    });
                } else if (json.st == 4) {
                    swal({
                        title: "Error",
                        text: "Your email is not verified, Please verify your email",
                        type: "warning",
                        confirmButtonText: "Close"
                    });
                }

            }, 'json');
            return false;
        });

        //recover password form
        $('#lost-form').submit(function() {
            $.post($('#lost-form').attr('action'), $('#lost-form').serialize(), function(json) {

                if (json.st == 1) {

                    swal({
                        title: "Password Reset Successfully!",
                        text: "We've sent a password to your email address. Please check your inbox",
                        type: "success",
                        showConfirmButton: true
                    }, function() {
                        window.location = json.url;
                    });

                } else {
                    swal({
                        title: "Sorry !",
                        text: "You are not a valid user",
                        type: "error",
                        confirmButtonText: "Try Again"
                    });
                }
            }, 'json');
            return false;
        });


        $(document).on('click', ".forgot_pass", function() {
            $('#login-area').slideUp();
            $('#forgot-area').slideDown();
        });

        $(document).on('click', ".back_login", function() {
            $('#login-area').slideDown();
            $('#forgot-area').slideUp();
        });


    });
    </script>
</body>

</html>