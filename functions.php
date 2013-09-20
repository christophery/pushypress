<?

/**
 * Custom excerpt length
 */

function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//excerpt functions
function excerpt_read_more_link($output) {
	global $post;
	return $output . '<a class="read-more" href="'. get_permalink($post->ID) . '">' . 'Read more' . '</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

/**
 * Add post thumbnails support
 */

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
}

/**
 * Register Sidebar
 */

function add_sidebar() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wpb' ),
		'id' => 'sidebar',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'add_sidebar' );

/**
 * Enqueue scripts and styles
 */

function script_enqueuer()
{
	//JS
	wp_register_script( 'site', get_template_directory_uri() . '/js/site.js', array( 'jquery' ));
	wp_enqueue_script( 'site' );

	wp_register_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js');
	wp_enqueue_script( 'modernizr' );

	wp_register_script( 'pushy', get_template_directory_uri() . '/js/pushy.js');
	wp_enqueue_script( 'pushy' );

	wp_register_script( 'respond', get_template_directory_uri() . '/js/respond.min.js');
	wp_enqueue_script( 'respond' );

	//CSS
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', 'all' );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css');
	wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'pushy', get_template_directory_uri() . '/css/pushy.css', 'all' );
	wp_enqueue_style( 'pushy' );

	wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
}

add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

/**
 * Register Pushy
 */

function register_pushy_menu() {
  register_nav_menu('pushy-menu',__( 'Pushy Menu' ));
}

add_action( 'init', 'register_pushy_menu' )

?>