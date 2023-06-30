<?php
 

// Include WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
 
 // Получение данных из POST-запроса
$product_id = $_POST['product_id'];
 

// Подключение к базе данных WordPress
global $wpdb;
$table_name = $wpdb->prefix . 'yith_wcwl'; // Название таблицы с префиксом WordPress

// Получение идентификатора записи по старому значению prod_id
$query = $wpdb->prepare(
    "SELECT ID FROM $table_name WHERE prod_id = %d",
    $product_id
);
$record_id = $wpdb->get_var($query);

if ($record_id) {
    // Выполнение запроса UPDATE
  $wpdb->delete(
    $table_name,
    array('ID' => $record_id)
);

    // Формирование и отправка ответа
    $response = array(
        'success' => true,
        'message' => 'Размер успешно обновлен'
    );
    echo json_encode($response);
} else {
    // Формирование и отправка ответа в случае ошибки
    $response = array(
        'success' => false,
        'message' => 'Запись не найдена'
    );
    echo json_encode($response);
}
 

 

// Register the AJAX action
//add_action('wp_ajax_update_wishlist_size', 'update_wishlist_size_ajax');
//add_action('wp_ajax_nopriv_update_wishlist_size', 'update_wishlist_size_ajax');