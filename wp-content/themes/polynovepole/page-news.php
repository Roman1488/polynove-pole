<?php
/**
 * Template Name: News page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
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
                            <a class="news-item__link image-border" href="<?php echo get_post_permalink($post->ID); ?>">
                                <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-image')); ?>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                            <div class="title-wrap">
                                <a href="<?php echo get_post_permalink($post->ID); ?>">
                                    <h3 class="post-title"><?php echo $post->post_title; ?></h3>
                                </a>
                               <!-- <p class="post-date"><?php /*echo get_the_date('d.m.Y', $post->ID); */?></p>-->
                            </div>
                            <section class="news-item__excerpt">
                                <?php echo $post->post_excerpt; ?>
                            </section>
                            <a href="<?php echo get_post_permalink($post->ID); ?>" class="read-more">Read<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
