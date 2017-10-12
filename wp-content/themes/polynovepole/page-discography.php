<?php
/**
 * Template Name: Discography page template
 */
?>
<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-2">
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
                        <?php echo get_the_post_thumbnail($disc->ID, 'post-thumbnail') ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-10">
                <div class="discography-active">
                    <div class="row">
                        <div class="col-5">
                            <?php echo get_the_post_thumbnail($discs[0]->ID, 'full') ?>
                        </div>
                        <div class="col-7">
                            <div class="discography-info">
                                <h3 class="discography-active__title"><?php echo $discs[0]->post_title; ?></h3>
                                <span class="discography-active__description"><?php echo $discs[0]->post_content; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
