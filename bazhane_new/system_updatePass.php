<?php
$Pass = $_POST['newpass'];

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$password = isset($_POST['newPass']) ? wp_hash_password($_POST['newPass']) : '';
$pass_to_check = $_POST['newPass'];


// Получаем текущего пользователя
$current_user = wp_get_current_user();

// Получаем хешированный пароль текущего пользователя
$hashed_password = $current_user->user_pass;

// Пароль для проверки
$pass_to_check = $_POST['oldpass'];

// Проверяем правильность пароля
$is_password_correct = wp_check_password($pass_to_check, $hashed_password);

if ($is_password_correct) {
    // Пароль правильный
    // echo 'Пароль верный!';
    // Получаем текущего пользователя
    $user = wp_get_current_user();
    // Получаем новое имя пользователя и его ID
    $user_id = $user->ID;
    
    // Обновляем парол
    if (!empty($Pass)) {
        wp_set_password( $Pass, $user_id );
    }
    
    // Авторизуем пользователя с обновленными данными
    $user = get_user_by( 'id', $user_id );
    if ( $user ) {
    wp_set_current_user( $user_id, $user->user_login );
    wp_set_auth_cookie( $user_id );
    do_action( 'wp_login', $user->user_login, $user );
    }
    echo 'true';
} else {
    // Пароль неправильный
    // echo 'Пароль неверный!';
    echo 'error';
}


?>