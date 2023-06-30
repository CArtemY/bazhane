<?php

/*
*Template name: Search
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/catalog.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/catalog-adaptive.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list-catalog.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>

    <div class="breadcrumbs" id="filters">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item" bis_skin_checked="1">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item">
                        <span itemprop="name">Пошук</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="block-1 product-list">
        <div class="container">
            <div class="line2" id="products">

                <?php 
                
                if (isset($_COOKIE['bazhane_search'])) {
                    $bazhane_search_value = $_COOKIE['bazhane_search'];
                }
                
                $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => -1,
                        's' => $bazhane_search_value,
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


            </div>
            <div class="line3 off" id="pagintaion-box">
                <div class="cont">
                    <?php
                    $total_products = wc_get_products(array(
                        'status' => 'publish', // Только опубликованные товары
                        'limit' => -1, // Все товары
                        'return' => 'ids', // Вернуть только идентификаторы товаров
                    ));
                    
                    $count = count($total_products);
                    ?>
                    <a href="#" class="bigbtn">Назад</a>
                    <ul id="pagintaion">
                        <a class="active" onclick="loadPage(1)">1</a>
                        <a onclick="loadPage(2)">2</a>
                        <a onclick="loadPage(3)">3</a>
                        <a onclick="loadPage(4)">4</a>
                        <span>...</span>
                        <a onclick="loadPage(9)">9</a>
                    </ul>
                    <script>
                        //Pagintaion
                        MaxProd = <?php echo $count; ?>;
                        $( document ).ready(function() {
                            updatePaginationList();
                            
                        });
                        
                        var activePaginationPage = 1;
                        maxPaginationPage = Math.ceil(MaxProd/16);
                        function updatePaginationList(){
                            console.log('updatePaginationList');
                            console.log(activePaginationPage);
                            if (activePaginationPage == 1){
                                //Первая страница
                                console.log('Первая страница');
                                result = '<a class="active" onclick="loadPage(1)">1</a><a onclick="loadPage(2)">2</a><a onclick="loadPage(3)">3</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                document.getElementById('pagintaion').innerHTML = result;
                            } else {
                                if (activePaginationPage == maxPaginationPage){
                                    //Последняя страница
                                    console.log('Последняя страница');
                                    preprelast = maxPaginationPage - 2;
                                    prelast = maxPaginationPage - 1;
                                    result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+preprelast+')">'+preprelast+'</a><a onclick="loadPage('+prelast+')">'+prelast+'</a><a class="active" onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                    document.getElementById('pagintaion').innerHTML = result;
                                } else{
                                    if (activePaginationPage == maxPaginationPage - 1){
                                        //Предпоследняя страница
                                        console.log('Предпоследняя страница');
                                        previous = activePaginationPage - 1;
                                        result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                        document.getElementById('pagintaion').innerHTML = result;
                                    } else {
                                        if (activePaginationPage == maxPaginationPage - 2){
                                            //Предпредпоследняя страница
                                            console.log('Предпредпоследняя страница');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                            document.getElementById('pagintaion').innerHTML = result;
                                        } else {
                                            //Страница из середины
                                            console.log('Страница из середины');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>'; 
                                            document.getElementById('pagintaion').innerHTML = result;
                                        }
                                    }
                                }
                            }
                        }
                        
                    </script>
                    <a href="#" class="bigbtn">Далі</a>
                </div>
            </div>
        </div>
        <script>
            
            function loadPage(a){
                $('#products').load('<?php bloginfo('template_directory') ?>/system_loadProducts.php', {
                    Page: a
                });
                activePaginationPage = a;
                console.log(activePaginationPage);
                updatePaginationList();
            }
            
        </script>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>
