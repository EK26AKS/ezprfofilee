<div class="cover-photo">
            <img src="<?php echo base_url($user->thumb) ?>" class="profile">
        </div>
        <div class="profile-name"><?php echo html_escape($user->name) ?></div>
        <div class="work">><?php echo html_escape($user->designation) ?></div>
        <div class="about">About Me</div>
        <div class="description"><?php echo strip_tags($user->about_me) ?></div>
        <div>
        <?php if (!empty($user->facebook)): ?>
            <a target="_blank" href="<?php echo html_escape($user->facebook) ?>"><i class="fa-brands fa-facebook-f"></i></a>
        <?php endif ?>
        <?php if (!empty($user->twitter)): ?>
            <a target="_blank" href="<?php echo html_escape($user->twitter) ?>"> <i class="fa-brands fa-twitter"></i></a>
        <?php endif ?>
        <?php if (!empty($user->instagram)): ?>
            <a target="_blank" href="<?php echo html_escape($user->instagram) ?>"><i class="fa-brands fa-instagram"></i></a>
            <?php endif ?>
            <?php if (!empty($user->linkedin)): ?>
                <a target="_blank" href="<?php echo html_escape($user->linkedin) ?>"><i class="fa-brands fa-instagram"></i></a>
                <?php endif ?>
        </div>
        <button class="msg-btn"<?php echo html_escape($user->email) ?>> Email </button>
      <button class="view-btn"<?php echo html_escape($user->viewcv) ?> > View CV </button>
