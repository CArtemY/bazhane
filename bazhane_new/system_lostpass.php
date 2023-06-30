<?php



// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');


$Email = $_POST['Email'];

foreach ([$Email] as $value) {
    if ($value) {

        // Получаем текущего пользователя
        $user = get_user_by( 'email', $Email );
        $user_id = $user ? $user->ID : false;

        if ($user_id){

            //Генерируем новый пароль
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $Pass = '';
            for ($i = 0; $i < 15; $i++) {
                $Pass .= $characters[rand(0, strlen($characters) - 1)];
            }

            // Обновляем парол
            if (!empty($Pass)) {
                wp_set_password( $Pass, $user_id );
            }

            $to = $Email; // адрес получателя
            $message = 'Вітаю!<br><br>Ви отримали цей лист, тому що подали запит на скидання пароля.<br>Ваш новий пароль: ' . $Pass.'Сторінка для входу в обліковий запис: <a href="https://www.bazhane.com/login/> Увійти до облікового запису</a>'; // тема письма
            $subject = 'Скидання пароля'; // текст письма
            
            $headers = array(
                'From: sender@example.com', // адрес отправителя
                'Content-Type: text/html; charset=UTF-8', // тип содержимого
            );
            
            // отправляем письмо
            $result = wp_mail( $to, $subject, $message, $headers );

            echo 'true';
        } else {
            echo 'false';
        }
        break;
        
    }
}

?>