<?php
/**
 * Template Name: Contact page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="title-wrap title-wrap--center discography-title">
                    <h3 class="post-title">Контакти</h3>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
