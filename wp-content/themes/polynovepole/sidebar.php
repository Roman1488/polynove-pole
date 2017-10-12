<div class="social-sidebar">
    <div class="social-sidebar-wrapper">
        <?php if (get_field('facebook_url', 'option') != '') : ?>
        <a href="<?php echo get_field('facebook_url', 'option'); ?>" target="_blank" class="social-sidebar__item"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if (get_field('youtube_url', 'option') != '') : ?>
        <a href="<?php echo get_field('youtube_url', 'option'); ?>" target="_blank" class="social-sidebar__item"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if (get_field('instagram_url', 'option') != '') : ?>
        <a href="<?php echo get_field('instagram_url', 'option'); ?>" target="_blank" class="social-sidebar__item"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if (get_field('soundcloud_url', 'option') != '') : ?>
        <a href="<?php echo get_field('soundcloud_url', 'option'); ?>" target="_blank" class="social-sidebar__item"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>
        <?php endif; ?>
        <!--<a href="#" class="social-sidebar__item"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>
        <a href="#" class="social-sidebar__item"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>-->
    </div>
    <span class="close-social-sidebar">
        <i class="fa fa-times" aria-hidden="true"></i>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </span>
</div>