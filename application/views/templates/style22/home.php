<!-- COLUMN START -->
<div class="col-md-12">

<div class="card p-top-40">

   
   <div class="profile-pic pull-right p-right-20">
       <img src="<?php echo base_url($user->thumb) ?>" alt="">
   </div>

   <div class="content-holder p-top-10">
   <div class="banner-content text-left">
       <h2><?php echo html_escape($user->name) ?></h2>
       <p><?php echo html_escape($user->designation) ?></p>

       <?php if ($this->session->userdata('logged_in') == TRUE):?>
                            <br><br><a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="mt-4 text-dark"><i class="fa fa-cog"></i> Manage profile</a>
                        <?php endif ?>

   </div>
   <div class="line"></div>

   <div class="text-left introduction-content">
       <h4>About Me</h4>
       <p><?php echo strip_tags($user->about_me) ?></p>
   </div>

   <div class="icons">

   <div class="social-icons pull-left">
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

   <div class="email-chat pull-right p-top-10">
   <a class="email-btn" href="mailto:<?php echo html_escape($user->email) ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                   
                   <?php if (!empty($user->phone)): ?>
                               <a class="chat-btn" href="https://wa.me/<?php echo html_escape($user->phone) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat</a>
                           <?php endif ?>
       </div>

       <div class="clearfix">
       </div>

   </div>



 
   



   
</div>
</div>

<!-- column end -->


           </div>
           <!-- COLUMN END -->