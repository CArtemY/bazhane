<?php

// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$first_name = isset($_POST['Firstame']) ? sanitize_text_field($_POST['Firstame']) : '';
$last_name = isset($_POST['Lastame']) ? sanitize_text_field($_POST['Lastame']) : '';
$email = isset($_POST['Mail']) ? sanitize_email($_POST['Mail']) : '';
// $password = isset($_POST['Pass']) ? wp_hash_password($_POST['Pass']) : '';
// $Pass = $_POST['Pass'];
$login = $_POST['Login'];


foreach ([$first_name] as $value) {
    // Получаем текущего пользователя
    $user = wp_get_current_user();
    // Получаем новое имя пользователя и его ID
    $user_id = $user->ID;

    // Обновляем парол
    if (!empty($Pass)) {
        wp_set_password( $Pass, $user_id );
    }

    // Обновляем данные пользовател
    $userchek = get_user_by('login', $login);
    if ($userchek) {
       if (is_wp_error($result)) {
        }
    } else {
        // пользователь с таким логином не найден

        // вызываем функцию change_username() с текущим и новым именами пользователей
        global $wpdb;
        $wpdb->update($wpdb->users, array('user_login' => $login), array('ID' => $user_id));
        $unswear .= 'login-UPDATE ';
    }

    // Обновляем почту
    wp_update_user( array(
        'ID' => $user_id,
        'user_email' => $email
    ) );

    if (!empty($last_name)) {
        // Обновляем имя и фамилию
        wp_update_user( array(
            'ID' => $user_id,
            'last_name' => $last_name
        ) );
    } else {
        wp_update_user( array(
            'ID' => $user_id,
            'last_name' => ''
        ) );
    }
    if (!empty($first_name)) {
        // Обновляем имя и фамилию
        wp_update_user( array(
            'ID' => $user_id,
            'first_name' => $first_name
        ) );
    }

    // Авторизуем пользователя с обновленными данными
    $user = get_user_by( 'id', $user_id );
    if ( $user ) {
        wp_set_current_user( $user_id, $user->user_login );
        wp_set_auth_cookie( $user_id );
        do_action( 'wp_login', $user->user_login, $user );
    }
}

?>