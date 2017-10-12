<?php
/**
 * Template Name: Group page template
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <?php if( get_field('head_background') != '' ):?>
            <img class="group-image img-fluid" src="<?php echo get_field('head_background')?>" alt="group image">
            <?php endif; ?>
        </div>
        <div class="col-12">
            <div class="content-wrapper">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
