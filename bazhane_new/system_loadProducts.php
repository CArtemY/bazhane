<?php


// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');



$page = $_POST['Page'];
$offset = ($page - 1) * 16;

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 16,
    'offset'         => $offset, // Указываем смещение для вывода вторых 16 товаров
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) {
    while ( $products->have_posts() ) {
        $products->the_post();
        global $product;
        
        $product_link = get_permalink($product->get_id());
        $terms = get_the_terms($product->get_id(), 'product_cat');
        if ($terms && !is_wp_error($terms)) {
            $category_names = array();
            foreach ($terms as $term) {
                $category_names[] = $term->name;
            }
            $category_list = implode(', ', $category_names);
        }
        $attribute_name = 'Color';
        $attribute_value = $product->get_attribute($attribute_name);
        ?>
        
        <div class="box">
            <div class="l1">
                <div class="name">
                    <p class="type"><?php echo $category_list ?></p>
                    <h4><?php echo get_the_title() ?></h4>
                </div>
                <div class="like-btn"></div>
                <div class="colors">
                    <?php
                    $attribute_name = 'Color';
                    $attribute_value = $product->get_attribute($attribute_name);
                    
                    if ($attribute_value) {
                        $taxonomy = 'pa_' . sanitize_title($attribute_name);
                        $terms = explode(', ', $attribute_value); // Разделяем значения атрибута по запятой
                        foreach ($terms as $term_value) {
                            $term = get_term_by('name', $term_value, $taxonomy);
                            if ($term) {
                                echo '<span class="' . $term->slug . '"></span>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="img">
                <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
            </div>
            <div class="l3">
                <?php 
                if ( $product->is_type( 'variable' ) ) {
                    $variations = $product->get_available_variations();
                    if ( ! empty( $variations ) ) {
                        $variation = $variations[0];
                        $variation_obj = wc_get_product( $variation['variation_id'] );
                        if ( $variation_obj ) {
                            $price = $variation_obj->get_price();
                        }
                    }
                } else {
                    $price = $product->get_price();
                }
                
                $currency_symbol = '₴'; // Замените на нужный символ валюты
                
                $formatted_price = number_format( $price, 0, '', ' ' ); // Форматируем цену с пробелами в качестве разделителя тысячных
                $price_output = $formatted_price . ' ' . $currency_symbol;
                
                echo '<p class="price">' . $price_output . '</p>';
                ?>
                <div class="more">
                    <a href="<?php echo $product_link?>">Докладніше</a>
                    <span></span>
                </div>
            </div>
        </div>
        
        <?php 
        
        // ...
    }
    wp_reset_postdata();
} else {
    echo 'Товары не найдены.';
}

?>