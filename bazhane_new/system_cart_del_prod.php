<?php

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Получаем объект корзины
$woocommerce = WC();


// Получаем текущую корзину
$cart = WC()->cart;

// Удаляем товар из корзины по ключу
$cart_item_key = $_POST['Product'];
WC()->cart->remove_cart_item($cart_item_key);

// Пересчитываем сумму и другие значения корзины
WC()->cart->calculate_totals();

// Выводим обновленную сумму товаров в корзине
$total = $woocommerce->cart->total; // Получаем общую сумму корзины
$numeric_total = floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки

echo $numeric_total; // Выводим только числовое значение суммы корзины

?>