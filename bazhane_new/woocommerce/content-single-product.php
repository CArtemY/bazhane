<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
  <div class="block-1-0">
        <div class="container">
            <p class="h1">Diana</p>
            <p class="desc"><?php the_title();?></p>
        </div>
    </div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'block-1', $product ); ?>>
<div class="container">
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
<div class="right">
	
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 60
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 10
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	</div>
</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
<div class="modal fade message" id="message1">
        <div class="modal-dialog">
            <div class="bg bgf2" onclick="message1Off()"></div>
            <div class="close">
                <svg onclick="message1Off()">
                    <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                        <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                        <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                    </g>
                </svg>
            </div>
            <div class="modal-content" id="form1-box">
                <div class="content-close">
                    <div class="close" onclick="message1Off()"></div>
                </div>
                <p class="table-head">Товар успішно доданий до кошика</p>
            </div>
        </div>
	
        </div>
		<div class="modal fade" id="form1">
        <div class="modal-dialog">
            <div class="bg bgf2" onclick="sizeOff()"></div>
            <div class="close">
                <svg onclick="sizeOff()">
                    <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                        <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                        <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                    </g>
                </svg>
            </div>
            <div class="modal-content" id="form1-box">
                <div class="content-close">
                    <div class="close" onclick="sizeOff()"></div>
                </div>
                <p class="table-head">Розмірна сітка</p>
                <table>
                    <tr>
                        <th>EU</th>
                        <th>INT</th>
                        <th>BUST</th>
                        <th>WAIST</th>
                        <th>HIP</th>
                    </tr>
                    <tr>
                        <td>XS</td>
                        <td>34</td>
                        <td>76-82</td>
                        <td>61-65</td>
                        <td>84-89</td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>36</td>
                        <td>83-89</td>
                        <td>66-70</td>
                        <td>90-95</td>
                    </tr>
                    <tr>
                        <td>M</td>
                        <td>38</td>
                        <td>90-97</td>
                        <td>71-75</td>
                        <td>96-99</td>
                    </tr>
                    <tr>
                        <td>L</td>
                        <td>40</td>
                        <td>98-104</td>
                        <td>76-80</td>
                        <td>100-104</td>
                    </tr>
                    <tr>
                        <td>XL</td>
                        <td>42</td>
                        <td>105-110</td>
                        <td>81-85</td>
                        <td>105-109</td>
                    </tr>
                    <tr>
                        <td>XXL</td>
                        <td>44</td>
                        <td>111-117</td>
                        <td>86-90</td>
                        <td>110-114</td>
                    </tr>
                    <tr>
                        <td>3XL</td>
                        <td>46</td>
                        <td>118-124</td>
                        <td>91-95</td>
                        <td>115-119</td>
                    </tr>
                    <tr>
                        <td>4XL</td>
                        <td>48</td>
                        <td>125-131</td>
                        <td>96-95</td>
                        <td>120-124</td>
                    </tr>
                </table>
            </div>

			<div class="modal fade message" id="message2">
        <div class="modal-dialog">
            <div class="bg bgf2" onclick="message2Off()"></div>
            <div class="close">
                <svg onclick="message2Off()">
                    <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                        <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                        <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                    </g>
                </svg>
            </div>
            <div class="modal-content" id="form1-box">
                <div class="content-close">
                    <div class="close" onclick="message2Off()"></div>
                </div>
                <p class="table-head">Товар успішно доданий до обраного</p>
            </div>
        </div>
        <script>
            function message2Show() {
                document.getElementById('message2').classList.add('active');
                document.body.classList.add("stop");
            }

            function message2Off() {
                document.getElementById('message2').classList.remove('active');
                document.body.classList.remove("stop");
            }

        </script>
    </div>