<?php

/*
*Template name: MainPage
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <title>Bazhane</title>
    <meta name="msapplication-TileColor" content="#1A191B">
    <meta name="theme-color" content="#1A191B">
    <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory') ?>/img/fav.ico">

    <!-- Reset -->
    <link media="all" rel="stylesheet" href="<?php bloginfo('template_directory') ?>/reset/normalize.css">
    <link media="all" rel="stylesheet" href="<?php bloginfo('template_directory') ?>/reset/reset.css">

    <!-- Font -->
    <link href="<?php bloginfo('template_directory') ?>/font/font.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/indexstyle.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/indexstyle-adaptive.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/header.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/footer.css" rel="stylesheet" type="text/css" media="all" />
    
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />

    <script src="<?php bloginfo('template_directory') ?>/js/jquery.min.js"></script>

    <!--metatextblock-->
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/fav.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php bloginfo('template_directory') ?>/img/og_image.png">
    <link rel="canonical" href="">
    <!--/metatextblock-->
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="/*!color!*/rgba(0, 0, 0, 1)/*!/color!*/">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="/*!color2!*/rgba(0, 0, 0, 1)/*!/color2!*/">
    <?php $current_language = pll_current_language(); ?>

</head>

<body class="">

<?php include 'custom-header.php'; ?>

<?php
if ( $current_language === 'uk' ) { 
?>  
    <div class="block-1">
        <div class="bigimg"></div>
        <div class="container">
            <div class="line2">
                <div class="left">
                    <div class="text">
                        <h1>oriental<br> chic</h1>
                        <p>New<br> Collection</p>
                    </div>
                    <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn">ПОДИВИТИСЯ<br> КОЛЕКЦІЮ</a>
                </div>
                <div class="right">
                    <p><span>Мінімалістична естетика</span> бренду ідеально злилася з&nbsp;еклектикою Стамбулу. </p>
                    <p><span>Елегантність поєдналася</span> з&nbsp;простотою, невимушеність – з&nbsp;істинним шиком.</p>
                </div>
                <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn small">ПОДИВИТИСЯ<br> КОЛЕКЦІЮ</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 product-list b21">
        <div class="container">
            <div class="line1">
                <h2>Нова колекція</h2>
                <h3>Oriental Chic</h3>
            </div>

            <div class="big-line2">
            <div class="line2">
                
                <!--<div class="box">-->
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7755, 7756, 7757, 7758, 8055, 7724, 7699, 7697, 7669),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                            </a>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>


                <!-- -------------------------------------------------------------------- -->


                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7755, 7756, 7757, 7758, 8055, 7724, 7699, 7697, 7669),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                            </a>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>
                
            </div>
        </div>
            <div class="line3">
                <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn">ПОДИВИТИСЯ<br> КОЛЕКЦІЮ</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 new product-list b22">
        <div class="container">
            <div class="line1">
                <h2>НОВИНИ</h2>
                <!--<h3>Oriental Chic</h3>-->
            </div>
            <div class="big-line2">
            <div class="line2">
                
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7698 , 7699 , 7694 , 7695 ),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                            </a>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>


                <!-- -------------------------------------------------------------------- -->
                

                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7698 , 7699 , 7694 , 7695 ),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                            </a>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>

            </div>
        </div>
            <div class="line3">
                <a href="<?php echo get_home_url() ?>/shop/?sort=newProds" class="btn">усі<br> новинки</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 product-list b23">
        <div class="container">
            <div class="line1">
                <h2>Каталог</h2>
                <h3>Основні категорії</h3>
            </div>
            <div class="big-line2">
            <div class="line2">
                
                <a href="https://www.bazhane.com/shop/?category=bryuky" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Брюки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=kurtky" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Куртки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=palto" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Пальто</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=sorochka" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Сорочки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=spidnyczya" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Спідниці</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=suknya" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Сукні</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=shorty" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Шорти</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=shkiryanka" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Шкірянки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>


                <!-- -------------------------------------------------------------------- -->


                <a href="https://www.bazhane.com/shop/?category=bryuky" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Брюки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=kurtky" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Куртки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=palto" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Пальто</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=sorochka" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Сорочки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=spidnyczya" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Спідниці</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=suknya" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Сукні</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=shorty" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Шорти</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>
                
                <a href="https://www.bazhane.com/shop/?category=shkiryanka" class="box">
                    <div class="l1">
                        <div class="name">
                            <p class="type">Шкірянки</p>
                        </div>
                    </div>
                    <div class="img">
                        <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                    </div>
                    <div class="l3">
                        <div></div>
                        <div class="more">
                            <p>відкрити</p>
                            <span></span>
                        </div>
                    </div>
                </a>


                
                
                
            </div>
        </div>
            <div class="line3">
                <a href="https://www.bazhane.com/shop/" class="btn">відкрити<br> каталог</a>
            </div>
        </div>
    </div>
    
    <div class="block-3">
        <div class="container">
            <div class="line1">
                <h2>Наші клієнти</h2>
                <span></span>
            </div>
            <div class="line2">
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Владислава Рижко</p>
                            <p class="about">Стиліст-інфлюенсер</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_78710%202.png) center center no-repeat; background-size: cover"></div>
                        </div>
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_8148%201.png) center center no-repeat; background-size: cover"></div>
                            <p>Пальто від Bazhane у максимальній довжині. У складі 100% вовна, дуже тепла та якісна.</p>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Владислава Рижко</p>
                            <p class="about">Стиліст-інфлюенсер</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_787ds0%202.png) center center no-repeat; background-size: cover"></div>
                            <p>Двобортний тренч Bazhane з натуральної шкіри з акцентними плечима. <br><br>"Crush trench" - Аліса Нікушина</p>
                        </div>
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_8149.png) center center no-repeat; background-size: cover"></div>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Владислава Рижко</p>
                            <p class="about">Стиліст-інфлюенсер</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_78701.png) center center no-repeat; background-size: cover"></div>
                            <p>Сабіна Мусіна в шкіряній куртці Bazhane зі слоганом: <br><br>"If freedom has a name it’s name is Ukraine"</p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <div class="block-4">
        <div class="container">
            <div class="line1">
                <h2>Про нас пишуть ЗМІ</h2>
            </div>
            
            <div class="line2">
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-1.svg">
                    </div>
                    <div class="head">
                        <h3>5 наймодніших шкіряних курток від українських брендів</h3>
                    </div>
                    <div class="inside">
                        <div class="box var1">
                            <p>Шкіряна куртка – універсальна й позачасова річ у весняному гардеробі. Рік у рік дизайнери демонструють свою любов до шкіряних курток, пропонуючи як класичні моделі байкерських косух, так і експериментуючи з новими фасонами та відтінками. Цього сезону весна-літо 2022 в колекціях українських брендів можна знайти: об’ємні авіатори чоловічого крою, шкіряні бомбери, що відсилають до уніформи льотчиків, металізовані моделі, зухвалі лаковані куртки, мінімалістичні варіанти або ультрамодні шкірянки з ефектом потертості. Vogue.ua зазирнув до колекцій українських дизайнерів та зібрав 5 наймодніших шкіряних курток цієї весни.</p>
                            <div class="imgs">
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8163.png"></div>
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8166.png"></div>
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8168.png"></div>
                            </div>
                        </div>
                        <div class="info">
                            <a href="#">Читати статтю на сайті видання</a>
                            <p class="date">28 квітня 2022</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-2.svg">
                    </div>
                    <div class="head">
                        <h3>10 СТИЛЬНИХ ТРЕНЧІВ ВІД УКРАЇНСЬКИХ ДИЗАЙНЕРІВ</h3>
                    </div>
                    <div class="inside">
                        <div class="box var2">
                            <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8159.png"></div>
                            <p>Підтримуємо економіку країни:<br> купуємо своє<br><br>Класичний тренч вже давно закріпив за собою лідерські позиції в усіх можливих підбірках на тему базового гардероба. Стилісти і модні блогери щосезону радять інвестувати в цей елемент верхнього одягу, а особливої актуальності такі підбірки набувають навесні. Тренч є елементом практичним і досить універсальним, адже його з легкістю вдається комбінувати з абсолютно різним одягом та доповнювати ним образи, відмінні за настроєм та стилістикою. Так, тренч стане вдалим доповненням як спортивного костюма, так і вечірньої сукні.</p>
                        </div>
                        <div class="info">
                            <a href="#">Читати статтю на сайті видання</a>
                            <p class="date">28 квітня 2022</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-2.svg">
                    </div>
                    <div class="head">
                        <h3>«МИ З УКРАЇНИ». МОДНІ&nbsp;БРЕНДИ,<br> ЯКІ НАБЛИЖАЮТЬ ПЕРЕМОГУ</h3>
                    </div>
                    <div class="inside">
                        <div class="box var1">
                            <p>Як модна індустрія допомагає сьогодні армії, Теробороні та економіці країни <br><br><br><strong>BAZHANE BTQ.</strong> <br>Прибуток від продажів верхнього одягу буде розподілено між людьми, залученими до роботи бренду BAZHANE, та благодійними організаціями, що підтримують постраждалих від війни громадян України. Команда працює в онлайн та офлайн-режимі у Києві по вул. Мечникова, 7 (за попереднім записом). Доставка за кордон та по Україні здійснюється у регіони, де працює Нова пошта.</p>
                        </div>
                        <div class="info">
                            <a href="#">Читати статтю на сайті видання</a>
                            <p class="date">28 квітня 2022</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="line1 lastborder">
                <span class="lastborder"></span>
            </div>
            
        </div>
    </div>
    
    <div class="block-5" id="about-us">
        <div class="container">
            <div class="line1">
                <h2>ПРО нас</h2>
                <h3>BAZHANE</h3>
            </div>
            
            <div class="line2">
                
                <div class="cont">
                    <div class="box">
                        <p class="bigline">Бренд почав свою історію в 2019 і спочатку спеціалізувався лише на верхньому одязі. Bazhane досить стрімко закріпив за собою статус бренду, що формує осінній та зимовий гардероб стильних українок.</p>
                        <div class="col">
                            <p>DNK бренду – класичні силуети в актуальній інтерпретаціі, тканини преміальної якості, натуральна шкіра та вінтажне хутро. З кожним сезоном Bazhane вдосконалює свій продукт і постійно шукає нові креативні рішення для розвитку. <br><br>Bazhane не дотримується класичної моделі випуску сезонних колекцій. Натомість, бренд невпинно працює над моделями, яких жадає його аудиторія.</p>
                            <p>Клієнтоорієнтованість – ключова цінність та релігія Bazhane. Глибинний діалог із аудиторією дає можливість досконало вивчити бажання кожної клієнтки, її стиль життя, звички та навіть графік відпусток. Таким чином ми точно знаємо, що, як і о котрій годині знадобиться нашим клієнтам. <br><br>Ми не женемося за трендами. Не виробляємо речі, які роками безцільно висітимуть у шафах. Ми виробляємо лише те, що насправді бажане.</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="box">
                        <div class="img">
                            <img src="<?php bloginfo('template_directory') ?>/img/IMG_6334.png">
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="block-6">
        <div class="container">
            <div class="line1">
                <h2>контакти</h2>
            </div>
            <div class="line2">
                <div class="b1" id="map-line">
                    <div class="cont1">
                        <h3>Онлайн<br> замовлення</h3>
                        <ul class="list1">
                            <li class="phone"><span></span><a href="tel:+380680785937">+38 (068) 078-59-37</a></li>
                            <li class="mail"><span></span><a href="mailto:support@bazhane.com">support@bazhane.com</a></li>
                            <li class="time"><span></span><p>Пн-Вс 11:00 - 22:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <p>Для реклами та кооперацій: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
                <div class="b2">
                    <div class="cont1">
                        <h3>Бутік</h3>
                        <ul class="list1">
                            <li class="phone"><span></span><a href="tel:+380681160767">+38 (068) 116-07-67</a></li>
                            <li class="map"><span></span><a href="#">Київ, вул. Мечникова 7</a></li>
                            <li class="mail"><span></span><a href="mailto:bazhane.btq@gmail.com">bazhane.btq@gmail.com</a></li>
                            <li class="time"><span></span><p>Пн-Вс 12:00 - 19:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <a href="#" class="btn">Прокласти маршрут</a>
                    </div>
                </div>
                <div class="b3">
                    <div class="map" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                        var setting = {"height":20,"width":803,"zoom":17,"queryString":"улица Мечникова, 7, Киев, Украина","place_id":"ChIJxy3uzQDP1EAR5Ey7HvrxAuk","satellite":false,"centerCoord":[50.43727641922144,30.532305399999988],"cid":"0xe902f1fa1ebb4ce4","lang":"ru","cityUrl":"/ukraine/kiev","cityAnchorText":"Карта [CITY1], Киевская область, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"923142"};
                        var d = document;
                        var s = d.createElement('script');
                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=923142';
                        s.async = true;
                        s.onload = function (e) {
                          window.OneMap.initMap(setting)
                        };
                        var to = d.getElementsByTagName('script')[0];
                        to.parentNode.insertBefore(s, to);
                      })();</script>
                    </div>
                </div>
                <div class="b1 b4">
                    <div class="cont2">
                        <span></span>
                        <p>Для реклами та кооперацій: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Запустить функцию, когда документ будет полностью загружен
            window.addEventListener('load', function() {
              // Запустить функцию mapSizeCheck() сразу после загрузки документа
              mapSizeCheck();

              // Запустить функцию mapSizeCheck() при изменении ширины окна
              window.addEventListener('resize', mapSizeCheck);
            });

            function mapSizeCheck() {
                newHeight = document.getElementById('map-line').offsetHeight+'px';
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').getElementsByTagName('iframe')[0].style.height=newHeight
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.height = newHeight;
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.maxHeight = newHeight;
            }

        </script>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>

<div class="block-1">
        <div class="bigimg"></div>
        <div class="container">
            <div class="line2">
                <div class="left">
                    <div class="text">
                        <h1>oriental<br> chic</h1>
                        <p>New<br> Collection</p>
                    </div>
                    <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn">SEE<br> COLLECTION</a>
                </div>
                <div class="right">
                    <p><span>Minimalist aesthetics</span> of the brand perfectly merged with the eclecticism of Istanbul. </p>
                    <p><span>Elegance combined</span> with&nbsp;simplicity, casualness - with&nbsp;true chic.</p>
                </div>
                <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn small">SEE<br> COLLECTION</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 product-list b21">
        <div class="container">
            <div class="line1">
                <h2>new collection</h2>
                <h3>Oriental Chic</h3>
            </div>
            <div class="big-line2">
            <div class="line2">
                
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7755, 7756, 7757, 7758),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                                        <a href="<?php echo $product_link?>">Read more</a>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7755, 7756, 7757, 7758),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                                        <a href="<?php echo $product_link?>">Read more</a>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>
                
            </div>
        </div>
            <div class="line3">
                <a href="<?php echo get_home_url() ?>/shop/?collection=orientalchic" class="btn">SEE<br> COLLECTION</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 new  product-list b22">
        <div class="container">
            <div class="line1">
                <h2>NEWS</h2>
                <!--<h3>Oriental Chic</h3>-->
            </div>
            <div class="big-line2">
            <div class="line2">
                
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7698 , 7699 , 7694 , 7695 ),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                                        <a href="<?php echo $product_link?>">Read more</a>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>
                <?php 
                    
                    $args = array(
                        'post_type'      => 'product',
                        'post__in'       => array(7698 , 7699 , 7694 , 7695 ),
                        'posts_per_page' => -1,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ($products->have_posts()) {
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
                                        <a href="<?php echo $product_link?>">Read more</a>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }

                    
                ?>
                
            </div>
        </div>
            <div class="line3">
                <a href="<?php echo get_home_url() ?>/shop/?sort=newProds" class="btn">all<br> novelties</a>
            </div>
        </div>
    </div>
    
    <div class="block-2 product-list b23">
        <div class="container">
            <div class="line1">
                <h2>Directory</h2>
                 <h3>Main categories</h3>
            </div>
            <div class="big-line2">
            <div class="line2">
                
                <a href="https://www.bazhane.com/shop/?category=bryuky" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Pants</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=kurtky" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Jackets</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=palto" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Coat</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                <a href="https://www.bazhane.com/shop/?category=sorochka" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Shirts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=spidnyczya" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Skirts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=suknya" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Dresses</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=shorty" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Shorts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=shkiryanka" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Leathers</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
















                 <a href="https://www.bazhane.com/shop/?category=bryuky" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Pants</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=kurtky" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Jackets</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=palto" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Coat</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                <a href="https://www.bazhane.com/shop/?category=sorochka" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Shirts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=spidnyczya" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Skirts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=suknya" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Dresses</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=shorty" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Shorts</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                 <a href="https://www.bazhane.com/shop/?category=shkiryanka" class="box">
                     <div class="l1">
                         <div class="name">
                             <p class="type">Leathers</p>
                         </div>
                     </div>
                     <div class="img">
                         <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                     </div>
                     <div class="l3">
                         <div></div>
                         <div class="more">
                             <p>open</p>
                             <span></span>
                         </div>
                     </div>
                 </a>
                
                
                
            </div>
        </div>
            <div class="line3">
                <a href="https://www.bazhane.com/shop/" class="btn">open<br> catalog</a>
            </div>
        </div>
    </div>
    
    <div class="block-3">
        <div class="container">
            <div class="line1">
                <h2>Our clients</h2>
                <span></span>
            </div>
            <div class="line2">
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Vladyslav Ryzhko</p>
                             <p class="about">Stylist-influencer</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_78710%202.png) center center no-repeat; background-size: cover"></div>
                        </div>
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_8148%201.png) center center no-repeat; background-size: cover"></div>
                            <p>Coat from Bazhane in maximum length. Made of 100% wool, very warm and high quality.</p>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Vladyslav Ryzhko</p>
                             <p class="about">Stylist-influencer</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_787ds0%202.png) center center no-repeat; background-size: cover"></div>
                            <p>Bazhane double-breasted trench coat in genuine leather with accent shoulders. <br><br>"Crush trench" - Alisa Nikushyna</p>
                        </div>
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_8149.png) center center no-repeat; background-size: cover"></div>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <div class="info">
                        <div class="inst">
                            <div class="img">
                                <img src="<?php bloginfo('template_directory') ?>/img/cont/inst1.png">
                                <span></span>
                            </div>
                            <p>vladislava.r</p>
                        </div>
                        <div class="name-box">
                            <p class="name">Vladyslav Ryzhko</p>
                             <p class="about">Stylist-influencer</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="cont">
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/IMG_78701.png) center center no-repeat; background-size: cover"></div>
                            <p>Sabina Musina in a Bazhane leather jacket with the slogan: <br><br>"If freedom has a name it's name is Ukraine"</p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <div class="block-4">
        <div class="container">
            <div class="line1">
                <h2>The mass media write about us</h2>
            </div>
            
            <div class="line2">
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-1.svg">
                    </div>
                    <div class="head">
                        <h3>5 most fashionable leather jackets from Ukrainian brands</h3>
                    </div>
                    <div class="inside">
                        <div class="box var1">
                            <p>A leather jacket is a universal and timeless item in a spring wardrobe. Year after year, designers show their love for leather jackets, offering both classic models of biker jackets and experimenting with new styles and shades. This spring-summer 2022 season, in the collections of Ukrainian brands, you can find: voluminous men's aviators, leather bombers that refer to the uniform of pilots, metallic models, bold lacquered jackets, minimalist options or ultra-fashionable leather jackets with a worn effect. Vogue.ua looked into the collections of Ukrainian designers and collected the 5 most fashionable leather jackets this spring.</p>
                            <div class="imgs">
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8163.png"></div>
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8166.png"></div>
                                <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8168.png"></div>
                            </div>
                        </div>
                        <div class="info">
                            <a href="#">Read the article on the publication's website</a>
                            <p class="date">April 28, 2022</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-2.svg">
                    </div>
                    <div class="head">
                        <h3>10 STYLISH TRENCH COATS FROM UKRAINIAN DESIGNERS</h3>
                    </div>
                    <div class="inside">
                        <div class="box var2">
                            <div class="img"><img src="<?php bloginfo('template_directory') ?>/img/cont/IMG_8159.png"></div>
                            <p>We support the country's economy:<br> we buy our<br><br>The classic trench coat has long secured a leadership position in all possible selections on the topic of basic wardrobe. Stylists and fashion bloggers advise investing in this element of outerwear every season, and such selections become especially relevant in the spring. A trench coat is a practical and quite versatile element, because it can be easily combined with completely different clothes and complements images with different moods and styles. Yes, a trench coat will be a successful addition to both a sports suit and an evening dress.</p>
                        </div>
                        <div class="info">
                            <a href="#">Read the article on the publication's website</a>
                            <p class="date">April 28, 2022</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory') ?>/img/cont/zmi-logo-2.svg">
                    </div>
                    <div class="head">
                        <h3>«МИ З УКРАЇНИ». МОДНІ&nbsp;БРЕНДИ,<br> ЯКІ НАБЛИЖАЮТЬ ПЕРЕМОГУ</h3>
                    </div>
                    <div class="inside">
                        <div class="box var1">
                            <p>How the fashion industry helps the army, the National Defense and the economy of the country today <br><br><br><strong>BAZHANE BTQ.</strong> <br>Profits from sales of outerwear will be distributed between the people involved in the work of the BAZHANE brand and charitable organizations supporting war-affected citizens of Ukraine. The team works in online and offline mode in Kyiv on st. Mechnikova, 7 (by appointment). Delivery abroad and across Ukraine is carried out to the regions where Nova Poshta operates.</p>
                        </div>
                        <div class="info">
                            <a href="#">Read the article on the publication's website</a>
                            <p class="date">April 28, 2022</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="line1 lastborder">
                <span class="lastborder"></span>
            </div>
            
        </div>
    </div>
    
    <div class="block-5" id="about-us">
        <div class="container">
            <div class="line1">
                <h2>About us</h2>
                <h3>BAZHANE</h3>
            </div>
            
            <div class="line2">
                
                <div class="cont">
                    <div class="box">
                        <p class="bigline">The brand began its history in 2019 and initially specialized only in outerwear. Bazhane quickly secured the status of a brand that forms the autumn and winter wardrobe of stylish Ukrainian women.</p>
                         <div class="col">
                             <p>DNK of the brand – classic silhouettes in an up-to-date interpretation, premium quality fabrics, genuine leather and vintage fur. With each season, Bazhane improves its product and is constantly looking for new creative solutions for development. <br><br>Bazhane does not adhere to the classic model of releasing seasonal collections. Instead, the brand is constantly working on models that its audience craves.</p>
                             <p>Customer orientation is the key value and religion of Bazhane. An in-depth dialogue with the audience makes it possible to thoroughly study the desires of each client, her lifestyle, habits and even her vacation schedule. In this way, we know exactly what, how and at what time our customers will need. <br><br>We do not follow trends. We do not produce things that will hang aimlessly in closets for years. We produce only what is really desired.</p>
                         </div>
                    </div>
                </div>
                
                <div class="cont">
                    <div class="box">
                        <div class="img">
                            <img src="<?php bloginfo('template_directory') ?>/img/IMG_6334.png">
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="block-6">
        <div class="container">
            <div class="line1">
                <h2>contacts</h2>
             </div>
             <div class="line2">
                 <div class="b1" id="map-line">
                     <div class="cont1">
                         <h3>Online<br> order</h3>
                         <ul class="list1">
                             <li class="phone"><span></span><a href="tel:+380680785937">+38 (068) 078-59-37</a></li>
                             <li class="mail"><span></span><a href="mailto:support@bazhane.com">support@bazhane.com</a></li>
                             <li class="time"><span></span><p>Mon-Sun 11:00 - 22:00</p></li>
                         </ul>
                         <ul class="list2">
                             <li class="telegram"><a href="#"></a></li>
                             <li class="whatsup"><a href="#"></a></li>
                             <li class="viber"><a href="#"></a></li>
                         </ul>
                     </div>
                     <div class="cont2">
                         <p>For advertising and cooperation: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                     </div>
                     <div class="cont3">
                         <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                         <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                     </div>
                 </div>
                 <div class="b2">
                     <div class="cont1">
                         <h3>Boutique</h3>
                         <ul class="list1">
                             <li class="phone"><span></span><a href="tel:+380681160767">+38 (068) 116-07-67</a></li>
                             <li class="map"><span></span><a href="#">Kyiv, str. Mechnikova 7</a></li>
                             <li class="mail"><span></span><a href="mailto:bazhane.btq@gmail.com">bazhane.btq@gmail.com</a></li>
                             <li class="time"><span></span><p>Mon-Sun 12:00 - 19:00</p></li>
                         </ul>
                         <ul class="list2">
                             <li class="telegram"><a href="#"></a></li>
                             <li class="whatsup"><a href="#"></a></li>
                             <li class="viber"><a href="#"></a></li>
                         </ul>
                     </div>
                     <div class="cont2">
                         <a href="#" class="btn">Make a route</a>
                    </div>
                </div>
                <div class="b3">
                    <div class="map" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                        var setting = {"height":20,"width":803,"zoom":17,"queryString":"улица Мечникова, 7, Киев, Украина","place_id":"ChIJxy3uzQDP1EAR5Ey7HvrxAuk","satellite":false,"centerCoord":[50.43727641922144,30.532305399999988],"cid":"0xe902f1fa1ebb4ce4","lang":"ru","cityUrl":"/ukraine/kiev","cityAnchorText":"Карта [CITY1], Киевская область, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"923142"};
                        var d = document;
                        var s = d.createElement('script');
                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=923142';
                        s.async = true;
                        s.onload = function (e) {
                          window.OneMap.initMap(setting)
                        };
                        var to = d.getElementsByTagName('script')[0];
                        to.parentNode.insertBefore(s, to);
                      })();</script>
                    </div>
                </div>
                <div class="b1 b4">
                     <div class="cont2">
                         <span></span>
                         <p>For advertising and cooperation: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                     </div>
                     <div class="cont3">
                         <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                         <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                     </div>
                 </div>
             </div>
         </div>
         <script>
            // Запустить функцию, когда документ будет полностью загружен
            window.addEventListener('load', function() {
              // Запустить функцию mapSizeCheck() сразу после загрузки документа
              mapSizeCheck();

              // Запустить функцию mapSizeCheck() при изменении ширины окна
              window.addEventListener('resize', mapSizeCheck);
            });

            function mapSizeCheck() {
                newHeight = document.getElementById('map-line').offsetHeight+'px';
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').getElementsByTagName('iframe')[0].style.height=newHeight
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.height = newHeight;
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.maxHeight = newHeight;
            }

        </script>
    </div>

<?php
}
?>
    
    <?php include 'custom-footer.php' ?>
    
</body>

</html>