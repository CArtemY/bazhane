<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
  <div class="info-list">
  <div class="box">

		<?php $i = 0;?>
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				
				<div class="line line-question" style="padding-bottom: 136px;">
				<div class="head" onclick="question(<?php echo $i;?>)">
                                <div class="close"><span></span><span></span></div>
                                <h3>	<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></h3>
                            </div>
							<div class="text">
                             <?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?> 
                            </div>
				
							</div>
							<?php $i++;?>
			<?php endforeach; ?>
		

	
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
 
  </div>
  </div>
  <script>
                        //Номер последнего вопроса, если вопросы закрыты то -1
                        lastquestion = -1;

                        function question(a) {
                            if (lastquestion == a) {
                                questions = document.querySelectorAll('.line-question');
                                questions[a].style.paddingBottom = "0";
                                questions[a].classList.remove('active');
                                lastquestion = -1;
                            } else {
                                questions = document.querySelectorAll('.line-question');
                                i = 0;
                                while (i < questions.length) {
                                    questions[i].style.paddingBottom = "0";
                                    questions[i].classList.remove('active');
                                    i++;
                                }
                                text = document.querySelectorAll('.line-question .text p');
                                height = text[a].scrollHeight;
                                console.log(height);
                                questions[a].style.paddingBottom = 20 + height + "px";
                                questions[a].classList.add('active');
                                lastquestion = a;
                            }
                        }
                        question(0);

                        //Отслеживаем изменение ширины экрана -> Если есть открытый вопрос, считаем заново его высоту и задаем ее
                        window.addEventListener('resize', function() {
                            // gorizontal();
                            questions = document.querySelectorAll('.line-question');
                            i = 0;
                            while (i < questions.length) {
                                if (questions[i].paddingBottom != 10) {
                                    text = document.querySelectorAll('.line-question .text p');
                                    height = text[lastquestion].scrollHeight;
                                    questions[lastquestion].style.paddingBottom = 20 + height + "px";
                                }
                                i++;
                            }
                        });

                    </script>
<?php endif; ?>
