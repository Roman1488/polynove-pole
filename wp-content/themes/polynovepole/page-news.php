<?php
/**
 * Template Name: News page template
 */
?>
<?php get_header(); ?>
<div class="container">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1
    );
    $posts = query_posts($args);
    if (count($posts) > 0) : ?>
    <div class="head-page-post content-wrapper">
            <?php foreach ($posts as $post) : ?>
                <article class="news-item">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <a href="<?php echo get_post_permalink($post->ID); ?>">
                                <?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail') ?>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                            <a href="<?php echo get_post_permalink($post->ID); ?>">
                                <h3 class="desc-title"><?php echo $post->post_title; ?></h3>
                            </a>
                            <section class="head-page-post__desc">
                                <?php echo $post->post_excerpt; ?>
                            </section>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
