<?php get_header(); ?>
<div class="container">
    <?php $currentPostId = get_the_ID(); ?>
    <?php
    while ( have_posts() ) : the_post(); ?>
    <div class="head-page-post">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail') ?>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                <h3 class="desc-title"><?php echo get_the_title(); ?></h3>
                <section class="head-page-post__desc">
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
    <div class="posts-list">
        <div class="row">
        <?php foreach ($randomPosts as $randomPost) : ?>
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 col-xl-4">
                <a class="post-item__link" href="<?php echo get_post_permalink($randomPost->ID); ?>">
                    <div class="post-item">
                        <div class="post-item__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($randomPost->ID) ?>)"></div>
                        <h3 class="post-item__name"><?php echo $randomPost->post_title; ?></h3>
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
