<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
<div class="container">
    <?php $currentPostId = get_the_ID(); ?>
    <?php
    while ( have_posts() ) : the_post(); ?>
    <div class="head-page-post content-wrapper">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="image-border">
                    <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-image')); ?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                <div class="title-wrap">
                    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
                    <p class="post-date"><?php echo get_the_date('d.m.Y', $post->ID); ?></p>
                </div>
                <section class="post-content">
                    <?php the_content(); ?>
                </section>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'rand',
        'post__not_in' => array($currentPostId)
    );
    $randomPosts = query_posts($args);
    if (count($randomPosts) > 0) : ?>
    <div class="related-posts-list">
        <div class="row">
        <?php foreach ($randomPosts as $randomPost) : ?>
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 col-xl-4">
                <a class="related-post-item__link" href="<?php echo get_post_permalink($randomPost->ID); ?>">
                    <div class="related-post-item">
                        <div class="img-container">
                            <?php echo get_the_post_thumbnail($randomPost->ID,'post-thumbnail'); ?>
                            <div class="read-more-wrapper">
                                <div class="text">Read more</div>
                            </div>
                        </div>
                        <h3 class="related-post-item__title"><?php echo $randomPost->post_title; ?></h3>
                        <p class="post-date"><?php echo get_the_date('d.m.Y', $randomPost->ID); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
