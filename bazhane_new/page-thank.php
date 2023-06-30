<?php

/*
*Template name: Thank
Template Post Type: page
*/
$user_id = get_current_user_id(); 
?>

<?php

$year = date('Y'); // Get the current year

$args = array(
    'post_type'      => 'shop_order',
    'post_status'    => 'wc-completed',
    'posts_per_page' => -1,
    'meta_query'     => array(
        array(
            'key'     => '_customer_user',
            'value'   => $user_id,
            'compare' => '='
        ),
        array(
            'key'     => '_completed_date',
            'value'   => array($year . '-01-01', $year . '-12-31'),
            'compare' => 'BETWEEN',
            'type'    => 'DATE'
        )
    )
);

$query = new WP_Query($args);

$total_spent = 0;
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $order = wc_get_order(get_the_ID());
        $total_spent += $order->get_total();
    }
}

wp_reset_postdata();

$a = intval($total_spent);

// echo $a;

// echo $a.'<br>'; 

// Заданные значения
$value1 = 0;
$value2 = 35000;
$value3 = 60000;
$value4 = 120000;
$value5 = 180000;
$value6 = 240000;
$values16 = [0, 35000, 60000, 120000, 180000, 240000];

// echo $a.'<br>';

// $a = 25; // Число a

// Проверка между какими значениями находится число a
if ($a >= $value1 && $a < $value2) {
    // echo "Число a находится между $value1 и $value2";
    $user_level = 1;
} elseif ($a >= $value2 && $a < $value3) {
    // echo "Число a находится между $value2 и $value3";
    $user_level = 2;
} elseif ($a >= $value3 && $a < $value4) {
    // echo "Число a находится между $value3 и $value4";
    $user_level = 3;
} elseif ($a >= $value4 && $a < $value5) {
    // echo "Число a находится между $value4 и $value5";
    $user_level = 4;
} elseif ($a >= $value5 && $a < $value6) {
    // echo "Число a находится между $value5 и $value6";
    $user_level = 5;
} elseif ($a >= $value6) {
    // echo "Число a находится между $value5 и $value6";
    $user_level = 6;
} else {
    // echo "Число a не находится между заданными значениями";
}

$user_levels = ['', 'New client', 'Loyal client', 'Special client', 'Friend', 'Best Friend', '<span>BFF (</span>Best Friend Forever<span>)</span>'];

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/account-my-bonuses.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/block-bonuses.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/account-nav.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://www.bazhane.com/wp-content/themes/bazhane_new/css/colors.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://www.bazhane.com/wp-content/themes/bazhane_new/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/thank.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</head>

<body class="">

    <?php include 'custom-header.php'; ?>
    
    <div class="breadcrumbs">
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
                    $pagename = 'Дякуємо';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Thank you';
                }
                ?>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="../" itemprop="item" title="<?php echo $pagename; ?>">
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

    <div class="block-1 b1" id="b1">
        <div class="container">
            <div>
                <h1>Дякуємо за замовлення!</h1>
                <p>Резервуємо ваші речі до 19:00 до 19.01.2023
                <br><br>
                До зустрічі ♥</p>
                <div class="btn">Перейти<br> до покупок</div>
            </div>
        </div>
    </div>
    <div class="block-1 b2" id="b2">
        <div class="container">
            <div>
                <h1>Дякуємо за замовлення!</h1>
                <p>Ви можете забрати свої речі в будь-який день з 12:00 до 19:00 за адресою: вул.Мечникова 7
                <br><br>
                До зустрічі ♥</p>
            </div>
        </div>
    </div>
    <div class="block-1 b3" id="b3">
        <div class="container">
            <div>
                <h1>Дякуємо за замовлення!</h1>
                <p>Після повної оплати замовлення у відділенні, у вашому особистому кабінеті з‘являться ???? бонусів
                <br><br>
                Будемо чекати на Вас знову!</p>
                <div class="btn">Перейти<br> до покупок</div>
            </div>
        </div>
    </div>
    <div class="block-1 b4" id="b4">
        <div class="container">
            <div>
                <h1>Дякуємо за замовлення!</h1>
                <p>Ваше замовлення вже готується вирушати до Вас!
                <br><br>
                Раді повідомити, що у Вас на рахунку вже є 200 бонусів, які Ви можете використати на наступне замовлення вже зараз ♥</p>
            </div>
        </div>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-1 b1" id="b1">
           <div class="container">
               <div>
                   <h1>Thank you for your order!</h1>
                   <p>We reserve your things until 19:00 until 19.01.2023
                   <br><br>
                   See you soon ♥</p>
                   <div class="btn">Go<br> to shopping</div>
               </div>
           </div>
       </div>
       <div class="block-1 b2" id="b2">
           <div class="container">
               <div>
                   <h1>Thank you for your order!</h1>
                   <p>You can pick up your things any day from 12:00 to 19:00 at the address: 7 Mechnikova St.
                   <br><br>
                   See you soon ♥</p>
               </div>
           </div>
       </div>
       <div class="block-1 b3" id="b3">
           <div class="container">
               <div>
                   <h1>Thank you for your order!</h1>
                   <p>After full payment of the order in the branch, appear in your personal account ???? bonuses
                   <br><br>
                   We will wait for you again!</p>
                   <div class="btn">Go<br> to shopping</div>
               </div>
           </div>
       </div>
       <div class="block-1 b4" id="b4">
           <div class="container">
               <div>
                   <h1>Thank you for your order!</h1>
                   <p>Your order is already being prepared to go to you!
                   <br><br>
                   We are glad to inform you that you already have 200 bonuses in your account, which you can use to order right now ♥</p>
               </div>
           </div>
       </div>

<?php
}
?> 
    
    <script>
        
        const queryParams = new URLSearchParams(window.location.href);
        const getParam = (param) => {
          const urlParams = new URL(window.location.toString()).searchParams
          return urlParams.get(param) || ''
        }
        
        mess = getParam('mess');
        if (mess == 'mess1'){
            document.getElementById('b1').classList.add('active');
        } else if (mess == 'mess2'){
            document.getElementById('b2').classList.add('active');
        } else if (mess == 'mess3'){
            document.getElementById('b3').classList.add('active');
        } else {
            document.getElementById('b4').classList.add('active');
        }
        
        
    </script>


<?php
if ( $current_language === 'uk' ) { 
?>    
    <div class="block-2 block-bonuses">
        <div class="container">
            <div class="line1">
                <p>Мій рівень: <span class="l<?php echo $user_level ?>"><?php echo $user_levels[$user_level] ?></span></p>
                <h2>мої бонуси</h2>
                <p class="link"><a href="#">Програма лояльності</a></p>
            </div>
            <div class="line2">
                <div class="box <?php if ($user_level == 6){echo 'active';}?>">
                    <p onclick="openMess(this)">BFF (Best Friend Forever)</p>
                    <p class="number">6</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 1){echo 'now';}
                    if ($user_level > 1){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">New Client</p>
                    <p class="number">1</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 5){echo 'now';}
                    if ($user_level > 5){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Best Friend</p>
                    <p class="number">5</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 2){echo 'now';}
                    if ($user_level > 2){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">Loyal Client</p>
                    <p class="number">2</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 4){echo 'now';}
                    if ($user_level > 4){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Friend</p>
                    <p class="number">4</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <div class="box  
                <?php
                if ($user_level == 3){echo 'now';}
                if ($user_level > 3){echo 'active';}
                ?>">
                    <span></span>
                    <p onclick="openMess(this)">Special client</p>
                    <p class="number">3</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <p>при покупці від 100 000 грн. - бонус 15%
                            <br>
                            <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                        </p>
                    </div>
                </div>
                <script>
                    function cliseMess(el) {
                        el.classList.remove('active');
                    }

                    function openMess(el) {
                        console.log('openMess');
                        var els = el.closest(".line2").querySelectorAll('.mess');
                        console.log(els);
                        els.forEach((element) => {
                            element.classList.remove('active');
                        })
                        el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                    }

                </script>

                <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
                <!--                http://jsbin.com/yuponumozi/1/edit?html,css,js,output   -->
                <div class="circule">
                    <div id="progress" class="progress" style="--progress: 23%;"></div>
                    <div class="my-bonuses">
                        <p class="summ">
                            <?php
                            $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);
                            echo esc_html( $ywpar_customer->get_total_points() );
                            ?>
                        </p>
                        <p class="desc">Поточних бонусів</p>
                        <p class="val">1 бонус = 1 ₴</p>
                    </div>
                </div>
                <?php 
                    if ($user_level <6){
                        $prev = $values16[$user_level - 1]; //60000
                        $next = $values16[$user_level]; //120000
                        $past = 17*($user_level - 1);
                        
                        // $next - $prev -- 100%
                        // $a - $prev -- X
                        
                        $val1 = round(((($a - $prev) * 100)/($next - $prev))*0.17 + $past) ;
                        
                        // $val1 = round($a * 100 / $values16[5]);
                        $val2 = 100 - $val1;
                    } else {
                        $val1 = 100;
                        $val2 = 0;
                    }
                ?>
                <script>
                    var dataset = [{
                        value: <?php echo $val1 ?>,//закрашенная часть
                        color: 'transparent'
                    }, {
                        value: <?php echo $val2 ?>,
                        color: '#D9D9D9'
                    }];

                    var maxValue = 25;
                    var container = $('#progress');

                    var addSector = function(data, startAngle, collapse) {
                        var sectorDeg = 3.6 * data.value;
                        var skewDeg = 90 + sectorDeg;
                        var rotateDeg = startAngle;
                        if (collapse) {
                            skewDeg++;
                        }

                        var sector = $('<div>', {
                            'class': 'sector'
                        }).css({
                            'background': data.color,
                            'transform': 'rotate(' + rotateDeg + 'deg) skewY(' + skewDeg + 'deg)'
                        });
                        container.append(sector);

                        return startAngle + sectorDeg;
                    };

                    dataset.reduce(function(prev, curr) {
                        return (function addPart(data, angle) {
                            if (data.value <= maxValue) {
                                return addSector(data, angle, false);
                            }

                            return addPart({
                                value: data.value - maxValue,
                                color: data.color
                            }, addSector({
                                value: maxValue,
                                color: data.color,
                            }, angle, true));
                        })(curr, prev);
                    }, 0);

                </script>
            </div>
            <div class="line3">
                <div class="list">
                    <div class="box">
                        <p onclick="openMessMobile(this)">1. New Client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">2. Loyal Clientnt</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <div class="box now">
                        <p onclick="openMessMobile(this)">3. Special client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">4. Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">5. Best Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">6. <span>BFF (</span>Best Friend Forever<span>)</span></p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <p>при покупці від 100 000 грн. - бонус 15%
                                <br>
                                <br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span>
                            </p>
                        </div>
                    </div>
                    <script>
                        function closeMessMobile(el) {
                            el.classList.remove('active');
                        }

                        function openMessMobile(el) {
                            console.log('openMess');
                            var els = el.closest(".line3").querySelectorAll('.mess');
                            console.log(els);
                            els.forEach((element) => {
                                element.classList.remove('active');
                            })
                            el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                        }

                    </script>
                </div>
            </div>
            <div class="line4">
                <p class="desc">До наступного рівня <?php echo $user_levels[$user_level + 1]; ?> - залишилось придбати товарів</p>
                <?php
                $left = $next - $a;
                $formattedNumber = number_format($left, 0, '', ' ');
                ?>
                <p class="summ">на <?php echo $formattedNumber; ?> грн</p>
                <p class="term">Строк використання:
                    <br>до 23:59 годин 31.12.2023 включно</p>
                <div class="btn">Перейти
                    <br>до покупок</div>
            </div>
        </div>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
<div class="block-2 block-bonuses">
        <div class="container">
            <div class="line1">
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="subhead">Мій рівень: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="subhead">My level: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<h2>Мої бонуси</h2>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<h2>My bonuses</h2>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="link"><a href="'.get_home_url().'/bonus-system/">Програма лояльності</a></p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="link"><a href="'.get_home_url().'/bonus-system/">Loyalty program</a></p>';
                }
                ?>
            </div>
            <div class="line2">
                <div class="box <?php if ($user_level == 6){echo 'active';}?>">
                    <p onclick="openMess(this)">BFF (Best Friend Forever)</p>
                    <p class="number">6</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 1){echo 'now';}
                    if ($user_level > 1){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">New Client</p>
                    <p class="number">1</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 5){echo 'now';}
                    if ($user_level > 5){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Best Friend</p>
                    <p class="number">5</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 2){echo 'now';}
                    if ($user_level > 2){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">Loyal Client</p>
                    <p class="number">2</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 4){echo 'now';}
                    if ($user_level > 4){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Friend</p>
                    <p class="number">4</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                <?php
                if ($user_level == 3){echo 'now';}
                if ($user_level > 3){echo 'active';}
                ?>">
                    <span></span>
                    <p onclick="openMess(this)">Special client</p>
                    <p class="number">3</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <script>
                    function cliseMess(el) {
                        el.classList.remove('active');
                    }

                    function openMess(el) {
                        console.log('openMess');
                        var els = el.closest(".line2").querySelectorAll('.mess');
                        console.log(els);
                        els.forEach((element) => {
                            element.classList.remove('active');
                        })
                        el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                    }

                </script>

                <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
                <!--                http://jsbin.com/yuponumozi/1/edit?html,css,js,output   -->
                <div class="circule">
                    <div id="progress" class="progress" style="--progress: 23%;"></div>
                    <div class="my-bonuses">
                        <p class="summ">
                            <?php
                            $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);
                            echo esc_html( $ywpar_customer->get_total_points() );
                            ?>
                        </p>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p class="desc">Поточних бонусів</p><p class="val">1 бонус = 1 ₴</p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p class="desc">Current bonuses</p><p class="val">1 bonus = 1 ₴</p>';
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    if ($user_level <6){
                        $prev = $values16[$user_level - 1]; //60000
                        $next = $values16[$user_level]; //120000
                        $past = 17*($user_level - 1);
                        
                        // $next - $prev -- 100%
                        // $a - $prev -- X
                        
                        $val1 = round(((($a - $prev) * 100)/($next - $prev))*0.17 + $past) ;
                        
                        // $val1 = round($a * 100 / $values16[5]);
                        $val2 = 100 - $val1;
                    } else {
                        $val1 = 100;
                        $val2 = 0;
                    }
                ?>
                <script>
                    var dataset = [{
                        value: <?php echo $val1 ?>,//закрашенная часть
                        color: 'transparent'
                    }, {
                        value: <?php echo $val2 ?>,
                        color: '#D9D9D9'
                    }];

                    var maxValue = 25;
                    var container = $('#progress');

                    var addSector = function(data, startAngle, collapse) {
                        var sectorDeg = 3.6 * data.value;
                        var skewDeg = 90 + sectorDeg;
                        var rotateDeg = startAngle;
                        if (collapse) {
                            skewDeg++;
                        }

                        var sector = $('<div>', {
                            'class': 'sector'
                        }).css({
                            'background': data.color,
                            'transform': 'rotate(' + rotateDeg + 'deg) skewY(' + skewDeg + 'deg)'
                        });
                        container.append(sector);

                        return startAngle + sectorDeg;
                    };

                    dataset.reduce(function(prev, curr) {
                        return (function addPart(data, angle) {
                            if (data.value <= maxValue) {
                                return addSector(data, angle, false);
                            }

                            return addPart({
                                value: data.value - maxValue,
                                color: data.color
                            }, addSector({
                                value: maxValue,
                                color: data.color,
                            }, angle, true));
                        })(curr, prev);
                    }, 0);

                </script>
            </div>
            <div class="line3">
                <div class="list">
                    <div class="box">
                        <p onclick="openMessMobile(this)">1. New Client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">2. Loyal Clientnt</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box now">
                        <p onclick="openMessMobile(this)">3. Special client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">4. Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">5. Best Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">6. <span>BFF (</span>Best Friend Forever<span>)</span></p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <script>
                        function closeMessMobile(el) {
                            el.classList.remove('active');
                        }

                        function openMessMobile(el) {
                            console.log('openMess');
                            var els = el.closest(".line3").querySelectorAll('.mess');
                            console.log(els);
                            els.forEach((element) => {
                                element.classList.remove('active');
                            })
                            el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                        }

                    </script>
                </div>
            </div>
            <div class="line4">
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="desc">До наступного рівня '.$user_levels[$user_level + 1].' - залишилось придбати товарів</p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="desc">To next level '.$user_levels[$user_level + 1].' - it remains to purchase products</p>';
                }
                ?>
                <?php
                $left = $next - $a;
                $formattedNumber = number_format($left, 0, '', ' ');
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="summ">на '.$formattedNumber.' грн</p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="summ">on '.$formattedNumber.' hrn</p>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="term">Строк використання:<br>до 23:59 годин 31.12.2023 включно</p><div class="btn">Перейти <br>до покупок</div>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="term">Term of use:<br>until 23:59 on 31.12.2023 inclusive</p><div class="btn">Go to<br> purchases</div>';
                }
                ?>
            </div>
        </div>
    </div>

<?php
}
?>


<?php
if ( $current_language === 'uk' ) { 
?> 
    <div class="block-33 product-list">
        <div class="container">
            <div class="line1">
                <h2>Доповніть образ</h2>
            </div>
            <div class="line2 swiper mySwiperL2">
    
                <div class="swiper-wrapper">
    
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Блуза</p>
                                <h4>TestProd</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original-product-id="8055" data-title="">
                            </div>
                            <div class="colors">
                                <span class="bila"></span>
                                <span class="grafit"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                        </div>
                        <div class="l3">
                            <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Брюки</p>
                                <h4>Брюки прямого крою зі стрілками чорний 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7755&#038;_wpnonce=e67ba19b08'" data-product-id="7755" data-product-type="variable" data-original-product-id="7755" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7755/'">
                        </div>
                        <div class="l3">
                            <p class="price">3200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7755/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Жакет</p>
                                <h4>Жакет кроп з акцентним плечем льон чорний 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7758&#038;_wpnonce=e67ba19b08'" data-product-id="7758" data-product-type="variable" data-original-product-id="7758" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7758/'">
                        </div>
                        <div class="l3">
                            <p class="price">4900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7758/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Сукня</p>
                                <h4>Сукня міді з рукавами буфами та розрізом чорний 52% район, 48% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7759&#038;_wpnonce=e67ba19b08'" data-product-id="7759" data-product-type="variable" data-original-product-id="7759" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7759/'">
                        </div>
                        <div class="l3">
                            <p class="price">5300<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7759/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Сорочка</p>
                                <h4>Сорочка з супатною застібкою з об&#8217;ємними рукавами жовтий 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7698&#038;_wpnonce=e67ba19b08'" data-product-id="7698" data-product-type="variable" data-original-product-id="7698" data-title="">
                            </div>
                            <div class="colors">
                                <span class="zhovtyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7698/'">
                        </div>
                        <div class="l3">
                            <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7698/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Брюки</p>
                                <h4>Брюки лляні вільного крою жовтий 100% льон</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7699&#038;_wpnonce=e67ba19b08'" data-product-id="7699" data-product-type="variable" data-original-product-id="7699" data-title="">
                            </div>
                            <div class="colors">
                                <span class="zhovtyj"></span>
                                <span class="temno-synij"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7699/'">
                        </div>
                        <div class="l3">
                            <p class="price">2200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7699/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Блуза</p>
                                <h4>Блуза з глибоким вирізом, приталена молочний 70% котон, 30% еластан</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7695&#038;_wpnonce=e67ba19b08'" data-product-id="7695" data-product-type="variable" data-original-product-id="7695" data-title="">
                            </div>
                            <div class="colors">
                                <span class="molochnyj"></span>
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7695/'">
                        </div>
                        <div class="l3">
                            <p class="price">2900<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7695/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
                    <div class="box swiper-slide">
    
                        <div class="l1">
                            <div class="name">
                                <p class="type"> Пальто</p>
                                <h4>Пальто халат двобортне зi складкою, 386 чорний 75% вовна, 10% альпака, 5% шовк, 10% сумішеві волокна</h4>
                            </div>
                            <div class="like-btn" onclick="location.href='?add_to_wishlist=7501&#038;_wpnonce=e67ba19b08'" data-product-id="7501" data-product-type="variable" data-original-product-id="7501" data-title="">
                            </div>
                            <div class="colors">
                                <span class="chornyj"></span>
    
    
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://www.bazhane.com/wp-content/uploads/2023/06/poduct-catalog.png" alt="" onclick="location.href='https://www.bazhane.com/shop/7501/'">
                        </div>
                        <div class="l3">
                            <p class="price">12800<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                            <div class="more">
                                <a href="https://www.bazhane.com/shop/7501/">Докладніше</a>
                                <span></span>
                            </div>
                        </div>
    
    
                    </div>
    
    
    
                </div>
                <div class="swiper-pagination-box">
                    <span class="btn custom-button-prev-l2">Назад</span>
                    <div class="swiper-pagination-l2"></div>
                    <span class="btn custom-button-next-l2">Далі</span>
                </div>
            </div>
        </div>
    </div>
    
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-33 product-list">
        <div class="container">
            <div class="line1">
                <h2>Доповнити образ</h2>
            </div>
            <div class="line2 swiper mySwiperL2">
    
                <div class="swiper-wrapper">
    
    
                    <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>

                     <div class="box swiper-slide">
    
                         <div class="l1">
                             <div class="name">
                                 <p class="type">Блуза</p>
                                 <h4>TestProd</h4>
                             </div>
                             <div class="like-btn" onclick="location.href='?add_to_wishlist=8055&#038;_wpnonce=e67ba19b08'" data-product-id="8055" data-product-type="variable" data-original -product-id="8055" data-title="">
                             </div>
                             <div class="colors">
                                 <span class="bila"></span>
                                 <span class="grafit"></span>
    
    
                             </div>
                         </div>
                         <div class="img">
                             <img src="" alt="" onclick="location.href='https://www.bazhane.com/katalog/bluza/testprod/'">
                         </div>
                         <div class="l3">
                             <p class="price">1200<span class="woocommerce-Price-currencySymbol"> ₴</span></p>
                             <div class="more">
                                 <a href="https://www.bazhane.com/katalog/bluza/testprod/">Докладніше</a>
                                 <span></span>
                             </div>
                         </div>
                     </div>
    
                    
    
    
    
                </div>
                <div class="swiper-pagination-box">
                    <span class="btn custom-button-prev-l2">Назад</span>
                     <div class="swiper-pagination-l2"></div>
                     <span class="btn custom-button-next-l2">Далі</span>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
    <!-- Initialize Swiper -->
    <script>
        var swiperL2 = new Swiper(".mySwiperL2", {
            //                slidesPerView: 4,
            //                spaceBetween: 33,
            pagination: {
                el: ".swiper-pagination-l2",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            navigation: {
                nextEl: ".custom-button-next-l2",
                prevEl: ".custom-button-prev-l2",
            },
    
            // Default parameters
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 20,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                //                    320: {
                //                        slidesPerView: 2,
                //                        spaceBetween: 20
                //                    },
                // when window width is >= 480px
                660: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1439: {
                    slidesPerView: 4,
                    spaceBetween: 33
                }
            }
        });
    
    </script>

    <?php include 'custom-footer.php' ?>

</body>

</html>
