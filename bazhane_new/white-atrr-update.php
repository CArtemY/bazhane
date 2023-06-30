<?php
 

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
// Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Проверить, есть ли товары в списке желаний
    if ( empty( $wishlist_items ) ) {
        return 'В данном списке желаний нет товаров.';
    }
    
    

// Формирование и отправка ответа
$response = array(
    'success' => true,
    'wishlist' => $wishlist_items // Возвращаем обновленный список избранных товаров
);
echo json_encode($response);*/
/*
// Получить текущий список желаний пользователя
$wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

// Проверить, получен ли список желаний
if (!$wishlist) {
    $response = array(
        'success' => false,
        'message' => 'Список желаний не найден.'
    );
    echo json_encode($response);
    return;
}

// Получить текущий список желаний пользователя
$wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

// Проверить, получен ли список желаний
if (!$wishlist) {
    $response = array(
        'success' => false,
        'message' => 'Список желаний не найден.'
    );
    echo json_encode($response);
    return;
}

// Получить товары из списка желаний
$wishlist_items = $wishlist->get_items();

// Проверить, есть ли товары в списке желаний
if (empty($wishlist_items)) {
    $response = array(
        'success' => true,
        'message' => 'В данном списке желаний нет товаров.'
    );
    echo json_encode($response);
    return;
}

// Формирование массива с данными продуктов
$wishlist_array = array();
foreach ($wishlist_items as $item) {
    $product = $item->get_product();
    if ($product) {
        $wishlist_array[] = array(
            'id' => $product->get_id(),
            'name' => $product->get_name(),
            'price' => $product->get_price(),
            // Добавьте другие нужные свойства продукта сюда
        );
    } else {
        echo "Проблема: объект товара не может быть получен.";
    }
}

// Формирование и отправка ответа
$response = array(
    'success' => true,
    'wishlist' => '8013' // Возвращаем обновленный список избранных товаров в виде массива с данными продуктов
);
echo json_encode($response);*/


// Получить текущий список желаний пользователя
$wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();

// Проверить, получен ли список желаний
if (!$wishlist) {
    $response = array(
        'success' => false,
        'message' => 'Список желаний не найден.'
    );
    echo json_encode($response);
    return;
}

// Получить товары из списка желаний
$wishlist_items = $wishlist->get_items();

// Проверить, есть ли товары в списке желаний
if (empty($wishlist_items)) {
    $response = array(
        'success' => true,
        'message' => 'В данном списке желаний нет товаров.'
    );
    echo json_encode($response);
    return;
}

// Получить первый товар из списка желаний
$item = reset($wishlist_items);
$product = $item->get_product();

// Проверить, получен ли товар
if (!$product) {
    $response = array(
        'success' => false,
        'message' => 'Не удалось получить информацию о товаре.'
    );
    echo json_encode($response);
    return;
}

// Формирование массива с данными продукта
$wishlist_array = array(
    'id' => $product->get_id(),
    'name' => $product->get_name(),
    'price' => $product->get_price(),
    // Добавьте другие нужные свойства продукта сюда
);

// Формирование и отправка ответа
$response = array(
    'success' => true,
    'wishlist' =>'8013,8016' // Возвращаем обновленный список избранных товаров в виде массива с данными продукта
);
echo json_encode($response);