<?php
// Подключаем WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Получаем значения переменных из $_POST
$first_name = $_POST['name'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fuuAdress = $_POST['fuuAdress'];
$novaPoshta = $_POST['novaPoshta'];
$birthday = $_POST['birthday'];

echo $birthday;


// Получаем текущего пользователя
$user = wp_get_current_user();
// Получаем новое имя пользователя и его ID
$user_id = $user->ID;

// Обновляем мета-поля пользователя с полученными значениями
update_user_meta($user_id, 'first_name', $first_name);
update_user_meta($user_id, 'last_name', $last_name);
update_user_meta($user_id, 'billing_email', $email);
update_user_meta($user_id, 'billing_phone', $phone);
update_user_meta($user_id, 'billing_address_2', $fuuAdress);
update_user_meta($user_id, 'nova_poshta_department', $novaPoshta);
update_user_meta($user_id, 'birthday', $birthday);


?>