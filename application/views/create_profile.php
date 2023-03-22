<div class="signupform" id="contact-page">
    <div class="row">
        <div class="col-md-offset-2 col-md-12 col-sm-12">
            <?php if (!empty($this->session->flashdata('msg'))): ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="icon-check"></i> <?php echo $this->session->flashdata('msg'); ?> !</strong>
            </div>
            <?php endif ?>
            <?php if (!empty($this->session->flashdata('error'))): ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="icon-close"></i> <?php echo $this->session->flashdata('error'); ?> !</strong>
            </div>
            <?php endif ?>
        </div>
        <div class="col-md-6 col-sm-12 box-one">
            <form id="register-form" method="post" action="<?php echo base_url('register_user'); ?>">
                <h1 class="title">Create Your Online Profile!</h1>
                <div class="form-group">
                    <input type="text" placeholder="Your name" name="name" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" autocomplete="off" id="email" required />
                </div>

                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" id="password" required />
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Username" name="username" id="username" required />
                    <div class="bubble loader-bubble" style="display:none;">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <h5 class="text-danger" id="name_exist" style="display: none;"><i class="icon-close"></i> Username
                        already taken, try another</h5>
                    <h5 class="text-success" id="name_available" style="display: none;"><i class="icon-check"></i>
                        Username is available</h5>
                </div>
                <div class="form-group">
                    <?php if (settings()->enable_country == 1): ?>
                    <select class="form-control inph-55" name="country">
                        <option value="">Select Country</option>
                        <?php foreach (array_reverse($countries) as $country): ?>
                        <option value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php else: ?>
                    <input type="hidden" name="country" value="0">
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <?php if ($settings->enable_captcha == 1 && $settings->captcha_site_key != ''): ?>
                    <div class="g-recaptcha" data-sitekey="<?php echo html_escape($settings->captcha_site_key); ?>">
                    </div>
                    <?php endif ?>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="terms_cond" value="" required>
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        <p>I have read the <a href="<?php echo base_url('terms-and-conditions') ?>">terms and
                                conditions</a> and accept them.</p>
                    </label>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                    value="<?php echo $this->security->get_csrf_hash();?>">
                <div id="success"></div>
                <button type="submit" id="create-btn" class="btn" active>Create Account</button>
            </form>
        </div>
        <div class="col-md-6 col-sm-12 box-two"
            style="background-image: url('<?php echo base_url() ?>assets/images/login.png'); height:612px; background-size: cover; width:43%;background-position: left top;background-repeat: no-repeat; margin-left:42px;">
            <h4>Designed to Grow Your <br> Audience and Get More Clients</h4>
        </div>
    </div>
</div>