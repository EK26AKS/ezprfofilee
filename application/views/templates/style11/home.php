
        <div class="front-face">
               <div class="cover">
                  <img src="<?php echo base_url($user->thumb) ?>" class="profile">
                </div>
                <div class="name"><h1><?php echo html_escape($user->name) ?></h1></div>
                <div class="tag"><h2><?php echo html_escape($user->designation) ?></h2></div>
            </div>
        <div class="back-face">
            <h4>About Me</h4>
            <p> <?php echo strip_tags($user->about_me) ?></p>
            <div class="card-social">
            <?php if (!empty($user->facebook)): ?>
                <a href="<?php echo html_escape($user->facebook) ?>" class="facebook">
                    <i class="fa-brands fa-facebook-square"></i>
                </a>
                <?php endif ?>
            <?php if (!empty($user->twitter)): ?>
                <a href="<?php echo html_escape($user->twitter) ?>" class="twitter">
                    <i class="fa-brands fa-twitter-square"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($user->instagram)): ?>
                <a href="<?php echo html_escape($user->instagram) ?>" class="instagram">
                    <i class="fa-brands fa-instagram-square"></i>
                 </a>
            <?php endif ?>
            <?php if (!empty($user->linkedin)): ?>
                <a href="<?php echo html_escape($user->linkedin) ?>" class="linkedin">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <?php endif ?>
            </div>
            <div class="buttons">
                <button class="email" <?php echo html_escape($user->email) ?>>Email</button>
                <button class="view" <?php echo html_escape($user->viewcv) ?>>View CV</button>
            </div>
        </div>