<?php

/*
*Template name: Contacts
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <title>Bazhane</title>
    <meta name="msapplication-TileColor" content="#1A191B">
    <meta name="theme-color" content="#1A191B">
    <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory') ?>/img/fav.ico">

    <!-- Reset -->
    <link media="all" rel="stylesheet" href="<?php bloginfo('template_directory') ?>/reset/normalize.css">
    <link media="all" rel="stylesheet" href="<?php bloginfo('template_directory') ?>/reset/reset.css">

    <!-- Font -->
    <link href="<?php bloginfo('template_directory') ?>/font/font.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/indexstyle.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/indexstyle-adaptive.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/header.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/footer.css" rel="stylesheet" type="text/css" media="all" />
    
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />

    <script src="<?php bloginfo('template_directory') ?>/js/jquery.min.js"></script>

    <!--metatextblock-->
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/fav.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory') ?>/img/fav.png">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php bloginfo('template_directory') ?>/img/og_image.png">
    <link rel="canonical" href="">
    <!--/metatextblock-->
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="/*!color!*/rgba(0, 0, 0, 1)/*!/color!*/">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="/*!color2!*/rgba(0, 0, 0, 1)/*!/color2!*/">
    <?php $current_language = pll_current_language(); ?>

</head>

<body class="">

    
    <?php include 'custom-header.php' ?>
    
    <div class="breadcrumbs" style="background: #F5F5F5;">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <?php
                if ( $current_language === 'uk' ) { 
                    $pagename = 'контакти';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'contacts';
                }
                ?>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" title="<?php echo $pagename; ?>">
                        <span itemprop="name"><?php echo $pagename; ?></span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
<?php
if ( $current_language === 'uk' ) { 
?>  
    <div class="block-6">
        <div class="container">
            <!--<div class="line1">-->
            <!--    <h2>контакти</h2>-->
            <!--</div>-->
            <div class="line2" style="padding-top: 0;">
                <div class="b1" id="map-line">
                    <div class="cont1">
                        <h3>Онлайн<br> замовлення</h3>
                        <ul class="list1">
                            <li class="phone"><span></span><a href="tel:+380680785937">+38 (068) 078-59-37</a></li>
                            <li class="mail"><span></span><a href="mailto:support@bazhane.com">support@bazhane.com</a></li>
                            <li class="time"><span></span><p>Пн-Вс 11:00 - 22:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <p>Для реклами та кооперацій: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
                <div class="b2">
                    <div class="cont1">
                        <h3>Бутік</h3>
                        <ul class="list1">
                            <li class="phone"><span></span><a href="tel:+380681160767">+38 (068) 116-07-67</a></li>
                            <li class="map"><span></span><a href="#">Київ, вул. Мечникова 7</a></li>
                            <li class="mail"><span></span><a href="mailto:bazhane.btq@gmail.com">bazhane.btq@gmail.com</a></li>
                            <li class="time"><span></span><p>Пн-Вс 12:00 - 19:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <a href="#" class="btn">Прокласти маршрут</a>
                    </div>
                </div>
                <div class="b3">
                    <div class="map" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                        var setting = {"height":20,"width":803,"zoom":17,"queryString":"улица Мечникова, 7, Киев, Украина","place_id":"ChIJxy3uzQDP1EAR5Ey7HvrxAuk","satellite":false,"centerCoord":[50.43727641922144,30.532305399999988],"cid":"0xe902f1fa1ebb4ce4","lang":"ru","cityUrl":"/ukraine/kiev","cityAnchorText":"Карта [CITY1], Киевская область, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"923142"};
                        var d = document;
                        var s = d.createElement('script');
                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=923142';
                        s.async = true;
                        s.onload = function (e) {
                          window.OneMap.initMap(setting)
                        };
                        var to = d.getElementsByTagName('script')[0];
                        to.parentNode.insertBefore(s, to);
                      })();</script>
                    </div>
                </div>
                <div class="b1 b4">
                    <div class="cont2">
                        <span></span>
                        <p>Для реклами та кооперацій: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Запустить функцию, когда документ будет полностью загружен
            window.addEventListener('load', function() {
              // Запустить функцию mapSizeCheck() сразу после загрузки документа
              mapSizeCheck();

              // Запустить функцию mapSizeCheck() при изменении ширины окна
              window.addEventListener('resize', mapSizeCheck);
            });

            function mapSizeCheck() {
                newHeight = document.getElementById('map-line').offsetHeight+'px';
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').getElementsByTagName('iframe')[0].style.height=newHeight
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.height = newHeight;
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.maxHeight = newHeight;
            }

        </script>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-6">
        <div class="container">
            <!--<div class="line1">-->
            <!--    <h2>контакти</h2>-->
            <!--</div>-->
            <div class="line2" style="padding-top: 0;">
                <div class="b1" id="map-line">
                    <div class="cont1">
                        <h3>Online<br> order</h3>
                         <ul class="list1">
                             <li class="phone"><span></span><a href="tel:+380680785937">+38 (068) 078-59-37</a></li>
                             <li class="mail"><span></span><a href="mailto:support@bazhane.com">support@bazhane.com</a></li>
                             <li class="time"><span></span><p>Mon-Sun 11:00 - 22:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <p>For advertising and cooperation: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
                <div class="b2">
                    <div class="cont1">
                        <h3>Бутік</h3>
                        <ul class="list1">
                            <li class="phone"><span></span><a href="tel:+380681160767">+38 (068) 116-07-67</a></li>
                             <li class="map"><span></span><a href="#">Kyiv, str. Mechnikova 7</a></li>
                             <li class="mail"><span></span><a href="mailto:bazhane.btq@gmail.com">bazhane.btq@gmail.com</a></li>
                             <li class="time"><span></span><p>Mon-Sun 12:00 - 19:00</p></li>
                        </ul>
                        <ul class="list2">
                            <li class="telegram"><a href="#"></a></li>
                            <li class="whatsup"><a href="#"></a></li>
                            <li class="viber"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="cont2">
                        <a href="#" class="btn">Make a route</a>
                    </div>
                </div>
                <div class="b3">
                    <div class="map" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                        var setting = {"height":20,"width":803,"zoom":17,"queryString":"улица Мечникова, 7, Киев, Украина","place_id":"ChIJxy3uzQDP1EAR5Ey7HvrxAuk","satellite":false,"centerCoord":[50.43727641922144,30.532305399999988],"cid":"0xe902f1fa1ebb4ce4","lang":"ru","cityUrl":"/ukraine/kiev","cityAnchorText":"Карта [CITY1], Киевская область, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"923142"};
                        var d = document;
                        var s = d.createElement('script');
                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=923142';
                        s.async = true;
                        s.onload = function (e) {
                          window.OneMap.initMap(setting)
                        };
                        var to = d.getElementsByTagName('script')[0];
                        to.parentNode.insertBefore(s, to);
                      })();</script>
                    </div>
                </div>
                <div class="b1 b4">
                    <div class="cont2">
                        <span></span>
                        <p>For advertising and cooperation: <a href="mailto:cooperation@bazhane.com">cooperation@bazhane.com</a></p>
                    </div>
                    <div class="cont3">
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/Instagram%20icon.svg">instagram</a>
                        <a href="#"><img src="<?php bloginfo('template_directory') ?>/img/facebook%20icon.svg">facebook</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Запустить функцию, когда документ будет полностью загружен
            window.addEventListener('load', function() {
              // Запустить функцию mapSizeCheck() сразу после загрузки документа
              mapSizeCheck();

              // Запустить функцию mapSizeCheck() при изменении ширины окна
              window.addEventListener('resize', mapSizeCheck);
            });

            function mapSizeCheck() {
                newHeight = document.getElementById('map-line').offsetHeight+'px';
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').getElementsByTagName('iframe')[0].style.height=newHeight
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.height = newHeight;
                document.getElementById('wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3').style.maxHeight = newHeight;
            }

        </script>
    </div>
<?php
}
?> 
    
    <?php include 'custom-footer.php' ?>
    
</body>

</html>