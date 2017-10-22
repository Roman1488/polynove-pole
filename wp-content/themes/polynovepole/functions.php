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

if ( ! function_exists( 'gllr_template_content_custom' ) ) {
    function gllr_template_content_custom() {
        global $post, $wp_query, $request, $gllr_options;

        if ( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        } elseif ( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        } else {
            $paged = 1;
        }

        $permalink    = get_permalink();
        $per_page = get_option( 'posts_per_page' );

        if ( substr( $permalink, strlen( $permalink ) -1 ) != "/" ) {
            if ( strpos( $permalink, "?" ) !== false ) {
                $permalink = substr( $permalink, 0, strpos( $permalink, "?" ) -1 ) . "/";
            } else {
                $permalink .= "/";
            }
        }
        $args = array(
            'post_type'         => $gllr_options['post_type_name'],
            'post_status'       => 'publish',
            'orderby'           => $gllr_options['album_order_by'],
            'order'             => $gllr_options['album_order'],
            'posts_per_page'    => $per_page,
            'paged'             => $paged
        );

        if ( get_query_var( 'gallery_categories' ) ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'gallery_categories',
                    'field'    => 'slug',
                    'terms'    => get_query_var( 'gallery_categories' ),
                )
            );
        }

        $second_query = new WP_Query( $args );
        $request = $second_query->request; ?>
        <div class="gallery_wrap row">

            <?php if ( $second_query->have_posts() ) { ?>
            <div class="col-2 years_wrap">
                <div class="gl__post-title-wrap">
                    <?php
                    /* get width and height for image_size_album */
                    if ( 'album-thumb' != $gllr_options['image_size_album'] ) {
                        $width  = absint( get_option( $gllr_options['image_size_album'] . '_size_w' ) );
                        $height = absint( get_option( $gllr_options['image_size_album'] . '_size_h' ) );
                    } else {
                        $width  = $gllr_options['custom_size_px']['album-thumb'][0];
                        $height = $gllr_options['custom_size_px']['album-thumb'][1];
                    }
                    $post_arr = array();
                    while ( $second_query->have_posts() ) {
                        $second_query->the_post();
                        $post_arr[] = $post; ?>
                            <div class="gl_post-title" data-id="glr_<?php echo slugify(get_the_title()); ?>">
                                <?php the_title(); ?>
                            </div>
                    <?php } ?>
                </div>
            </div>
                <div class="gl__post-image-wrap col-10">
                    <?php if (!empty($post_arr)) {
                        foreach ($post_arr as $post_item) {
                            $images_id = get_post_meta( $post_item->ID, '_gallery_images', true );
                            $posts = get_posts( array(
                                "showposts"         =>  -1,
                                "what_to_show"      =>  "posts",
                                "post_status"       =>  "inherit",
                                "post_type"         =>  "attachment",
                                "post_mime_type"    =>  "image/jpeg,image/gif,image/jpg,image/png",
                                'post__in'          => explode( ',', $images_id ),
                                'meta_key'          => '_gallery_order_' . $post_item->ID
                            ));
                            if ( count( $posts ) > 0 ) {
                                $count_image_block = 0; ?>
                                <div class="gallery" id="glr_<?php echo slugify($post_item->post_title); ?>">
                                    <div class="gllr_image_row row">
                                        <?php foreach ( $posts as $attachment ) {
                                            $image_attributes = wp_get_attachment_image_src( $attachment->ID, $gllr_options['image_size_photo'] );
                                            $image_attributes_large = wp_get_attachment_image_src( $attachment->ID, 'large' );
                                            $image_attributes_full = wp_get_attachment_image_src( $attachment->ID, 'full' );

                                            $url_for_link = get_post_meta( $attachment->ID, 'gllr_link_url', true );
                                            $image_text = get_post_meta( $attachment->ID, 'gllr_image_text', true );
                                            $image_alt_tag = get_post_meta( $attachment->ID, 'gllr_image_alt_tag', true );

                                             ?>
                                                <div class="gllr_image_block">
                                                    <?php if ( ! empty( $url_for_link ) ) { ?>
                                                        <a href="<?php echo $url_for_link; ?>" title="<?php echo $image_text; ?>" target="_blank">
                                                            <img alt="<?php echo $image_alt_tag; ?>" title="<?php echo $image_text; ?>" src="<?php echo $image_attributes[0]; ?>" />
                                                        </a>
                                                    <?php } else { ?>
                                                        <a data-fancybox="gallery_fancybox<?php if ( 0 == $gllr_options['single_lightbox_for_multiple_galleries'] ) echo '_' . $post->ID; ?>" href="<?php echo $image_attributes_large[0]; ?>" title="<?php echo $image_text; ?>" >
                                                            <img alt="<?php echo $image_alt_tag; ?>" title="<?php echo $image_text; ?>" src="<?php echo $image_attributes[0]; ?>" rel="<?php echo $image_attributes_full[0]; ?>" />
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ( 1 == $gllr_options["image_text"] ) { ?>
                                                        <div <?php if ( $width ) echo 'style="width:' . ( $width + $border_images ) . 'px;"'; ?> class="gllr_single_image_text"><?php echo $image_text; ?>&nbsp;</div>
                                                    <?php } ?>
                                                </div><!-- .gllr_image_block -->
                                            
                                            <?php $count_image_block++;
                                        } ?>
                                        
                                    </div><!-- .gllr_image_row -->
                                </div><!-- .gallery.clearfix -->
                            <?php }
                            }
                    } ?>
                </div>
            <?php } ?>
        </ul>

        <?php $count_all_albums = $second_query->found_posts;
        wp_reset_query();
        $request = $wp_query->request;
        $pages = intval( $count_all_albums / $per_page );
        if ( $count_all_albums % $per_page > 0 )
            $pages += 1;
        $range = 100;
        if ( ! $pages ) {
            $pages = 1;
        }
        return array(
            'second_query'  => $second_query,
            'pages'         => $pages,
            'paged'         => $paged,
            'per_page'      => $per_page,
            'range'         => $range
        );
    }
}





if (! function_exists('slugify')) {
    function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
}
?>