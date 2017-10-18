<?php
function theme_scripts()
{
    // Register and including styles
    wp_enqueue_style('main_style', get_template_directory_uri().'/css/style.min.css', array(), false, '');

    // Register and including scripts
    //wp_deregister_script( 'jquery' );
    //wp_register_script( 'jquery', get_theme_file_uri( 'libs/jquery/dist/jquery.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('main_scripts', get_template_directory_uri().'/js/scripts.min.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );



function my_theme_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'my_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'my_theme' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'my_theme-featured-image', 2000, 1200, true );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'my_theme' ),
		'social' => __( 'Social Links Menu', 'my_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );


}
add_action( 'after_setup_theme', 'my_theme_setup' );


function starter_customize_register( $wp_customize ) 
{
    $wp_customize->add_section( 'header_section' , array(
        'title'    => __( 'Header', 'starter' ),
        'priority' => 30
    ) );   

    $wp_customize->add_setting( 'header_color' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'    => __( 'Header Color', 'starter' ),
        'section'  => 'header_section',
        'settings' => 'header_color',
    ) ) );
}
add_action( 'customize_register', 'starter_customize_register');

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
//add_filter('excerpt_more', 'new_excerpt_more');

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','SearchFilter');

add_action('init', 'register_discography_post_types');
function register_discography_post_types(){
    register_post_type('discography', array(
        'label'  => 'discography',
        'labels' => array(
            'name'               => 'Дискографія', // основное название для типа записи
            'singular_name'      => 'Дискографія', // название для одной записи этого типа
            'add_new'            => 'Додати новий диск', // для добавления новой записи
            'add_new_item'       => 'Додати новий диск', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редагувати диск', // для редактирования типа записи
            'new_item'           => 'Новий диск', // текст новой записи
            'view_item'          => 'Переглянути диск', // для просмотра записи этого типа.
            'search_items'       => 'Пошук диску', // для поиска по этим типам записи
            'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Дискографія', // название меню
        ),
        'menu_icon'           => 'dashicons-format-audio',
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'show_in_rest'        => false, // добавить в REST API. C WP 4.7
        'hierarchical'        => false,
        'supports'            => array('title','editor','thumbnail','revisions'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('post_tag', 'category'),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Головні налаштування теми',
        'menu_title'	=> 'Налаштування теми',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

// Translations
pll_register_string( 'Пошук', 'search' );
pll_register_string( 'Контакти', 'Contacts' );
pll_register_string( 'Райдери', 'Riders' );
pll_register_string( 'Технічний райдер', 'Technical rider' );
pll_register_string( 'Організаційний райдер', 'Organizational rider' );
pll_register_string( 'Друзі та партнери', 'Friends and partners' );
pll_register_string( 'Читати більше', 'Read more' );
pll_register_string( 'Детальніше', 'Details' );
pll_register_string( 'Історія гурту', 'History of the band' );
pll_register_string( 'Результати пошуку', 'Search result' );
pll_register_string( 'Нічого не знайдено', 'Nothing was found' );
?>