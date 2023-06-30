<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div <?php wc_product_class( 'box swiper-slide', $product ); ?> >
<?php 
$sizeName = "204-365"; //registered name in previous example!

$thumbnailUrl = get_the_post_thumbnail_url($postId, $sizeName);
?>

<div class="l1">
                            <div class="name">
                                <p class="type"><?php   
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
		data-title=""></div>
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
                        <img src="<?php echo $thumbnailUrl;?>" alt="" onclick="location.href='<?php the_permalink();?>'">
                        </div>
                        <div class="l3">
                            <p class="price"><?php echo $product->get_price_html(); ?></p>
                            <div class="more">
                                <a  href="<?php the_permalink();?>">Докладніше</a>
                                <span></span>
                            </div>
                        </div>

	
</div>
