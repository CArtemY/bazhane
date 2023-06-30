<?php

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Получаем объект корзины
$woocommerce = WC();


// Получаем текущую корзину
$cart = WC()->cart;

// Ключ товара, который нужно изменить
$cart_item_key_to_update = $_POST['Product'];

// Новое значение цвета
$new_color = $_POST['NewVal'];
$attr = 'attribute_pa_'.$_POST['Attribute'];

// Получаем товар по ключу в корзине
$cart_item = $cart->get_cart_item( $cart_item_key_to_update );

echo 'On';
// Проверяем, что товар найден
if ( $cart_item ) {
    echo 'Start';
    // Проверяем, что это вариативный товар с двумя атрибутами (цвет и размер)
    // Заменяем значение цвета на новое значение
    echo '<br>'.$cart_item['variation'][$attr];
    $cart_item['variation'][$attr] = $new_color;
    echo '<br>'.$cart_item['variation'][$attr];
    // Обновляем товар в корзине
    $cart->cart_contents[ $cart_item_key_to_update ] = $cart_item;
    $cart->set_session();
}

?>