<?php



// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');


$Name = $_POST['Name'];
echo $Name.' - ';
$Surname = $_POST['Surname'];
echo $Surname.' - ';
$Pass = $_POST['Pass'];
echo $Pass.' - ';
$Email = $_POST['Email'];
echo $Email.' - ';

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$UserName = 'user_';
for ($i = 0; $i < 15; $i++) {
    $UserName .= $characters[rand(0, strlen($characters) - 1)];
}

foreach ([$Pass, $Email, $UserName] as $value) {
    if ($value) {

         // Создаем нового пользователя
         $user_id = wp_create_user( $UserName, $Pass, $Email );
        
        if ( is_wp_error( $user_id ) ) {
            echo 'false';
        } else {
            // Авторизуем пользователя
            wp_set_auth_cookie( $user_id );

            // Получаем объект пользователя по ID
            $user = get_user_by( 'ID', $user_id );

            // Устанавливаем имя и фамилию пользователя
            $user->first_name = $Name;
            $user->last_name = $Surname;

            // Сохраняем изменения
            wp_update_user( $user );
            echo 'true';
        }
        
        break;
        
        
    }
}

?>