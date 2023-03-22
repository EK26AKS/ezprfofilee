
      <div class="left">
            <img src="<?php echo base_url($user->thumb) ?>" alt="profileimage">
            <h2> <?php echo html_escape($user->name) ?></h2>
            <p><?php echo html_escape($user->designation) ?></p>
        </div>
        <div class="right">
            <div class="title">
                <h4>About Me</h4>
            </div>
            <div class="description">
            <p><?php echo strip_tags($user->about_me) ?></p>
           </div>
           <button class="msg-btn"<?php echo html_escape($user->email) ?>> Email </button>
           <button class="view-btn"<?php echo html_escape($user->viewcv) ?>> View CV </button>
        <hr>
        <div class="social-icons">
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