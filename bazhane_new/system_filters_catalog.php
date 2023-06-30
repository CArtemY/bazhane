<?php

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$categories = $_POST['Category'];
$colors = $_POST['Color'];
$size = $_POST['Size'];
$collection = $_POST['Collection'];
$material = $_POST['Materials'];
$price = explode('--', $_POST['Price']);
$sort = explode('--', $_POST['Sort']);

$minPrice = (int)$price[0];
$maxPrice = (int)$price[1];

$sort = $_POST['Sort'];

if ($sort == 'priceUp'){
    $orderby = 'meta_value_num';
    $order = 'ASC';
    $meta_key = '_price';
} else if ($sort == 'priceDown'){
    $orderby = 'meta_value_num';
    $order = 'DESC';
    $meta_key = '_price';
} else {
    $orderby = 'date';
    $order = 'DESC';
    $meta_key = '';
}

$page = (int)$_POST['Page'];

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => '_stock_status',
            'value' => 'instock',
            'compare' => '='
        ),
        array(
            'key' => '_price',
            'value' => array( $minPrice, $maxPrice ),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => '_price',
            'value' => '',
            'compare' => '!=',
        )
    ),
    'tax_query' => array(
        'relation' => 'AND',
    ),
    'orderby' => $orderby,
    'order' => $order,
    'meta_key' => $meta_key,
);

// $categories = array(  );
// $colors = array( );
// $size = array();
// $material = array(  );

//-------------------
if (strlen($categories) > 0){
    $categories = explode('--', $categories);
} else {
    $categories = array(  );
}
if (strlen($colors) > 0){
    $colors = explode('--', $colors);
} else {
    $colors = array( );
}
if (strlen($size) > 0){
    $size = explode('--', $size);
} else {
    $size = array();
}
if (strlen($collection) > 0){
    $collection = explode('--', $collection);
} else {
    $collection = array();
}
if (strlen($material) > 0){
    echo '$material - ' . strlen($material). ' - '.$material.'<br>';
    $material = explode('--', $material);
} else {
    $material = array(  );
}
//-------------------

if (!empty($categories)) {
    $args['tax_query'][] = array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $categories
        )
    );
}

if (!empty($colors)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'pa_color',
        'field' => 'slug',
        'terms' => $colors
    );
}

if (!empty($material)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'pa_material',
        'field' => 'slug',
        'terms' => $material
    );
}

if (!empty($size)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'pa_size',
        'field' => 'slug',
        'terms' => $size
    );
}

if (!empty($collection)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'pa_collection',
        'field' => 'slug',
        'terms' => $collection
    );
}

$query = new WP_Query($args);

$current_language = pll_current_language();
if ( $current_language === 'uk' ) { 
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
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
            
            <a href="<?php echo $product_link?>" class="box">
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
                        <p>Докладніше</p>
                        <span></span>
                    </div>
                </div>
            </z>
            
            <?php 
        }
    } else {
        echo 'Товары не найдены.';
    }
} elseif ( $current_language === 'en' ) { 
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
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
            
            <a href="<?php echo $product_link?>" class="box">
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
                        <p>Read more</p>
                        <span></span>
                    </div>
                </div>
            </a>
            
            <?php 
        }
    } else {
        echo 'Товары не найдены.';
    }
}

wp_reset_postdata();



?>