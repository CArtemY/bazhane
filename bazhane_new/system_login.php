<?php



// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');


$Pass = $_POST['Pass'];
// echo $Pass.' - ';
$Email = $_POST['Email'];
// echo $Email.' - ';

foreach ([$Pass, $Email] as $value) {
    if ($value) {

        // // Подключаем WordPress
        // require_once( dirname(__FILE__) . '/wp-load.php' );

        // Проверяем имя пользователя и пароль
        $user = wp_authenticate( $Email, $Pass );

        if ( is_wp_error( $user ) ) {
            echo 'false';
            break;
        } else {
            // Авторизуем пользователя
            wp_set_auth_cookie( $user->ID );
            echo 'true';
            break;
        }

        
        
    }
}

?>