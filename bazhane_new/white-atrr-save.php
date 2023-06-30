<?php
 
// Include WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
  

  $product_id = $_POST['product_id'];
$new_size = $_POST['new_size'];
$old_size = $_POST['old_size'];
$quantity = $_POST['quantity'];
$user_id = $_POST['user_id'];
$wishlist_id = $_POST['wishlist_id'];
$position = $_POST['position'];
$original_price = $_POST['original_price'];
$original_currency = $_POST['original_currency'];
$dateadded = $_POST['dateadded'];
$on_sale = $_POST['on_sale'];
 
 
// Подключение к базе данных WordPress
global $wpdb;
$table_name = $wpdb->prefix . 'yith_wcwl'; // Название таблицы с префиксом WordPress

/*
// Получение идентификатора записи по старому значению prod_id
$query = $wpdb->prepare(
    "SELECT ID FROM $table_name WHERE prod_id = %d",
    $product_id
);
$record_id = $wpdb->get_var($query);

if ($record_id) {
    // Выполнение запроса UPDATE
    $wpdb->update(
        $table_name,
        array('prod_id' => $new_size),
        array('ID' => $record_id)
    );
    
    
     
    $response = array(
        'success' => true,
        'message' => 'good'
    );
    echo json_encode($response);
} else {
    // Формирование и отправка ответа в случае ошибки
    $response = array(
        'success' => false,
        'message' => 'error'
    );
    echo json_encode($response);
}*/

   
// Получение идентификатора записи по старому значению prod_id
$query = $wpdb->prepare(
    "SELECT ID FROM $table_name WHERE prod_id = %d",
    $product_id
);
$record_id = $wpdb->get_var($query);
 
// Удаление записи с помощью DELETE
$wpdb->delete(
    $table_name,
    array('ID' => $record_id)
);

// Вставка новой записи с помощью INSERT
$wpdb->insert(
    $table_name,
    array(
        'prod_id' => $new_size,
        'quantity' => $quantity,
        'user_id' => $user_id,
        'wishlist_id' => $wishlist_id,
        'position' => $position,
        'original_price' => $original_price,
        'original_currency' => $original_currency,
        'dateadded' => $dateadded,
        'on_sale' => $on_sale
    )
);

$response = array(
    'success' => true,
    'message' => 'good'
);
echo json_encode($response);