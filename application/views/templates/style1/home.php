         <!-- column start -->
         <div class="col-md-2">
        <div class="social-icons text-left">
        <ul>


<?php if (!empty($user->facebook)): ?>
  <li>
  <a target="_blank" href="<?php echo html_escape($user->facebook) ?>">
    <img
      src=<?php echo base_url('assets/images/icons/1.png');?>
      class="img-responsive"
      alt=""
    />
  </a>
  </li>
<?php endif ?>




<?php if (!empty($user->twitter)): ?>

  <li>
  <a target="_blank" href="<?php echo html_escape($user->twitter) ?>">
    <img
    src="assets/images/icons/2.png"
    class="img-responsive"
    alt=""
  />
  </a>
  </li>


<?php endif ?>




<?php if (!empty($user->instagram)): ?>

<li>
<a target="_blank" href="<?php echo html_escape($user->instagram) ?>">
 <img
 src="assets/images/icons/3.png"
 class="img-responsive"
 alt=""
/>
</a>
</li>


<?php endif ?>



<?php if (!empty($user->linkedin)): ?>

<li>
<a target="_blank" href="<?php echo html_escape($user->linkedin) ?>">
 <img
 src="assets/images/icons/4.png"
 class="img-responsive"
 alt=""
/>
</a>
</li>
<?php endif ?>

</ul>
          </div>
    </div>
    <!-- column end -->


     <!-- column start -->
     <div class="col-md-4">
        <div class="profile-pic p-top-5 p-bot-5">
            <img src="<?php echo base_url($user->thumb) ?>" alt="">
            <?php if ($this->session->userdata('logged_in') == TRUE):?>
                            <br><br><a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="mt-4 text-dark"><i class="fa fa-cog"></i> Manage profile</a>
                        <?php endif ?>
        </div>
    </div>
    <!-- column end -->

    <!-- column start -->
    <div class="col-md-6">

        <div class="content-holder">
        <div class="banner-content text-left">
            <h2><?php echo html_escape($user->name) ?></h2>
            <p><?php echo html_escape($user->designation) ?></p>

        </div>
        <div class="line">

        </div>

        <div class="text-left introduction-content">
            <h4>About Me</h4>
            <p><?php echo strip_tags($user->about_me) ?></p>
        </div>

        <div class="m-top-20 text-left p-bot-20">
            <!-- <button class="view-cv-btn"><span class="view-icon"><img src="assets/images/icons/view.png"></span>View CV</button> -->
            <a class="email-btn" href="mailto:<?php echo html_escape($user->email) ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                   
                   <?php if (!empty($user->phone)): ?>
                               <a class="chat-btn" href="https://wa.me/<?php echo html_escape($user->phone) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat</a>
                           <?php endif ?>
        </div>
    </div>
</div>

    <!-- column end -->
