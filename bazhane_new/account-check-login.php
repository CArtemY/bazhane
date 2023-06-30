
<?php 

if ( ! is_user_logged_in() ) {
    wp_redirect( get_home_url() . '/login/' );
    exit;
}

?>