
 <!-- FOOTER STARTS -->
 <footer class="bg_gray bot-10">
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
                                <li><a target="_blank" href="https://www.facebook.com/ektasitech
">
                                <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->twitter)) : ?>
                                <li><a target="_blank" href="https://twitter.com/ektasitech">
                                <i class="fab fa-twitter"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->linkedin)) : ?>
                                <li><a target="_blank" href="https://www.linkedin.com/company/ektasi-technology/" title="linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a></li>
                            <?php endif; ?>
                    </li>
                    <li>
                    <?php if (!empty($settings->instagram)) : ?>
                                <li><a target="_blank" href="https://www.instagram.com/ektasi.digital/" title="instagram">
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
        <!-- FOOTER ENDS -->
    <?php $success = $this->session->flashdata('msg'); ?>
    <?php $error = $this->session->flashdata('error'); ?>
    <input type="hidden" id="success" value="<?php echo html_escape($success); ?>">
    <input type="hidden" id="error" value="<?php echo html_escape($error);?>">
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
    <!--Vendor-JS-->
    <script src="<?php echo base_url() ?>assets/front/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="<?php echo base_url() ?>assets/front/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/slicknav.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/scrollUp.min.js"></script>
    <!--Main-active-JS-->
    <script src="<?php echo base_url() ?>assets/front/js/main.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/front/js/sweet-alert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/default/js/aos.js"></script>

    <?php $this->load->view('include/stripe-js'); ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();
            
            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        });
    </script>


    <script src="<?php echo base_url() ?>assets/admin/js/toast.js"></script>
    <script type="text/javascript">
      <?php if (isset($success)): ?>
      $(document).ready(function() {
        var msg = $('#success').val();
        $.toast({
          heading: 'Success',
          text: msg,
          position: 'top-right',
          loaderBg:'#fff',
          icon: 'success',
          hideAfter: 33500
        });

      });
      <?php endif; ?>


      <?php if (isset($error)): ?>
      $(document).ready(function() {
        var msg = $('#error').val();
        $.toast({
          heading: 'Error',
          text: msg,
          position: 'top-right',
          loaderBg:'#fff',
          icon: 'error',
          hideAfter: 33500
        });

      });
      <?php endif; ?>
    </script>
    
</body>
</html>