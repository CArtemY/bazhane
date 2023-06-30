<?php
/**
 * Bazhane New functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bazhane_New
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
global $product;
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bazhane_new_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bazhane New, use a find and replace
		* to change 'bazhane-new' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bazhane-new', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bazhane-new' ),
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
			'bazhane_new_custom_background_args',
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
add_action( 'after_setup_theme', 'bazhane_new_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bazhane_new_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bazhane_new_content_width', 640 );
}
add_action( 'after_setup_theme', 'bazhane_new_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bazhane_new_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bazhane-new' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bazhane-new' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bazhane_new_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bazhane_new_scripts() {
	wp_enqueue_style( 'bazhane-new-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/reset/normalize.css' );
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/reset/reset.css' );

	
	wp_style_add_data( 'bazhane-new-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bazhane-new-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function bazhane_new_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'bazhane_new_add_woocommerce_support' );

function woocommerce_show_product_images() {
	wc_get_template( 'single-product/product-image.php' );
}

add_image_size( 'home-slide-img', 682, 905, true ); 
add_image_size( 'home-slide-img-sm', 150, 237, true ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );


add_action( 'template_redirect', 'truemisha_recently_viewed_product_cookie', 20 );
 
function truemisha_recently_viewed_product_cookie() {
 
	// если находимся не на странице товара, ничего не делаем
	if ( ! is_product() ) {
		return;
	}
 
 
	if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
	}
 
	// добавляем в массив текущий товар
	if ( ! in_array( get_the_ID(), $viewed_products ) ) {
		$viewed_products[] = get_the_ID();
	}
 
	// нет смысла хранить там бесконечное количество товаров
	if ( sizeof( $viewed_products ) > 15 ) {
		array_shift( $viewed_products ); // выкидываем первый элемент
	}
 
 	// устанавливаем в куки
	wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );
 
}
add_shortcode( 'recently_viewed_products', 'truemisha_recently_viewed_products' );
 
function truemisha_recently_viewed_products() {
 
	if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
	}
 
	if ( empty( $viewed_products ) ) {
		return;
	}
 
	// надо ведь сначала отображать последние просмотренные
	$viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );
 
	$title = '<div class="line1">
	<h2>Нещодавно переглядали</h2>
</div>';
 
	$product_ids = join( ",", $viewed_products );
 
	return $title . do_shortcode( "[products ids='$product_ids']" );
 
}


// Недавние просмотренные товары
add_action('wp', 'init');

function init()
{

    if (is_product()) {
        global $post;

        if (isset($_COOKIE['viewedProd']) && $_COOKIE['viewedProd'] != '') {

            $viewedArray = unserialize($_COOKIE['viewedProd']);

            if (!is_array($viewedArray)) {

                $viewedArray = array($post->ID); // If array is fucked up...just build a new one.
            } else {


                $viewedArray = array_diff($viewedArray, array($post->ID));

                array_unshift($viewedArray, $post->ID);// update cookie with current post

                if (count($viewedArray) > 10) {
                    array_pop($viewedArray);
                }
            }
        } else {
            $viewedArray = array($post->ID);
        }
        setcookie('viewedProd', serialize($viewedArray), time() + (DAY_IN_SECONDS * 31), '/');

    }

}




add_action('woocommerce_after_single_product_summary', 'last_viewed',25);

function last_viewed()
{
    global $woocommerce_loop;
	global $post;
	$post_id = $post->ID;
    $product = wc_get_product( $post_id );
    if (isset($_COOKIE['viewedProd']) && $_COOKIE['viewedProd'] != '') {

        $viewedArray = unserialize($_COOKIE['viewedProd']);


        $woocommerce_loop['columns'] = 4;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'post__in' => $viewedArray
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {

            ?>
            <div class="block-2 product-list">
	<div class="container">
	<div class="line1">
                <h2>Нещодавно переглядали</h2>
            </div>
			<div class="line2 swiper mySwiperL2">

<div class="swiper-wrapper">
       

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
<?php  global $product;?>
				<a href="<?php the_permalink();?>" class="box swiper-slide" >
<?php 
$sizeName = "204-365"; //registered name in previous example!


?>

<div class="l1">
                            <div class="name">
                                <p class="type"> <?php   
        $terms = wp_get_post_terms( get_the_id(), 'product_cat' );
        $term  = reset($terms);
        echo $term->name;
    ?></p>
                                <h4><?php the_title();?></h4>
                            </div>
                            <div class="like-btn"
							onclick="location.href='<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', $product->id, $base_url ), 'add_to_wishlist' ) ); ?>'"data-product-id="<?php echo esc_attr( $product->id ); ?>"
		data-product-type="variable"
		data-original-product-id="<?php echo esc_attr( $product->id ); ?>"
		data-title="">
							</div>
                            <div class="colors">
							<?php  
							$koostis = wc_get_product_terms( $product->id, 'pa_color', array( 'fields' => 'slugs' ) ) ;
							$product = wc_get_product( $product->id ); // Get the WC_Product Object

							// Raw output
							foreach ($koostis as $val){ ?>
								  <span class="<?php echo $val;?>"></span>
						<?php 	}
							?> 
                             
                            </div>
                        </div>
                        <div class="img">
                          <img src="<?php the_post_thumbnail_url($sizeName);?>" alt="" onclick="location.href='<?php the_permalink();?>'">
                        </div>
                        <div class="l3">
                            <p class="price"><?php echo $product->price; ?><span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <p>Докладніше</p>
                                <span></span>
                            </div>
                        </div>

	
		</a>

                <?php endwhile; // end of the loop. ?>

          
</div>
<div class="swiper-pagination-box">
                    <span class="btn custom-button-prev-l2">Назад</span>
                    <div class="swiper-pagination-l2"></div>
                    <span class="btn custom-button-next-l2">Далі</span>
                </div>
			</div>
            </div>
			</div>

            <!-- Initialize Swiper -->
            <script>
                var swiperL2 = new Swiper(".mySwiperL2", {
                    //                slidesPerView: 4,
                    //                spaceBetween: 33,
                    pagination: {
                        el: ".swiper-pagination-l2",
                        clickable: true,
                        renderBullet: function(index, className) {
                            return '<span class="' + className + '">' + (index + 1) + "</span>";
                        },
                    },
                    navigation: {
                        nextEl: ".custom-button-next-l2",
                        prevEl: ".custom-button-prev-l2",
                    },

                    // Default parameters
                    loop: true,
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    // Responsive breakpoints
                    breakpoints: {
                        // when window width is >= 320px
                        //                    320: {
                        //                        slidesPerView: 2,
                        //                        spaceBetween: 20
                        //                    },
                        // when window width is >= 480px
                        660: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                        // when window width is >= 640px
                        1439: {
                            slidesPerView: 4,
                            spaceBetween: 33
                        }
                    }
                });

            </script>
            <?php

        } else {
            echo __('No products found');
        }
        wp_reset_postdata();

    }
	
}

add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart'); 
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');          
function ql_woocommerce_ajax_add_to_cart() {  
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id); 
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
            if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 
                wc_add_to_cart_message(array($product_id => $quantity), true); 
            } 
            WC_AJAX :: get_refreshed_fragments(); 
            } else { 
                $data = array( 
                    'error' => true,
                    'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                echo wp_send_json($data);
            }
            wp_die();
        }
		add_filter( 'woocommerce_product_single_add_to_cart_text', 'truemisha_single_product_btn_text' );
 
		function truemisha_single_product_btn_text( $text ) {
		 
			if( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( get_the_ID() ) ) ) {
				$text = 'В кошику';
			}
		 
			return $text;
		 
		}

		

function rm_woocommerce_remove_featured_image( $html, $attachment_id ) {
	global $post, $product;
	// Get the IDs.
	$attachment_ids = $product->get_gallery_image_ids();


	// If there are none, go ahead and return early - with the featured image included in the gallery.
	if ( ! $attachment_ids ) {
		return $html;
	}
	// Look for the featured image.
	$featured_image = get_post_thumbnail_id( $post->ID );
	
	// If there is one, exclude it from the gallery.
	if ( is_product() && $attachment_id === $featured_image ) {
		$html = '';
	}
	return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'rm_woocommerce_remove_featured_image', 10, 2 );

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
 
	// Adds the new tab
 
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Доставка', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);
 
	return $tabs;
 
}
function woo_new_product_tab_content() {
 
	// The new tab content
 

	echo '<p>'.get_theme_mod('base_values_delivery') .'</p>';
 
}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
 
	$tabs['additional_information']['title'] = __( 'Склад' );	// Rename the additional information tab
 
	return $tabs;
 
}

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


// if ( class_exists( 'WooCommerce' ) ) {
// 	require_once(get_template_directory() . '/inc/woocomerce.php');
// 	}






add_action('customize_register', 'dco_customize_register');
 
function dco_customize_register($wp_customize) {

    $wp_customize->add_section('base_values', array(
        'title' => 'Общие значения',
        'priority' => 1, 
    ));

    $setting_name = 'base_values_delivery';
    $wp_customize->add_setting($setting_name, array(
        'default' => 'Доставка здійснюється за рахунок покупця згідно з тарифами перевізника.', 
        // 'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_post_kses' // use wp_filter_post_kses to allow script tags
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'base_values',
        'type' => 'textarea',
        'label' => 'Описание доставки',
    ));
    
}




// Добавляет поля для указания даты рождения и отделения "Новой почты" на странице редактирования пользователя
function custom_user_profile_fields($user) {
    $birthday = get_user_meta($user->ID, 'birthday', true);
    $department = get_user_meta($user->ID, 'nova_poshta_department', true);
    ?>
    <h3><?php _e('Дополнительная информация', 'text-domain'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="birthday"><?php _e('Дата рождения', 'text-domain'); ?></label></th>
            <td>
                <input type="date" name="birthday" id="birthday" value="<?php echo esc_attr($birthday); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Введите дату рождения пользователя.', 'text-domain'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="nova_poshta_department"><?php _e('Отделение Новой почты', 'text-domain'); ?></label></th>
            <td>
                <input type="text" name="nova_poshta_department" id="nova_poshta_department" value="<?php echo esc_attr($department); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Введите отделение Новой почты.', 'text-domain'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');

// Сохраняет значения даты рождения и отделения "Новой почты" при сохранении профиля пользователя
function custom_save_user_profile_fields($user_id) {
    if (current_user_can('edit_user', $user_id)) {
        $birthday = isset($_POST['birthday']) ? sanitize_text_field($_POST['birthday']) : '';
        $department = isset($_POST['nova_poshta_department']) ? sanitize_text_field($_POST['nova_poshta_department']) : '';
        
        update_user_meta($user_id, 'birthday', $birthday);
        update_user_meta($user_id, 'nova_poshta_department', $department);
    }
}
add_action('personal_options_update', 'custom_save_user_profile_fields');
add_action('edit_user_profile_update', 'custom_save_user_profile_fields');


/////

function favorite_products_shortcode() {
    ob_start();

    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => '_ywcty_wishlist_status',
                'value'   => 'yes',
                'compare' => '=',
            ),
        ),
        'posts_per_page' => -1,
    );

    $products = new WP_Query( $args );

    if ( $products->have_posts() ) {
        while ( $products->have_posts() ) {
            $products->the_post();

            // Вывод информации о товаре
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<p>' . wc_price( get_post_meta( get_the_ID(), '_price', true ) ) . '</p>';
        }
        wp_reset_postdata();
    } else {
        echo 'Нет избранных товаров.';
    }

    return ob_get_clean();
}
add_shortcode( 'favorite_products', 'favorite_products_shortcode' );


function favorite_products_shortcode2() {
    ob_start();

    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => '_is_favorite',
                'value'   => 'yes',
                'compare' => '=',
            ),
        ),
        'posts_per_page' => -1,
    );

    $products = new WP_Query( $args );

    if ( $products->have_posts() ) {
        while ( $products->have_posts() ) {
            $products->the_post();

            // Вывод информации о товаре
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<p>' . wc_price( get_post_meta( get_the_ID(), '_price', true ) ) . '</p>';
        }
        wp_reset_postdata();
    } else {
        echo 'Нет избранных товаров.';
    }

    return ob_get_clean();
}
add_shortcode( 'favorite_products2', 'favorite_products_shortcode2' );


  


 function display_wishlists_shortcode( $atts ) {
    // Получить список всех списков желаний
    $wishlists = YITH_WCWL_Wishlist_Factory::get_wishlists();

    // Проверить, получены ли списки желаний
    if ( ! empty( $wishlists ) ) {
        // Массив для хранения данных списков желаний
        $wishlists_data = array();

        // Перебрать каждый список желаний
        foreach ( $wishlists as $wishlist ) {
            // Получить данные списка желаний
            $wishlist_data = array(
                'id'                       => $wishlist->get_id(),
                'wishlist_name'            => $wishlist->get_formatted_name(),
                'default'                  => $wishlist->is_default(),
                'add_to_this_wishlist_url' => '',
            );

            // Добавить URL для добавления продукта в список желаний
            if ( isset( $atts['product_id'] ) ) {
                $product_id = intval( $atts['product_id'] );
                $add_to_wishlist_url = add_query_arg(
                    array(
                        'add_to_wishlist' => $product_id,
                        'wishlist_id'     => $wishlist->get_id(),
                    ),
                    $wishlist->get_url()
                );
                $wishlist_data['add_to_this_wishlist_url'] = wp_nonce_url( $add_to_wishlist_url, 'add_to_wishlist' );
            }

            // Добавить данные списка желаний в массив
            $wishlists_data[] = $wishlist_data;
        }

        // Возврат отформатированного вывода шорткода
        ob_start();
        ?>
        <div class="wishlists">
            <?php foreach ( $wishlists_data as $wishlist_data ) : ?>
                <div class="wishlist">
                    <h3><?php echo $wishlist_data['wishlist_name']; ?></h3>
                    <p>ID: <?php echo $wishlist_data['id']; ?></p>
                    <p>Default: <?php echo $wishlist_data['default'] ? 'Yes' : 'No'; ?></p>
                    <?php if ( ! empty( $wishlist_data['add_to_this_wishlist_url'] ) ) : ?>
                        <a href="<?php echo esc_url( $wishlist_data['add_to_this_wishlist_url'] ); ?>">Add to Wishlist</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    } else {
        return 'Списки желаний не найдены.';
    }
}
add_shortcode( 'display_wishlists', 'display_wishlists_shortcode' );

 /*
function display_wishlist_items_shortcode( $atts ) {
    // Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Проверить, есть ли товары в списке желаний
    if ( empty( $wishlist_items ) ) {
        return 'В данном списке желаний нет товаров.';
    }

    // Вывод товаров списка желаний
    ob_start();
    ?>
    <div class="wishlist-items">
        <h3>Товары в текущем списке желаний "<?php echo $wishlist->get_formatted_name(); ?>"</h3>
        <ul>
            <?php foreach ( $wishlist_items as $wishlist_item ) : ?>
                <li>
                    <a href="<?php echo get_permalink( $wishlist_item->get_product_id() ); ?>">
                        <?php echo $wishlist_item->get_product()->get_name(); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'display_wishlist_items', 'display_wishlist_items_shortcode' ); 
 
*/
/*
function display_wishlist_items_shortcode( $atts ) {
    // Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Проверить, есть ли товары в списке желаний
    if ( empty( $wishlist_items ) ) {
        return 'В данном списке желаний нет товаров.';
    }

    // Вывод товаров списка желаний
    ob_start();
    ?>
    <div class="wishlist-items">
        <h3>Товары в текущем списке желаний "<?php echo $wishlist->get_formatted_name(); ?>"</h3>
        <ul>
            <?php foreach ( $wishlist_items as $wishlist_item ) : ?>
                <li>
                    <a href="<?php echo get_permalink( $wishlist_item->get_product_id() ); ?>">
                        <?php echo $wishlist_item->get_product()->get_name(); ?>
                    </a>

                   

                    <button data-product-id="<?php echo $wishlist_item->get_product_id(); ?>">Добавить в корзину</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'display_wishlist_items', 'display_wishlist_items_shortcode' );

 */
 // Добавляем AJAX-обработчик для удаления товара из списка желаний
add_action( 'wp_ajax_wishlist_remove_item', 'wishlist_remove_item_ajax_handler' );
add_action( 'wp_ajax_nopriv_wishlist_remove_item', 'wishlist_remove_item_ajax_handler' );

function wishlist_remove_item_ajax_handler() {
    // Проверяем, является ли запрос отправленным AJAX-запросом
    if ( wp_doing_ajax() ) {
        // Получаем идентификатор товара из запроса
        $wishlist_item_id = isset( $_POST['wishlist_item_id'] ) ? sanitize_text_field( $_POST['wishlist_item_id'] ) : '';

        // Выполняем необходимые действия для удаления товара из списка желаний
        // Здесь вам нужно добавить свой код для удаления товара из списка желаний

        // Отправляем ответ
        wp_send_json_success();
    } else {
        // Если запрос не является AJAX-запросом, возвращаем ошибку
        wp_send_json_error( 'Invalid AJAX request' );
    }
}

function display_wishlist_items_shortcode( $atts ) {
    // Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Проверить, есть ли товары в списке желаний
    if ( empty( $wishlist_items ) ) {
        return 'В данном списке желаний нет товаров.';
    }

    // Вывод товаров списка желаний
    ob_start();
    ?>
    <div class="wishlist-items">
        <h3>Товары в текущем списке желаний "<?php echo $wishlist->get_formatted_name(); ?>"</h3>
        <ul>
            <?php foreach ( $wishlist_items as $wishlist_item ) : ?>
                <li>
                    <a href="<?php echo get_permalink( $wishlist_item->get_product_id() ); ?>">
                        <?php echo $wishlist_item->get_product()->get_name(); ?>
     
                  
                    </a>
   <?php    echo '<button data-product-id="' . $wishlist_item->get_product_id() . '">Добавить в корзину</button>';
 						echo '<button class="remove-from-wishlist" data-wishlist-item-id="' . $wishlist_item->get_product_id() . '">Удалить</button>';
?>
                    <?php
                    // Отображение выбора вариаций
                    if ( $wishlist_item->get_product()->is_type( 'variable' )  ) {
                        $variations = $wishlist_item->get_product()->get_available_variations();

                        // Фильтрация уникальных значений цвета и размера
                        $colors = array();
                        $sizes = array();
                        foreach ( $variations as $variation ) {
                            $colors[] = $variation['attributes']['attribute_pa_color'];
                            $sizes[] = $variation['attributes']['attribute_pa_size'];
                        }
                        $unique_colors = array_unique( $colors );
                        $unique_sizes = array_unique( $sizes );

                        // Вывод выпадающего списка для цвета
                        echo '<div class="variation-color">';
                        echo '<label for="color-' . $wishlist_item->get_product_id() . '">Цвет:</label>';
                        echo '<select id="color-' . $wishlist_item->get_product_id() . '">';
                        foreach ( $unique_colors as $color ) {
                            echo '<option value="' . esc_attr( $color ) . '">' . esc_html( $color ) . '</option>';
                        }
                        echo '</select>';
                        echo '</div>';

                        // Вывод выпадающего списка для размера
                        echo '<div class="variation-size">';
                        echo '<label for="size-' . $wishlist_item->get_product_id() . '">Размер:</label>';
                        echo '<select id="size-' . $wishlist_item->get_product_id() . '">';
                        foreach ( $unique_sizes as $size ) {
                            echo '<option value="' . esc_attr( $size ) . '">' . esc_html( $size ) . '</option>';
                        }
                        echo '</select>';
                        echo '</div>';

                 
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
  <script>
    jQuery(document).ready(function($) {
        // Обработчик события клика на кнопку "Удалить"
        $('.remove-from-wishlist').on('click', function() {
            var wishlistItemId = $(this).data('wishlist-item-id');

            // Отправка AJAX-запроса для удаления товара из списка желаний
            $.ajax({
                url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                type: 'POST',
                data: {
                    action: 'wishlist_remove_item',
                    wishlist_item_id: wishlistItemId
                },
                success: function(response) {
                    // Обновление списка желаний без перезагрузки страницы
                }
            });
        });
    });
</script>

    <?php
    return ob_get_clean();
}
add_shortcode( 'display_wishlist_items', 'display_wishlist_items_shortcode' );
 



 
// Регистрируем шорткоды для вызова функций
add_shortcode('billing_fields', 'shortcode_addNovaPoshtaBillingFields');
add_shortcode('shipping_fields', 'shortcode_addNovaPoshtaShippingFields');

function shortcode_addNovaPoshtaBillingFields($atts, $content = '') {
    $fields = array(); // Здесь вы можете добавить любую необходимую логику для формирования полей
    $fields = apply_filters('addNovaPoshtaBillingFields', $fields);

    // Возвращаем HTML-разметку полей
    return generate_fields_markup($fields);
}

function shortcode_addNovaPoshtaShippingFields($atts, $content = '') {
    $fields = array(); // Здесь вы можете добавить любую необходимую логику для формирования полей
    $fields = apply_filters('addNovaPoshtaShippingFields', $fields);

    // Возвращаем HTML-разметку полей
    return generate_fields_markup($fields);
}

function generate_fields_markup($fields) {
    // Здесь вы можете создать HTML-разметку полей на основе массива $fields
    // Верните сгенерированную разметку в виде строки

    $markup = '';
    foreach ($fields as $field) {
        $markup .= '<div class="form-row">';
        $markup .= '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
        $markup .= '<input type="' . $field['type'] . '" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '">';
        $markup .= '</div>';
    }

    return $markup;
}




pll_register_string('category-suknya', 'Сукня', 'Категории', true);



/*
function update_wishlist_item_size($product_id, $new_size) {
    // Получение текущего списка желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверка, получен ли список желаний
    if (!$wishlist) {
        return;
    }
echo '123123';
    // Поиск элемента, который требует обновления размера
    $items = $wishlist->get_items();
    foreach ($items as $item_key => $item) {
        if ($item['prod_id'] === $product_id) {
            // Создание нового элемента с обновленным размером
            $new_item = $item;
            $new_item['size'] = $new_size;

            // Удаление исходного элемента
            $wishlist->remove_item($item_key);

            // Добавление нового элемента в список желаний
            $wishlist->add_item($new_item);

            // Сохранение обновленного списка желаний
            $wishlist->save_wishlist();
            
            break; // Прерываем цикл после обновления первого элемента с заданным продуктом
        }
    }
}

 */
function update_wishlist_item_size($atts) {
    global $product;

    // Получение текущего товара
    $current_product = ( isset( $atts['product_id'] ) ) ? wc_get_product( $atts['product_id'] ) : false;
    $current_product = $current_product ? $current_product : $product;

    if ( ! $current_product || ! $current_product instanceof WC_Product ) {
        return '';
    }

    // Получение выбранного размера товара
    $new_size = 'новый размер'; // Замените 'новый размер' на требуемый размер

    // Получение текущего списка желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверка, получен ли список желаний
    if ( ! $wishlist ) {
        return '';
    }

    // Поиск элемента, соответствующего текущему товару
    $items = $wishlist->get_items();
    foreach ( $items as $item_key => $item ) {
        if ( $item['prod_id'] === $current_product->get_id() ) {
            // Удаление текущего элемента из списка желаний
            $wishlist->remove_item( $item_key );

            // Создание нового элемента с выбранным размером
            $new_item = array(
                'prod_id' => $current_product->get_id(),
                'quantity' => 1,
                'size' => $new_size, // Добавление выбранного размера
            );

            // Добавление нового элемента в список желаний
            $wishlist->add_item( $new_item );

            // Сохранение обновленного списка желаний
            $wishlist->save_wishlist();

            break; // Прерываем цикл после обновления первого элемента с заданным продуктом
        }
    }
}


function get_wishlist_items() {
    // Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Вернуть список товаров в формате JSON
    return json_encode($wishlist_items);
}
 
