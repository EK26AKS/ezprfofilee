            <!-- BANNER START -->
            <div class="banner p-top-20 p-bot-10">
                <div class="row">
                        <div class="banner-content text-center">
                        <div class="profile-pic"><img src="<?php echo base_url($user->thumb) ?>" alt=""></div>
                        <h2><?php echo html_escape($user->name) ?></h2>
                        <p><?php echo html_escape($user->designation) ?></p>


                        <?php if ($this->session->userdata('logged_in') == TRUE):?>
                            <br><br><a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="mt-4 text-dark"><i class="fa fa-cog"></i> Manage profile</a>
                        <?php endif ?>    
                       
                        <div class="social-icons text-center p-top-20 p-bot-20">
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

                </div>
            </div>
            <!-- BANNER END -->

            
            <div class="content-holder">
                <div class="row">
                    <div class="text-center introduction-content">
                        <h4 class="p-top-20 p-bot-20">About Me</h4>
                        <p><?php echo strip_tags($user->about_me) ?></p>
                        <div class="m-top-20">
                          <!-- <button class="email-btn"><span class="email-icon"><img src="assets/images/icons/email.png"></span>Email</button> -->
                          <a class="email-btn" href="mailto:<?php echo html_escape($user->email) ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                          <!-- <button class="chat-btn"><span class="chat-icon"><img src="assets/images/icons/chat.png"></span>Chat</button> -->
                          <?php if (!empty($user->phone)): ?>
                                <a class="chat-btn" href="https://wa.me/<?php echo html_escape($user->phone) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat</a>
                            <?php endif ?>

                    </div>
                </div>

                </div>

            </div>