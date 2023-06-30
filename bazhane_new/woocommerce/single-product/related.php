<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<div class="block-2 product-list">
<div class="container">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			  <div class="line1">
                <h2>Доповніть образ</h2>
            </div>

		<?php endif; ?>
		
		<div class="line2 swiper mySwiper">

<div class="swiper-wrapper">
			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product-related' );
					?>

			<?php endforeach; ?>

</div>
<div class="swiper-pagination-box">
                    <span class="btn custom-button-prev">Назад</span>
                    <div class="swiper-pagination"></div>
                    <span class="btn custom-button-next">Далі</span>
                </div>
		</div>
</div>
</div>
<script>
                var swiperL1 = new Swiper(".mySwiper", {
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        renderBullet: function(index, className) {
                            return '<span class="' + className + '">' + (index + 1) + "</span>";
                        },
                    },
                    navigation: {
                        nextEl: ".custom-button-next",
                        prevEl: ".custom-button-prev",
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
endif;

wp_reset_postdata();
