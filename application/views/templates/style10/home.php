
        <img src="/Profile.jpeg">
            <h1><?php echo html_escape($user->name) ?> <br>
            <span><?php echo html_escape($user->designation) ?></span></h1>
        <div class="info">
            <h3>About Me</h3>
            <p> <?php echo strip_tags($user->about_me) ?></p>
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
                <?php if (!empty($user->linkedin)): ?>
                <a href="<?php echo html_escape($user->linkedin) ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php endif ?>
        </div>
        <div class="button">
            <button class="email"<?php echo html_escape($user->email) ?>>Email</button>
            <button class="view"<?php echo html_escape($user->email) ?>>View CV</button>
        </div>