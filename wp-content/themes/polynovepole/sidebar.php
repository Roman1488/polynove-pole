<div class="social-sidebar">
    <div class="social-sidebar-wrapper">
        <?php while ( have_rows('social', 'options') ) : the_row(); ?>
            <a target="_blank" href="<?php the_sub_field('url'); ?>" class="social-sidebar__item">
                <i class="fa fa-<?php the_sub_field('icon'); ?>" aria-hidden="true"></i>
            </a>
        <?php endwhile; ?>
    </div>
    <span class="close-social-sidebar">
        <i class="fa fa-times" aria-hidden="true"></i>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </span>
</div>