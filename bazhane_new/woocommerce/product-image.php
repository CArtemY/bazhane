<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
// if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
// 	return;
// }

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
  <div class="left">
	<?php $attachment_ids = $product->get_gallery_image_ids();
$featured_img_url = wp_get_attachment_image_url($post_thumbnail_id,'home-slide-img');
	
?>
<div class="list">
    <?php
    $isFirst = true; // Флаг для отслеживания первого элемента
    if ($attachment_ids && $product->get_image_id()) {
        foreach ($attachment_ids as $attachment_id) {
            $imgurlmobile = wp_get_attachment_image_url($attachment_id, 'home-slide-img-sm');

            if (!$isFirst) { // Проверка, является ли текущий элемент первым
                ?>
                <div class="img-cont">
                    <img src="<?php echo $imgurlmobile; ?>">
                </div>
                <?php
            }

            $isFirst = false; // Установка флага в false после первого элемента
        }
    }
    ?>
</div>
  <div class="big-photo">
                    <div class="swiper mySwiperBigphoto">
                        <div class="swiper-wrapper">
<?php	if ( $attachment_ids && $product->get_image_id() ) {?>
	 <img class="swiper-slide" src="<?php echo $featured_img_url;?>">
	<?php 	foreach ( $attachment_ids as $attachment_id ) {
			$imgurlmobile = wp_get_attachment_image_url( $attachment_id, 'home-slide-img' );
		?>
		 <img class="swiper-slide" src="<?php echo $imgurlmobile;?>">
			
		<?php 
		}
	}
	?>
						</div>	
					</div>
					<div class="custom-button-next-bigphoto" onclick="swiperBigphoto.slideNext()"></div>
  </div>

</div>
 <script>
               document.addEventListener('DOMContentLoaded', function() {
  var swiperBigphoto = new Swiper(".mySwiperBigphoto", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    navigation: {
      nextEl: ".custom-button-next-bigphoto",
    },
    on: {
      init: function() {
        this.slideTo(1, 0); // Смещаем на второй слайд при инициализации
      }
    }
  });
});
                        </script>
<style>
    .mySwiperBigphoto .swiper-slide:first-child {
  visibility: visible;
}
</style>