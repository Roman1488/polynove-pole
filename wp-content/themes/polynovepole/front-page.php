<?php get_header(); ?>
<?php get_template_part('audio-template');  ?>
<div class="front-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
            	<a href="/news/">
	                <img class="img-fluid" src="<?php echo get_template_directory_uri()?>/img/logo_black.jpg" alt="Main logo">
	                <h1 class="front-page__title">Enter</h1>
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
