<!-- SECTION START -->
<section class="contact"
    style="background-image: url('<?php echo base_url() ?>assets/images/bgimage.png'); background-position: left top; height:200px; background-repeat:no-repeat; background-size:cover; ">
    <!-- CONTAINER START -->
    <div class="container text-center">
        <div class="row">
            <div class="contact-heading">
                <h1>Get In Touch</h1>
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
</section>
<!-- SECTION END -->
<!-- SECTION START -->
<section class="p-top-50 p-bot-50 contactarea">
    <!-- CONTAINER START -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 mt-4">
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
            <form method="post" action="<?php echo base_url('home/send_message'); ?>">
            <div class="col-md-12">
                <!-- column start -->
                <div class="col-md-6 col-sm-12 contact-form contact-form-top">
                    
                        <div class="col-md-12 cf-fields col-sm-12">
                            <label for="firstname">Firstname *</label>
                            <input type="text" name="first_name" id="first_name" required/>
                        </div>
                        <div class="col-md-12 col-sm-12 cf-fields m-top-20">
                            <label for="lastname">Lastname *</label>
                            <input type="text" name="last_name" id="last_name" required />
                        </div>
                        <div class="col-md-12 col-sm-12 cf-fields m-top-20">
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="email" required  />
                        </div>

                        <!-- csrf token -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                            value="<?php echo $this->security->get_csrf_hash();?>">

                        <!-- recaptcha start -->
                        <div class="col-sm-12">
                            <?php if ($settings->enable_captcha == 1 && $settings->captcha_site_key != ''): ?>
                            <div class="g-recaptcha"
                                data-sitekey="<?php echo html_escape($settings->captcha_site_key); ?>"></div>
                            <?php endif ?>
                        </div>
                        <!-- recaptcha End -->

                    
                </div>
                <div class="col-md-6 col-sm-12 contact-form">
                    <label for="name" required>Write Your Message</label>
                    <div class="floating-label-form-group input-controls control-group">
                        <textarea id="message" name="message"  rows="6" cols="33" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="send-msg-btn">Send Message</button>
                </div>
                <!-- column end -->
            </div>
            </form>
        </div>
    </div>
    <!-- CONTAINER END -->
</section>

<!-- SECTION END -->