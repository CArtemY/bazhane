<?php
if ( $current_language === 'uk' ) { 
?>
    <div id="header">
        <div class="container">
            <a href="<?php echo get_home_url() ?>"><img class="logo" src="<?php bloginfo('template_directory') ?>/img/logo.svg"></a>
            <div class="group1">
                <a href="<?php echo get_home_url() ?>/shop/">Каталог</a>
                <a href="<?php echo get_home_url() ?>/#about-us">Про нас</a>
                <a href="<?php echo get_home_url() ?>/payment-and-delivery/">Оплата і доставка</a>
                <a href="<?php echo get_home_url() ?>/return/">Повернення та обмін</a>
                <a href="<?php echo get_home_url() ?>/bonus-system/">Програма лояльності</a>
                <a href="<?php echo get_home_url() ?>/contacts/">КОНТАКТИ</a>
            </div>
            <div class="group2">
                <div class="search" onclick="searchOn()">
                    <img src="<?php bloginfo('template_directory') ?>/img/Search.svg">
                    <!--<input type="text" placeholder="Знайти...">-->
                </div>
                <div class="btns">
                    <a href="<?php echo get_home_url() ?>/account-main/" class="account">
                        <img src="<?php bloginfo('template_directory') ?>/img/User.svg">
                    </a>
                    <a href="<?php echo get_home_url() ?>/favourites/" class="heart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Heart.svg">
                        <?php
                        // Получить текущий список желаний пользователя
                        $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();
                        
                        // Проверить, получен ли список желаний
                        if ( ! $wishlist ) {
                            echo '<span>00</span>';
                        } else {
                            // Получить товары из списка желаний
                            $wishlist_items = $wishlist->get_items();
                        
                            // Получить количество товаров в списке желаний
                            $wishlist_count = count($wishlist_items);
                        
                            // Вывести количество товаров
                            if ($wishlist_count < 10){
                                echo '<span>0' . $wishlist_count . '</span>';
                            } else{
                                echo '<span>' . $wishlist_count . '</span>';
                            }
                        }
                        ?>
                    </a>
                    <a href="<?php echo get_home_url() ?>/cart/" class="cart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Shopping%20Cart.svg">
                        <?php
                        // Проверяем, активен ли плагин WooCommerce
                        if (class_exists('WooCommerce')) {
                            // Получаем объект корзины WooCommerce
                            $cart = WC()->cart;
                            // Получаем количество товаров в корзине
                            $cart_count = $cart->get_cart_contents_count();
                            
                            if ($cart_count < 10){
                                echo '<span>0'.$cart_count.'</span>';
                            } else{
                                echo '<span>'.$cart_count.'</span>';
                            }
                        }
                        ?>
                    </a>
                </div>
                <?php
                $page_id = get_the_ID(); // Замените 123 на ваш ID страницы
                $english_page_id = pll_get_post($page_id, 'en'); // Получаем ID английской версии страницы
                $english_permalink = get_permalink($english_page_id); // Получаем ссылку на английскую версию страницы

                echo '<a href="' . esc_url($english_permalink) . '" class="lang"><span>ENG</span></a>';
                ?>
                <div class="menu-btn" onclick="menuOpen()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="subheader"></div>

    <div class="menu" id="menu" style="display: ">
        <!-- <div class="bigcont"> -->
            <!--            <div class="bigcont2">-->
            <div class="container">
                <div class="bigbox">
                    <img class="logo" src="<?php bloginfo('template_directory') ?>/img/menu-logo.svg">
                    <div class="group1">
                        <a href="<?php echo get_home_url() ?>shop/">Каталог</a>
                        <a href="<?php echo get_home_url() ?>">Про нас</a>
                        <a href="<?php echo get_home_url() ?>payment-and-delivery/">Оплата і доставка</a>
                        <a href="<?php echo get_home_url() ?>return/">Повернення та обмін</a>
                        <a href="<?php echo get_home_url() ?>bonus-system/">Програма лояльності</a>
                        <a href="<?php echo get_home_url() ?>contacts/">КОНТАКТИ</a>

                        <?php 
                            if ($includeAccountNav){
                                include 'account-nav.php';
                            }
                        ?>
                    </div>

                </div>
                <div class="menu-close" onclick="menuClose()"></div>
            </div>
        <!-- </div> -->
        <div class="bg"></div>
        <script>
            function menuOpen() {
                document.getElementById('menu').classList.add('active');
                document.body.classList.add("stop");
            }

            function menuClose() {
                document.getElementById('menu').classList.remove('active');
                document.body.classList.remove("stop");
            }
            window.addEventListener('resize', function() {
                menuClose();
            });

        </script>
    </div>
    
    
    
    <div class="search-block" id="search-cont">
        <div class="container">
            <div class="input"><input id="searchBlock" placeholder="Знайти..." type="text"><div class="btn" onclick="searchBlock()"></div></div>
            <div class="close" onclick="searchOn()"></div>
        </div>
        <script>
        
            function setCookie(name, value, days){
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                var expires = "; expires=" + date.toGMTString();
                document.cookie = name + "=" + value + expires + ";path=/";
            }
            function searchBlock(){
                search = document.getElementById('searchBlock').value;
                setCookie('bazhane_search', search, 90);
                window.location="https://bazhane.com/search/"
            }
            function searchOn(){
                document.getElementById('search-cont').classList.toggle('active');
            }
            
        </script>
    </div>


<?php
} elseif ( $current_language === 'en' ) { 
?>


    <div id="header">
        <div class="container">
            <a href="<?php echo get_home_url() ?>"><img class="logo" src="<?php bloginfo('template_directory') ?>/img/logo.svg"></a>
            <div class="group1">
                <a href="<?php echo get_home_url() ?>/shop/">Catalog</a>
                 <a href="<?php echo get_home_url() ?>/#about-us">About Us</a>
                 <a href="<?php echo get_home_url() ?>/payment-and-delivery/">Payment and delivery</a>
                 <a href="<?php echo get_home_url() ?>/return/">Returns and Exchanges</a>
                 <a href="<?php echo get_home_url() ?>/bonus-system/">Loyalty program</a>
                 <a href="<?php echo get_home_url() ?>/contacts/">CONTACTS</a>
            </div>
            <div class="group2">
                <div class="search" onclick="searchOn()">
                    <img src="<?php bloginfo('template_directory') ?>/img/Search.svg">
                    <!--<input type="text" placeholder="Знайти...">-->
                </div>
                <div class="btns">
                    <a href="<?php echo get_home_url() ?>/account-main/" class="account">
                        <img src="<?php bloginfo('template_directory') ?>/img/User.svg">
                    </a>
                    <a href="<?php echo get_home_url() ?>/favourites/" class="heart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Heart.svg">
                        <?php
                        // Получить текущий список желаний пользователя
                        $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();
                        
                        // Проверить, получен ли список желаний
                        if ( ! $wishlist ) {
                            echo '<span>00</span>';
                        } else {
                            // Получить товары из списка желаний
                            $wishlist_items = $wishlist->get_items();
                        
                            // Получить количество товаров в списке желаний
                            $wishlist_count = count($wishlist_items);
                        
                            // Вывести количество товаров
                            if ($wishlist_count < 10){
                                echo '<span>0' . $wishlist_count . '</span>';
                            } else{
                                echo '<span>' . $wishlist_count . '</span>';
                            }
                        }
                        ?>
                    </a>
                    <a href="<?php echo get_home_url() ?>/cart/" class="cart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Shopping%20Cart.svg">
                        <?php
                        // Проверяем, активен ли плагин WooCommerce
                        if (class_exists('WooCommerce')) {
                            // Получаем объект корзины WooCommerce
                            $cart = WC()->cart;
                            // Получаем количество товаров в корзине
                            $cart_count = $cart->get_cart_contents_count();
                            
                            if ($cart_count < 10){
                                echo '<span>0'.$cart_count.'</span>';
                            } else{
                                echo '<span>'.$cart_count.'</span>';
                            }
                        }
                        ?>
                    </a>
                </div>
                <?php
                $page_id = get_the_ID(); // Замените 123 на ваш ID страницы
                $english_page_id = pll_get_post($page_id, 'uk'); // Получаем ID английской версии страницы
                $english_permalink = get_permalink($english_page_id); // Получаем ссылку на английскую версию страницы

                echo '<a href="' . esc_url($english_permalink) . '" class="lang"><span>UKR</span></a>';
                ?>
                <div class="menu-btn" onclick="menuOpen()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="subheader"></div>

    <div class="menu" id="menu" style="display: ">
        <!-- <div class="bigcont"> -->
            <!--            <div class="bigcont2">-->
            <div class="container">
                <div class="bigbox">
                    <img class="logo" src="<?php bloginfo('template_directory') ?>/img/menu-logo.svg">
                    <div class="group1">
                        <a href="<?php echo get_home_url() ?>shop/">Catalog</a>
                         <a href="<?php echo get_home_url() ?>">About Us</a>
                         <a href="<?php echo get_home_url() ?>payment-and-delivery/">Payment and delivery</a>
                         <a href="<?php echo get_home_url() ?>return/">Returns and Exchanges</a>
                         <a href="<?php echo get_home_url() ?>bonus-system/">Loyalty program</a>
                         <a href="<?php echo get_home_url() ?>contacts/">CONTACTS</a>

                        <?php 
                            if ($includeAccountNav){
                                include 'account-nav.php';
                            }
                        ?>
                    </div>

                </div>
                <div class="menu-close" onclick="menuClose()"></div>
            </div>
        <!-- </div> -->
        <div class="bg"></div>
        <script>
            function menuOpen() {
                document.getElementById('menu').classList.add('active');
                document.body.classList.add("stop");
            }

            function menuClose() {
                document.getElementById('menu').classList.remove('active');
                document.body.classList.remove("stop");
            }
            window.addEventListener('resize', function() {
                menuClose();
            });

        </script>
    </div>
    
    
    
    <div class="search-block" id="search-cont">
        <div class="container">
            <div class="input"><input id="searchBlock" placeholder="Знайти..." type="text"><div class="btn" onclick="searchBlock()"></div></div>
            <div class="close" onclick="searchOn()"></div>
        </div>
        <script>
        
            function setCookie(name, value, days){
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                var expires = "; expires=" + date.toGMTString();
                document.cookie = name + "=" + value + expires + ";path=/";
            }
            function searchBlock(){
                search = document.getElementById('searchBlock').value;
                setCookie('bazhane_search', search, 90);
                window.location="https://bazhane.com/search/"
            }
            function searchOn(){
                document.getElementById('search-cont').classList.toggle('active');
            }
            
        </script>
    </div>

<?php
}
?>