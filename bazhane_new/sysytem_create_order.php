<?php
// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
require_once('../../../wp-content/plugins/woocommerce/woocommerce.php' );

$Name = $_POST['Name'];
$Email = $_POST['Mail'];

$deliveryAdress = $_POST['deliveryAdress'];
$deliveryPayment = $_POST['deliveryPayment'];
$deliveryUser = $_POST['deliveryUser'];







// // Создание нового заказа
// $order = wc_create_order();

// // Получение содержимого корзины
// $cart = WC()->cart;
// $cartItems = $cart->get_cart();

// // Добавление товаров из корзины в заказ
// foreach ($cartItems as $cartItemKey => $cartItem) {
//     $product = $cartItem['data'];
//     $product_id = $product->get_id();
//     $quantity = $cartItem['quantity'];

//     $order->add_product($product, $quantity);
// }

// // Установка данных пользователя и адреса доставки
// $user_id = get_current_user_id(); // Получение ID текущего пользователя
// $user = get_user_by('ID', $user_id);

// $order->set_billing_first_name($user->first_name);

// // Установка статуса "Выполнено"
// $order->update_status('completed');

// // Сохранение заказа
// $order->save();







// echo '1';




foreach ([$Name, $Email] as $value) {
    if ($value) {
        
        // Проверяем, авторизован ли пользователь
        if ( is_user_logged_in() ) {
            // Получаем объект текущего пользователя
            $current_user = wp_get_current_user();
            
            // Получаем ID текущего пользователя
            $user_id = $current_user->ID;
            
        }
        $user_id = get_current_user_id();
        echo $user_id;
        
      
        
        // Получаем ID текущего пользователя
        // $user_id = get_current_user_id();
        
        // Создаем новый заказ
        $order = wc_create_order();
        
        // Получение содержимого корзины
        $cart = WC()->cart;
        $cartItems = $cart->get_cart();
        
        // Добавление товаров из корзины в заказ
        foreach ($cartItems as $cartItemKey => $cartItem) {
            $product = $cartItem['data'];
            $product_id = $product->get_id();
            $quantity = $cartItem['quantity'];
        
            $order->add_product($product, $quantity);
        }
        
        // Выводим обновленную сумму товаров в корзине
        $total = $woocommerce->cart->total; // Получаем общую сумму корзины
        
        if (isset($_COOKIE['bazahne_use_bonuses'])) {
            $cookieValue = $_COOKIE['bazahne_use_bonuses'];
            $bonusesUse = (int)$cookieValue;

            //Списание
            $action = 'earn';  
            $order_id = $order->get_id();

            $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);
            if ($ywpar_customer) {
                // Получение текущего общего количества баллов пользователя
                $current_points = $ywpar_customer->get_total_points();

                // Проверка, достаточно ли баллов для списания
                $points_to_redeem = $bonusesUse; // Замените на фактическое количество баллов для списания
                if ($current_points >= $points_to_redeem) {
                    // Обновление баллов пользователя (списание)
                    $args = array(
                        'order_id' => $order_id,
                    );
                    $ywpar_customer->update_points(-$points_to_redeem, $action, $args);
                } else {
                   
                    echo 'Недостаточно баллов для списания.';
                }
            }
        } else {
            $bonusesUse = 0;
        }
        // // Добавление суммы скидки к заказу
        // $order->set_discount_total($bonusesUse);
        // // Обновление общей суммы заказа
        // $order->calculate_totals();
        // $user_id = get_current_user_id(); // Получение ID текущего пользователя
        
     
     
     
     
     
     
     
     
     
    // //Добовление баллов 
    // $points = 1000; // Замените на фактическое количество баллов
    // $action = 'earn'; // Действие, которое приводит к заработку баллов
    // $order_id = $order->get_id();

    // $point_customer = ywpar_get_customer($user_id);
    // if ($point_customer) {
    //     $args = array(
    //         'order_id' => $order_id,
    //     );

    //     $point_customer->update_points(-$points, $action, $args);
    // }
 
 
    // //Списание
    // $action = 'earn';  
    // $order_id = $order->get_id();

    // $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);
    // if ($ywpar_customer) {
    //     // Получение текущего общего количества баллов пользователя
    //     $current_points = $ywpar_customer->get_total_points();

    //     // Проверка, достаточно ли баллов для списания
    //     $points_to_redeem = 5000; // Замените на фактическое количество баллов для списания
    //     if ($current_points >= $points_to_redeem) {
    //         // Обновление баллов пользователя (списание)
    //         $args = array(
    //             'order_id' => $order_id,
    //         );
    //         $ywpar_customer->update_points(-$points_to_redeem, $action, $args);
    //     } else {
           
    //         echo 'Недостаточно баллов для списания.';
    //     }
    // }




            //Сичтаем уровень пользователя для определения процента бонусов
            $year = date('Y'); // Get the current year
            $args = array(
                'post_type'      => 'shop_order',
                'post_status'    => 'wc-completed',
                'posts_per_page' => -1,
                'meta_query'     => array(
                    array(
                        'key'     => '_customer_user',
                        'value'   => $user_id,
                        'compare' => '='
                    ),
                    array(
                        'key'     => '_completed_date',
                        'value'   => array($year . '-01-01', $year . '-12-31'),
                        'compare' => 'BETWEEN',
                        'type'    => 'DATE'
                    )
                )
            );
            $query = new WP_Query($args);
            $total_spent = 0;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $order = wc_get_order(get_the_ID());
                    $total_spent += $order->get_total();
                }
            }
            wp_reset_postdata();
            $a = intval($total_spent);
            // Заданные значения
            $value1 = 0;
            $value2 = 35000;
            $value3 = 60000;
            $value4 = 120000;
            $value5 = 180000;
            $value6 = 240000;
            $values16 = [0, 35000, 60000, 120000, 180000, 240000];
            // Проверка между какими значениями находится число a
            if ($a >= $value1 && $a < $value2) {
                // echo "Число a находится между $value1 и $value2";
                $user_level = 1;
            } elseif ($a >= $value2 && $a < $value3) {
                // echo "Число a находится между $value2 и $value3";
                $user_level = 2;
            } elseif ($a >= $value3 && $a < $value4) {
                // echo "Число a находится между $value3 и $value4";
                $user_level = 3;
            } elseif ($a >= $value4 && $a < $value5) {
                // echo "Число a находится между $value4 и $value5";
                $user_level = 4;
            } elseif ($a >= $value5 && $a < $value6) {
                // echo "Число a находится между $value5 и $value6";
                $user_level = 5;
            } elseif ($a >= $value6) {
                // echo "Число a находится между $value5 и $value6";
                $user_level = 6;
            } else {
                // echo "Число a не находится между заданными значениями";
            }
            
            $user_levels = ['', 3, 5, 7, 10, 12, 15];
            
            // echo $user_level;

        $newBonuses = round($total * $user_levels[$user_level] / 100);
        echo '$newBonuses - '.$newBonuses;
        //Добовление баллов 
        $points = $newBonuses; // Замените на фактическое количество баллов
        $action = 'earn'; // Действие, которое приводит к заработку баллов
        $order_id = $order->get_id();

        $point_customer = ywpar_get_customer($user_id);
        if ($point_customer) {
            $args = array(
                'order_id' => $order_id,
            );

            $point_customer->update_points($points, $action, $args);
        }
     

        // Добавление суммы скидки к заказу
        $order->set_discount_total($bonusesUse);
        // Обновление общей суммы заказа
        $order->calculate_totals();
        $user_id = get_current_user_id(); // Получение ID текущего пользователя


        // $bonusesToAdd = round($total*$user_levels[$user_level]/100);
        // $result = $ywpar_customer->add_points($bonusesToAdd);
        
        // Устанавливаем данные покупателя
        $order->set_customer_id( $user_id );
        $order->set_billing_first_name($deliveryUser);
        $order->set_billing_address_1($deliveryAdress);
        $order->set_billing_city($deliveryPayment);
        
        // Установка статуса "Выполнено"
        $order->update_status('completed');
        
        // Сохраняем заказ
        $order->save();
        
        die;
        

    }
}
?>