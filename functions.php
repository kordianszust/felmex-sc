<?php
/**
 * SklepCzekolada.pl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SklepCzekolada.pl
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function felmex_sc_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on SklepCzekolada.pl, use a find and replace
        * to change 'felmex-sc' to the name of your theme in all the template files.
        */
    load_theme_textdomain('felmex-sc', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'felmex-sc'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'felmex_sc_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'felmex_sc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function felmex_sc_content_width()
{
    $GLOBALS['content_width'] = apply_filters('felmex_sc_content_width', 640);
}

add_action('after_setup_theme', 'felmex_sc_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function felmex_sc_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'felmex-sc'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'felmex-sc'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'felmex_sc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function felmex_sc_scripts()
{
    wp_enqueue_style('felmex-sc-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('felmex-sc-style', 'rtl', 'replace');

    wp_enqueue_script('felmex-sc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'felmex_sc_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

require get_template_directory() . '/inc/blocks.php';


// remove rating stars
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// Search box and ajax search
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{ ?>
    <script type="text/javascript">
        function fetch() {
            if (jQuery('#keyword').val().length >= 3) {
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'data_fetch', keyword: jQuery('#keyword').val()
                    },
                    success: function (data) {
                        jQuery('#search_results .data').html(data);
                    }
                });
            } else {   jQuery('#search_results .data').html('');}
        }
    </script>
<?php }

add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{
    $args = array(
        'post_type' => array('product'),
        's' => esc_attr($_POST['keyword']),
        'posts_per_page'         => '1',
    );

    $products_ajax_query = new WP_Query($args);
    if ($products_ajax_query->have_posts()) {
        while ($products_ajax_query->have_posts()) {
            $products_ajax_query->the_post();
            echo '<a href="' . get_permalink($id) . '">';
            echo get_the_title();
            echo '</a><br>';
        }
    } else {
        echo 'Brak produktów...';
    }

    wp_reset_postdata();
    die();
}