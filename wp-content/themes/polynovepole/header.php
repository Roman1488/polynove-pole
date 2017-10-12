<?php
/**
 * The header for theme
 *
 * This is the template that displays all of the <head>
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> <?php wp_title("", true); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(!is_front_page()) : ?>
<div class="mobileMenuWrap">
    <i class="fa fa-times closeMobileMenu" aria-hidden="true"></i>
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'polynovepole' ); ?>">
        <?php wp_nav_menu( array(
            'theme_location' => 'top',
            'menu_id'        => 'top-menu'
        ) ); ?>
    </nav>
</div>
<div class='thumb audio'>
    <audio id="player_audio" src="<?php echo get_template_directory_uri();?>/audio/ACDC-T.N.T.mp3" loop></audio>
</div>
<div class="page-container">
    <div class="container">
        <header class="header">
            <div class="row align-items-center">
                <div class="logo-wrap col-3	col-sm-3 col-md-3 col-lg-2	col-xl-2">
                    <?php if (get_custom_logo())  {
                        echo get_custom_logo();
                    } ?>
                </div>
                <div class="menu-wrap col-5">
                    <?php if ( has_nav_menu( 'top' ) ) : ?>
                        <div class="navigation">
                                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'polynovepole' ); ?>">
                                    <?php wp_nav_menu( array(
                                        'theme_location' => 'top',
                                        'menu_id'        => 'top-menu'
                                    ) ); ?>
                                </nav>
                        </div><!-- .navigation -->
                    <?php endif; ?>
                </div>
                <form action="#" type="get" class="search-form col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                    <div class="input-wrapper">
                        <input type="search" class="search-form__input" placeholder="Пошук">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                    </div>
                </form>
                <div class="player col-3 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                    <a href="#" id="audio-control">
                        <i class="fa fa-play audio-control-play hidden" aria-hidden="true"></i>
                        <i class="fa fa-pause audio-control-pause" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="language col-3 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                    <a class="language-item language-current" href="#">UKR</a>
                    <div class="language-dropdown">
                        <a class="language-item" href="#">eng</a>
                        <a class="language-item" href="#">рус</a>
                    </div>
                </div>
                <span class="open-menu-btn">
                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                </span>
            </div>
        </header>
    </div>
<?php endif; ?>