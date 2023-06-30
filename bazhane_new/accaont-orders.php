<?php

/*
*Template name: Account - Orders
Template Post Type: page
*/

include 'account-check-login.php';

$pageMenuClass = 'orders';
$includeAccountNav = true;
$current_language = pll_current_language();

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/accaont-orders.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/account-nav.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>

    <div class="breadcrumbs">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <?php
                if ( $current_language === 'uk' ) { 
                    $pagename = 'Мої замовлення';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'My orders';
                }
                ?>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" title="<?php echo $pagename; ?>">
                        <span itemprop="name"><?php echo $pagename; ?></span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="block-1">
        <div class="container">
            <div class="nav">
                <?php include 'account-nav.php' ?>
            </div>
            <div class="info">
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<h2>Мої замовлення</h2>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<h2>My orders</h2>';
                }
                ?>
                
                <?php
                $current_user = wp_get_current_user(); // Получаем данные текущего пользователя
                
                // Проверяем, является ли пользователь авторизованным
                if ($current_user->ID != 0) {
                    $user_id = $current_user->ID;
                
                    // Получаем историю заказов пользователя
                    $customer_orders = wc_get_orders(array(
                        'customer_id' => $user_id,
                        'status' => array('completed', 'processing', 'on-hold'), // Укажите статусы заказов, которые вы хотите включить
                    ));
                
                    // Проверяем, есть ли заказы
                    if ($customer_orders) {
                        foreach ($customer_orders as $order) {
                            $order_id = $order->get_id();
                            $order_date = $order->get_date_created()->format('d.m.Y');
                            
                            $order_date = $order->get_date_created();
                            $order_formatted_date = date_i18n('j F Y', strtotime($order_date));
                            
                            $order_total = $order->get_total();
                            $order_total_formatted = number_format($order_total, 0, '', ' '); // Форматируем сумму заказа
                            $order_status = $order->get_status();
                
                            // Выводим информацию о заказе
                            // echo "Заказ ID: $order_id, Дата: $order_date, Сумма: $order_total, Статус: $order_status <br>";
                            ?>
                            <div class="line-box">
                                <?php
                                if ( $current_language === 'uk' ) { 
                                    echo '<p class="subhead">№'.$order_id.' від '.$order_formatted_date.' р. на сумму '.$order_total_formatted.' ₴</p>';
                                } elseif ( $current_language === 'en' ) { 
                                    echo '<p class="subhead">№'.$order_id.' dated '.$order_formatted_date.' in the amount of '.$order_total_formatted.' ₴</p>';
                                }
                                ?>
                                    <p class="status"><?php $order_status ?></p>
                            <?php
                
                            // Получаем товары в заказе
                            $order_items = $order->get_items();
                            if ($order_items) {
                                foreach ($order_items as $item) {

                                    // Получаем артикул товара и категорию
                                    $product = $item->get_product();
                                    $parent_id = $product->get_parent_id();
                                    $product_base = $item->get_product();

                                    //-----------------------------------------------------------------
                                    //Ищем аналогичный товар на англ версии
                                    if ($current_language !== 'uk') {
                                        //Получаем Артикул вариации англ версии
                                        $product_variation_id = $product->get_id(); // Получаем идентификатор вариации товара
                                        $sku = $product->get_sku().'-EN';
                                        $args = array(
                                            'post_type'   => 'product_variation',
                                            'post_status' => 'publish',
                                            'numberposts' => 1,
                                            'meta_query'  => array(
                                                array(
                                                    'key'     => '_sku',
                                                    'value'   => $sku,
                                                    'compare' => '='
                                                )
                                            )
                                        );
                                        $variations = get_posts($args);
                                        if ($variations) {
                                            $variation = $variations[0];
                                            $product = wc_get_product($variation->ID);
                                        }
                                    }

                                    $product_name = $product->get_name();
                                    $product_quantity = $item->get_quantity();
                                    $product_total = $item->get_total();
                                    $product_total_formatted = number_format($product_total, 0, '', ' '); // Форматируем сумму товара
                                    
                                    // Проверяем активный язык
                                    $current_language = pll_current_language();
                                    
                                    $product_id = $product->get_id();
                                    $product_sku = $product->get_sku();
                                    $product_categories = wp_get_post_terms($parent_id, 'product_cat', array('fields' => 'names'));
                                    $parent = wc_get_product($product_id);
                                    $category = get_the_terms($parent_id, 'product_cat');
                                    $first_category = reset($category);
                                    $category_slug = 'category-'.$category[0]->slug;
                                    $category_name = $first_category->name;
                                    $product_category = pll__($category_name, $category_slug);

                
                                    // Получаем значения атрибутов color, size и material
                                    $product_attributes = $product->get_attributes();
                                    $color_value = $product_attributes['pa_color'];
                                    $size_value = $product_attributes['pa_size'];
                                    $length_value = isset($product_attributes['pa_length']) ? $product_attributes['pa_length'] : '';
                                    
                                    // Получаем URL на изображение товара
                                    $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                
                                    // Выводим информацию о товаре
                                    // echo "Товар: $product_name, Количество: $product_quantity, Сумма: $product_total <br>";
                                    ?>
                                    <div class="line">
                                        <div class="box">
                                            <div class="img" style="background: url(<?php echo $product_image_url; ?>) center center no-repeat; background-size: contain;background-color: #fff;"></div>
                                            <div class="info">
                                                <p class="name"><?php echo $product_category; ?></p>
                                                <p class="desc"><?php echo $product_name ?></p>
                                                <p class="art">Арт. <?php echo $product_sku; ?></p>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="properties">
                                                <div class="box">
                                                    <?php
                                                    if ( $current_language === 'uk' ) { 
                                                        echo '<p class="name">Колір</p>';
                                                    } elseif ( $current_language === 'en' ) { 
                                                        echo '<p class="name">Color</p>';
                                                    }
                                                    ?>
                                                    <div class="dropdown dropdown1 color">
                                                        <div class="select">
                                                            <span class="<?php echo $color_value; ?>"></span>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="box">
                                                    <?php
                                                    if ( $current_language === 'uk' ) { 
                                                        echo '<p class="name">Розмір</p>';
                                                    } elseif ( $current_language === 'en' ) { 
                                                        echo '<p class="name">Size</p>';
                                                    }
                                                    ?>
                                                    <div class="dropdown dropdown2">
                                                        <div class="select">
                                                            <span><?php echo strtoupper($size_value); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                        </div>
                                        <div class="box last">
                                            <div class="box boxquantity">
                                                <div class="quantity">
                                                    <?php
                                                    if ( $current_language === 'uk' ) { 
                                                        echo '<p class="name">Кількість</p>';
                                                    } elseif ( $current_language === 'en' ) { 
                                                        echo '<p class="name">Quantity</p>';
                                                    }
                                                    ?>
                                                    <p class="quantity-number"><?php echo $product_quantity ?></p>
                                                </div>
                                            </div>
                                            <div class="c">
                                                <?php
                                                if ( $current_language === 'uk' ) { 
                                                    echo '<p class="name">Ціна</p>';
                                                } elseif ( $current_language === 'en' ) { 
                                                    echo '<p class="name">Price</p>';
                                                }
                                                ?>
                                                <p class="price"><?php echo $product_total_formatted; ?> ₴</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php
                                }
                            } else {
                                // echo "В этом заказе нет товаров. <br>";
                            }
                
                            ?> </div> <?php
                        }
                    } else {
                        if ( $current_language === 'uk' ) { 
                            echo 'У вас немає замовлень.';
                        } elseif ( $current_language === 'en' ) { 
                            echo 'You have no orders.';
                        }
                    }
                } else {
                    echo "Пожалуйста, войдите в систему, чтобы просмотреть историю заказов.";
                }
                ?>



            </div>
        </div>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>