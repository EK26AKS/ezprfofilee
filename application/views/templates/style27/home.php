
    <div class="section">
        <div class="image">
            <img src="<?php echo base_url($user->thumb) ?>">
            <div class="heading">
            <h3><?php echo html_escape($user->name) ?></h3>
            <h4><?php echo html_escape($user->designation) ?></h4>  
        </div>
        </div>
        <div class="title">
            <h4>ABOUT ME</h4>
            <p><?php echo strip_tags($user->about_me) ?></p>
        </div>
        <div class="button">
            <button class="email"<?php echo html_escape($user->email) ?>>Email</button>
            <button class="view" <?php echo html_escape($user->viewcv) ?>>View CV</button>
                    </div>
        <div class="icons">
                <?php if (!empty($user->facebook)): ?>
                <a href="<?php echo html_escape($user->facebook) ?>"><i class="fa-brands fa-facebook-f"></i></a>
                <?php endif ?>
                <?php if (!empty($user->twitter)): ?>
                <a href="<?php echo html_escape($user->twitter) ?>"><i class="fa-brands fa-twitter"></i></a>
                <?php endif ?>
                <?php if (!empty($user->instagram)): ?>
                <a href="<?php echo html_escape($user->instagram) ?>"><i class="fa-brands fa-instagram"></i></a>
                <?php endif ?>
                <?php if (!empty($user->linkedin)): ?>
                <a href="<?php echo html_escape($user->linkedin) ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php endif ?>
        </div>