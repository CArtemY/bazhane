<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">


<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<div class="variations properties"  cellspacing="0" role="presentation">
		
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
	
					<div class=" hidden">
	<p class="name"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></p>
	
                            <div class="select">
                                <span style="background-color: green"></span>
                        
                            </div>
                      
                           
              
							
									<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								//echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
								?>

					



                            
                
	</div>
					
				
				<?php endforeach; ?>
		<div class="var">
<?php foreach ( $attributes as $attribute_name => $options ) : ?>
    <div class="box boxen">
        <p class="name"><?php echo wc_attribute_label( $attribute_name ); ?></p>
        
        <div class="dropdown dropdown1 color" tabindex="1">
            <div class="select">
                <span class="selected-option" class="<?php echo esc_attr( $option ); ?>"></span>
                <p class="selected-text" class="<?php echo esc_attr( $option ); ?>"></p>
                
            
            </div>
            <input type="hidden" name="attribute_<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
            <ul class="dropdown-menu">
                <?php foreach ( $options as $option ) : ?>
                	   <?php
        // Получаем объект термина по его slug'у
        $term = get_term_by( 'slug', $option, $attribute_name );
        // Получаем имя вариации
        $variation_name = $term ? $term->name : $option;
    ?>
                 <li>
        <label>
            <input type="radio" name="attribute_<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>" value="<?php echo esc_attr( $option ); ?>">
            <span class="<?php echo esc_attr( $option ); ?>"></span>
           <p><?php echo esc_html( apply_filters( 'woocommerce_variation_option_name', $variation_name ) ); ?></p>
        </label>
    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endforeach; ?>  </div>
		<script>
/* Dropdown Menu */
$('.dropdown1').click(function(e) {
    e.stopPropagation();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});

$(document).click(function() {
    $('.dropdown1').removeClass('active');
    $('.dropdown-menu').slideUp(300);
});

$('.dropdown1 .dropdown-menu li').click(function(e) {
    e.stopPropagation();
    var backgroundColor = $(this).find('span').css('background-color');
    var selectedOptionText = $(this).find('p').text(); // Извлекаем текст из элемента <p>
    var dropdown = $(this).closest('.dropdown1');
    dropdown.find('.selected-option').css('background-color', backgroundColor);
    dropdown.find('.select p').text(selectedOptionText); // Обновляем текст в элементе <p> внутри .select
  dropdown.find('.selected-text').text(selectedOptionText);
    dropdown.removeClass('active');
    dropdown.find('.dropdown-menu').slideUp(300);
});
</script>
		</div>
    <span class="sizes" style="cursor:pointer;" onclick="sizeShow()">Розмірна сітка</span>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>
		<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
		<style>
		.woocommerce .site-main  .block-1 .price {
    font-family: 'RF Dewi';
    font-style: normal;
    font-weight: 600;
    font-size: 55px;
    line-height: 120%;
    text-transform: uppercase;
    margin-bottom: 20px;
    color: #000000;
}


.var {
    display: flex;

}
.dropdown .dropdown-menu span {
  display: none;
}

.boxen .dropdown.color .select span{
  display: none;
}
.boxen:nth-child(1) .dropdown.color .select span{
  display: inline-block;
}
.boxen:nth-child(1) .dropdown .dropdown-menu span {
  display: inline-block;
}

.boxen:nth-child(1) .dropdown.color p{
  display: none;
}



 .dropdown .dropdown-menu {

    overflow: initial;
}
.block-1 .properties input {
    outline: none;
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
}


.hidden {
	opacity: 0;
	position: absolute;
	z-index: -5;
	top: -1000px;
}
/* Стили для выпадающего списка */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-toggle {
  cursor: pointer;
  padding: 8px 16px;
  background-color: #f8f8f8;
  border: 1px solid #ccc;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  display: none;
  list-style-type: none;
  padding: 0;
  margin: 0;
  background-color: #fff;
  border: 1px solid #ccc;
}

.dropdown-menu li {
  padding: 8px 16px;
}

.dropdown-menu li:hover {
  background-color: #f0f0f0;
}

/* Стили для активного пункта */
.dropdown-toggle.active {
  background-color: #e0e0e0;
}

.dropdown-menu li.active {
  background-color: #e0e0e0;
}
.woocommerce .site-main  .block-1 .variations_button{
	display: flex;
}
		</style>
		   <div class="btns">
	
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
			

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

			
			?>
			
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
<script type="text/javascript">
// Создаем объект с данными для каждого блока
var blocksData = [
  {
    radioSelector: 'input[type="radio"][name="attribute_pa_color"]',
    selectSelector: '#pa_color'
  },
  {
    radioSelector: 'input[type="radio"][name="attribute_pa_size"]',
    selectSelector: '#pa_size'
  },
    {
    radioSelector: 'input[type="radio"][name="attribute_pa_length"]',
    selectSelector: '#pa_length'
  },
  {
    radioSelector: 'input[type="radio"][name="attribute_pa_material"]',
    selectSelector: '#pa_material'
  }





];

// Перебираем данные для каждого блока
blocksData.forEach(function(blockData) {
  var radioButtons = document.querySelectorAll(blockData.radioSelector);
  var select = document.querySelector(blockData.selectSelector);

  radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('click', function() {
      var selectedValue = this.value;

      // Выполняем клик на соответствующем элементе выпадающего списка
      var selectOption = select.querySelector('option[value="' + selectedValue + '"]');
      if (selectOption) {
        selectOption.selected = true;

        // Создаем инициирующее событие 'change' на выпадающем списке
        var changeEvent = new Event('change', { bubbles: true });
        select.dispatchEvent(changeEvent);
      }
    });

    // Выполняем клик на радиокнопку
    radioButton.click();
  });
});

</script>









</script>
<script>
            function sizeShow() {
                document.getElementById('form1').classList.add('active');
                document.body.classList.add("stop");
            }

            function sizeOff() {
                document.getElementById('form1').classList.remove('active');
                document.body.classList.remove("stop");
            }

        </script>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
