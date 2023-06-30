    <div id="header">
        <div class="container">
            <img class="logo" src="<?php bloginfo('template_directory') ?>/img/logo.svg">
            <div class="group1">
                <a href="#">Каталог</a>
                <a href="#">Про нас</a>
                <a href="#">Оплата і доставка</a>
                <a href="#">Повернення та обмін</a>
                <a href="#">Програма лояльності</a>
                <a href="#">КОНТАКТИ</a>
            </div>
            <div class="group2">
                <div class="search">
                    <img src="<?php bloginfo('template_directory') ?>/img/Search.svg">
                    <!--<input type="text" placeholder="Знайти...">-->
                </div>
                <div class="btns">
                    <div class="account">
                        <img src="<?php bloginfo('template_directory') ?>/img/User.svg">
                    </div>
                    <div class="heart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Heart.svg">
                        <span>01</span>
                    </div>
                    <div class="cart">
                        <img src="<?php bloginfo('template_directory') ?>/img/Shopping%20Cart.svg">
                        <span>01</span>
                    </div>
                </div>
                <div class="lang">
                    <span>ENG</span>
                </div>
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
                        <a class="active" href="#">Головна</a>
                        <a href="#">Каталог</a>
                        <a href="#">ПРО НАС</a>
                        <a href="#">Оплата і доставка</a>
                        <a href="#">Повернення та обмін</a>
                        <a href="#">Програма лояльності</a>
                        <a href="#">КОНТАКТИ</a>
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
    
    <div class="search-block">
        <div class="container">
            <input type="text">
            <div class="close"></div>
        </div>
    </div>