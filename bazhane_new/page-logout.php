<?php
  
/*
*Template name: Logout
Template Post Type: page
*/

  // Запускаем сессию
  session_start();

  // Разлогиниваем текущего пользователя
  wp_logout();

  // Удаляем сессию
  session_destroy();

  // Перенаправляем пользователя на главную страницу
  wp_redirect(home_url());
  exit;
?>