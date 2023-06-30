<?php

/*
*Template name: Account - Main
Template Post Type: page
*/

$pageMenuClass = 'profile';
$includeAccountNav = true;

include 'account-check-login.php';

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/account-main.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/account-nav.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>

    <?php

    $current_language = pll_current_language();

    if ( $current_language === 'uk' ) { ?>

        <div class="block-1">
        <div class="container">
            <div class="nav">
                <?php include 'account-nav.php' ?>
            </div>
            <div class="info">
                <?php

                $current_user = wp_get_current_user();
                $current_user_id = get_current_user_id();

                $first_name = get_user_meta( $current_user_id, 'first_name', true );
                $last_name = get_user_meta( $current_user_id, 'last_name', true );

                ?>
                <h2>Вітаємо, <?php echo $first_name ?> <?php echo $last_name ?></h2>
                <div class="info-block">
                    <div class="box">
                        <h3>Контакти</h3>
                        <?php
                        $billing_email = get_user_meta($current_user->ID, 'billing_email', true);
                        
                        if (!empty($billing_email)) {
                            echo '<p>' . $billing_email . '</p>';
                        } else {
                            echo '<p>Немає даних про email</p>';
                        }
                        ?>
                        <?php
                        $current_user = wp_get_current_user();
                        $billing_phone = get_user_meta($current_user->ID, 'billing_phone', true);
                        
                        if (!empty($billing_phone)) {
                            echo '<p>' . $billing_phone . '</p>';
                        } else {
                            echo 'Немає даних про номер телефону';
                        }
                        ?>

                    </div>
                    <div class="box">
                        <h3>Адреса доставки</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        $billing_address_2 = get_user_meta($current_user->ID, 'billing_address_2', true);
                        
                        if (!empty($billing_address_2)) {
                            $billing_address_2 = str_replace('--', ', ', $billing_address_2);
                            echo '<p>' . $billing_address_2.'</p>';
                        } else {
                            echo '<p>Немає даних</p>';
                        }
                        ?>

                    </div>
                    <div class="box">
                        <h3>Розмір одягу</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        
                        $args = array(
                            'post_type' => 'shop_order',
                            'post_status' => array('wc-completed', 'wc-processing'), // Укажите нужные статусы заказа
                            'meta_query' => array(
                                array(
                                    'key' => '_customer_user',
                                    'value' => $current_user->ID,
                                    'compare' => '=',
                                ),
                            ),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 1,
                        );
                        
                        $orders = get_posts($args);
                        
                        if ($orders) {
                            $order = wc_get_order($orders[0]->ID);
                            $items = $order->get_items();
                        
                            if ($items) {
                                $first_item = reset($items);
                                $product = $first_item->get_product();
                        
                                if ($product) {
                                    $size = $product->get_attribute('size');
                        
                                    if ($size) {
                                        echo '<p>' . $size.'<p>';
                                    } else {
                                        echo '<p>Немає даних</p>';
                                    }
                                }
                            }
                        } else {
                            echo '<p>Немає даних</p>';
                        }
                        ?>
                    </div>
                    <div class="box">
                        <h3>Дата народження</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        $birthday = get_user_meta($current_user->ID, 'birthday', true);
                        
                        if (!empty($birthday)) {
                            $formatted_birthday = date('d.m.Y', strtotime($birthday));
                            echo '<p>' . $formatted_birthday.'</p>';
                        } else {
                            echo '<p>дд.мм.гггг</p>';
                        }
                        ?>

                    </div>
                </div>
                <a href="<?php get_home_url() ?>/account-edit/" class="btn">Редагувати профіль</a>
            </div>
        </div>
    </div>

    <?php
        } elseif ( $current_language === 'en' ) { 
    ?>

    <div class="breadcrumbs">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Home" itemprop="item">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="../" itemprop="item" title="Personal office">
                        <span itemprop="name">Personal office</span>
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

                $current_user = wp_get_current_user();
                $current_user_id = get_current_user_id();

                $first_name = get_user_meta( $current_user_id, 'first_name', true );
                $last_name = get_user_meta( $current_user_id, 'last_name', true );

                ?>
                <h2>Welcome, <?php echo $first_name ?> <?php echo $last_name ?></h2>
                <div class="info-block">
                    <div class="box">
                        <h3>Contacts</h3>
                        <?php
                        $billing_email = get_user_meta($current_user->ID, 'billing_email', true);
                        
                        if (!empty($billing_email)) {
                            echo '<p>' . $billing_email . '</p>';
                        } else {
                            echo '<p>No data about email</p>';
                        }
                        ?>
                        <?php
                        $current_user = wp_get_current_user();
                        $billing_phone = get_user_meta($current_user->ID, 'billing_phone', true);
                        
                        if (!empty($billing_phone)) {
                            echo '<p>' . $billing_phone . '</p>';
                        } else {
                            echo 'No phone number information';
                        }
                        ?>

                    </div>
                    <div class="box">
                        <h3>Delivery address</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        $billing_address_2 = get_user_meta($current_user->ID, 'billing_address_2', true);
                        
                        if (!empty($billing_address_2)) {
                            $billing_address_2 = str_replace('--', ', ', $billing_address_2);
                            echo '<p>' . $billing_address_2.'</p>';
                        } else {
                            echo '<p>No data</p>';
                        }
                        ?>

                    </div>
                    <div class="box">
                        <h3>Clothing size</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        
                        $args = array(
                            'post_type' => 'shop_order',
                            'post_status' => array('wc-completed', 'wc-processing'), // Укажите нужные статусы заказа
                            'meta_query' => array(
                                array(
                                    'key' => '_customer_user',
                                    'value' => $current_user->ID,
                                    'compare' => '=',
                                ),
                            ),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 1,
                        );
                        
                        $orders = get_posts($args);
                        
                        if ($orders) {
                            $order = wc_get_order($orders[0]->ID);
                            $items = $order->get_items();
                        
                            if ($items) {
                                $first_item = reset($items);
                                $product = $first_item->get_product();
                        
                                if ($product) {
                                    $size = $product->get_attribute('size');
                        
                                    if ($size) {
                                        echo '<p>' . $size.'<p>';
                                    } else {
                                        echo '<p>No data</p>';
                                    }
                                }
                            }
                        } else {
                            echo '<p>No data</p>';
                        }
                        ?>
                    </div>
                    <div class="box">
                        <h3>Date of birth</h3>
                        <?php
                        $current_user = wp_get_current_user();
                        $birthday = get_user_meta($current_user->ID, 'birthday', true);
                        
                        if (!empty($birthday)) {
                            $formatted_birthday = date('d.m.Y', strtotime($birthday));
                            echo '<p>' . $formatted_birthday.'</p>';
                        } else {
                            echo '<p>dd.mm.yyyy</p>';
                        }
                        ?>

                    </div>
                </div>
                <a href="<?php get_home_url() ?>/en/account-edit/" class="btn">Edit profile</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

    <?php include 'custom-footer.php' ?>

</body>

</html>
