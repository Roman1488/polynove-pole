<?php
/**
 * Template Name: Contact page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-8">
                <div class="title-wrap title-wrap--center discography-title">
                    <h3 class="post-title"><?php pll_e('Contacts'); ?></h3>
                </div>
                <div class="info">
                <?php while ( have_rows('contact_info') ) : the_row(); ?>
                    <p class="contact-info"><?php the_sub_field('info'); ?></p>
                <?php endwhile; ?>
                </div>
                <div class="social-info">
                    <?php if (get_field('facebook_url', 'option') != '') : ?>
                        <a href="<?php echo get_field('facebook_url', 'option'); ?>" target="_blank" class="social-info__item">
                            <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (get_field('youtube_url', 'option') != '') : ?>
                        <a href="<?php echo get_field('youtube_url', 'option'); ?>" target="_blank" class="social-info__item">
                            <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (get_field('instagram_url', 'option') != '') : ?>
                        <a href="<?php echo get_field('instagram_url', 'option'); ?>" target="_blank" class="social-info__item">
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (get_field('soundcloud_url', 'option') != '') : ?>
                        <a href="<?php echo get_field('soundcloud_url', 'option'); ?>" target="_blank" class="social-info__item">
                            <i class="fa fa-soundcloud fa-2x" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="title-wrap title-wrap--center">
                    <h3 class="post-title"><?php pll_e('Riders'); ?></h3>
                </div>
                <div class="riders">
                    <div class="row">
                        <?php if(get_field('technical_rider') != '') : ?>
                        <div class="col-6">
                            <h3 class="riders__subtitle"><?php pll_e('Technical rider'); ?></h3>
                            <div class="buttons_wrap">
                                <a href="<?php echo get_field('technical_rider'); ?>" target="_blank" class="riders__button">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo get_field('technical_rider'); ?>" download class="riders__button">
                                    <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(get_field('organizational_rider') != '') : ?>
                        <div class="col-6">
                            <h3 class="riders__subtitle"><?php pll_e('Organizational rider'); ?></h3>
                            <div class="buttons_wrap">
                                <a href="<?php echo get_field('organizational_rider'); ?>" target="_blank" class="riders__button">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo get_field('organizational_rider'); ?>" download class="riders__button">
                                    <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="partners">
                    <div class="title-wrap title-wrap--center">
                        <h3 class="post-title"><?php pll_e('Friends and partners'); ?></h3>
                    </div>
                        <div class="partners-wrapper">
                            <div class="row">
                                <?php while ( have_rows('partners') ) : the_row(); ?>
                                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 align-self-center">
                                        <img class="img-fluid" src="<?php the_sub_field('partner_logo'); ?>" alt="Partner logo">
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>
