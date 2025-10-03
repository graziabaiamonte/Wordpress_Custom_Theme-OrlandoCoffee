<?php
/**
 * Orlando functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Orlando
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orlando_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Orlando, use a find and replace
		* to change 'orlando' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'orlando', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'orlando' ),
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
			'orlando_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'orlando_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function orlando_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'orlando_content_width', 640 );
}
add_action( 'after_setup_theme', 'orlando_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function orlando_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'orlando' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'orlando' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'orlando_widgets_init' );

/** ---------------------------- carica CSS e JS ---------------------------------- */
	/**
	 * Enqueue scripts and styles.
	 */
	function orlando_scripts() {
		wp_enqueue_style( 'orlando-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_style_add_data( 'orlando-style', 'rtl', 'replace' );

		wp_enqueue_script( 'orlando-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'orlando_scripts' );



	function enqueue_home_styles() {
		wp_enqueue_style( 'home-style', get_template_directory_uri() . '/css/style-home.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_home_styles' );


	function enqueue_account_styles() {
		wp_enqueue_style( 'account-style', get_template_directory_uri() . '/css/style-account.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_account_styles' );

	function enqueue_cart_styles() {
		wp_enqueue_style( 'cart-style', get_template_directory_uri() . '/css/style-cart.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_cart_styles' );

	function enqueue_singleProduct_styles() {
		wp_enqueue_style( 'singleProduct-style', get_template_directory_uri() . '/css/style-singleProduct.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_singleProduct_styles' );

	function enqueue_shop_styles() {
		wp_enqueue_style( 'shop-style', get_template_directory_uri() . '/css/style-shop.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_shop_styles' );

	function enqueue_franc_styles() {
		wp_enqueue_style( 'franc-style', get_template_directory_uri() . '/css/style-franc.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_franc_styles' );

	function enqueue_contatti_styles() {
		wp_enqueue_style( 'contatti-style', get_template_directory_uri() . '/css/style-contatti.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_contatti_styles' );

	function enqueue_policy_styles() {
		wp_enqueue_style( 'policy-style', get_template_directory_uri() . '/css/style-policy.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_policy_styles' );



/** -------------------------------------------------------------------------------- */

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





// Abilitare caricamento di SVG e GLB
function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();

    // Tipo MIME per SVG
    $new_filetypes['svg'] = 'image/svg+xml';

    // Tipo MIME per GLB
    $new_filetypes['glb'] = 'model/gltf-binary';

    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// Rimuovere restrizioni di sicurezza (facoltativo, solo per testing)
function allow_unfiltered_uploads($caps, $cap, $user_id, $args) {
    if ($cap === 'upload_files') {
        $caps = array('exist');
    }
    return $caps;
}
add_filter('map_meta_cap', 'allow_unfiltered_uploads', 10, 4);


// -----------------------------



// per aggiungere al tema il supporto di woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}                               




//  funzione per permettere di aggiornare la pagina dello shop quando cambio filtro
function load_filtered_products() {
    $filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'bestseller';
 
 
    $categories = [
        'bestseller' => '',
        'gin' => 'gin',
        'coffee' => 'caffe',
        'grappa' => 'grappe',
        'amaro' => 'amari',
        'liquori' => 'liquori',
        // 'viniDistillati' => 'vini-distillati',
        'linea-bar' => 'linea-bar',
    ];
 
 
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => 120,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
 
 
    // Aggiungi il filtro per la categoria specifica o per bestseller
    if ($filter === 'bestseller') {
        // For bestseller, query products from 'gin' and 'liquori' categories
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => ['gin', 'liquori'], // Include both slugs
                'operator' => 'IN',
            ]
        ];
        // Optionally, change orderby for bestseller if needed, e.g., sales count
        // $args['orderby'] = 'meta_value_num';
        // $args['meta_key'] = 'total_sales';
    } elseif (isset($categories[$filter]) && $categories[$filter]) {
        // For other filters with a specified category slug
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $categories[$filter],
                'operator' => 'IN',
            ]
        ];
    }
 
 
    $loop = new WP_Query($args);
 
 
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            global $product;
            ?>
            <div class="product-card">
                <a href="<?php the_permalink(); ?>" class="product-link">
                    <div class="productImage">
                        <?php
                        $image_id = $product->get_image_id();
                        if ($image_id) {
                            $image_url = wp_get_attachment_image_url($image_id, 'full');
                            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>
                            <img loading="lazy" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="mainProductImage">
                        <?php } ?>
 
 
                       
                         <!-- Sezione immagini ACF -->
                         <div class="acf-images">
                                <?php
                                $dettaglio_1_davanti = get_field('dettaglio_1_davanti', $product->get_id());
                                $dettaglio_2_davanti = get_field('dettaglio_2_davanti', $product->get_id());
                                $dettaglio_2_dietro = get_field('dettaglio_2_dietro', $product->get_id());
 
 
                                if ($dettaglio_1_davanti) : ?>
                                    <img loading="lazy" src="<?php echo esc_url($dettaglio_1_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_1_davanti['alt']); ?>" class="Dettaglio1 appariShop">
                                <?php endif;
 
 
                                if ($dettaglio_2_davanti) : ?>
                                    <img loading="lazy" src="<?php echo esc_url($dettaglio_2_davanti['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_davanti['alt']); ?>" class="Dettaglio2 appariShop">
                                <?php endif;
 
 
                                if ($dettaglio_2_dietro) : ?>
                                    <img loading="lazy" src="<?php echo esc_url($dettaglio_2_dietro['url']); ?>" alt="<?php echo esc_attr($dettaglio_2_dietro['alt']); ?>" class="Dettaglio2Dietro appariShop">
                                <?php endif; ?>
                            </div>
                        <!-- Fine sezione immagini ACF -->
 
 
 
 
                    </div>
                    <div class="productInfo">
                        <h2 class="product-title"><?php the_title(); ?></h2>
                    </div>
                </a>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>Nessun prodotto trovato.</p>';
    }
 
 
    die();
 }
 

add_action('wp_ajax_filter_products', 'load_filtered_products');
add_action('wp_ajax_nopriv_filter_products', 'load_filtered_products');










// Carica in modo assincrono gli unused CSS
function preload_plugin_styles() {
    ?>

    <link rel="preload" href="https://orlandocaffe.com/wp-includes/css/dist/block-library/style.min.css?ver=6.7.2" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://orlandocaffe.com/wp-includes/css/dist/block-library/style.min.css?ver=6.7.2"></noscript>
   
    
    <link rel="preload" href="https://orlandocaffe.com/wp-includes/css/dist/components/style.min.css?ver=6.7.2" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://orlandocaffe.com/wp-includes/css/dist/components/style.min.css?ver=6.7.2"></noscript>

    <link rel="preload" href="https://orlandocaffe.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=9.7.1" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://orlandocaffe.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=9.7.1"></noscript>

   <?php
}
add_action('wp_head', 'preload_plugin_styles');
