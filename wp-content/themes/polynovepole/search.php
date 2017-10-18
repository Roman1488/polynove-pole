<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
<div class="container">
    <?php if ( have_posts() ) { ?>
        <div class="head-page-post content-wrapper">
            <h2 class="page-title"><?php pll_e('Search result'); ?></h2>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="news-item">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <a class="news-item__link image-border" href="<?php echo get_post_permalink(); ?>">
                                <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-image')); ?>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                            <div class="title-wrap">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
                                </a>
                                <p class="post-date"><?php echo get_the_date('d.m.Y', $post->ID); ?></p>
                            </div>
                            <section class="news-item__excerpt">
                                <?php the_excerpt(); ?>
                            </section>
                            <a href="<?php echo get_post_permalink(); ?>" class="read-more">Read more<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php }
    else { ?>
        <h1 class="page-title search_empty">
            <?php pll_e('Nothing was found'); ?>
        </h1>
   <?php } ?>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
