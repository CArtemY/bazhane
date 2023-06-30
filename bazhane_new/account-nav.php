<?php

$current_language = pll_current_language();

if ( $current_language === 'uk' ) { ?>
    
    <a href="<?php echo get_home_url() ?>/account-main/" class="profile">Профіль</a>
    <a href="<?php echo get_home_url() ?>/account-orders/" class="orders">Мої замовлення</a>
    <!-- <a href="<?php echo get_home_url() ?>/account-subscribers/" class="subscribers">Мої підписки</a> -->
    <a href="<?php echo get_home_url() ?>/account-bonuses/" class="bonuses">Мої бонуси</a>
    <!-- <a href="<?php echo get_home_url() ?>/account-favorites/" class="favourites">Вибрані товари</a> -->
    <a href="<?php echo get_home_url() ?>/logout/">Вихід</a>

<?php
} elseif ( $current_language === 'en' ) { 
?>

    <a href="<?php echo get_home_url() ?>/account-main/" class="profile">Profile</a>
    <a href="<?php echo get_home_url() ?>/account-orders/" class="orders">My Orders</a>
    <!-- <a href="<?php echo get_home_url() ?>/account-subscribers-en/" class="subscribers">My subscriptions</a> -->
    <a href="<?php echo get_home_url() ?>/account-bonuses/" class="bonuses">My bonuses</a>
    <!-- <a href="<?php echo get_home_url() ?>/account-favorites-en/" class="favorites">Selected products</a> -->
    <a href="<?php echo get_home_url() ?>/logout/">Exit</a>

<?php
    }
?>


<script type="text/javascript">
    links = document.querySelectorAll('.block-1 .nav a');
    // Получаем текущую ссылку страницы
    var currentPageUrl = window.location.href;

    // Проходимся по каждому элементу <a>
    for (var i = 0; i < links.length; i++) {
        console.log(links[i]);
        // Получаем href текущего элемента <a>
        var href = links[i].getAttribute('href');

        // Сравниваем href с текущей ссылкой страницы
        if (href === currentPageUrl) {
            // Если они совпадают, присваиваем элементу <a> класс "active"
            links[i].classList.add('active');
        }
    }
</script>