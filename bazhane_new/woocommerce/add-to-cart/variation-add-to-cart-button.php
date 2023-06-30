<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
	
	<!-- <button class="single_add_to_cart_button clickBuyButton btn1" data-variation_id="0" data-productid="<?php echo $product->id;?>">Замовити в один клік
	<div style="font-size:14px" class="ld ld-ring ld-cycle"></div>
	</button> -->
    <div class="btns">
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
    <?php 	if( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( get_the_ID() ) ) ) {
    $atrr = 'disabled';
}
?>

	<button type="submit"  id="btn-for-disable" class="single_add_to_cart_button btn2 button <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" <?php echo $atrr;?>><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	<!-- <div class="btn3"><span></span></div> -->
	<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
	</div>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />

	<script>
		$('.single_add_to_cart_button').on('click', function(e) { 
    e.preventDefault();
});
jQuery(document).ready(function($) {
    $('.single_add_to_cart_button').on('click', function(e){ 
    e.preventDefault();
    $thisbutton = $(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;
                const button = document.getElementById('btn-for-disable');
    var data = {
            action: 'ql_woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
    $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.removeClass('added').addClass('loading');
                $thisbutton.removeClass('active').addClass('loading');
                $('#message1').removeClass('active').addClass('loading');
                
            },
            complete: function (response) {
                $thisbutton.addClass('added').removeClass('loading');
                $thisbutton.addClass('active').removeClass('loading');
                button.setAttribute('disabled', '');
                button.textContent = 'В кошику';
                $('#message1').addClass('active').removeClass('loading');
            }, 
            success: function (response) { 
                window.location = '/cart';
                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else { 
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                } 
            }, 
        }); 
     }); 
});

            function message1Show() {
                document.getElementById('form1').classList.add('active');
                document.body.classList.add("stop");
            }

            function message1Off() {
                $('#message1').removeClass('active').addClass('loading');
               // document.getElementById('message1').removeClass('active');
                //document.body.classList.remove("stop");
            }

	</script>
</div>
