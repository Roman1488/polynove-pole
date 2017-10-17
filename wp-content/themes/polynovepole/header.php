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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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

<div class="page-container">
    <div class="container">
        <header class="header">
            <div class="row align-items-center">
                <div class="logo-wrap col-3	col-sm-3 col-md-3 col-lg-2	col-xl-2">
                    <?php if (get_custom_logo())  {
                        echo get_custom_logo();
                    } ?>
                </div>
                <div class="col-9 col-sm-9 col-md-9 col-lg-10 col-xl-10">
                    <div class="row">
                            <div class="menu-wrap col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
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
                            <form action="#" type="get" class="search-form col-auto col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <div class="input-wrapper">
                                    <input type="search" class="search-form__input" placeholder="Пошук">
                                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                                </div>
                            </form>
                            <div class="player col-auto col-4 col-sm-4 col-md-2 col-lg-1 col-xl-1">
                                <a href="#" id="audio-control">
                                    <i class="fa fa-play audio-control-play hidden" aria-hidden="true"></i>
                                    <i class="fa fa-pause audio-control-pause" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="language col-auto col-4 col-sm-4 col-md-2 col-lg-1 col-xl-1">
                                <a class="language-item language-current" href="#">UKR</a>
                                <div class="language-dropdown">
                                    <a class="language-item" href="#">eng</a>
                                    <a class="language-item" href="#">рус</a>
                                </div>
                            </div>
                            <div class="menu-btn-wrap col-4 col-sm-4 col-md-2">
                                <span class="open-menu-btn">
                                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                                </span>
                            </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
<?php endif; ?>