

<div class="col-md-8 col-md-offset-2">
    <div id="content" class="panel-container">
        
        <div id="home">
            <!-- Text Section -->
            <div class="row p-20 hm">
                <div class="col-md-6 col-xs-12 text-center">
                    <div class="profile-img img-circle">
                        <img class="img-circle" width="200px" src="<?php echo base_url($user->thumb) ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 text-left">
                    <div class="user-text">
                        <h2><?php echo html_escape($user->name) ?></h2>
                        <h5><?php echo html_escape($user->designation) ?></h5>

                        <div class="user-social-acount text-left top_15">
                            <?php if (!empty($user->facebook)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->facebook) ?>" class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->twitter)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->twitter) ?>" class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->instagram)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->instagram) ?>" class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->linkedin)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->linkedin) ?>" class="btn btn-circle btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row p-20">
                <div class="col-md-12 text-left top_15">
                    <div class="section-title top_15"><h2>About Me</h2></div>
                    <p class="habout" class="top_15"><?php echo strip_tags($user->about_me) ?></p><br>
                    <a class="btn btn-success btn-xs" href="<?php echo base_url('profile/vcard/'.$user->id) ?>"><i class="fa fa-vcard" aria-hidden="true"></i> Save Vcard</a>

                    <?php if (!empty($user->cv)): ?>
                        <a href="<?php echo base_url('download/'.html_escape($user->id)) ?>"  class="btn btn-danger btn-xs"><i class="icon-cloud-download" aria-hidden="true"></i> Download CV </a>
                        <a target="_blank" href="<?php echo base_url(html_escape($user->cv)) ?>" class="btn btn-primary btn-xs"><i class="icon-eye" aria-hidden="true"></i> View CV </a>
                    <?php endif ?>
                </div>
            </div>
       
        </div>
            
    </div>
</div>

