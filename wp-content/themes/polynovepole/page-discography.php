<?php
/**
 * Template Name: Discography page template
 */
?>
<?php get_header(); ?>
    <div class="container">
        <div class="content-wrapper">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <?php
                $args = array(
                    'post_type' => 'discography',
                    'posts_per_page' => -1
                );
                $discs = query_posts($args);
                if (count($discs) > 0) : ?>
                <div class="discography-list">
                    <?php foreach ($discs as $disc) : ?>
                    <div class="discography-list__item <?php echo $disc->ID == $discs[0]->ID ? 'active' : ''; ?>" data-id="<?php echo $disc->ID; ?>">
                        <?php echo get_the_post_thumbnail($disc->ID, 'full') ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                <div class="discography-active">
                    <?php if (count($discs) > 0) :
                    foreach ($discs as $disc) : ?>
                    <div class="active-item animated fadeIn" data-id="<?php echo $disc->ID; ?>">
                    <div class="row">
                        <div class="col-12 col-sm-7 offset-sm-3 col-md-7 offset-md-0 col-lg-7 col-xl-6 align-self-center">
                            <div class="image-border">
                            <?php echo get_the_post_thumbnail($disc->ID, 'full') ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-6">
                            <div class="discography-info">
                                <div class="title-wrap discography-title">
                                    <h3 class="post-title"><?php echo $disc->post_title; ?></h3>
                                    <p class="post-date"><?php echo get_the_date('d.m.Y', $disc->ID); ?></p>
                                </div>
                                <ul class="track-list">
                                <?php while ( have_rows('compositions', $disc->ID) ) : the_row(); ?>
                                <li class="composition">
                                    <p class="composition-name"><?php the_sub_field('composition_name'); ?></p>
                                    <audio src="<?php the_sub_field('audio_file'); ?>" loop></audio>
                                </li>
                                <?php endwhile; ?>
                                </ul>
                                <a class="composition-detail" href="#"><?php pll_e('Details'); ?></a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
