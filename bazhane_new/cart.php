    <?php

/*
*Template name: Cart
Template Post Type: page
*/

?>

<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/cart.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/cart-adaptive.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    
    <link href="<?php bloginfo('template_directory') ?>/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</head>

<body class="">
    
    <div id="block-0000"></div>

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
                    $pagename = 'Кошик';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Cart';
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
<?php
if ( $current_language === 'uk' ) { 
?>  
    <div class="block-1">
        <div class="container">
            
            <?php
            
            // Получаем объект корзины
            $woocommerce = WC();
            
            // Получаем текущую корзину
            $cart = WC()->cart;
            
            // Проходимся по товарам в корзине
            $prod_i = 0;
            foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
                // Получаем данные товара
                // Получаем данные товара
                $product_id      = $cart_item['product_id'];
                $variation_id    = $cart_item['variation_id'];
                $product         = $cart_item['data'];
                $product_name    = $product->get_name();
                $product_sku     = $product->get_sku();
                $quantity        = $cart_item['quantity'];
                $price           = $product->get_price();
                $product_total_formatted = number_format($price, 0, '', ' '); // Форматируем сумму товара
                $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                $color_attribute = isset( $cart_item['variation']['attribute_pa_color'] ) ? $cart_item['variation']['attribute_pa_color'] : '';
                $size_attribute = isset( $cart_item['variation']['attribute_pa_size'] ) ? $cart_item['variation']['attribute_pa_size'] : '';
                $category        = '';
            
                // Получаем категорию товара
                $terms = get_the_terms( $product_id, 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    $category = $terms[0]->name;
                }
                $variation_data = wc_get_product($variation_id);

                if (is_a($variation_data, 'WC_Product_Variable') || is_a($variation_data, 'WC_Product_Variation')) {
                    $variation_attributes = $variation_data->get_variation_attributes();
                } else {
                    // Обработка ошибки или выполнение альтернативной логики
                }

                ?>
            
                <div class="line">
                    <div class="box">
                        <div class="img" style="background: url(<?php echo $product_image_url; ?>) center center no-repeat; background-size: contain;"></div>
                        <div class="info">
                            <p class="name"><?php echo $category; ?></p>
                            <p class="desc"><?php echo $product_name ?></p>
                            <p class="art">Арт. <?php echo $product_sku; ?></p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="properties">
                            <?php   
                            if (isset($variation_attributes["attribute_pa_size"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'size' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePaColor = $variation_attributes["attribute_pa_color"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Колір</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>color color">
                                        <div class="select">
                                            <span class="<?php echo $color_attribute; ?>"></span>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_color', array( 'fields' => 'slugs' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    $j=0;
                                                    foreach ( $attribute as $color_slug ) {
                                                        echo '<li id="color'.$j.'"><span class="'.$color_slug.'"></span></li>';
                                                        $j++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>color').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>color').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>color .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('span').attr('class');
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('span').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('span').addClass(elementClass);
                                            
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'color',
                                                NewVal: newVal
                                            });
                                        });
                                        /*End Dropdown Menu*/
                                        // $('.dropdown<?php echo $prod_i ?>color .dropdown-menu li').click(function() {
                                        //     var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                        //         msg = '<span class="msg">Hidden input value: ';
                                        //     $('.msg').html(msg + input + '</span>');
                                        // });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                            <?php   
                            if (isset($variation_attributes["attribute_pa_size"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'size' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePaSize = $variation_attributes["attribute_pa_size"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Розмір</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>size">
                                        <div class="select">
                                            <?php
                                            $size_attribute = isset($cart_item['variation']['attribute_pa_size']) ? $cart_item['variation']['attribute_pa_size'] : '';

                                            if (!empty($size_attribute)) {
                                                $attribute_name = '';
                                                // Пример получения названия атрибута из таблицы wp_terms
                                                global $wpdb;
                                                $attribute_name = $wpdb->get_var($wpdb->prepare("SELECT name FROM {$wpdb->prefix}terms WHERE slug = %s", $size_attribute));
                                            }
                                            ?>
                                            <strong><?php echo $attribute_name ?></strong>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_size', array( 'fields' => 'all' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    foreach ( $attribute as $term ) {
                                                        echo '<li><strong class="' . $term->slug . '">' . $term->name . '</strong></li>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>size').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>size').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>size .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('strong').attr('class');
                                            var elementValue = $(this).find('strong').html();
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('strong').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('strong').addClass(elementClass);
                                            $(this).parents('.dropdown').children('.select').find('strong').html(elementValue);
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'size',
                                                NewVal: newVal
                                            });
                                        });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                            <?php   
                            if (isset($variation_attributes["attribute_pa_length"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'length' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePalength = $variation_attributes["attribute_pa_length"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Довжина</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>length">
                                        <div class="select">
                                            <?php
                                            $length_attribute = isset($cart_item['variation']['attribute_pa_length']) ? $cart_item['variation']['attribute_pa_length'] : '';

                                            if (!empty($length_attribute)) {
                                                $attribute_name = '';
                                                // Пример получения названия атрибута из таблицы wp_terms
                                                global $wpdb;
                                                $attribute_name = $wpdb->get_var($wpdb->prepare("SELECT name FROM {$wpdb->prefix}terms WHERE slug = %s", $length_attribute));
                                            }
                                            ?>
                                            <strong><?php echo $attribute_name ?></strong>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_length', array( 'fields' => 'all' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    foreach ( $attribute as $term ) {
                                                        echo '<li><strong class="' . $term->slug . '">' . $term->name . '</strong></li>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>length').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>length').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>length .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('strong').attr('class');
                                            var elementValue = $(this).find('strong').html();
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('strong').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('strong').addClass(elementClass);
                                            $(this).parents('.dropdown').children('.select').find('strong').html(elementValue);
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'length',
                                                NewVal: newVal
                                            });
                                        });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                        </div>
                        <div class="quantity">
                            <p class="name">Кількість</p>
                            <div class="input">
                                <div class="btn" onclick="minusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                                <input type="number" value="<?php echo $quantity ;?>" onchange="updateQuantity(this, '<?php echo $cart_item_key; ?>')">
                                <div class="btn" onclick="plusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="c">
                        <p class="head">Ціна</p>
                        <p class="price"><?php echo $product_total_formatted ?> ₴</p>
                        <p class="btn" onclick="delProd(this, '<?php echo $cart_item_key; ?>')">Вилучити</p>
                        <div class="del" onclick="delProd(this, '<?php echo $cart_item_key; ?>')"></div>
                        </div>
                    </div>
                    <div class="box boxquantity">
                        <div class="quantity">
                            <p class="name">Кількість</p>
                            <div class="input">
                                <div class="btn" onclick="minusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                                <input type="number" value="<?php echo $quantity ;?>" onchange="updateQuantity(this, '<?php echo $cart_item_key; ?>')">
                                <div class="btn" onclick="plusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="del small" onclick="delProd(this, '<?php echo $cart_item_key; ?>')"></div>
                </div>
            
                <?php
                $prod_i++;
            }

    

            ?>

        </div>
        <script>
            function plusQuantity(element, cartItemKey) {
//                var parent = element.parentNode;
                var parent = element.parentNode.closest('.line');
                var input1 = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');

                if (input1) {
                    input1.value = parseInt(input1.value) + 1;
                    input2.value = parseInt(input2.value) + 1;
                }
                updateCartSumm(parseInt(input1.value), cartItemKey);
            }

            function minusQuantity(element, cartItemKey) {
//                var parent = element.parentNode;
//                var input = parent.querySelector('input[type="number"]');
                var parent = element.parentNode.closest('.line');
                var input = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');

                if (input) {
                    var value = parseInt(input.value);
                    if (value > 0) {
                        input.value = value - 1;
                        input2.value = value - 1;
                    }
                }
                updateCartSumm(parseInt(input2.value), cartItemKey);
            }
            
            function updateQuantity(element, cartItemKey){
                console.log('updateQuantity');
                var val = element.value;
                
                parent = element.parentNode.closest('.line');
                var input1 = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');
                
                if (val > 0){
                    input1.value = val;
                    console.log(parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]'));
                    input2.value = val;
                    console.log(parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]'));
                }
            }
            
            function updateCartSumm(val, cartItemKey){
                //Ajax отправить в файл
                variationID = '<?php echo $variation_id ?>';
                // $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                //     Product: cartItemKey,
                //     NewVal: val
                // });
                console.log('cartItemKey - '+cartItemKey);
                console.log('val - '+val);
                $.ajax({
                	url: '<?php bloginfo('template_directory') ?>/system_cart_update_quantity.php',
                	type: 'POST',
                	data: {
                        Product: cartItemKey,
                        NewVal: val
                    },
                	success: function(response) {
                		// Успешный запрос
                		console.log(response);
                		cartSumm = Number(response);
                		useBonuses();
                        // document.getElementById('cartSumm').innerHTML = '<span>'+cartSumm+'</span>' + ' ₴ '
                	},
                	error: function(xhr, status, error) {
                		// Ошибка запроса
                		console.log('Ошибка запроса. Статус: ' + status);
                	}
                });
            }
            
            function delProd(element, cartItemKey){
                console.log('delProd');
                console.log(element.parentNode.closest('.line'));
                element.parentNode.closest('.line').remove();
                $.ajax({
                	url: '<?php bloginfo('template_directory') ?>/system_cart_del_prod.php',
                	type: 'POST',
                	data: {
                        Product: cartItemKey
                    },
                	success: function(response) {
                		// Успешный запрос
                		console.log(response);
                		cartSumm = Number(response);
                		useBonuses();
                        // document.getElementById('cartSumm').innerHTML = '<span>'+cartSumm+'</span>' + ' ₴ '
                	},
                	error: function(xhr, status, error) {
                		// Ошибка запроса
                		console.log('Ошибка запроса. Статус: ' + status);
                	}
                });
            }

        </script>
    </div>

    <?php
    if (is_user_logged_in()) {
        // Пользователь авторизован
        $autorize = '';
        $user_id = get_current_user_id();
    } else {
        // Пользователь не авторизован
        $autorize = 'unautorized';
        $user_id = '';
    }
    
    $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);

    ?>
    
    <div class="block-2 <?php echo $autorize ?>">
        <div class="container">
            <div class="links">
                <a href="https://www.bazhane.com/payment-and-delivery/">Оплата і доставка</a>
                <a href="https://www.bazhane.com/return/">Повернення та обмін</a>
                <a href="https://www.bazhane.com/account-bonuses/">Поточних бонусів: <?php echo esc_html( $ywpar_customer->get_total_points() ); ?></a>
            </div>
            <div class="action">
                <p class="bonuses">Ви можете використати: <?php echo esc_html( $ywpar_customer->get_total_points() ); ?>&nbsp;бонусів&nbsp;=&nbsp;<?php echo esc_html( $ywpar_customer->get_total_points() ); ?>&nbsp;₴</p>
                <div class="input" id="inputBonuses-box">
                    <input class="bonus-summ" type="text" placeholder="Ввести бонуси" max="<?php echo esc_html( $ywpar_customer->get_total_points() ); ?>" min="0" id="inputBonuses">
                    <p class="error-text">*Бонусами можна оплатити не більше ніж половину від вартості обраних товарів. Введіть, будь ласка, коректну суму бонусів для списання</p>
                    <script>
                        var maxBonuses = <?php echo esc_html( $ywpar_customer->get_total_points() ); ?>;
                        var inputBonuses = document.getElementById("inputBonuses");
                        inputBonuses.addEventListener("input", function() {
                            document.getElementById('inputBonuses-box').classList.remove('error');
                            console.log('checking');
                            
                            containsSimbols = /\D/.test(inputBonuses.value);
                            if (containsSimbols) {
                                console.log('simbols');
                                console.log(inputBonuses.value);
                                // Если введено не число, очистите поле ввода
                                inputBonuses.value = "";
                            } else {
                                const value = parseInt(inputBonuses.value);
                                if (value < 0) {
                                    console.log('smaller');
                                    // Если введено число меньше 0 или больше maxBonuses, сбросьте значение на границу
                                    inputBonuses.value = '';
                                } else if (value>Math.round(cartSumm/2)){
                                    console.log('bigger');
                                    if (maxBonuses > Math.round(cartSumm/2)){
                                        inputBonuses.value = Math.round(cartSumm/2);
                                    } else {
                                        inputBonuses.value = maxBonuses;
                                    }
                                    document.getElementById('inputBonuses-box').classList.add('error');
                                } else if (value > maxBonuses){
                                    console.log('bigger');
                                    inputBonuses.value = maxBonuses;
                                    document.getElementById('inputBonuses-box').classList.add('error');
                                } 
                            }
                        });

                    </script>
                </div>
                <div class="btn" onclick="useBonuses()" id="useBonusesBtn">Використати<br> бонуси</div>
                <script>
                    var usedBonuses = 0;
                    <?php
                        // Получаем текущую корзину
                        $cart = WC()->cart;
                        
                        // Пересчитываем сумму и другие значения корзины
                        WC()->cart->calculate_totals();
                        
                        // Выводим обновленную сумму товаров в корзине
                        $total = $woocommerce->cart->total; // Получаем общую сумму корзины
                        $numeric_total = floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки
                        $number_space = number_format($numeric_total, 0, '', ' ');
                    ?>
                    var cartSumm = <?php echo $numeric_total ?>;
                    function useBonuses(){
                        var summ = cartSumm;
                        var bonuses = parseInt(document.getElementById("inputBonuses").value);
                        console.log(bonuses);
                        if (document.getElementById("inputBonuses").value != ''){
                            console.log('1');
                            var newSumm = summ - bonuses;
                            numberString = newSumm.toString();
                            formattedString = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                            var formattedNumber = cartSumm.toLocaleString();
                            document.getElementById('cartSumm').innerHTML = '<span>'+formattedNumber+' ₴ </span>' + formattedString + ' ₴ ';
                            
                            document.getElementById('useBonusesBtn').classList.add('used');
                            document.getElementById('useBonusesBtn').removeAttribute('onclick');
                            usedBonuses = bonuses;
                        } else {
                            console.log('2');
                            var formattedNumber = cartSumm.toLocaleString();
                            document.getElementById('cartSumm').innerHTML = formattedNumber+' ₴';
                        }
                        
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="block-2 result <?php echo $autorize ?>">
        <div class="container">
            <div class="registration">
                <p>Зареєструйтесь та отримайте знижку&nbsp;10%</p>
                <a href="https://www.bazhane.com/login/" class="btn">Увійти /
                    <br> Зареєструватись</a>
            </div>
            <div class="action">
                <div class="price">
                    <p class="head">Загальна вартість:</p>
                    <p class="summ" id="cartSumm"><?php echo $number_space ?> ₴</p>
                </div>
                <div class="btn" onclick="nextStep()">Перейти до
                    <br> оформлення</div>
            </div>
        </div>
    </div>
    <script>
        
        function nextStep(){
            setCookie('bazahne_use_bonuses', usedBonuses, 90);
            console.log('usedBonuses - '+usedBonuses);
            window.location = "<?php echo get_home_url() ?>/checkout/";
        }
        
        
        function setCookie(name, value, days){
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            var expires = "; expires=" + date.toGMTString();
            document.cookie = name + "=" + value + expires + ";path=/";
        }
    </script>


    <div class="block-3 product-list">
        <div class="container">
            <div class="line1">
                <h2>Доповніть образ</h2>
            </div>
            <div class="line2 swiper mySwiperL2">
    
                <div class="swiper-wrapper">
    
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Блуза</p>
                                <h4>TestProd</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original-product-id="8055" data-title="">
                            </div>
                            <div class="colors">
                                <span class="bila"></span>
                                <span class="grafit"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                        </div>
                        <div class="l3">
                            <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Брюки</p>
                                <h4>Брюки прямого крою зі стрілками чорний 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7755&#038;_wpnonce=e67ba19b08'" data-product-id="7755" data-product-type="variable" data-original-product-id="7755" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7755/'">
                        </div>
                        <div class="l3">
                            <p class="price">3200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7755/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Жакет</p>
                                <h4>Жакет кроп з акцентним плечем льон чорний 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7758&#038;_wpnonce=e67ba19b08'" data-product-id="7758" data-product-type="variable" data-original-product-id="7758" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7758/'">
                        </div>
                        <div class="l3">
                            <p class="price">4900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7758/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Сукня</p>
                                <h4>Сукня міді з рукавами буфами та розрізом чорний 52% район, 48% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7759&#038;_wpnonce=e67ba19b08'" data-product-id="7759" data-product-type="variable" data-original-product-id="7759" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7759/'">
                        </div>
                        <div class="l3">
                            <p class="price">5300<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7759/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Сорочка</p>
                                <h4>Сорочка з супатною застібкою з об&#8217;ємними рукавами жовтий 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7698&#038;_wpnonce=e67ba19b08'" data-product-id="7698" data-product-type="variable" data-original-product-id="7698" data-title="">
                            </div>
                            <div class="colors">
                                <span class="zhovtyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7698/'">
                        </div>
                        <div class="l3">
                            <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7698/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Брюки</p>
                                <h4>Брюки лляні вільного крою жовтий 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7699&#038;_wpnonce=e67ba19b08'" data-product-id="7699" data-product-type="variable" data-original-product-id="7699" data-title="">
                            </div>
                            <div class="colors">
                                <span class="zhovtyj"></span>
                                <span class="temno-synij"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7699/'">
                        </div>
                        <div class="l3">
                            <p class="price">2200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7699/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Блуза</p>
                                <h4>Блуза з глибоким вирізом, приталена молочний 70% котон, 30% еластан</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7695&#038;_wpnonce=e67ba19b08'" data-product-id="7695" data-product-type="variable" data-original-product-id="7695" data-title="">
                            </div>
                            <div class="colors">
                                <span class="molochnyj"></span>
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7695/'">
                        </div>
                        <div class="l3">
                            <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7695/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Пальто</p>
                                <h4>Пальто халат двобортне зi складкою, 386 чорний 75% вовна, 10% альпака, 5% шовк, 10% сумішеві волокна</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7501&#038;_wpnonce=e67ba19b08'" data-product-id="7501" data-product-type="variable" data-original-product-id="7501" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7501/'">
                        </div>
                        <div class="l3">
                            <p class="price">12800<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7501/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
    
    
                </div>
                <div class="swiper-pagination-box">
                    <span class="btn custom-button-prev-l2">Назад</span>
                    <div class="swiper-pagination-l2"></div>
                    <span class="btn custom-button-next-l2">Далі</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Initialize Swiper -->
    <script>
        var swiperL2 = new Swiper(".mySwiperL2", {
            //                slidesPerView: 4,
            //                spaceBetween: 33,
            pagination: {
                el: ".swiper-pagination-l2",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            navigation: {
                nextEl: ".custom-button-next-l2",
                prevEl: ".custom-button-prev-l2",
            },
    
            // Default parameters
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 20,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                //                    320: {
                //                        slidesPerView: 2,
                //                        spaceBetween: 20
                //                    },
                // when window width is >= 480px
                660: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1439: {
                    slidesPerView: 4,
                    spaceBetween: 33
                }
            }
        });
    
    </script>

<?php
} elseif ( $current_language === 'en' ) { 
?>

    <div class="block-1">
        <div class="container">
            
            <?php
            
            // Получаем объект корзины
            $woocommerce = WC();
            
            // Получаем текущую корзину
            $cart = WC()->cart;
            
            // Проходимся по товарам в корзине
            $prod_i = 0;
            foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
                // Получаем данные товара
                // Получаем данные товара
                $product_id      = $cart_item['product_id'];
                $variation_id    = $cart_item['variation_id'];
                $product         = $cart_item['data'];
                $product_name    = $product->get_name();
                $product_sku     = $product->get_sku();
                $quantity        = $cart_item['quantity'];
                $price           = $product->get_price();
                $product_total_formatted = number_format($price, 0, '', ' '); // Форматируем сумму товара
                $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                $color_attribute = isset( $cart_item['variation']['attribute_pa_color'] ) ? $cart_item['variation']['attribute_pa_color'] : '';
                $size_attribute = isset( $cart_item['variation']['attribute_pa_size'] ) ? $cart_item['variation']['attribute_pa_size'] : '';
                $category        = '';
            
                // Получаем категорию товара
                $terms = get_the_terms( $product_id, 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    $category = $terms[0]->name;
                }
                $variation_data = wc_get_product($variation_id);

                if (is_a($variation_data, 'WC_Product_Variable') || is_a($variation_data, 'WC_Product_Variation')) {
                    $variation_attributes = $variation_data->get_variation_attributes();
                } else {
                    // Обработка ошибки или выполнение альтернативной логики
                }

                ?>
            
                <div class="line">
                    <div class="box">
                        <div class="img" style="background: url(<?php echo $product_image_url; ?>) center center no-repeat; background-size: contain;"></div>
                        <div class="info">
                            <p class="name"><?php echo $category; ?></p>
                            <p class="desc"><?php echo $product_name ?></p>
                            <p class="art">Арт. <?php echo $product_sku; ?></p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="properties">
                            <?php   
                            if (isset($variation_attributes["attribute_pa_size"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'size' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePaColor = $variation_attributes["attribute_pa_color"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Color</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>color color">
                                        <div class="select">
                                            <span class="<?php echo $color_attribute; ?>"></span>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_color', array( 'fields' => 'slugs' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    $j=0;
                                                    foreach ( $attribute as $color_slug ) {
                                                        echo '<li id="color'.$j.'"><span class="'.$color_slug.'"></span></li>';
                                                        $j++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>color').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>color').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>color .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('span').attr('class');
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('span').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('span').addClass(elementClass);
                                            
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'color',
                                                NewVal: newVal
                                            });
                                        });
                                        /*End Dropdown Menu*/
                                        // $('.dropdown<?php echo $prod_i ?>color .dropdown-menu li').click(function() {
                                        //     var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                        //         msg = '<span class="msg">Hidden input value: ';
                                        //     $('.msg').html(msg + input + '</span>');
                                        // });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                            <?php   
                            if (isset($variation_attributes["attribute_pa_size"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'size' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePaSize = $variation_attributes["attribute_pa_size"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Size</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>size">
                                        <div class="select">
                                            <?php
                                            $size_attribute = isset($cart_item['variation']['attribute_pa_size']) ? $cart_item['variation']['attribute_pa_size'] : '';

                                            if (!empty($size_attribute)) {
                                                $attribute_name = '';
                                                // Пример получения названия атрибута из таблицы wp_terms
                                                global $wpdb;
                                                $attribute_name = $wpdb->get_var($wpdb->prepare("SELECT name FROM {$wpdb->prefix}terms WHERE slug = %s", $size_attribute));
                                            }
                                            ?>
                                            <strong><?php echo $attribute_name ?></strong>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_size', array( 'fields' => 'all' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    foreach ( $attribute as $term ) {
                                                        echo '<li><strong class="' . $term->slug . '">' . $term->name . '</strong></li>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>size').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>size').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>size .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('strong').attr('class');
                                            var elementValue = $(this).find('strong').html();
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('strong').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('strong').addClass(elementClass);
                                            $(this).parents('.dropdown').children('.select').find('strong').html(elementValue);
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'size',
                                                NewVal: newVal
                                            });
                                        });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                            <?php   
                            if (isset($variation_attributes["attribute_pa_length"])) {
                                $attributes = array(
                                    'color' => 'Колір',
                                    'length' => 'Розмір',
                                    'length' => 'Довжина',
                                );
                                $parts = explode('_', $attribute_name);
                                $lastElement = end($parts);
                                $attribute_name_new = $attributes[$lastElement];
                                $attributePalength = $variation_attributes["attribute_pa_length"];
                                
                                ?>
                                <div class="box">
                                    <p class="name">Length</p>
                                    <div class="dropdown dropdown<?php echo $prod_i ?>length">
                                        <div class="select">
                                            <?php
                                            $length_attribute = isset($cart_item['variation']['attribute_pa_length']) ? $cart_item['variation']['attribute_pa_length'] : '';

                                            if (!empty($length_attribute)) {
                                                $attribute_name = '';
                                                // Пример получения названия атрибута из таблицы wp_terms
                                                global $wpdb;
                                                $attribute_name = $wpdb->get_var($wpdb->prepare("SELECT name FROM {$wpdb->prefix}terms WHERE slug = %s", $length_attribute));
                                            }
                                            ?>
                                            <strong><?php echo $attribute_name ?></strong>
                                            <i class="fa fa-chevron-left"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Получаем данные родительского атрибута цвета
                                            $parent_id = $product->get_parent_id();
                                            if ( $parent_id ) {
                                                $attribute = wc_get_product_terms( $parent_id, 'pa_length', array( 'fields' => 'all' ) );
                                                if ( ! empty( $attribute ) ) {
                                                    foreach ( $attribute as $term ) {
                                                        echo '<li><strong class="' . $term->slug . '">' . $term->name . '</strong></li>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <script>
                                        /*Dropdown Menu*/
                                        $('.dropdown<?php echo $prod_i ?>length').click(function() {
                                            $(this).attr('tabindex', 1).focus();
                                            $(this).toggleClass('active');
                                            $(this).find('.dropdown-menu').slideToggle(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>length').focusout(function() {
                                            $(this).removeClass('active');
                                            $(this).find('.dropdown-menu').slideUp(300);
                                        });
                                        $('.dropdown<?php echo $prod_i ?>length .dropdown-menu li').click(function() {
                                            var elementClass = $(this).find('strong').attr('class');
                                            var elementValue = $(this).find('strong').html();
                                            console.log(elementClass);
            
                                            // Удаление класса у элемента
                                            $(this).parents('.dropdown').children('.select').find('strong').removeClass();
                                            $(this).parents('.dropdown').children('.select').find('strong').addClass(elementClass);
                                            $(this).parents('.dropdown').children('.select').find('strong').html(elementValue);
                                            
                                            //Ajax отправить в файл
                                            variationID = '<?php echo $variation_id ?>';
                                            newVal = elementClass;
                                            $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                                                Product: '<?php echo $cart_item_key; ?>',
                                                Attribute: 'length',
                                                NewVal: newVal
                                            });
                                        });
            
                                    </script>
                                </div>
                                <?php
                                
                            }
                            ?>
                        </div>
                        <div class="quantity">
                             <p class="name">Quantity</p>
                             <div class="input">
                                 <div class="btn" onclick="minusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                                 <input type="number" value="<?php echo $quantity ;?>" onchange="updateQuantity(this, '<?php echo $cart_item_key; ?>')">
                                 <div class="btn" onclick="plusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                             </div>
                         </div>
                     </div>
                     <div class="box">
                         <div class="c">
                         <p class="head">Price</p>
                         <p class="price"><?php echo $product_total_formatted ?>₴</p>
                         <p class="btn" onclick="delProd(this, '<?php echo $cart_item_key; ?>')">Remove</p>
                         <div class="del" onclick="delProd(this, '<?php echo $cart_item_key; ?>')"></div>
                         </div>
                     </div>
                     <div class="box boxquantity">
                         <div class="quantity">
                             <p class="name">Quantity</p>
                            <div class="input">
                                <div class="btn" onclick="minusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                                <input type="number" value="<?php echo $quantity ;?>" onchange="updateQuantity(this, '<?php echo $cart_item_key; ?>')">
                                <div class="btn" onclick="plusQuantity(this, '<?php echo $cart_item_key; ?>')"><span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="del small" onclick="delProd(this, '<?php echo $cart_item_key; ?>')"></div>
                </div>
            
                <?php
                $prod_i++;
            }

    

            ?>

        </div>
        <script>
            function plusQuantity(element, cartItemKey) {
//                var parent = element.parentNode;
                var parent = element.parentNode.closest('.line');
                var input1 = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');

                if (input1) {
                    input1.value = parseInt(input1.value) + 1;
                    input2.value = parseInt(input2.value) + 1;
                }
                updateCartSumm(parseInt(input1.value), cartItemKey);
            }

            function minusQuantity(element, cartItemKey) {
//                var parent = element.parentNode;
//                var input = parent.querySelector('input[type="number"]');
                var parent = element.parentNode.closest('.line');
                var input = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');

                if (input) {
                    var value = parseInt(input.value);
                    if (value > 0) {
                        input.value = value - 1;
                        input2.value = value - 1;
                    }
                }
                updateCartSumm(parseInt(input2.value), cartItemKey);
            }
            
            function updateQuantity(element, cartItemKey){
                console.log('updateQuantity');
                var val = element.value;
                
                parent = element.parentNode.closest('.line');
                var input1 = parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]');
                var input2 = parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]');
                
                if (val > 0){
                    input1.value = val;
                    console.log(parent.querySelectorAll('.quantity')[0].querySelector('input[type="number"]'));
                    input2.value = val;
                    console.log(parent.querySelectorAll('.quantity')[1].querySelector('input[type="number"]'));
                }
            }
            
            function updateCartSumm(val, cartItemKey){
                //Ajax отправить в файл
                variationID = '<?php echo $variation_id ?>';
                // $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_cart_change_attr.php', {
                //     Product: cartItemKey,
                //     NewVal: val
                // });
                console.log('cartItemKey - '+cartItemKey);
                console.log('val - '+val);
                $.ajax({
                    url: '<?php bloginfo('template_directory') ?>/system_cart_update_quantity.php',
                    type: 'POST',
                    data: {
                        Product: cartItemKey,
                        NewVal: val
                    },
                    success: function(response) {
                        // Успешный запрос
                        console.log(response);
                        cartSumm = Number(response);
                        useBonuses();
                        // document.getElementById('cartSumm').innerHTML = '<span>'+cartSumm+'</span>' + ' ₴ '
                    },
                    error: function(xhr, status, error) {
                        // Ошибка запроса
                        console.log('Ошибка запроса. Статус: ' + status);
                    }
                });
            }
            
            function delProd(element, cartItemKey){
                console.log('delProd');
                console.log(element.parentNode.closest('.line'));
                element.parentNode.closest('.line').remove();
                $.ajax({
                    url: '<?php bloginfo('template_directory') ?>/system_cart_del_prod.php',
                    type: 'POST',
                    data: {
                        Product: cartItemKey
                    },
                    success: function(response) {
                        // Успешный запрос
                        console.log(response);
                        cartSumm = Number(response);
                        useBonuses();
                        // document.getElementById('cartSumm').innerHTML = '<span>'+cartSumm+'</span>' + ' ₴ '
                    },
                    error: function(xhr, status, error) {
                        // Ошибка запроса
                        console.log('Ошибка запроса. Статус: ' + status);
                    }
                });
            }

        </script>
    </div>

    <?php
    if (is_user_logged_in()) {
        // Пользователь авторизован
        $autorize = '';
        $user_id = get_current_user_id();
    } else {
        // Пользователь не авторизован
        $autorize = 'unautorized';
        $user_id = '';
    }
    
    $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);

    ?>
    
    <div class="block-2 <?php echo $authorize ?>">
         <div class="container">
             <div class="links">
                 <a href="https://www.bazhane.com/payment-and-delivery/">Payment and delivery</a>
                 <a href="https://www.bazhane.com/return/">Returns and Exchanges</a>
                 <a href="https://www.bazhane.com/account-bonuses/">Current bonuses: <?php echo esc_html( $ywpar_customer->get_total_points() ); ?></a>
             </div>
             <div class="action">
                 <p class="bonuses">You can use: <?php echo esc_html( $ywpar_customer->get_total_points() ); ?>&nbsp;bonuses&nbsp;=&nbsp;<?php echo esc_html( $ywpar_customer->get_total_points() ); ?>&nbsp;₴</p>
                 <div class="input" id="inputBonuses-box">
                     <input class="bonus-summ" type="text" placeholder="Enter bonuses" max="<?php echo esc_html( $ywpar_customer->get_total_points() ); ?>" min="0" id="inputBonuses">
                     <p class="error-text">*Bonuses can be used to pay no more than half of the cost of the selected goods. Please enter the correct amount of bonuses to write off</p>
                     <script>
                        var maxBonuses = <?php echo esc_html( $ywpar_customer->get_total_points() ); ?>;
                        var inputBonuses = document.getElementById("inputBonuses");
                        inputBonuses.addEventListener("input", function() {
                            document.getElementById('inputBonuses-box').classList.remove('error');
                            console.log('checking');
                            
                            containsSimbols = /\D/.test(inputBonuses.value);
                            if (containsSimbols) {
                                console.log('simbols');
                                console.log(inputBonuses.value);
                                // Если введено не число, очистите поле ввода
                                inputBonuses.value = "";
                            } else {
                                const value = parseInt(inputBonuses.value);
                                if (value < 0) {
                                    console.log('smaller');
                                    // Если введено число меньше 0 или больше maxBonuses, сбросьте значение на границу
                                    inputBonuses.value = '';
                                } else if (value>Math.round(cartSumm/2)){
                                    console.log('bigger');
                                    if (maxBonuses > Math.round(cartSumm/2)){
                                        inputBonuses.value = Math.round(cartSumm/2);
                                    } else {
                                        inputBonuses.value = maxBonuses;
                                    }
                                    document.getElementById('inputBonuses-box').classList.add('error');
                                } else if (value > maxBonuses){
                                    console.log('bigger');
                                    inputBonuses.value = maxBonuses;
                                    document.getElementById('inputBonuses-box').classList.add('error');
                                } 
                            }
                        });

                    </script>
                </div>
                <div class="btn" onclick="useBonuses()" id="useBonusesBtn">Використати<br> бонуси</div>
                <script>
                    var usedBonuses = 0;
                    <?php
                        // Получаем текущую корзину
                        $cart = WC()->cart;
                        
                        // Пересчитываем сумму и другие значения корзины
                        WC()->cart->calculate_totals();
                        
                        // Выводим обновленную сумму товаров в корзине
                        $total = $woocommerce->cart->total; // Получаем общую сумму корзины
                        $numeric_total = floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки
                        $number_space = number_format($numeric_total, 0, '', ' ');
                    ?>
                    var cartSumm = <?php echo $numeric_total ?>;
                    function useBonuses(){
                        var summ = cartSumm;
                        var bonuses = parseInt(document.getElementById("inputBonuses").value);
                        console.log(bonuses);
                        if (document.getElementById("inputBonuses").value != ''){
                            console.log('1');
                            var newSumm = summ - bonuses;
                            numberString = newSumm.toString();
                            formattedString = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                            var formattedNumber = cartSumm.toLocaleString();
                            document.getElementById('cartSumm').innerHTML = '<span>'+formattedNumber+' ₴ </span>' + formattedString + ' ₴ ';
                            
                            document.getElementById('useBonusesBtn').classList.add('used');
                            document.getElementById('useBonusesBtn').removeAttribute('onclick');
                            usedBonuses = bonuses;
                        } else {
                            console.log('2');
                            var formattedNumber = cartSumm.toLocaleString();
                            document.getElementById('cartSumm').innerHTML = formattedNumber+' ₴';
                        }
                        
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="block-2 result <?php echo $authorize ?>">
         <div class="container">
             <div class="registration">
                 <p>Sign up and get a&nbsp;10% discount</p>
                 <a href="https://www.bazhane.com/login/" class="btn">Login /
                     <br> Register</a>
             </div>
             <div class="action">
                 <div class="price">
                     <p class="head">Total cost:</p>
                     <p class="summ" id="cartSumm"><?php echo $number_space ?>₴</p>
                 </div>
                 <div class="btn" onclick="nextStep()">Go to
                     <br> order</div>
            </div>
        </div>
    </div>
    <script>
        
        function nextStep(){
            setCookie('bazahne_use_bonuses', usedBonuses, 90);
            console.log('usedBonuses - '+usedBonuses);
            window.location = "<?php echo get_home_url() ?>/checkout/";
        }
        
        
        function setCookie(name, value, days){
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            var expires = "; expires=" + date.toGMTString();
            document.cookie = name + "=" + value + expires + ";path=/";
        }
    </script>


    <div class="block-3 product-list">
        <div class="container">
            <div class="line1">
                <h2>Complete the image</h2>
            </div>
            <div class="line2 swiper mySwiperL2">
    
                <div class="swiper-wrapper">
    
    
                    <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Blouse</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="was"></span>
                                 <span class="graphite"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Pants</p>
                                 <h4>Pants straight cut with arrows black 100% linen</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7755&#038;_wpnonce=e67ba19b08'" data-product-id="7755" data-product-type="variable" data-original -product-id="7755" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="chornyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7755/'">
                         </div>
                         <div class="l3">
                             <p class="price">3200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7755/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                    <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Jacket</p>
                                 <h4>Crop jacket with accent shoulder linen black 100% linen</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7758&#038;_wpnonce=e67ba19b08'" data-product-id="7758" data-product-type="variable" data-original -product-id="7758" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="chornyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7758/'">
                         </div>
                         <div class="l3">
                             <p class="price">4900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7758/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Dress</p>
                                 <h4>Midi dress with puff sleeves and slit black 52% rayon, 48% linen</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7759&#038;_wpnonce=e67ba19b08'" data-product-id="7759" data-product-type="variable" data-original -product-id="7759" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="chornyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7759/'">
                         </div>
                         <div class="l3">
                             <p class="price">5300<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7759/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                    <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Shirt</p>
                                 <h4>Yellow 100% linen button-down shirt with voluminous sleeves</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7698&#038;_wpnonce=e67ba19b08'" data-product-id="7698" data-product-type="variable" data-original -product-id="7698" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="zhovtyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7698/'">
                         </div>
                         <div class="l3">
                             <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7698/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Pants</p>
                                 <h4>Linen pants with a free cut, yellow 100% linen</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7699&#038;_wpnonce=e67ba19b08'" data-product-id="7699" data-product-type="variable" data-original -product-id="7699" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="zhovtyj"></span>
                                 <span class="temno-synij"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7699/'">
                         </div>
                         <div class="l3">
                             <p class="price">2200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7699/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                    <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Blouse</p>
                                 <h4>Blouse with a deep neckline, fitted milk 70% cotton, 30% elastane</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7695&#038;_wpnonce=e67ba19b08'" data-product-id="7695" data-product-type="variable" data-original -product-id="7695" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="molochnyj"></span>
                                 <span class="chornyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7695/'">
                         </div>
                         <div class="l3">
                             <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7695/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type"> Coat</p>
                                 <h4>Double-breasted robe coat with folds, 386 black 75% wool, 10% alpaca, 5% silk, 10% mixed fibers</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=7501&#038;_wpnonce=e67ba19b08'" data-product-id="7501" data-product-type="variable" data-original -product-id="7501" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="chornyj"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane .com/shop/7501/'">
                         </div>
                         <div class="l3">
                             <p class="price">12800<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/shop/7501/">More details</a>
                                 <span></span>
                             </div>
                         </div>
    
    
                     </div>
    
    
    
                </div>
                <div class="swiper-pagination-box">
                     <span class="btn custom-button-prev-l2">Back</span>
                     <div class="swiper-pagination-l2"></div>
                     <span class="btn custom-button-next-l2">Next</span>
                 </div>
            </div>
        </div>
    </div>
    
    <!-- Initialize Swiper -->
    <script>
        var swiperL2 = new Swiper(".mySwiperL2", {
            //                slidesPerView: 4,
            //                spaceBetween: 33,
            pagination: {
                el: ".swiper-pagination-l2",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            navigation: {
                nextEl: ".custom-button-next-l2",
                prevEl: ".custom-button-prev-l2",
            },
    
            // Default parameters
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 20,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                //                    320: {
                //                        slidesPerView: 2,
                //                        spaceBetween: 20
                //                    },
                // when window width is >= 480px
                660: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1439: {
                    slidesPerView: 4,
                    spaceBetween: 33
                }
            }
        });
    
    </script>

<?php
}
?> 

    <?php include 'custom-footer.php' ?>

</body>

</html>
