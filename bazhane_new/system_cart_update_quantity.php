<?php

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Получаем объект корзины
$woocommerce = WC();


// Получаем текущую корзину
$cart = WC()->cart;

// Ключ товара, который нужно изменить
$cart_item_key = $_POST['Product'];

// Новое значение кол-ва
$new_quantity = $_POST['NewVal'];

// Обновляем количество товара в корзине
WC()->cart->set_quantity( $cart_item_key, $new_quantity );
WC()->cart->calculate_totals(); // Пересчитываем сумму и другие значения корзины

// Выводим общую сумму корзины
$total = $woocommerce->cart->total; // Получаем общую сумму корзины
$numeric_total = floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки

echo $numeric_total; // Выводим только числовое значение суммы корзины
// $product_total_formatted = number_format($total, 0, '', ' '); // Форматируем сумму товара
// echo $product_total_formatted;

?>