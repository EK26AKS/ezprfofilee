
       
            <div class="image">
            <img src="<?php echo base_url($user->thumb) ?>" alt="profile">
        </div>
        <div class="profile">
            <h1><?php echo html_escape($user->name) ?></h1>
            <h3><?php echo html_escape($user->designation) ?></h3>
        </div>
        <div class="info">
            <div class="about">ABOUT ME</div>
            <div class="description"> <?php echo strip_tags($user->about_me) ?></div>
        </div>
        <div class="card-social">
        <?php if (!empty($user->facebook)): ?>
            <a href="<?php echo html_escape($user->facebook) ?>" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <?php endif ?>
            <?php if (!empty($user->twitter)): ?>
            <a href="<?php echo html_escape($user->twitter) ?>" class="twitter"><i class="fa-brands fa-twitter"></i></a>
            <?php endif ?>
            <?php if (!empty($user->instagram)): ?>
            <a href="<?php echo html_escape($user->instagram) ?>" class="instagram"><i class="fa-brands fa-instagram"></i></a>
            <?php endif ?>
            <?php if (!empty($user->linkedin)): ?>
            <a href="<?php echo html_escape($user->linkedin) ?>" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
            <?php endif ?>
        </div>
        <div class="buttons">
            <button class="email"<?php echo html_escape($user->email) ?>> Email</button>
            <button class="view" <?php echo html_escape($user->viewcv) ?>> View CV</button>
        </div>